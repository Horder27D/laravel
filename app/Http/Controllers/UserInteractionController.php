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
        if(Auth::user()->roles_id>2){
            $articles= Article::whereIn('status_id', [1,2])
            ->orderBy('updated_at', 'desc')
            ->paginate(4);
            //->map(function ($item, $key) { return substr($item->dicription,0,200). "...";}); 
            $articles->transform(function ($item, $key) 
            {
            $item->discription = substr($item->discription,0,300). "...";
            return $item;
            });

            return view('user', ['articles' => $articles,
                    'users' => User::all()]);
        }
        else
            return view('user');
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
}
