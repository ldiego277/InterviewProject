@extends('layouts.app')

@section('content')
    <ul class="nav justify-content-end">
        <li class="nav-item">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"style="margin-right: 20px;">Guardar</button>
        </li>
        <li class="nav-item">
            <button class="btn btn-danger" id="cancelar" style="margin-right: 100px;" href="{{route('home')}}">Cancelar</button>
        </li>

    </ul>


    <div class="texto" style="width: 1250px; margin-left: 45px; margin-top: 40px;">
        <form name="data" method="post" action="{{ Route('insert') }}">
            @csrf
            <textarea class="form-control my-editor" rows="10" cols="60" name="Documento" title="Documento"></textarea>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datos del documento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Autor</label>
                                <input type="text" name="autor" class="form-control" id="disabledTextInput" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Titulo</label>
                                <input type="text" class="form-control" id="inputPassword4" placeholder="Titulo del documento" name="titulo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Fecha de Creación</label>
                                <input type="date" class="form-control" id="inputdate" name="d_creacion">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputCity">Version</label>
                                <input type="text" class="form-control" id="inputver" name="version" value="1.0">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    </form>


    <script>
        var f = new Date();
        $('#inputdate').value(f);

    </script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection