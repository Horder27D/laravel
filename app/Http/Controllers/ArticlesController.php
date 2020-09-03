<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function showArticles (){
        $articles= Article::paginate(4);
        return view('articles', ['articles' => $articles]);
    }

    public function destroyArticles(Request $request)
    {    
        // dd($request->user_id);
        $id = $request->id;
        Article::find($id)->delete();
        return redirect()->route('user.articles', $request->user_id)->with('success', 'Успешно удалено!');
    }

    public function createArticlesPage(Request $request)
    {     
        return view('article_create');
    }
    public function createArticles(Request $request)
    {     
        // dd($request->input('title'), $request->input('discription'), $request->input('preview'));
        $article = new Article;
        $article->title = $request->input('title');
        $article->discription = $request->input('discription');
        $article->user_id = Auth::user()->id;
        if(isset($request->preview))
        {
            $request->validate([
                'preview' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $imageName = time().'.'.$request->preview->extension();  
            $request->preview->move(public_path('img/articles'), $imageName);
            $article->preview='img/articles/'.$imageName;
        } 
        // dd($request);
        $article->save();
        // dd($article);
        return redirect()->route('user.articles', Auth::user()->id)->with('success', 'Статья отправлена на согласование');
        // return 1;
    }

    public function showOneArticle($id)
    {
        return view('onearticle', ['article' => Article::find($id)]);
    }

    public function updateArticles($id, ArticleRequest $request)
    {     
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->discription = $request->input('discription');
        $article->save();
        
        return redirect()->route('articles')->with('success', 'Изменения вступили в силу');
    }

    public function updatePost($id, ArticleRequest $request)
    {
        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->discription = $request->input('discription');
        $article->user_id = $request->input('user_id');
        $article->status_id = $request->input('status');
        $article->created_at = $request->input('created_at');
        // dd($request->preview);
        if(isset($request->preview))
        {
            $request->validate([
                'preview' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $imageName = time().'.'.$request->preview->extension();  
            $request->preview->move(public_path('img/articles'), $imageName);
            $article->preview='img/articles/'.$imageName;
        } 
        $article->save();

        return redirect()->route('admin.article')->with('success', $article->title.' успешно отредактирован!');
    }

    public function deletePost($id, Request $request)
    {    
        // dd($id, Article::find($id), $request);
        $articlename=Article::find($id)->title;
        Article::find($id)->delete();
        return redirect()->route('admin.article')->with('success', $articlename.' успешно удалён!');
    }
}

