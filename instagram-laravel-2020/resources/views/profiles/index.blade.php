@extends('layouts.app')

<!-- Página que exibe o perfil do usuario, Rota -> /profile/{id}-->
@section('content')
<div class="container">
    <div class="row">


        @if (!$user->profile->image)
        <div class="col-3 p-5">
            <img src=" https://uberinsta.com/images/default_avatar.jpg"
            alt="User Profile picture" class="rounded-circle" style="max-height: 140px">
        </div>
        @else

        <!-- Foto de perfil do usuário -->
        <div class="col-3 p-5">
            <img src="/storage/{{$user->profile->image}}"
            alt="User Profile picture" class="rounded-circle" style="max-height: 140px">
        </div>
        @endif


        <!-- Conteudos do perfil do usúario [nome, username, link, etc...]-->
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $user->username }}</h1>

                <!-- Verifica se o usúario está no mesmo perfil e pode adicionar um novo post -->
                @can('update', $user->profile)
                <a href="/p/create" class="pr-3">Add New Post</a>

                @endcan



            </div>

            <!-- Aplica a regra da Policy... -->
            @can('update', $user->Profile)
            <a href="/profile/{{$user->id}}/edit" class="pr-3">edit profile</a>

            @endcan




            <div class="d-flex">
                <div class="pr-3"><strong class="pr-1">{{ $user->posts->count() }}</strong>publicações</div>
                <div class="pr-3"><strong class="pr-1">46,2mil</strong>seguidores</div>
                <div class="pr-3"><strong class="pr-1">247</strong>seguindo</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div class=""> {{ $user->profile->description }} </div>

            <div>
                <a href="#"> {{ $user->profile->url }} </a>
            </div>
        </div>
    </div>


    <!-- Exibe os  posts do usuário. -->
    <div class="row mb-5">

        @foreach($user->posts as $post)
            <div class="col-4 mt-4">
                <a href="/p/{{ $post->id }}">
                    <img class="w-100" src="/storage/{{ $post->image }}" alt="User image">
                </a>
            </div>
        @endforeach

    </div>
</div>
@endsection
