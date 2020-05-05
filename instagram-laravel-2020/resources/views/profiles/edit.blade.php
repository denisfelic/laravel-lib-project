@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Edição do Profile-->
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-8 offset-1 pl-0"><h1>Edit profile</h1> </div>
        </div>


        <!-- Edit title  -->
        <div class="row">
            <div class="col-8 offset-1">
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Titulo</label>

                    <input name="title" id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                      title=" title" value="{{ old('title') ?? $profile->title }}" autocomplete="title"
                        autofocus>

                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

 <!-- Edit description  -->
 <div class="row">
    <div class="col-8 offset-1">
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label">Descrição</label>

            <textarea name="description" id="description" type="text" class="form-control @error('description') is-invalid @enderror"
              description=" description"  autocomplete="description"
                autofocus>{{  old('description') ?? $profile->description}}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

 <!-- Edit url  -->
 <div class="row">
    <div class="col-8 offset-1">
        <div class="form-group row">
            <label for="url" class="col-md-4 col-form-label">URL</label>

            <input name="url" id="url" type="text" class="form-control @error('url') is-invalid @enderror"
              url=" url" value="{{  old('profile') ?? $profile->url }}" autocomplete="url"
                autofocus>

            @error('url')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>

 <!-- CAMPO Profile Image-->
 <div class="row">
    <div class="col-8 offset-1">
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label">Profile Image</label>

            <input id="image" name="image"type="file" class="form-control-file" />

            @error('image')
                <span style="color: #E9402F" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>




    <!--Botões -->
        <div class="row">
            <div class="col-8 offset-1 pl-0 pt-2">
            <a href="/profile/{{$user->id}}" class="btn btn-outline-primary  ">Voltar</a>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>
</div>

@endsection
