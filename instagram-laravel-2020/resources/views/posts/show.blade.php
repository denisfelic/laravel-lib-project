@extends('layouts.app')
<!--- Exibe um unico post ao ser clicado . -->
@section('content')
<div class="container">
    <div class="row">

        <div class="col-8">
            <!-- Imagem do post-->
            <img class=" w-100" src="/storage/{{ $post->image }}" style="border-radius: 10px;"
                alt="Image {{ $post->id }} from User id equals {{ $post->user_id }} ">
        </div>

        <div class="col-4 text-justify pt-5"
            style="background: #fff; border-radius: 10px; border: solid .1px rgb(195, 195, 195)">
            <div class="d-flex align-items-center">
                <!-- User profile picture  -->
                <a href="/profile/{{ $post->user_id }}">
                    <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle"
                        style="max-width: 40px" alt="">
                </a>
                <!-- User profile name  -->
                <a href="/profile/{{ $post->user_id }}" class="ml-3 font-weight-bold" style="font-size: 14px;">
                    <span class="text-dark" >{{ $post->user->username }}</span>
                </a>
                <a href="#" class="pl-2 font-weight-bold" style="text-decoration: none; font-size: 13px">Fallow</a>
            </div>

            <div class="mt-4">
                <div class="d-flex">
                    <!-- Username + post caption-->
                    <p class="pl-1">
                        <a href="/profile/{{ $post->user_id }}" class="font-weight-bold"
                            style="text-decoration: none;">
                            <span class="text-dark" >{{ $post->user->username }}</span>
                        </a>
                        {{ $post->caption }}
                    </p>
                </div>
                <!-- created-at-->
                <p style="font-size: 12px;"> Publicado em {{ $post->created_at }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
