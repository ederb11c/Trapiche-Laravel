@extends('Layaouts.CabezeraIndex')
@section('Contenedor')
<div class="row">
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre Menu</th><th>Nombre Rol</th><th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Objetos as $Objeto)          
            @if(is_null($Objetos[0]->GetId()))   
            @else
            <tr><td> 
                    {{ $Objeto->GetMenu->GetNombre() }}
                </td>
                <td> 
                    {{ $Objeto->GetRol->GetNombre() }}
                </td>
                <td> {{ $Objeto->GetEstado->GetNombre() }}</td>
                <td> 
                    {{ HTML::link($Objeto->GetTextos()["Editar"]["NAMEURL"], $Objeto->GetTextos()["Editar"]["Legend"] ) }}
                    {{ HTML::link($Objeto->GetTextos()["Detallar"]["NAMEURL"],$Objeto->GetTextos()["Detallar"]["Legend"]) }}
                    {{ HTML::link($Objeto->GetTextos()["Eliminar"]["NAMEURL"], $Objeto->GetTextos()["Eliminar"]["Legend"]) }}
                </td>
            </tr>
            @endif

            @endforeach

        </tbody>

    </table>  
</div>
@stop

