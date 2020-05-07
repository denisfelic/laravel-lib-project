<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{

    public function __construct()
    {
    }
    //Exibe a view de profile do usuario
    public function index(\App\User $user)
    {

        $follows = false;

        //Caso o usuario esteja logado e o usuario está seguindo ou não o perfil.
        if(auth()->user() && auth()->user()->following->contains($user->id)){
        $follows = true;
        }



        //   $user = User::findOrFail($user); === \App\User $user
        return view('profiles.index', ['user' => $user, 'follows' => $follows]);
    }

    //Exibe a view de edição de profile
    public function edit(User $user)
    {   //Verifica se o usuário atual indepedente de logado ou n pode acessar o post (ProfilePolicy)
        $this->authorize('update', $user->profile);


        $profile = $user->profile;
        return view('profiles.edit', compact('user', 'profile'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $validatedData = request()->validate([
            'title' => 'required',
            'description' => ['required'],
            'url' => ['required'],
            'image' => '',
        ]);


        if (request('image')) {
            $imagePatch = request('image')->store('profile', 'public');


            //Redimensiona a imagem
            $img = Image::make(public_path("storage/{$imagePatch}"))->fit(1000, 1000);
            $img->save();
            $imageArray  = ['image' => $imagePatch];
        }
        // auth() -> Verifica se o usuario atual está autenticado;


        auth()->user()->profile->update(array_merge(
            $validatedData,
            $imageArray ?? [],  //Caso não tenha imagem, ira carregar um empyt array

        ));


        return redirect("/profile/{$user->id}");
    }
}
