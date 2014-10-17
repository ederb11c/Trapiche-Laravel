@extends('Layaouts.master')

@section('Title')
<title>Unidades De Medida</title>
@stop

@section('body')

<h3>Lista de Unidades de Medidas</h3>
<p>{{ HTML::link('unidaddeMedida/crear','Registrar Nueva Unidad')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>UnidadDeMedida</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach($UnidadesDeMedida as $UnidadDeMedida)
          
            <tr><td>{{ $UnidadDeMedida->GetNombre() }}</td><td>{{$UnidadDeMedida->GetEstado->GetNombre()}}</td>
                <td> 
                    {{ HTML::link('unidaddemedida/editar/'.$UnidadDeMedida->GetId(), 'Editar', array('Id' => $UnidadDeMedida->GetId() )) }}
                    {{ HTML::link('unidaddemedida/detalles/'.$UnidadDeMedida->GetId(), 'Detalles', array('Id' => $UnidadDeMedida->GetId() )) }}
                    {{ HTML::link('unidaddemedida/eliminar/'.$UnidadDeMedida->GetId(), 'Elimiar', array('Id' => $UnidadDeMedida->GetId() )) }}
               
                </td></tr>
             @endforeach
        </tbody>
    </table>
  
</div>
@stop