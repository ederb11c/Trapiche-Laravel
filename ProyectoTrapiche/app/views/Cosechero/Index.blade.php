@extends('Layaouts.master')

@section('Title')
<title>Cosecheros</title>
@stop

@section('body')

<h3>Lista de Cosecheros</h3>
<p>{{ HTML::link('Cosechero/Crear','Registrar Nuevo Cosechero')}}</p>
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
            @foreach($Cosecheros as $Cosechero)          

            <tr><td>{{ $Cosechero->GetNombre() }}</td><td> {{ $Cosechero->GetPApellido() ." ".$Cosechero->GetSApellido()}}</td><td> {{($Cosechero->GetTipoId->GetNombre()) }}</td>
                <td> {{($Cosechero->GetNumeroId()) }}</td><td> {{($Cosechero->GetEstado->GetNombre()) }}</td>
                <td>{{($Cosechero->GetSexo->GetNombre())}}</td><td>{{($Cosechero->GetEmail())}}</td><td>{{($Cosechero->GetTrapiche->GetNombre())}}</td>
                <td> 
                    {{ HTML::link('cosechero/editar/'.$Cosechero->GetId(), 'Editar', array('Id' => $Cosechero->GetId() )) }}
                    {{ HTML::link('cosechero/detalles/'.$Cosechero->GetId(), 'Detalles', array('Id' => $Cosechero->GetId() )) }}
                    {{ HTML::link('cosechero/eliminar/'.$Cosechero->GetId(), 'Elimiar', array('Id' => $Cosechero->GetId() )) }}

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>  
</div>
@stop

