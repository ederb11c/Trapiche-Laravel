@extends('Layaouts.master')
@section('Title')
<title>Registrar Molienda</title>
@stop
@section('body')
<h3>Nuevo Molienda</h3>
<div class="form-horizontal">
    {{Form::open(array('url'=>'molienda/creado'))}}
    <div class="form-group">
        {{Form::Label('GrnComents','Comentarios',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::textarea('GrnComents',null,array('cols'=>'20','rows'=>'4'))}}
        </div>
    </div>
    
    
    <div class="form-group">
        {{Form::Label('GrnIdUnitMeasurement','Unidad de Medida',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('GrnIdUnitMeasurement',$Datos["UnidadDeMedida"],0,array('class' => 'text-box single-line',"required"))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('GrnTotal','Total en Kg',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('number','GrnTotal','0.0',array('class' => 'text-box single-line','step'=>'any'))}}
        </div>
    </div>
    
    
    <div class="form-group">
        {{Form::Label('GrnFactoryPrice','Precio Base',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('number','GrnFactoryPrice','0.0',array('class' => 'text-box single-line','step'=>'any'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('GrnDateLiquidation','Fecha Liquidacion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','GrnDateLiquidation','',array('class' => 'text-box single-line','required'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('GrnSellByDate','Fecha de Cierre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','GrnSellByDate','',array('class' => 'text-box single-line','required'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('GrnDateLaunch','Fecha de Apertura',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','GrnDateLaunch','',array('class' => 'text-box single-line','required'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('GrnIdTrapiche','Trapiche',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('GrnIdTrapiche',$Datos["Trapiches"],0,array('class' => 'text-box single-line','required'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('molienda/index','Ir a La Lista')}}</p>
</div>
@stop
