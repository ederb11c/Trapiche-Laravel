@extends('Mula.Maestro')
@section('Vista')
<div>
    <div class="well-lg">
        {{Form::open(array('url'=>'mula/enfermedades/'.$Objeto->GetId(),"class"=>"form form-inline"))}}
        <div class="form-group">
            {{Form::Label('','Fecha',array())}}
            {{Form::input('date','LlnDateIllenesI',@$Datos["Formulario"]["LlnDateIllenesI"],Config::get("constants.BasicAttrForm"))}}
            {{Form::input('date','LlnDateIllenesF',@$Datos["Formulario"]["LlnDateIllenesF"],Config::get("constants.BasicAttrForm"))}}
        </div>

        {{Form::submit('',(Config::get("constants.arrayAttrButtonIndex")))}}
    </div>
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Mula</th><th>Tratamiento</th><th>Fecha Enfermedad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Enfermedades as $Enfermedad)          
            @if(! is_null($Enfermedad->GetId()))

            <tr><td> {{ $Enfermedad->GetMula->GetNombre() }}</td><td>{{ $Enfermedad->GetTratamiento() }}</td><td>{{ $Enfermedad->GetFechaEnfermedad()}}</td>
                <td> 
                    <a href="{{ asset($Enfermedad->GetTextos()["Editar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="{{ asset($Enfermedad->GetTextos()["Detallar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
                    <a href="{{ asset($Enfermedad->GetTextos()["Eliminar"]["NAMEURL"]) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>
            @endif
            @endforeach

        </tbody>

    </table>  
</div>
@stop
