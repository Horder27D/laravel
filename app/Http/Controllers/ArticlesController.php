<?php

namespace App\Http\Controllers;

use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function showArticles (){
        $articles= Article::paginate(4);
        return view('articles', ['articles' => $articles]);
    }

    public function destroyArticles(Request $request)
    {     
        $id = $request->id;
        Article::find($id)->delete();
        return $id;
    }
    public function createArticles(ArticleRequest $request)
    {     
        $article = new Article();
        $article->title = $request->input('title');
        $article->discription = $request->input('discription');
        $article->save();
        return view('include.rowtable', [
            'article' => $article
        ]);
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


}

