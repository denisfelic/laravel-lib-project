@extends('layouts.app')

<!-- Página que exibe o perfil do usuario, Rota -> /profile/{id}-->
@section('content')
<div class="container">
    <div class="row">




        <!-- Foto de perfil do usuário -->
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}"
            alt="User Profile picture" class="rounded-circle" style="max-height: 140px">
        </div>

        <!-- Conteudos do perfil do usúario [nome, username, link, etc...]-->
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center ">
                    <h1>{{ $user->username }}</h1>

                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
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
            <div class="pr-3"><strong class="pr-1">{{$user->profile->followers()->count() }}</strong>seguidores</div>
            <div class="pr-3">seguindo <strong class="pr-1"> {{ $user->following()->count() }}</strong></div>
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
