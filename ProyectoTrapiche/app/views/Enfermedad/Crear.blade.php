@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">
    {{Form::open(array('url'=> $Datos["Legends"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('LlnIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('LlnIdMule',$Datos["Mulas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   
    
    <div class="form-group">
        {{Form::Label('LlnTreatment','Tratamiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('LlnTreatment','',array('required'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('LlnComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('LlnComents','',array('rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('LlnDateIllenes','Fecha Enfermedad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','LlnDateIllenes','',array('rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit( $Datos["Legends"]["BtnName"], $Datos["Legends"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
</div>


@stop