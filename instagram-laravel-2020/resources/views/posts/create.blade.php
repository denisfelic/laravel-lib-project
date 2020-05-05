@extends('layouts.app')

@section('content')
<div class="container">

    <!-- Formulario para criação de um novo post no instagram-->
    <form action="/p" enctype="multipart/form-data" method="post">
        @csrf <!-- Permite fazer POST de formulario com files etc -->

        <!--  TITLE  -->

        <div class="row">
            <div class="col-8 offset-1 pl-0"><h1>Add New Post</h1> </div>
        </div>

        <!-- CAMPO Caption  -->
        <div class="row">
            <div class="col-8 offset-1">
                <div class="form-group row">
                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                    <input name="caption" id="caption" type="text" class="form-control
@error('caption') is-invalid @enderror"
                      caption=" caption" value="{{ old('caption') }}" autocomplete="caption"
                        autofocus>

                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <!-- CAMPO Image-->
        <div class="row">
            <div class="col-8 offset-1">
                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label">Post Image</label>

                    <input id="image" name="image"type="file" class="form-control-file" />

                    @error('image')
                        <span style="color: #E9402F" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-1 pl-0 pt-2">
                <button class="btn btn-primary">Add New Post</button>
            </div>
        </div>
    </form>
</div>
@endsection
