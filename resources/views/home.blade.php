@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Documentos de: {{ Auth::user()->name }}</h4>
            <h6 class="card-subtitle">Registro de documentos</h6>
            <br>
            <div class="table-responsive m-t-40">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Versión</th>
                            <th>Fecha de Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lista as $listas)
                        <tr>
                            <td>{{$listas->id}}</td>
                            <td>{{$listas->titulo}}</td>
                            <td>{{$listas->version}}</td>
                            <td>{{$listas->d_creacion}}</td>
                            <td>
                                <a type="button" class="btn btn-info" href="{{Route('edit', [$listas->id])}}">Editar</a>
                                <a type="button" class="btn btn-danger" style="color: white;" href="delete/{{$listas->id}}" >Eliminar</a>
                                <a type="button" class="btn btn-success" href="{{Route('pdf', [$listas->id])}}">Descargar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
