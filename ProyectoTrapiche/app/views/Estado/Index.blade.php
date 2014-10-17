@extends('Layaouts.master')

@section('Titulo')
<title>Lista</title>
@stop

@section('body')

<h3>Lista de Estados</h3>
<p>{{ HTML::link('Estado/Crear','Registrar Nuevo Estado')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre Estado</th><th>Estado</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach($Estados as $Estado)
          
            <tr><td>{{ $Estado->GetNombre() }}</td><td> {{ $Estado->GetIdEstado() }}</td>
                <td> 
                    {{ HTML::link('Estado/Editar/'.$Estado->GetId(), 'Editar', array('Id' => $Estado->GetId() )) }}
                    {{ HTML::link('Estado/Detalles/'.$Estado->GetId(), 'Detalles', array('Id' => $Estado->GetId() )) }}
                    {{ HTML::link('Estado/Eliminar/'.$Estado->GetId(), 'Elimiar', array('Id' => $Estado->GetId() )) }}
               
                </td></tr>
             @endforeach
        </tbody>
    </table>
  
</div>
@stop