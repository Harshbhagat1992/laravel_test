<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:50',
            'email' => 'required|unique:users|max:255',
            'joining_date' => 'required',
            'photo' => 'required|mimes:jpg,bmp,png,jpeg',
        ]);
        $file = $request->file('photo');
        $destinationPath = 'uploads';
        $filename = time().'.'.$file->getClientOriginalExtension();
        if($file->move($destinationPath,$filename)){
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->joining_date = date("Y-m-d",strtotime(request('joining_date')));
            if(request('working') == 1){
                $user->leaving_date = date("Y-m-d");
            }else{
                $user->leaving_date = date("Y-m-d",strtotime(request('leaving_date')));
            }
            $user->still_working = empty(request('working')) ? 0 : request('working');
            $user->image = $filename;
            $user->save();       
            $request->session()->flash('message.level', 'success');
            $request->session()->flash('message.content', 'User was successfully added!');     
            return redirect('/');
        }
        
    }

    public function delete(Request $request){
        if(!empty(request('id'))){
            $user = User::find(request('id'));
            $user->status = 0;
            $user->save();
            $request->session()->flash('message.level', 'danger');
            $request->session()->flash('message.content', 'User was successfully deleted!');
            return redirect('/');
        }
    }

}
