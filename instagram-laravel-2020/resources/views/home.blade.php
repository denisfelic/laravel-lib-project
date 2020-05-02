@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <!-- User Photo-Profile-->
        <div class="col-3 p-5">
            <img src="https://instagram.fcgh4-1.fna.fbcdn.net/v/t51.2885-19/s320x320/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=instagram.fcgh4-1.fna.fbcdn.net&_nc_ohc=FsFGyFNBXkAAX_qTg8h&oh=103954bb02a1dee267087c5cf529a815&oe=5ED602BE" alt="User Profile" class="rounded-circle" style="max-height: 140px">
        </div>

        <!-- User Content-->
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-center">
                <h1>{{ $user->username}}</h1>
                <a href="#" class="pr-3">Add New Post</a>
            </div>

            <div class="d-flex">
                <div class="pr-3"><strong class="pr-1">293</strong>publicações</div>
                <div class="pr-3"><strong class="pr-1">46,2mil</strong>seguidores</div>
                <div class="pr-3"><strong class="pr-1">247</strong>seguindo</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title}}</div>
        <div class=""> {{ $user->profile->description}} </div>

        <div>
            <a href="#"> {{ $user->profile->url}} </a>
        </div>
        </div>
    </div>

    <div class="row  pt-5">
        <div class="col-4">
            <img class="w-100" src="https://instagram.fcgh5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.55.847.847a/s640x640/95032566_2590953614493815_1061141814829510346_n.jpg?_nc_ht=instagram.fcgh5-1.fna.fbcdn.net&_nc_cat=111&_nc_ohc=8ikzr5PVEN4AX92wWMX&oh=77a0d239eb0e13b27bdaaa0f31b23f87&oe=5ED7D34F" alt="User image">
        </div>

        <div class="col-4">
            <img class="w-100" src="https://instagram.fcgh5-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c2.0.745.745a/s640x640/95224410_237873460790480_2374979867183673557_n.jpg?_nc_ht=instagram.fcgh5-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=FfvHtrIvI7MAX8t8GIN&oh=64cfed5aee22145c40d36ccd25ebad40&oe=5ED79328" alt="User image">
        </div>

        <div class="col-4">
            <img class="w-100" src="https://instagram.fcgh4-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/s640x640/94892216_228412868421097_4113969397730546378_n.jpg?_nc_ht=instagram.fcgh4-1.fna.fbcdn.net&_nc_cat=101&_nc_ohc=NaBk0OlvCYQAX_K1Yuz&oh=a0ce3015bc48f51661e42be593bfbef3&oe=5ED6C4CE" alt="User image">
        </div>


    </div>
</div>
@endsection
