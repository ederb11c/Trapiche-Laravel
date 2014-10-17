@extends('Layaouts.master')

@section('Title')
<title>Editar Arriero</title>
@stop

@section('body')

<h2>Editar Arriero</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else

    {{Form::open(array('url'=>'arriero/editado/'.$Arriero->GetId()))}}
    <div class="form-group">
        {{Form::Label('MldName','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MldName',$Arriero->GetNombre(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MldFirstName','Primer Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MldFirstName',$Arriero->GetPApellido(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MldLastName','Segundo Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MldLastName',$Arriero->GetSApellido(),array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MlIdSex','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdSex',$Datos["Sexos"],$Arriero->GetIdSexo(),array('required'=>'true','class' => 'text-box single-line'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MldIdTypeId','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MldIdTypeId',$Datos["TiposId"],$Arriero->GetIdTipoId(),array('required'=>'true','class' => 'text-box single-line'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MldNumberId','Numero Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MldNumberId',$Arriero->GetNumeroId(),array('required'=>'true'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MlEmail','Email',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::email('MlEmail',$Arriero->GetEmail(),array(''=>''))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MlDateOfBirth','Fecha Nacimiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','MlDateOfBirth',$Arriero->GetFechaNacimiento(),array('required'=>'true'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MldIdState','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MldIdState',$Datos["Estados"],'',array('required'=>'true','class' => 'text-box single-line'))}}
        </div>
    </div>
   
   
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('arriero/index','Ir a la lista')}}</p>
    @endif
</div>


@stop