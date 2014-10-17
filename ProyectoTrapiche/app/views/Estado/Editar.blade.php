@extends('Layaouts.master')

@section('Titulo')
<title>Editar Estado</title>
@stop

@section('body')

<h2>Editar Estado</h2>
<div class="form-horizontal">
    {{Form::open(array('url'=>'Estado/Editado/'.$Estado->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Estado->GetNombre(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Descripcion','Descripcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::textarea('Descripcion',$Estado->GetDescripcion(),array('cols' => '20','rows' => '4'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$Estado->GetIdEstado(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>


    {{Form::close()}}
<p>{{ HTML::link('Estado/Index','Ir a la lista')}}</p>
</div>
@stop