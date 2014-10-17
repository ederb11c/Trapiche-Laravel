@extends('Layaouts.master')

@section('Title')
<title>Detalles Mula</title>
@stop

@section('body')

<h2>Eliminar Mula</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
        {{'Error'  }}
    </div>
    @else
    <p>Estas seguro de eliminar esta mula?</p>
    {{Form::open(array('url'=>'mula/eliminado/'.$Mula->GetId()))}}
    <div class="form-group">
        {{Form::Label('MlName','Nombre Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MlName',$Mula->GetNombre(),array('required'=>'true','disabled'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MlSpecie','Especie',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MlSpecie',$Mula->GetEspecie(),array('required'=>'true','rows'=>'5','cols'=>'24','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MlDescription','Descrpcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MlDescription',$Mula->GetDescripcion(),array('required'=>'true','rows'=>'5','cols'=>'24','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MlIdSex','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdSex',$Datos["Sexos"],$Mula->GetIdSexo(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MlIdState','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdState',$Datos["Estados"],'',array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('','FechaRegistro',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('FechaRegistro',$Mula->GetFechaRegistro(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('','Usuario Registro',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('FechaRegistro',$Mula->GetUsuarioRegistro->GetNombre()." ".$Mula->GetUsuarioRegistro->GetPApellido(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('','Usuario Ultimo Edicion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('FechaRegistro',$Mula->GetUsuarioUltimaEdicion->GetNombre()." ".$Mula->GetUsuarioUltimaEdicion->GetPApellido(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('','Fecha Ultima Edicion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('Fecha',$Mula->GetFechaUltimaEdicion(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
                        {{Form::submit('Enviar',array('class'=>'btn btn-danger'))}}

        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('mula/index','Ir a la lista')}}</p>
    @endif
</div>


@stop