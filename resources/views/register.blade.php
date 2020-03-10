@extends('layout')
@section('contenido')
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-7 text-left">
                <h1>Registro</h1>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach

                <form method="post" action="{{route('register-post')}}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Nombre</label>
                        <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Introduce tu nombre">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>

                </form>
            </div>
        </div>
    </div>
@endsection
