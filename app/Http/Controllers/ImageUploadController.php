<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Console\Command;

class ImageUploadController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('updateuser');
    }
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost(Request $request)
    {
        // dd($request);
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->avatar->extension();  
        $request->avatar->move(public_path('img/users'), $imageName);
        // return back()
        //     ->with('success','Изображение успешно загружено!')
        //     ->with('avatar',$imageName);
   
        return redirect()->route('update.user.img', ['avatar' => 'img/users/'.$imageName]);
        // dd($request);
        // return 1;
    }
    // {{ route('update.user.submit') }}
}
