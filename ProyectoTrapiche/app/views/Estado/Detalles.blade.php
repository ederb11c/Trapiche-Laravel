@extends('Layaouts.master')

@section('Titulo')
<title>Editar Estado</title>
@stop

@section('body')

<h3>Deatlles Estado</h3>
<div class="form-horizontal">
    {{Form::open(array('url'=>'Estado/Editado/'.$Estado->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Estado->GetNombre(),array('class' => 'text-box single-line','disabled' => 'disabled'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Descripcion','Descripcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::textarea('Descripcion',$Estado->GetDescripcion(),array('cols' => '20','rows' => '4',"disabled"=>'disabled'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$Estado->GetIdEstado(),array('class' => 'text-box single-line',"disabled"=>'disabled'))}}
        </div>
    </div>
    <p>{{ HTML::link('Estado/Index','Ir a La Lista')}}</p>
    {{Form::close()}}
</div>
@stop