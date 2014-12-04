@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">
    {{Form::open(array('url'=>$DesparacitacionSeleccionada->GetTextos()["Eliminado"]["NAMEURL"]."/".$DesparacitacionSeleccionada->GetId()))}}
     <div class="form-group">
        {{Form::Label('DwrIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('DwrIdMule',$Datos["Mulas"],$DesparacitacionSeleccionada->GetIdMula(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('DwrIdUntMeasurement','Und. Medida',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('DwrIdUntMeasurement',$Datos["UndsMedidas"],$DesparacitacionSeleccionada->Get,array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('DwrIdPrep','Via',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('DwrIdPrep',$Datos["Vias"],$DesparacitacionSeleccionada->GetIdVia(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
     <div class="form-group">
        {{Form::Label('DwrProduct','Producto',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('DwrProduct',$DesparacitacionSeleccionada->GetProducto(),array('required'=>'true','rows'=>'4'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('DwrQuantity','Cantidad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('nember','DwrQuantity',$DesparacitacionSeleccionada->GetCantidad(),array('required'=>'true','step'=>'any'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('DwrAplicationDate','Fecha Desparacitacion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','DwrAplicationDate',$DesparacitacionSeleccionada->GetFechaDesparacitacion(),array('required'=>'true'))}}
        </div>
    </div>
    
     <div class="form-group">
        {{Form::Label('DwrComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('DwrComents',$DesparacitacionSeleccionada->GetDescripcion(),array('required'=>'true'))}}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($Datos["Legends"]["Legend"],$Datos["Legends"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
    
</div>  
@stop
