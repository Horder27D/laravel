<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
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

}