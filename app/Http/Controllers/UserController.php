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
      //dd($request->all());
      if($request->name == auth()->user()->name && $request->email == auth()->user()->email && $request->image == auth()->user()->user_photo){
        return redirect()
            ->back()
            ->with('error', 'Você não inseriu nenhum novo dado');
      }
      $user = auth()->user();

      if($request->hasFile('user_photo') && $request->file('user_photo')->isValid()){
        //Concatena o nome da imagem com o id e nome do usuário
        //kebab remove caracteres especiais
        $name = md5($user->name.$user->email);

        //pega a extensão do arquivo
        $extension = $request->user_photo->extension();

        //nome Final da imagem
        $nameFile = "{$name}.{$extension}";

        //Atualiza o nome da imagem
        $request['user_photo'] = $nameFile;

        //Digo onde quero que seja salva as imagens
        //Caso não exista a pasta, ele cria
      }elseif(auth()->user()->user_photo !== 'user_photo'){
        $request['user_photo'] = auth()->user()->user_photo;
      }else{
        $request['user_photo'] = 'user.png';
      }
      $upload = $request->user_photo->storeAs('profile', $nameFile);


      if(!$upload)
        return redirect()
          ->back()
          ->with('error', 'Falha ao atualizar a imagem');

      /*
      if($request->hasFile('user_photo') && $request->file('user_photo')->isValid()){
        $name = md5(auth()->user()->name.auth()->user()->email);
        $extension = $request->user_photo->extension();

        $request['user_photo'] = $name.'.'.$extension;
      }elseif(auth()->user()->user_photo !== 'user_photo'){
        $request['user_photo'] = auth()->user()->user_photo;
      }else{
        $request['user_photo'] = 'user.png';
      }*/

      $response = $user->editProfile($request, $nameFile);

      if($response['success'])
        return redirect()
          ->to('/profile')
          ->with('success', $response['message']);

      return redirect()
        ->back()
        ->with('error', $response['message']);
    }
}
