@extends('layout')
@section('titulo', 'Inicio')
@section('contenido')
<div class="container-fluid text-center">
    <div class="row content">

        <div class="col-sm-7 text-left">
        @if (Auth::check() && Auth::user()->role == 'admin')
                <h2>Estadísticas de administrador</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nombre de usuario</th>
                        <th scope="col">Número de temas</th>
                        <th scope="col">Número de mensajes</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($stats as $fila)
                        <tr>
                            <th scope="row">{{$fila->nombre}}</th>
                            <td>{{$fila->numerotemas}}</td>
                            <td>{{$fila->numeromensajes}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        @endif
        </div>

        <div class="col-sm-7 text-left">
            <h1>Lista de temas</h1>
            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    El tema ha sido creado correctamente.
                </div>
            @endif
            @if($temas->count() == 0)
                <p style="color:red">No hay temas creados actualmente.</p>
            @else

                <table class="table">
                    <tbody>
                    @foreach($temas as $tema)
                        <tr>
                            <th scope="row"><a href="{{route('vertema', $tema->id)}}">{{$tema->titulo}}</a></th>
                            <td>{{$tema->created_at}}</td>
                            <td>{{App\User::where('id', $tema->idAutor)->first()->name}}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            @endif
        </div>

    </div>
</div>
@endsection
