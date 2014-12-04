@extends('Layaouts.master')

@section('Title')
<title>{{$Objetos[0]->GetNombreModeloPlural() }}</title>
@stop

@section('body')

<h3>{{$Objetos[0]->GetTextos()['Index']['LegendAux'].$Objetos[0]->GetNombreModeloPlural() }}</h3>
<p>{{ HTML::link($Objetos[0]->GetTextos()['Crear']['NAMEURL'],$Objetos[0]->GetTextos()['Crear']['Legend'].$Objetos[0]->GetNombreModelo())}}</p>


<div class="row">
    <div class="well">
        <form class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="Operaroi">Operario</label>
                <input type="text" class="form-control" id="Operario" placeholder="Nombre Operario">
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
                <th>Operario</th><th>Total En KG</th><th>Precio Base</th><th>Fecha Cierre</th><th>Fecha De Apertura</th>
                <th>Fecha de Liquidacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Objetos as $Objeto)          
            @if(is_null($Objetos[0]->GetId()))            
           
            @else
            <tr><td> {{ $Objeto->GetOperario->GetNombre() }}</td><td>{{ $Objeto->GetMolienda->GetTotalEnKg() }}</td>
                <td>{{ $Objeto->GetMolienda->GetPrecioBase() }}</td><td>{{$Objeto->GetMolienda->GetFechaDeCierre()}}</td>
                <td>{{$Objeto->GetMolienda->GetFechaDeApertura()}}</td><td>{{$Objeto->GetMolienda->GetFechaLiquidacion()}}</td>
                <td> 
                    {{ HTML::link($Objeto->GetTextos()["Editar"]["NAMEURL"].$Objeto->GetId(), $Objeto->GetTextos()["Editar"]["Legend"] ) }}
                    {{ HTML::link($Objeto->GetTextos()["Detallar"]["NAMEURL"].$Objeto->GetId() ,$Objeto->GetTextos()["Detallar"]["Legend"]) }}
                    {{ HTML::link($Objeto->GetTextos()["Eliminar"]["NAMEURL"].$Objeto->GetId(), $Objeto->GetTextos()["Eliminar"]["Legend"]) }}
                </td>
            </tr>
            @endif
            
            @endforeach

        </tbody>

    </table>  
</div>
@stop

