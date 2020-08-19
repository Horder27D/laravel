<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserInteractionController extends Controller
{
    public function index(Request $request)
    {
        return view('user');
    }
}
