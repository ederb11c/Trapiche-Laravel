@extends('Layaouts.master')
@section('Title')
<title>Registrar Tipo de Operario </title>
@stop
@section('body')
<h3>Nuevo Tipo de Operario</h3>
<div class="form-horizontal">
    {{Form::open(array('url'=>'tiposdeoperario/creado'))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2','required'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre','',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('tiposdeoperario/index','Ir a La Lista')}}</p>
</div>
@stop
