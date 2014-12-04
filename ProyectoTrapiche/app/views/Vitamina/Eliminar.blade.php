@extends('Mula.Maestro')
@section('Vista')

<div class="form-horizontal">
    
    {{Form::open(array('url'=>'vitamina/eliminado/'.$VitaminaSeleccionada->GetId()))}}
    <div class="form-group">
        {{Form::Label('VtmIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('VtmIdMule',$Datos["Mulas"],$VitaminaSeleccionada->GetIdMula(),array('class' => 'text-box single-line','disabled'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('VtmProduct','Productos',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('VtmProduct',$VitaminaSeleccionada->GetNombreProducto(),array('disabled'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('VtmQuantity','Cantidad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('int','VtmQuantity',$VitaminaSeleccionada->GetCantidad(),array('disabled'=>'true','step'=>'any'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Und Medida','VtmIdUntMeasurement',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('VtmIdUntMeasurement',$Datos["UndsMedidas"],$VitaminaSeleccionada->GetIdUnidadDeMedida(),array('class' => 'text-box single-line','disabled'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('VtmIdPrep','Via Apli.',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('VtmIdPrep',$Datos["Vias"],$VitaminaSeleccionada->GetIdVia(),array('class' => 'text-box single-line','disabled'=>'true'))}}
        </div>
    </div>    
    <div class="form-group">
        {{Form::Label('VtmAplicationDate','Feche Apli.',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','VtmAplicationDate',$VitaminaSeleccionada->GetFechaAplicacion(),array('disabled'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('VtmComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('VtmComents',$VitaminaSeleccionada->GetDescripcion(),array('disabled'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Eliminar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>
    {{Form::close()}}
</div>

@stop