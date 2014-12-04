@extends('Layaouts.CabezeraIndex')
@section('Contenedor')
<div class="row">
    <div class="well">
        <form class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword2">Nombre Mula</label>
                <input type="text" class="form-control" id="Mula" placeholder="Mula">
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
                <th>Mula</th><th>Und. De Medida</th><th>Cantidad</th><th>Producto</th><th>Via Apli.</th><th>Fecha Desparacitacion</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Objetos as $Objeto)          
            @if(is_null($Objetos[0]->GetId()))            

            @else

            <tr><td> 
                    {{ $Objeto->GetMula->GetNombre() }}
                </td><td> {{ $Objeto->GetUndDeMedida->GetNombre() }}</td><td>{{$Objeto->GetCantidad()}}</td><td>{{ $Objeto->GetProducto()}}</td>
                <td>{{$Objeto->GetVia->GetNombre()}}</td><td> {{ $Objeto->GetFechaDesparacitacion() }}</td>
                <td> 
                    {{ HTML::link($Objeto->GetTextos()["Editar"]["NAMEURL"], $Objeto->GetTextos()["Editar"]["Legend"] ) }}
                    {{ HTML::link($Objeto->GetTextos()["Detallar"]["NAMEURL"] ,$Objeto->GetTextos()["Detallar"]["Legend"]) }}
                    {{ HTML::link($Objeto->GetTextos()["Eliminar"]["NAMEURL"], $Objeto->GetTextos()["Eliminar"]["Legend"]) }}
                </td>
            </tr>
            @endif

            @endforeach

        </tbody>

    </table>  
</div>
@stop

