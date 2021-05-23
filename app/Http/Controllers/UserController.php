<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:50',
            'email' => 'required|unique:users|max:255',
            'joining_date' => 'required',
            'user_image' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
    }

}
