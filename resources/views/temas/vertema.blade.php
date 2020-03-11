@extends('layout')
@section('titulo', 'Crear un nuevo tema')
@section('contenido')
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-7 text-left">
                <h1>{{$tema->titulo}}</h1>
                <div class="well">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img style="max-width:150px" class="media-object" src="{{asset("storage/{$tema->idAutor}/avatar.jpg")}}">
                        </a>
                        <div class="media-body">
                            <p class="text-right">Escrito por <strong>{{App\User::where('id', $tema->idAutor)->first()->name}}</strong></p>
                            <div style="min-height:100px"><p>{!! $mensaje !!}</p></div>
                            <ul class="list-inline list-unstyled">
                                <li><span><i class="glyphicon glyphicon-calendar"></i> {{$tema->created_at}} </span></li>
                                <li>|</li>
                                <span><i class="glyphicon glyphicon-comment"></i> {{App\Mensaje::where('idTema', $tema->id)->get()->count()}} respuestas</span>
                                <li>|</li>
                                <li>
                                    {{$tema->numeroLikes}} likes
                                </li>
                                <li><a href="{{route('likeTema', $tema->id)}}"><i class="glyphicon glyphicon-thumbs-up"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                @foreach($mensajes as $mensaje)
                    <div style="width:80%;margin-left:10%" class="well">
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img style="max-width:150px" class="media-object" src="{{asset("storage/{$mensaje->idAutor}/avatar.jpg")}}">
                            </a>
                            <div class="media-body">
                                <p class="text-right">Escrito por <strong>{{App\User::where('id', $tema->idAutor)->first()->name}}</strong></p>
                                <div style="min-height:100px"><p>
                                        @php
                                            $bbcode = new ChrisKonnertz\BBCode\BBCode();
                                            $mensajeRendered = $bbcode->render($mensaje->mensaje);
                                        @endphp

                                        {!! $mensajeRendered !!}</p></div>
                                <ul class="list-inline list-unstyled">
                                    <li><span><i class="glyphicon glyphicon-calendar"></i> {{$mensaje->created_at}} </span></li>
                                    <li>|</li>
                                    <span><i class="glyphicon glyphicon-comment"></i></span>
                                    <li>|</li>
                                    <li>
                                        {{$mensaje->numeroLikes}} likes
                                    </li>
                                    <li><a href="{{route('likeMensaje', $mensaje->id)}}"><i class="glyphicon glyphicon-thumbs-up"></i></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
               @endforeach

                <form method="post" action="{{route("respondertema-post", $tema->id)}}">
                    @csrf
                    <div class="form-group">
                        <label>Responder</label>
                        <textarea name="mensaje" id="cuerpomensaje" style="height:200px;width:100%;">  </textarea>
                    </div>
                    <button style="margin-bottom:10%;" type="submit" class="btn btn-primary mb-2">Enviar</button>
                </form>
            </div>

        </div>
    </div>
    <script>
        var textarea = document.getElementById('cuerpomensaje');
        sceditor.create(textarea, {
            format: 'bbcode',
            icons: 'monocons',
            style: '../minified/themes/content/default.min.css'
        });


        var themeInput = document.getElementById('theme');
        themeInput.onchange = function() {
            var theme = '../minified/themes/' + themeInput.value + '.min.css';

            document.getElementById('theme-style').href = theme;
        };
    </script>
@endsection
