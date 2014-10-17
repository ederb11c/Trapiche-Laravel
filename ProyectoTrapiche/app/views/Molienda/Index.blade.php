@extends('Layaouts.master')

@section('Title')
<title>Moliendas</title>
@stop

@section('body')

<h3>Lista de Moliendas</h3>
<p>{{ HTML::link('molienda/crear','Registrar Nueva Molienda')}}</p>
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Comentarios</th><th>Total En Kg</th><th>Precio Base</th><th>Fecha Cierre</th><th>Fecha Liquidacion</th>
                <th>Fecha Registro</th><th>Usuario Registro</th><th>Estado Molienda</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
           @foreach($Moliendas as $Molienda)
          
           <tr><td>{{ $Molienda->GetComentarios() }}</td><td> {{ $Molienda->GetTotalEnKg() }}</td><td>{{$Molienda->GetPrecioBase()}}</td>
               <td>{{$Molienda->GetFechaDeCierre()}}</td><td>{{$Molienda->GetFechaLiquidacion()}}</td><td>{{$Molienda->GetFechaDeRegistro()}}</td>
               <td>{{$Molienda->GetUsuarioRegistro->GetNombre()." ". $Molienda->GetUsuarioRegistro->GetPApellido()}}</td> <td>{{$Molienda->GetEstadoMolienda->GetNombre()}}</td>
               <td> 
                    {{ HTML::link('molienda/editar/'.$Molienda->GetId(), 'Editar', array('Id' => $Molienda->GetId() )) }}
                    {{ HTML::link('molienda/detalles/'.$Molienda->GetId(), 'Detalles', array('Id' => $Molienda->GetId() )) }}
                    {{ HTML::link('molienda/eliminar/'.$Molienda->GetId(), 'Elimiar', array('Id' => $Molienda->GetId() )) }}
               
                </td></tr>
             @endforeach
        </tbody>
    </table>
  
</div>
@stop