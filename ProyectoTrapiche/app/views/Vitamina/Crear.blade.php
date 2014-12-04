@extends('Mula.Maestro')
@section('Vista')

<div class="form-horizontal">
    
    {{Form::open(array('url'=>'vitamina/creado'))}}
    <div class="form-group">
        {{Form::Label('VtmIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('VtmIdMule',$Datos["Mulas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   
    
    <div class="form-group">
        {{Form::Label('VtmProduct','Productos',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('VtmProduct','',array('required'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('VtmQuantity','Cantidad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('int','VtmQuantity','',array('required'=>'true','step'=>'any'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('Und Medida','VtmIdUntMeasurement',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('VtmIdUntMeasurement',$Datos["UndsMedidas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   

    <div class="form-group">
        {{Form::Label('VtmIdPrep','Via Apli.',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('VtmIdPrep',$Datos["Vias"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>    
     <div class="form-group">
        {{Form::Label('VtmAplicationDate','Feche Apli.',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','VtmAplicationDate','',array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('VtmComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('VtmComents','',array('rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
  
</div>


@stop