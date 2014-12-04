@extends('Layaouts.master')

@section('Title')
<title>Usuarios</title>
@stop

@section('body')

<h3>Lista de Usuarios</h3>
<p>{{ HTML::link('usuario/crear','Registrar Nuevo Usuario')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Apellidos</th><th>Tipo Id</th><th>Numero ID</th><th>Rol</th><th>Estado</th><th>Sexo</th>
                <th>Login</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Usuarios as $Usuario)          

            <tr><td>{{ $Usuario->GetNombre() }}</td><td> {{ $Usuario->GetPApellido() ." ".$Usuario->GetSApellido()}}</td><td> {{($Usuario->GetTipoId->GetNombre()) }}</td>
                <td> {{($Usuario->GetNumeroDeId()) }}</td><td> {{($Usuario->GetRol->GetNombre()) }}</td><td> {{($Usuario->GetEstado->GetNombre()) }}</td>
                <td>{{($Usuario->GetSexo->GetNombre())}}</td><td>{{($Usuario->GetLogin())}}</td>
                <td> 
                    {{ HTML::link('usuario/editar/'.$Usuario->GetId(), 'Editar', array('Id' => $Usuario->GetId() )) }}
                    {{ HTML::link('usuario/detalles/'.$Usuario->GetId(), 'Detalles', array('Id' => $Usuario->GetId() )) }}
                    {{ HTML::link('usuario/eliminar/'.$Usuario->GetId(), 'Elimiar', array('Id' => $Usuario->GetId() )) }}

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>  
</div>
@stop

