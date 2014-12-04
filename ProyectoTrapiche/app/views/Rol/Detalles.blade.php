@extends('Layaouts.master')

@section('Titulo')
<title>Detalles Rol</title>
@stop

@section('body')

<h3>Detalles Rol</h3>
<div class="form-horizontal">
    {{Form::open(array('url'=>'Rol/Editado/'.$Rol->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Rol->GetNombre(),array('class' => 'text-box single-line','disabled' => 'disabled'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Descripcion','Descripcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::textarea('Descripcion',$Rol->GetDescripcion(),array('cols' => '20','rows' => '4',"disabled"=>'disabled'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$Rol->GetIdEstado(),array('class' => 'text-box single-line',"disabled"=>'disabled'))}}
        </div>
    </div>
    <p>{{ HTML::link('Rol/Index','Ir a La Lista')}}</p>
    {{Form::close()}}
</div>
@stop