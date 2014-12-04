@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">
    {{Form::open(array('url'=>$Datos["Legends"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('WgnIdMuleWeighing','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WgnIdMuleWeighing',$Datos["Mulas"],$PesajeSeleccionado->GetIdMula(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WgnIdUnitMeasurement','Und. Medida',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WgnIdUnitMeasurement',$Datos["UndsMedidas"],$PesajeSeleccionado->GetIdUndDeMedida(),array('class' => 'text-box single-line'))}}
        </div>
    </div>   
    <div class="form-group">
        {{Form::Label('WgnWeightWeighing','Peso',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('nember','WgnWeightWeighing',$PesajeSeleccionado->GetPeso(),array('required'=>'true','step'=>'any'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WgnDateWeighing','Fecha Pesaje',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','WgnDateWeighing',$PesajeSeleccionado->GetFechaPesaje(),array('required'=>'true'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('WgnComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('WgnComents',$PesajeSeleccionado->GetDescripcion(),array('required'=>'true'))}}
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
