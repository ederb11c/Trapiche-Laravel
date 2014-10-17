@extends('Layaouts.master')

@section('Title')
<title>Editar Sembrado</title>
@stop

@section('body')

<h2>Editar Cosechero</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else
{{Form::open(array('url'=>'sembrado/editado/'.$Sembrado->GetId()))}}
    <div class="form-group">
        {{Form::Label('ClfName','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('ClfName',$Sembrado->GetNombre(),array('required'=>'true'))}}
        </div>
    </div>
 
    
    <div class="form-group">
        {{Form::Label('ClfIdHarvester','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('ClfIdHarvester',$Datos["Cosecheros"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('ClfArea','Area',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('number','ClfArea',$Sembrado->GetArea(),array('required'=>'true','step'=>'any'))}}
        </div>
    </div>
     
    <div class="form-group">
        {{Form::Label('ClfDireccion','Direccion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::textarea('ClfDireccion',$Sembrado->GetDireccion())}}
        </div>
    </div>   
        <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('sembrado/index','Ir a la lista')}}</p>
    @endif
</div>

@stop