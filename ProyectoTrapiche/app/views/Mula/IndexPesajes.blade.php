@extends('Mula.Maestro')
@section('Vista')

<div>
    <div class="well">
    {{Form::open(array('url'=>'mula/pesajes/'.$Objeto->GetId(),"class"=>"form form-inline"))}}
        <div class="form-group">
            {{Form::Label('','Fecha',array())}}
            {{Form::input('date','WgnDateWeighingI',@$Datos["Formulario"]["WgnDateWeighingI"],Config::get("constants.BasicAttrForm"))}}
            {{Form::input('date','WgnDateWeighingF',@$Datos["Formulario"]["WgnDateWeighingF"],Config::get("constants.BasicAttrForm"))}}
        </div>
        {{Form::submit('',(Config::get("constants.arrayAttrButtonIndex")))}}
    </div>
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Mula</th><th>Und. De Medida</th><th>Peso</th><th>Fecha Pesaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Pesajes as $Pesaje)          
            @if(is_null($Pesajes[0]->GetId()))            

            @else
            <tr><td> {{ $Pesaje->GetMula->GetNombre() }}</td><td>{{ $Pesaje->GetUnidadDeMedida->GetNombre() }}</td><td>{{ $Pesaje->GetPeso()}}</td>
                <td> {{ $Pesaje->GetFechaPesaje() }}</td>
                <td> 
                        <a href="{{ asset($Pesaje->GetTextos()["Editar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="{{ asset($Pesaje->GetTextos()["Detallar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
                        <a href="{{ asset($Pesaje->GetTextos()["Eliminar"]["NAMEURL"]) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

                </td>
            </tr>
            @endif

            @endforeach

        </tbody>

    </table>  

</div>
@stop
