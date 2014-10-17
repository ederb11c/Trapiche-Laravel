@extends('Layaouts.master')

@section('Title')
<title>Registrar Mula</title>
@stop

@section('body')

<h2>Registrar Mula</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else

    {{Form::open(array('url'=>'mula/creado'))}}
    <div class="form-group">
        {{Form::Label('MlName','Nombre Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MlName','',array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MlSpecie','Especie',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MlSpecie','',array('required'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MlDescription','Descrpcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MlDescription','',array('required'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MlIdSex','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdSex',$Datos["Sexos"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MlIdState','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdState',$Datos["Estados"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('mula/index','Ir a la lista')}}</p>
    @endif
</div>


@stop