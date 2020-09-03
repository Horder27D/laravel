<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Article;
use App\Model\Ratings;
use App\Model\Status;
use App\Model\Roles;
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
    if(Auth::check())
      if(Auth::user()->roles_id>2)
        return view('admin');
        
    return redirect()->route('home');
  }

  public function homeViewArticles(Request $request)
  {
    if(isset($request->sort))
      {
        if($request->sort==2)
        {
          $articles=Article::orderBy('created_at', 'desc')->paginate(9);
          return view('admin.articles', ['articles' => $articles->appends(['page' => $articles->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort, 'sortname' => $request->sortname]);
        }
          if($request->sort==3)
          {
            $articles=Article::where('title', $request->sortname)->paginate(9);
            if(!$articles->isEmpty()) return view('admin.articles', ['articles' => $articles->appends(['page' => $articles->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort, 'sortname' => $request->sortname]);
          }
        if($request->sort==4)
          {
            $temp=User::where('name',$request->sortname)->first();
            if($temp)
            {
              $articles=$temp->articles()->orderBy('created_at', 'desc')->paginate(9);
              if(!$articles->isEmpty())
                return view('admin.articles', ['articles' => $articles->appends(['page' => $articles->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort, 'sortname' => $request->sortname]); 
            }
          }
      }
    $articles=Article::orderBy('created_at', 'asc')->paginate(9);
    return view('admin.articles', ['articles' => $articles->appends(['page' => $articles->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort, 'sortname' => $request->sortname]);
  }

  public function homeViewUsers(Request $request)
  {
    if(isset($request->sort))
    {
      if($request->sort==2)
      {
        $user=User::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.users', ['users' => $user->appends(['page' => $user->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort, 'sortname' => $request->sortname]);
      }
        if($request->sort==3)
        {
          $user=User::where('name', $request->sortname)->paginate(12);
          if(!$user->isEmpty()) return view('admin.users', ['users' => $user->appends(['page' => $user->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort, 'sortname' => $request->sortname]);
        }
    }

    $user=User::orderBy('created_at', 'asc')->paginate(12);
    return view('admin.users', ['users' => $user->appends(['page' => $user->currentPage(),'sort' => $request->sort, 'sortname' => $request->sortname]), 'sort' => $request->sort]);
  }

  public function homeViewRatings(Request $request)
  {
    return view('admin.ratings', ['ratings' => Ratings::paginate(15), 'sort' => $request->sort]);
  }

  public function homeArticlesUpdate($id, Request $request)
  {
    // dd(Article::find($request->id));
    return view('admin.updatearticle', ['article' => Article::find($id), 'status' => Status::all(), 'users' => User::all()]);
  }
  public function homeUsersUpdate($id, Request $request)
  {
    return view('admin.updateuser', ['user' => User::find($id), 'roles' => Roles::all()]);
  }
  public function test(Request $request)
  {
    dd($request);
    return $request;
  }
}