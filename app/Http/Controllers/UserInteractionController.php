<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
use App\User;

class UserInteractionController extends Controller
{
    public function index(Request $request)
    {
        // if(Auth::user()->roles_id>2){
        //     $articles= Article::whereIn('status_id', [1,2])
        //                         ->orderBy('updated_at', 'desc')
        //                         ->paginate(4);
        //     $articles->transform(function ($item, $key) 
        //     {
        //         return $item->cut_discription(300);
        //     });

        //     return view('user', ['articles' => $articles,
        //             'users' => User::all()]);
        // }
        // else
            return view('user');
    }
    public function viewUser($id, Request $request)
    {
        $articles= Article::where('user_id', $id)
                            ->where('status_id', 3)
                            ->orderBy('updated_at', 'desc')
                            ->paginate(6);
        $articles->transform(function ($item, $key) 
        {
            return $item->cut_discription(150);
        });
        // dd($articles);
        return view('user_view', ['articles' => $articles, 'user' => User::find($id)]);
    }
    public function updateuserimg(Request $request)
    {
        $user = Auth::user();
        $user->avatar = $request->input('avatar');
        $user->save();
        return redirect()->route('user', $user->name)->with('success', 'Изменения вступили в силу');
    }
    public function updateusername(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->save();
        return redirect()->route('user', $user->name)->with('success', 'Изменения вступили в силу');
    }
    public function viewArticles(Request $request)
    {
        $articles= Article::where('user_id', Auth::user()->id)
                            ->orderBy('updated_at', 'desc')
                            ->paginate(9);
        $articles->transform(function ($item, $key) 
        {
            return $item->cut_discription(150);
        });
        return view('articles', ['articles' => $articles, 'user' => Auth::user()]);
    }
}
