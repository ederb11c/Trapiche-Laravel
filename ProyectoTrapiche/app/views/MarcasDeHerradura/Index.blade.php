@extends('Layaouts.master')

@section('Title')
<title>Marcas de Herradura</title>
@stop

@section('body')

<h3>Lista de Marcas De Herradura</h3>
<p>{{ HTML::link('marcasdeherradura/crear','Registrar Marca de Herradura ')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach($MarcasDeHerraduras as $MarcasDeHerradura)
          
            <tr><td>{{ $MarcasDeHerradura->GetNombre() }}</td><td>{{$MarcasDeHerradura->GetEstado->GetNombre()}}</td>
                <td> 
                    {{ HTML::link('marcasDeHerradura/editar/'.$MarcasDeHerradura->GetId(), 'Editar', array('Id' => $MarcasDeHerradura->GetId() )) }}
                    {{ HTML::link('marcasDeHerradura/detalles/'.$MarcasDeHerradura->GetId(), 'Detalles', array('Id' => $MarcasDeHerradura->GetId() )) }}
                    {{ HTML::link('marcasDeHerradura/eliminar/'.$MarcasDeHerradura->GetId(), 'Elimiar', array('Id' => $MarcasDeHerradura->GetId() )) }}
               
                </td></tr>
             @endforeach
        </tbody>
    </table>
  
</div>
@stop