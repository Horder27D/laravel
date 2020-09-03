<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
    public function updateUser($id, Request $request)
    {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if(!$request->password)
            $user->password = Hash::make($request->input('password'));
        $user->roles_id = $request->input('roles_id');
        // dd($request, $request->roles_id);
        if(isset($request->avatar))
        {
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $imageName = time().'.'.$request->avatar->extension();  
            $request->avatar->move(public_path('img/users'), $imageName);
            $user->avatar='img/users/'.$imageName;
        } 
        $user->save();

        return redirect()->route('admin.user')->with('success', 'Пользователь '.$user->name.' успешно отредактирован!');
    }
    public function deleteUser($id, Request $request)
    {    
        // dd($id, User::find($id), $request);
        $username=User::find($id)->name;
        User::find($id)->delete();
        return redirect()->route('admin.user')->with('success', $username.' успешно удалён!');
    }
}
