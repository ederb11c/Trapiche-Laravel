@extends('Mula.Maestro')
@section('Vista')
<div>
    <div class="well">
        <div class="well-lg">
        {{Form::open(array('url'=>'mula/vitaminas/'.$Objeto->GetId(),"class"=>"form form-inline"))}}
        <div class="form-group">
            {{Form::Label('MlName','Intervalo de Fechas',array())}}
            {{Form::input('date','VtmAplicationDateI',@$Datos["Formulario"]["VtmAplicationDateI"],Config::get("constants.BasicAttrForm"))}}
            {{Form::input('date','VtmAplicationDateF',@$Datos["Formulario"]["VtmAplicationDateF"],Config::get("constants.BasicAttrForm"))}}
        
        </div>

        <div class="form-group">
            {{Form::Label('VtmIdPrep','Sexo',array())}}
            {{Form::select('VtmIdPrep[]',@$Datos["Vias"],@$Datos["Formulario"]["VtmIdPrep"],Config::get("constants.BasicAttrFormSelectMultiple"))}}
        </div>
        {{Form::submit('',(Config::get("constants.arrayAttrButtonIndex")))}}
    </div>
    </div>
    
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Mula</th><th>Producto</th><th>Cantidad</th><th>Und.Medida</th><th>Und. Medida</th><th>Fecha Apli.</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
         @if($Vitaminas[0]->GetId())   
          @foreach($Vitaminas as $Vitamina)          

            <tr><td> {{ $Vitamina->GetMula->GetNombre() }}</td><td>{{ $Vitamina->GetNombreProducto() }}</td><td>{{ $Vitamina->GetCantidad()}}</td><td> {{ $Vitamina->GetUndDeMedida->GetNombre() }}</td>
                <td>{{$Vitamina->GetVia->GetNombre()}}</td><td> {{($Vitamina->GetFechaAplicacion()) }}</td>
                <td> 
                  <a href="{{ asset($Vitamina->GetTextos()["Editar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="{{ asset($Vitamina->GetTextos()["Detallar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
                    <a href="{{ asset($Vitamina->GetTextos()["Eliminar"]["NAMEURL"]) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                                    
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>

    </table>  
</div>
@stop

