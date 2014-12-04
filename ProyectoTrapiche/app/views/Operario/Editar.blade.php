@extends('Layaouts.master')
@section('Title')
<title>{{$Objeto->GetTextos()["Editar"]["Legend"].$Objeto->GetNombreModelo()}}</title>
@stop

@section('body')

<h2>{{$Objeto->GetTextos()['Editar']['Legend']. $Objeto->GetNombreModelo() }}</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else

    {{Form::open(array('url'=>$Objeto->GetTextos()["Editado"]["NAMEURL"]."/".$Objeto->GetId()))}}
    <div class="form-group">
        {{Form::Label('WkrName','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('WkrName',$Objeto->GetNombre(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WkrFirstName','Primer Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('WkrFirstName',$Objeto->GetPApellido(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WkrLastName','Segundo Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('WkrLastName',$Objeto->GetSApellido(),array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('WkrIdTypeId','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WkrIdTypeId',$Datos["TiposIds"],$Objeto->GetIdTipoId(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WkrNumberId','Numero Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('number','WkrNumberId',$Objeto->GetNumeroId(),array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('WkrEmail','Email',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('email','WkrEmail',$Objeto->GetEmail(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WkrDateOfBirth','Fecha de Nacimiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','WkrDateOfBirth',$Objeto->GetFechaNacimiento(),array('required'=>'true'))}}
        </div>
    </div>
    
     <div class="form-group">
        {{Form::Label('WkrIdTypeId','Tipo Operario',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WkrIdTypeId',$Datos["TiposDeOperarios"],$Objeto->GetIdTipoOperario(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('WrkIdSex','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WrkIdSex',$Datos["Sexos"],$Objeto->GetIdSexo(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('WkrIdTrapiche','Trapiche',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WkrIdTrapiche',$Datos["Trapiches"],$Objeto->GetIdTrapiche(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('WkrIdState','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('WkrIdState',$Datos["Estados"],$Objeto->GetIdEstado(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($Objeto->GetTextos()["Editar"]["Legend"],$Objeto->GetTextos()["Editar"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link($Objeto->GetTextos()["Index"]["NAMEURL"],$Objeto->GetTextos()["Index"]["Legend"])}}</p>
    @endif
</div>


@stop
