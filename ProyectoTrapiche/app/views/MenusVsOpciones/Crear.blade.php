@extends('Layaouts.CabezeraFormulario')
@section('Formulario')   
<div class="form-horizontal">    
    {{Form::open(array('url'=>$Objeto->GetTextos()["Create"]["NAMEURL"]))}}
    <div class="form-group">
      {{Form::Label('MvoIdMenu','Menu',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MvoIdMenu',$Datos["Menus"],array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MvrIdOpcion','Rol',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MvoIdOpcion',$Datos["Opciones"],array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MvoIdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MvoIdEstado',$Datos["Estados"],array())}}
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