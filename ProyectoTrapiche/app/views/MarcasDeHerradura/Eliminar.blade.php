@extends('Layaouts.master')

@section('Title')
<title>Eliminar Marca de Herradura</title>
@stop

@section('body')

<h3>Eliminar Marca de Herradura</h3>
<p> Estas seguro de eliminar Esta Marca de Herradura?</p>
<div class="form-horizontal">
    {{Form::open(array('url'=>'marcasdeherradura/eliminado/'.$MarcasDeHerradura->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$MarcasDeHerradura->GetNombre(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$MarcasDeHerradura->GetIdEstado(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            
            {{Form::submit('Enviar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('marcasdeherradura/index','Ir a La Lista')}}</p>
</div>

@stop