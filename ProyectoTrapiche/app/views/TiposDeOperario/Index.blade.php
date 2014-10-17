@extends('Layaouts.master')
@section('Title')
<title>Tipos de Operarios</title>
@stop

@section('body')

<h3>Lista de Tipos de Operarios</h3>
<p>{{ HTML::link('tiposdeoperario/crear','Registrar Tipo De Operario ')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach($TiposDeOperarios as $TiposDeOperario)
          
            <tr><td>{{ $TiposDeOperario->GetNombre() }}</td><td>{{$TiposDeOperario->GetEstado->GetNombre()}}</td>
                <td> 
                    {{ HTML::link('tiposdeoperario/editar/'.$TiposDeOperario->GetId(), 'Editar', array('Id' => $TiposDeOperario->GetId() )) }}
                    {{ HTML::link('tiposdeoperario/detalles/'.$TiposDeOperario->GetId(), 'Detalles', array('Id' => $TiposDeOperario->GetId() )) }}
                    {{ HTML::link('tiposdeoperario/eliminar/'.$TiposDeOperario->GetId(), 'Elimiar', array('Id' => $TiposDeOperario->GetId() )) }}
               
                </td>
            </tr>
             @endforeach
        </tbody>
    </table>
  
</div>
@stop