<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
use App\Model\Ratings;
use App\User;

class HomeController extends Controller
{
  /**
   * Показать информационную панель приложения.
   *
   * @return Response
   */
  public function index()
  {
    $articles= Article::where('status_id', 3)
                      ->orderBy('updated_at', 'desc')
                      ->paginate(4);
    $articles->transform(function ($item, $key) 
    {
      return $item->cut_discription(200);
    });
    // dd($articles);
    return view('home', ['articles' => $articles]);
  }

  public function updateuser(Request $request)
  {
    return view('updateuser');
  }

  public function updateusersumbit(Request $request)
  {
    // dd($request);
    // return 1;
    $user = Auth::user();
    $user->name = $request->input('name');
    $user->avatar = $request->input('avatar');
    $user->save();
    return redirect()->route('update.user')->with('success', 'Изменения вступили в силу');
  }

  public function homeView(Request $request)
  {
    // dd(Ratings::orderBy('articles_id', 'asc')->paginate(30, ['*'], 'rat_page'));
    if(Auth::check())
      if(Auth::user()->roles_id>2)
        // return view('admin', ['articles' => Article::where('status_id', 3)->orderBy('updated_at', 'desc')->paginate(4), 'users' => User::all()]);
        return view('admin', ['articles' => Article::orderBy('updated_at', 'desc')->paginate(9, ['*'], 'art_page'), 'users' => User::orderBy('id', 'asc')->paginate(12, ['*'], 'user_page'), 'ratings' => Ratings::orderBy('articles_id', 'asc')->paginate(30, ['*'], 'rat_page')]);

    return redirect()->route('home');
  }
//   public function homeView($sort, Request $request)
//   {
//     if(Auth::check())
//       if(Auth::user()->roles_id>2)
//         if($sort==1)
//           return view('admin', ['articles' => Article::where('status_id', 3)->orderBy('updated_at', 'desc')->paginate(4), 'users' => User::all()]);
//         else
//           return view('admin', ['articles' => Article::all()->sortBy('updated_at'), 'users' => User::all()]);

//     return redirect()->route('home');
//   }
}