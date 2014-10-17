@extends('Layaouts.master')

@section('Titulo')
<title>Elimnar Rol</title>
@stop

@section('body')

<h3>Eliminar Rol</h3>
<p>Estas seguro de eliminar este Rol?</p>

<div class="form-horizontal">
    {{Form::open(array('url'=>'Rol/Eliminado/'.$Rol->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Rol->GetNombre(),array('class' => 'text-box single-line',"disabled"=>'disabled'))}}
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
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Eliminar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>


    {{Form::close()}}
<p>{{ HTML::link('Rol/Index','Ir a la lista')}}</p>
</div>
@stop