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
        {{Form::Label('GndwIdWorker','Operario',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('GndwIdWorker',$Datos["Operarios"],$Objeto->GetIdOperario(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('GndwIdGrinding','Molienda',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('GndwIdGrinding',$Datos["Moliendas"],$Objeto->GetIdMolienda(),array('class' => 'text-box single-line'))}}
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
