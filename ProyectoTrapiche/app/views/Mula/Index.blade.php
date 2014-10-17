@extends('Layaouts.master')

@section('Title')
<title>Mulas</title>
@stop

@section('body')

<h3>Lista de Mulas</h3>
<p>{{ HTML::link('mula/crear','Registrar Nuevo Mula')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Especie</th><th>Descripcion</th><th>Sexo</th><th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Mulas as $Mula)          

            <tr><td>{{ $Mula->GetNombre() }}</td><td> {{ $Mula->GetEspecie() }}</td><td> {{ $Mula->GetDescripcion() }}</td><td>{{$Mula->GetSexo->GetNombre()}}</td>
                <td> {{($Mula->GetEstado->GetNombre()) }}</td>
                <td> 
                    {{ HTML::link('mula/editar/'.$Mula->GetId(), 'Editar', array('Id' => $Mula->GetId() )) }}
                    {{ HTML::link('mula/detalles/'.$Mula->GetId(), 'Detalles', array('Id' => $Mula->GetId() )) }}
                    {{ HTML::link('mula/eliminar/'.$Mula->GetId(), 'Elimiar', array('Id' => $Mula->GetId() )) }}

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>  
</div>
@stop

