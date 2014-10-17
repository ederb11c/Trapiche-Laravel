@extends('Layaouts.master')

@section('Title')
<title>Detalles Cosechero</title>
@stop

@section('body')

<h2>Detalles Sembrado</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else


    {{Form::open(array('url'=>'Cosechero/Editado/'.$Sembrado->GetId()))}}
    <div class="form-group">
        {{Form::Label('ClfName','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('ClfName',$Sembrado->GetNombre(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('ClfIdHarvester','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('ClfIdHarvester',$Datos["Cosecheros"],'',$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('ClfArea','Area',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('number','ClfArea',$Sembrado->GetArea(),$Datos["Attr"])}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('ClfDireccion','Direccion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::textarea('ClfDireccion',$Sembrado->GetDireccion(),$Datos["Attr"])}}
        </div>

        <div class="form-group">
            <div class="col-md-offset-2 col-md-10"> 

            </div>
        </div>
        {{Form::close()}}
        <p>{{ HTML::link('cosechero/index','Ir a la lista')}}</p>
        @endif
    </div>


    @stop