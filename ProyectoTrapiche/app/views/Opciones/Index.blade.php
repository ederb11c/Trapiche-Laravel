@extends('Layaouts.CabezeraIndex')
@section('Contenedor')
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre </th><th>Descip. </th><th>Tipo Opcion</th><th>Link</th><th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Objetos as $Objeto)          
            @if(is_null($Objetos[0]->GetId()))   
            @else
            <tr><td> 
                    {{ $Objeto->GetNombre() }}
                </td>
                <td> {{ $Objeto->OpcDescripcion }}</td>
                
                <td> {{ $Objeto->GetTipoOpcion->GetNombre() }}</td>
                <td> {{ $Objeto->OpcLink }}</td>
                
                <td> {{ $Objeto->GetEstado->GetNombre() }}</td>
                
                <td> 
                    {{ HTML::link($Objeto->GetTextos()["Editar"]["NAMEURL"], $Objeto->GetTextos()["Editar"]["Legend"] ) }}
                    {{ HTML::link($Objeto->GetTextos()["Eliminar"]["NAMEURL"], $Objeto->GetTextos()["Eliminar"]["Legend"]) }}
                </td>
            </tr>
            @endif

            @endforeach

        </tbody>

    </table>  
</div>
@stop

