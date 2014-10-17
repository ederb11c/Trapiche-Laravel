@extends('Layaouts.master')

@section('Title')
<title>Eliminar Tipo de Editificacion</title>
@stop

@section('body')

<h3>Eliminar Unidad De medida</h3>
<p> Estas seguro de eliminar este Tipo de Identificacion?</p>
<div class="form-horizontal">
    {{Form::open(array('url'=>'tiposdeidentificacion/eliminado/'.$TipoDeIdentificacion->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$TipoDeIdentificacion->GetNombre(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$TipoDeIdentificacion->GetIdEstado(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            
            {{Form::submit('Enviar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('tiposdeidentificacion/index','Ir a La Lista')}}</p>
</div>

@stop