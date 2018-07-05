@extends('layouts.app')

@section('content')
    <form method="post" action="{{Route('update')}}">
        @csrf
        <div class="texto" style="width: 1250px; margin-left: 45px; margin-top: 40px;">
            <input style="visibility: hidden;" value="{{$data->id}}" name="id">
            <textarea class="form-control my-editor" rows="10" cols="60" name="Documento">{{$data->Documento}}</textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-left: 45px; margin-top:12px;" >Guardar Cambios</button>
        <a type="button" class="btn btn-danger" href="{{Route('home')}}" style="margin-top:12px;">Cancelar</a>
    </form>

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
