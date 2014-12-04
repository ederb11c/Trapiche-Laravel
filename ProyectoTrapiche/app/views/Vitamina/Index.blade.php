@extends('Layaouts.master')

@section('Title')
<title>Vitaminas</title>
@stop

@section('body')

<h3>Lista de Vitaminas</h3>
<p>{{ HTML::link('vitamina/crear','Registrar Nuevo Vitamina')}}</p>
<div class="row">
    <div class="well">
        <form class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Nombre Mula</label>
                <input type="text" class="form-control" id="Mula" placeholder="Mula">
            </div>
            <div class="form-group">
                <label class="sr-only" for="">Via:</label>
                <select  class="form-control" id="Via">
                    <option>Via</option>
                </select>
            </div>            
            <div class="form-group">
                <label class="sr-only" for="Mula">Fecha Apli. Ini</label>
                <input type="date" class="form-control" id="Mula">
            </div>
            <div class="form-group">
                <label class="sr-only" for="Mula">Fecha Apli. Fin</label>
                <input type="date" class="form-control" id="Mula">
            </div>


            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Mula</th><th>Producto</th><th>Cantidad</th><th>Und.Medida</th><th>Und. Medida</th><th>Fecha Apli.</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Vitaminas as $Vitamina)          

            <tr><td> {{ $Vitamina->GetMula->GetNombre() }}</td><td>{{ $Vitamina->GetNombreProducto() }}</td><td>{{ $Vitamina->GetCantidad()}}</td><td> {{ $Vitamina->GetUndDeMedida->GetNombre() }}</td>
                <td>{{$Vitamina->GetVia->GetNombre()}}</td><td> {{($Vitamina->GetFechaAplicacion()) }}</td>
                <td> 
                    {{ HTML::link('vitamina/editar/'.$Vitamina->GetId(), 'Editar', array('Id' => $Vitamina->GetId() )) }}
                    {{ HTML::link('vitamina/detalles/'.$Vitamina->GetId(), 'Detalles', array('Id' => $Vitamina->GetId() )) }}
                    {{ HTML::link('vitamina/eliminar/'.$Vitamina->GetId(), 'Elimiar', array('Id' => $Vitamina->GetId() )) }}

                </td>
            </tr>
            @endforeach

        </tbody>

    </table>  
</div>
@stop

