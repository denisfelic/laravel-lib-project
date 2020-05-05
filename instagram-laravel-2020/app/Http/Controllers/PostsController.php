<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    public function __construct()   //Tem que ter o construtor para implementar o metodo auth();
    {
        //Implementa o método auth();
        $this->middleware('auth');  //Só pode acessar quem tiver logado
    }

    //Retorna a view /posts/create.blade.php
    public function create()
    {

        return view('posts.create');
    }

    //Cria um post
    public function store()
    {

        //Pega os dados vindo da request (POST), e atribui a uma variavel
        $validatedData = request()->validate([
            //   'seraIgnorado' => '', Este cara aqui sera ignorado pelo laravel, apenas utlizar ''
            'caption' => 'required',
            'image' => ['required', 'image'],
            // 'image' => 'required|image',
        ]);

        /*Método Manual de criar um post
        $post = new Post();
        $post->caption = $validatedData['caption'];
        $post->save();
        //Depois teria de adicinar ao usuario.
        */

        //Lembre-se de criar link para o diretorio storage/app/public  que é privado.
        //Para isso php artisan storage:link
        $imagePatch = request('image')->store('uploads', 'public');


        //Redimensiona a imagem
        $img = Image::make(public_path("storage/{$imagePatch}"))->fit(1200, 1200);
        $img->save();
         //return $img->response('jpg');
        //dd([variavel]);  -> Debbug and Die

        //Método Automatico de criar um Post, cria um post e já o adiciona á o usuario logado
        //Função "auth()", pega o usuário autenticado atual.
        auth()->user()->posts()->create([
            'caption' => $validatedData['caption'],
            'image' => $imagePatch,
        ]);
        //Pego o usuário autenticado e crio o POST
        //Laravel é inteligente o sulficiente para adicionar o id...

        //Pega o id do usuario que está logado
        $userId = \auth()->user()->id;


        //Após o post ter sido criado, redireciono o usuario para seu perfil.
        return redirect('/profile/' . $userId);
    }


    //Exibir um post ao ser clicado.
    public function show(\App\Post $post){
        //Para que ele retorne o objeto do tipo Post, o nome da variavel precisa ser o mesmo que o
        // que está na rota que aponta para esse metodo, no arquivo web.php
        return view('posts.show', compact('post'));


    //    return view('posts.show', compact('post')); === return view('posts.show', ['post' => $post ]);

    }
}
