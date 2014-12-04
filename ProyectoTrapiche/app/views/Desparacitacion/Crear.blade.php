@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">
    {{Form::open(array('url'=>$Datos["Legends"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('DwrIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('DwrIdMule',$Datos["Mulas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('DwrIdUntMeasurement','Und. Medida',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('DwrIdUntMeasurement',$Datos["UndsMedidas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('DwrIdPrep','Via',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('DwrIdPrep',$Datos["Vias"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
     <div class="form-group">
        {{Form::Label('DwrProduct','Producto',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('DwrProduct','',array('required'=>'true','rows'=>'4'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('DwrQuantity','Cantidad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('nember','DwrQuantity','',array('required'=>'true','step'=>'any'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('DwrAplicationDate','Fecha Desparacitacion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','DwrAplicationDate','',array('required'=>'true'))}}
        </div>
    </div>
    
     <div class="form-group">
        {{Form::Label('DwrComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('DwrComents','',array('required'=>'true'))}}
        </div>
    </div>
     <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($Datos["Legends"]["BtnName"],$Datos["Legends"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
    
</div>


@stop