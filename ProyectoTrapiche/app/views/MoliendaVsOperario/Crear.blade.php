@extends('Layaouts.master')

@section('Title')
<title>{{$Objeto->GetTextos()['Create']['Legend']. $Objeto->GetNombreModelo() }}</title>
@stop

@section('body')

<h2>{{$Objeto->GetTextos()['Create']['Legend']. $Objeto->GetNombreModelo() }}</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje') }}
    </div>
    @else

    {{Form::open(array('url'=>$Objeto->GetTextos()["Create"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('GndwIdWorker','Operario',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('GndwIdWorker',$Datos["Operarios"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('GndwIdGrinding','Molienda',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('GndwIdGrinding',$Datos["Moliendas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($Objeto->GetTextos()["Create"]["BtnName"],$Objeto->GetTextos()["Create"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link($Objeto->GetTextos()["Index"]["NAMEURL"],$Objeto->GetTextos()["Index"]["Legend"])}}</p>
    @endif
</div>


@stop