@extends('Layaouts.CabezeraFormulario')
@section('Formulario')   
<div class="form-horizontal">    
    {{Form::open(array('url'=>$Datos["Legends"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('RolNombre','Nombre Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('RolNombre',$Objeto->GetNombre(),array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('RolIdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('RolIdEstado',$Datos["Estados"],$Objeto->GetEstado->GetId(),array())}}
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