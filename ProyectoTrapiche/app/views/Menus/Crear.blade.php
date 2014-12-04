@extends('Layaouts.CabezeraFormulario')
@section('Formulario')   
<div class="form-horizontal">    
    {{Form::open(array('url'=>$Objeto->GetTextos()["Create"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('MenNombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MenNombre','',array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MenDescripcion','Descripcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MenDescripcion','',array())}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('MenLink','Link',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MenLink','',array())}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('MenTipoMenu','Tipo Menu',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
              {{Form::select('MenTipoMenu',$Datos["TiposDeMenu"],array())}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('MenIdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('MenIdEstado',$Datos["Estados"],array())}}
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