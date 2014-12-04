@extends('Layaouts.master')

@section('Title')
<title>Sembrados</title>
@stop

@section('body')

<h3>Lista de Sembrados</h3>
<p>{{ HTML::link('sembrado/crear','Registrar Nuevo Sembrado')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Cosechero</th><th>Area</th><th>Direccion</th>
                
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Sembrados as $Sembrado)          

            <tr><td>{{ $Sembrado->GetNombre() }}</td><td> {{($Sembrado->GetCosechero->GetNombre()) }}</td>
                <td> {{ $Sembrado->GetArea() }}</td><td> {{($Sembrado->GetDireccion()) }}</td>
                
                <td> 
                    {{ HTML::link('sembrado/editar/'.$Sembrado->GetId(), 'Editar', array('Id' => $Sembrado->GetId() )) }}
                    {{ HTML::link('sembrado/detalles/'.$Sembrado->GetId(), 'Detalles', array('Id' => $Sembrado->GetId() )) }}
                    {{ HTML::link('sembrado/eliminar/'.$Sembrado->GetId(), 'Elimiar', array('Id' => $Sembrado->GetId() )) }}

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>  
</div>
@stop

