@extends('Layaouts.CabezeraFormulario')
@section('Formulario')   
<div class="form-horizontal">    
    {{Form::open(array('url'=>$Objeto->GetTextos()["Create"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('OpcNombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('OpcNombre','',array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('OpcDescripcion','Descripcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('OpcDescripcion','',array())}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('OpcLink','Link',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('OpcLink','',array())}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('OpcIdTipoOpcion','Tipo Menu',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
              {{Form::select('OpcIdTipoOpcion',$Datos["TiposDeOpcion"],array())}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('OpcIdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::select('OpcIdEstado',$Datos["Estados"],array())}}
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