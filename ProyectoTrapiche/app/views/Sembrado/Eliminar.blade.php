@extends('Layaouts.master')

@section('Title')
<title>Detalles Cosechero</title>
@stop

@section('body')

<h2>Editar Cosechero</h2>
<p>Estas seguro de querer eliminar el siguiente Sembrado?</p>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else

    {{Form::open(array('url'=>'sembrado/eliminado/'.$Sembrado->GetId()))}}
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
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Eliminar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('sembrado/index','Ir a la lista')}}</p>
    @endif
</div>


@stop