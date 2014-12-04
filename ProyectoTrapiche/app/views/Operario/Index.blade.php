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
                <label class="sr-only" for="exampleInputPassword2">Nombre</label>
                <input type="text" class="form-control" id="Mula" placeholder="Mula">
            </div>


            <button type="submit" class="btn btn-primary">Consultar</button>
        </form>
    </div>
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Sexo</th><th>Tipo Operario</th><th>Tipo Id</th><th>Numero Id</th><th>Email</th><th>Trapiche</th><th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Objetos as $Objeto)          
            @if(is_null($Objetos[0]->GetId()))            
           
            @else
            <tr><td> {{ $Objeto->GetNombre()." ".$Objeto->GetPApellido() }}</td><td>{{$Objeto->GetSexo->GetNombre()}}</td>
                <td>{{ $Objeto->GetTipoOperario->GetNombre() }}</td><td>{{ $Objeto->GetTipoId->GetNombre()}}</td><td>{{ $Objeto->GetNumeroId()}}</td><td> {{ $Objeto->GetEmail() }}</td>
                <td>{{$Objeto->GetTrapiche->GetNombre()}}</td><td> {{ $Objeto->GetEstado->GetNombre() }}</td>
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

