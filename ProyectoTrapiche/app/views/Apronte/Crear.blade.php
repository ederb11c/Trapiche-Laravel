@extends('Layaouts.master')

@section('Title')
<title>Registrar apronte</title>
@stop

@section('body')

<h2>Registrar Apronte</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else

    {{Form::open(array('url'=>'apronte/creado'))}}
    <div class="form-group">
        {{Form::Label('AprMaximunLoad','Peso Carga',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('AprMaximunLoad','',array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('AprNetWeight','Peso Neto',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('AprNetWeight','',array('required'=>'true'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('AprIdHarvester','Cosechero',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('AprIdHarvester',$Datos["Cosechero"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('AprIdMuledriver','Arriero',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('AprIdMuledriver',$Datos["Arriero"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('AprIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('AprIdMule',$Datos["Mula"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>   
    <div class="form-group">
        {{Form::Label('AprIdSembrado','Sembreado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('AprIdSembrado',$Datos["Sembreado"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('cosechero/index','Ir a la lista')}}</p>
    @endif
</div>


@stop