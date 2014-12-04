@extends('Layaouts.CabezeraFormulario')
@section('Formulario')   
<div class="form-horizontal">    
    {{Form::open(array('url'=>$Objeto->GetTextos()["Create"]["NAMEURL"]))}}
    <div class="form-group">
      {{Form::Label('MvrIdMenu','Menu',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MvrIdMenu',$Datos["Menus"],array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MvrIdRol','Rol',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MvrIdRol',$Datos["Roles"],array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MvrIdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MvrIdEstado',$Datos["Estados"],array())}}
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