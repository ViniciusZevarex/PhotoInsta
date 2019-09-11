<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function uploadProfile(Request $data){
        request()->validate([
            'image_profile' => ['required', 'image']          
        ]); 

        $user = User::findOrFail(auth()->id());
        $user->avatar_path = request()->file('image_profile')->store('userProfile', 'public');
        $user->save();
        
        return redirect()->route('user_profile');
    }
}
