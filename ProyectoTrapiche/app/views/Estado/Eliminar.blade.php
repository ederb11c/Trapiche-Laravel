@extends('Layaouts.master')

@section('Titulo')
<title>Elimnar Estado</title>
@stop

@section('body')

<h3>Eliminar Estado</h3>
<p>Estas seguro de elimìnar este Estado?</p>

<div class="form-horizontal">
    {{Form::open(array('url'=>'Estado/Eliminado/'.$Estado->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Estado->GetNombre(),array('class' => 'text-box single-line',"disabled"=>'disabled'))}}
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
            {{Form::select('IdEstado',$Estados,$Estado->GetIdEstado(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Eliminar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>


    {{Form::close()}}
<p>{{ HTML::link('Estado/Index','Ir a la lista')}}</p>
</div>
@stop