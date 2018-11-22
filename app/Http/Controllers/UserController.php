<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileFormValidation;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
      return view('site.profile.view-profile')->with('user', auth()->user());
    }

    public function editProfile(ProfileFormValidation $request, User $user){
      if($request->name == auth()->user()->name && $request->email == auth()->user()->email){
        return redirect()
            ->back()
            ->with('error', 'Você não inseriu nenhum novo dado');
      }

      $response = $user->editProfile($request);

      if($response['success'])
        return redirect()
          ->to('/profile')
          ->with('success', $response['message']);

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }
}
