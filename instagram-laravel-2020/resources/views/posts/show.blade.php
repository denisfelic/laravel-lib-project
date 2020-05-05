@extends('layouts.app')
<!--- Exibe um unico post ao ser clicado . -->
@section('content')
<div class="container">
    <div class="row">

        <div class="col-8">
            <img class=" w-100" src="/storage/{{ $post->image }}" style="border-radius: 10px;"
                alt="Image {{ $post->id }} from User id equals {{ $post->user_id }} ">
        </div>

        <div class="col-4 text-justify pt-5"  style="background: #fff; border-radius: 10px; border: solid .1px rgb(195, 195, 195)">
            <div class="d-flex align-items-center">
                <a href="/profile/{{$post->user_id}}">
                    <img src="/storage/{{ $post->user->profile->image }}" class="w-100 rounded-circle"
                        style="max-width: 40px" alt="">
                </a>
                <a href="/profile/{{$post->user_id}}" class="ml-3 pt-1 font-weight-bold" style="font-size: 14px;">
                    {{ $post->user->username }}
                </a>
            </div>

            <div class="mt-4">
                <div class="d-flex">

                    <p class="pl-1"><a href="/profile/{{$post->user_id}}" class="font-weight-bold" style="text-decoration: none;" >{{ $post->user->username }}</a> {{ $post->caption }}</p>
                </div>
                <p style="font-size: 12px;"> Publicado em {{ $post->created_at }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
