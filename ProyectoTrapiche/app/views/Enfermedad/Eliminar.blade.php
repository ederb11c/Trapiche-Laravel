@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">
    {{Form::open(array('url'=>$EnfermedadSeleccionada->GetTextos()["Eliminado"]["NAMEURL"]."/".$EnfermedadSeleccionada->GetId()))}}
    <div class="form-group">
        {{Form::Label('LlnIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('LlnIdMule',$Datos["Mulas"],$EnfermedadSeleccionada->GetIdMula(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
   
    
    <div class="form-group">
        {{Form::Label('LlnTreatment','Tratamiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('LlnTreatment',$EnfermedadSeleccionada->GetTratamiento(),array('required'=>'true','rows'=>'5','disabled','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('LlnComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('LlnComents',$EnfermedadSeleccionada->GetDescripcion(),array('rows'=>'5','disabled','cols'=>'24'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('LlnDateIllenes','Fecha Enfermedad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','LlnDateIllenes',$EnfermedadSeleccionada->GetFechaEnfermedad(),array('rows'=>'5','disabled','cols'=>'24'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($EnfermedadSeleccionada->GetTextos()["Eliminar"]["Legend"],$EnfermedadSeleccionada->GetTextos()["Eliminar"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
</div>
@stop
