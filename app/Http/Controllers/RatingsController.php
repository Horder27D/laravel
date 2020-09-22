<?php

namespace App\Http\Controllers;

use App\Model\Ratings;
use Illuminate\Http\Request;

class RatingsController extends Controller
{
    public function updateRating($id, Request $request)
    {     
        $rating = Ratings::find($id);
        if($rating->total==$request->total) 
            return redirect()->route('admin.rating')->with('warning', 'Вы ничего не изменили');
        $rating->total=$request->total;
        $rating->save();
        return redirect()->route('admin.rating')->with('success', 'Изменения вступили в силу');
    }
    public function deleteRating($id, Request $request)
    {    
        $tname=Ratings::find($id)->user->name;
        Ratings::find($id)->delete();
        
        return redirect()->route('admin.rating')->with('success', 'Оценка пользователя '.$tname.' удалена');
    }
}
