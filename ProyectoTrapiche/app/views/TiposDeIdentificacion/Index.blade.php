@extends('Layaouts.master')

@section('Title')
<title>Tipos de Identificacion</title>
@stop

@section('body')

<h3>Lista de Tipos de Identificacion</h3>
<p>{{ HTML::link('tiposdeidentificacion/crear','Registrar Tipo de Identificacion ')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach($TiposDeIdentificaciones as $TipoDeIdentificacion)
          
            <tr><td>{{ $TipoDeIdentificacion->GetNombre() }}</td><td>{{$TipoDeIdentificacion->GetEstado->GetNombre()}}</td>
                <td> 
                    {{ HTML::link('tiposdeidentificacion/editar/'.$TipoDeIdentificacion->GetId(), 'Editar', array('Id' => $TipoDeIdentificacion->GetId() )) }}
                    {{ HTML::link('tiposdeidentificacion/detalles/'.$TipoDeIdentificacion->GetId(), 'Detalles', array('Id' => $TipoDeIdentificacion->GetId() )) }}
                    {{ HTML::link('tiposdeidentificacion/eliminar/'.$TipoDeIdentificacion->GetId(), 'Elimiar', array('Id' => $TipoDeIdentificacion->GetId() )) }}
               
                </td></tr>
             @endforeach
        </tbody>
    </table>
  
</div>
@stop