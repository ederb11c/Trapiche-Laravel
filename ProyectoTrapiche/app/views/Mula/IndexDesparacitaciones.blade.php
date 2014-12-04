@extends('Mula.Maestro')
@section('Vista')

<div>
    <div class="well">
        {{Form::open(array('url'=>'mula/desparacitaciones/'.$Objeto->GetId(),"class"=>"form form-inline"))}}
        <div class="form-group">
            {{Form::Label('','Fecha',array())}}
            {{Form::input('date','DwrAplicationDateI',@$Datos["Formulario"]["DwrAplicationDateI"],Config::get("constants.BasicAttrForm"))}}
            {{Form::input('date','DwrAplicationDateF',@$Datos["Formulario"]["DwrAplicationDateF"],Config::get("constants.BasicAttrForm"))}}
        </div>
        <div class="form-group">
            {{Form::Label('DwrIdPrep','Vias',array())}}
            {{Form::select('DwrIdPrep[]',@$Datos["Vias"],@$Datos["Formulario"]["DwrIdPrep"],Config::get("constants.BasicAttrFormSelectMultiple"))}}
        </div>
        

        {{Form::submit('',(Config::get("constants.arrayAttrButtonIndex")))}}
    
    </div>
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Mula</th><th>Und. De Medida</th><th>Cantidad</th><th>Producto</th><th>Via Apli.</th><th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Desparacitaciones as $Desparacitacion)          
            @if(is_null($Desparacitaciones[0]->GetId()))            
            @else
            <tr><td> 
                    {{ $Desparacitacion->GetMula->GetNombre() }}
                </td><td> {{ $Desparacitacion->GetUndDeMedida->GetNombre() }}</td><td>{{$Desparacitacion->GetCantidad()}}</td><td>{{ $Desparacitacion->GetProducto()}}</td>
                <td>{{$Desparacitacion->GetVia->GetNombre()}}</td><td> {{ $Desparacitacion->GetFechaDesparacitacion() }}</td>
                <td> 
                      <a href="{{ asset($Desparacitacion->GetTextos()["Editar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                        <a href="{{ asset($Desparacitacion->GetTextos()["Detallar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
                        <a href="{{ asset($Desparacitacion->GetTextos()["Eliminar"]["NAMEURL"]) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>
            @endif

            @endforeach

        </tbody>

    </table>  
</div>
@stop
