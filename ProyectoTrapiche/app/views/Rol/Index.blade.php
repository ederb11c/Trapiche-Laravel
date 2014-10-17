@extends('Layaouts.master')

@section('Titulo')
<title>Roles</title>
@stop

@section('body')

<h3>Lista de Roles</h3>
<p>{{ HTML::link('Rol/Crear','Registrar Nuevo Rol')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Descripcion</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
         <tbody>
             @foreach($Roles as $Rol)          
            <tr><td>{{ $Rol->GetNombre() }}</td><td> {{ $Rol->GetDescripcion() }}</td><td> {{ $Rol->GetIdEstado() }}</td>
                <td> 
                    {{ HTML::link('Rol/Editar/'.$Rol->GetId(), 'Editar', array('Id' => $Rol->GetId() )) }}
                    {{ HTML::link('Rol/Detalles/'.$Rol->GetId(), 'Detalles', array('Id' => $Rol->GetId() )) }}
                    {{ HTML::link('Rol/Eliminar/'.$Rol->GetId(), 'Elimiar', array('Id' => $Rol->GetId() )) }}
               
                </td>
            </tr>
             @endforeach

        </tbody>
       
    </table>  
</div>
@stop

