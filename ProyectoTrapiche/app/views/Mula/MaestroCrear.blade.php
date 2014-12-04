@extends('Mula.Maestro')
@section('Vista')
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
                    {{ HTML::link('vitamina/editar/'.$Vitamina->GetId(), 'Seleccionar' ) }}
                    </td>
            </tr>
            @endforeach

        </tbody>

    </table>  

@stop