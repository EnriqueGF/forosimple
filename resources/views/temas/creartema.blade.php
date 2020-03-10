@extends('layout')
@section('titulo', 'Crear un nuevo tema')
@section('contenido')
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-7 text-left">
                <h1>Crear un nuevo tema</h1>
                <form method="post" action="{{route("creartema-post")}}">
                    @csrf
                    <div class="form-group">
                        <label>Título</label>
                        <input name="titulo" type="text" class="form-control" placeholder="Título">
                    </div>
                    <div class="form-group">
                        <label>Cuerpo del mensaje</label>
                        <textarea name="mensaje" id="cuerpomensaje" style="height:300px;width:100%;">  </textarea>
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
