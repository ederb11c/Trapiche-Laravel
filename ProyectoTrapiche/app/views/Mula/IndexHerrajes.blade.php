@extends('Mula.Maestro')
@section('Vista')
<div>
    <div class="well-lg">
        {{Form::open(array('url'=>'mula/herrajes/'.$Objeto->GetId(),"class"=>"form form-inline"))}}
        <div class="form-group">
            {{Form::Label('MlName','Fecha',array())}}
            {{Form::input('date','IrwDateIronWorkI',@$Datos["Formulario"]["IrwDateIronWorkI"],Config::get("constants.BasicAttrForm"))}}
            {{Form::input('date','IrwDateIronWorkF',@$Datos["Formulario"]["IrwDateIronWorkF"],Config::get("constants.BasicAttrForm"))}}
        
        </div>

        <div class="form-group">
            {{Form::Label('IrwIdSize','Tamano',array())}}
            {{Form::select('IrwIdSize[]',@$Datos["Tamanos"],@$Datos["Formulario"]["IrwIdSize"],Config::get("constants.BasicAttrFormSelectMultiple"))}}
        </div>
        
        <div class="form-group">
            {{Form::Label('IrwMrkId','Marca',array())}}
            {{Form::select('IrwMrkId[]',@$Datos["Marcas"],@$Datos["Formulario"]["IrwMrkId"],Config::get("constants.BasicAttrFormSelectMultiple"))}}
        </div>
        {{Form::submit('',(Config::get("constants.arrayAttrButtonIndex")))}}
    </div>    
    <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Mula</th><th>Tamaño</th><th>Marca</th><th>Herrador</th><th>Fecha Herraje.</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if($Herrajes[0]->GetId())
            @foreach($Herrajes as $Herraje)          
                <tr>
                    <td> {{ $Herraje->GetMula->GetNombre() }}</td><td>{{ $Herraje->GetTamano->GetNombre() }}</td>
                    <td>{{ $Herraje->GetMarca->GetNombre()}}</td><td> {{ $Herraje->GetHerrador() }}</td>
                    <td> {{ $Herraje->GetFechaHerraje() }}</td>
                <td> 
                   <a href="{{ asset($Herraje->GetTextos()["Editar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                    <a href="{{ asset($Herraje->GetTextos()["Detallar"]["NAMEURL"]) }}" class="btn btn-info"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span></a>
                    <a href="{{ asset($Herraje->GetTextos()["Eliminar"]["NAMEURL"]) }}" class="btn btn-danger"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </td>
            </tr>
            
            @endforeach
            @endif    
        </tbody>

    </table>  
</div>
@stop

