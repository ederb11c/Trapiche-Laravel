@extends('Layaouts.master')

@section('Title')
<title>Arrieros</title>
@stop

@section('body')

<h3>Lista de Arriero</h3>
<p>{{ HTML::link('arriero/crear','Registrar Arriero')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Apellidos</th><th>Tipo Id</th><th>Numero ID</th><th>Estado</th><th>Sexo</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Arrieros as $Arriero)
            <tr>
                <td>{{ $Arriero->GetNombre() }}</td><td> {{ $Arriero->GetPApellido() ." ".$Arriero->GetSApellido()}}</td><td> {{($Arriero->GetTipoId->GetNombre()) }}</td>
                <td> {{($Arriero->GetNumeroId()) }}</td><td> {{($Arriero->GetEstado->GetNombre()) }}</td>
                <td>{{($Arriero->GetSexo->GetNombre())}}</td><td>{{($Arriero->GetEmail())}}</td>
                <td> 
                    {{ HTML::link('arriero/editar/'.$Arriero->GetId(), 'Editar', array('Id' => $Arriero->GetId() )) }}
                    {{ HTML::link('arriero/detalles/'.$Arriero->GetId(), 'Detalles', array('Id' => $Arriero->GetId() )) }}
                    {{ HTML::link('arriero/eliminar/'.$Arriero->GetId(), 'Elimiar', array('Id' => $Arriero->GetId() )) }}
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>  
</div>
@stop

