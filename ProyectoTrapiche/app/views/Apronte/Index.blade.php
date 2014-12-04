@extends('Layaouts.master')

@section('Title')
<title>Aprontes</title>
@stop

@section('body')

<h3>Lista de Aprontes</h3>
<p>{{ HTML::link('apronte/crear','Registrar Nuevo Apronte')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Apellidos</th><th>Tipo Id</th><th>Numero ID</th><th>Estado</th><th>Sexo</th>
                <th>Email</th><th>Trapiche</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Aprontes as $Apronte)          

            <tr><td>{{ $Apronte->GetNombre() }}</td><td> {{ $Apronte->GetPApellido() ." ".$Apronte->GetSApellido()}}</td><td> {{($Apronte->GetTipoId->GetNombre()) }}</td>
                <td> {{($Apronte->GetNumeroId()) }}</td><td> {{($Apronte->GetEstado->GetNombre()) }}</td>
                <td>{{($Apronte->GetSexo->GetNombre())}}</td><td>{{($Apronte->GetEmail())}}</td><td>{{($Apronte->GetTrapiche->GetNombre())}}</td>
                <td> 
                    {{ HTML::link('apronte/editar/'.$Apronte->GetId(), 'Editar', array('Id' => $Apronte->GetId() )) }}
                    {{ HTML::link('apronte/detalles/'.$Apronte->GetId(), 'Detalles', array('Id' => $Apronte->GetId() )) }}
                    {{ HTML::link('apronte/eliminar/'.$Apronte->GetId(), 'Elimiar', array('Id' => $Apronte->GetId() )) }}

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>  
</div>
@stop

