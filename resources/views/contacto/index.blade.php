@extends('inicio')
@section('contenido')
<div class="container">
	<div class="row">
        <h2>CONTACTOS</h2> <br>
        <p>Dalia Melissa Araujo Rivas </p>
        @if($flash = Session::get('exito'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sastifactorio!</strong> {{$flash}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
	<br>
	<div class="row">
        <div class="col">
        <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactoModal">
                Nuevo Contacto
                </button>
                @include('contacto.modal-create')
        </div>
    </div>
    <br>
    <div class="row">
        <!--TABLA-->
        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>
            @foreach($contactos as $contacto)
            <tr>
                <td>{{ $contacto-> id }}</td>
                <td>{{ $contacto-> nombre }}</td>
                <td>{{ $contacto-> telefono }}</td>
                <td>{{ $contacto-> correo}}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$contacto-> id}}">
                    Editar
                    </button>
                    <!--<button type="Submit" class="btn btn-danger" data-bs-toggle="modal" form="delete{{$contacto->id}}" onClick="return confirm('¿Estas seguro de eliminar el registro?')">
                    Eliminar
                    </button> -->
                    <form  action="{{ route('inicio.destroy', $contacto->id) }}" method="post" id="delete{{$contacto->id}}" hidden>
                        @csrf  
                        @method ('DELETE')
                    </form>
                    <a href="{{ route('inicio.destroy', $contacto->id) }}" class="btn btn-danger" data-confirm-delete="true">Eliminar</a>

                
                </td>
            </tr>
            @include('contacto.modal-edit')
            @endforeach
            
        </tbody>
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Acciones</th>

            </tr>
        </tfoot>
    </table>
        
    </div>
</div>
@endsection