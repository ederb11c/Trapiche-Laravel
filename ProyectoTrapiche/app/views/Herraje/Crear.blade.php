@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">

    {{Form::open(array('url'=>$Datos["Legends"]["NAMEURL"]))}}
    <div class="form-group">
        {{Form::Label('IrwIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IrwIdMule',$Datos["Mulas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('IrwMrkId','Marca',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IrwMrkId',$Datos["Marcas"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
    
   <div class="form-group">
        {{Form::Label('IrwIdSize','Tamaño',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IrwIdSize',$Datos["Tamanos"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>  
    
    <div class="form-group">
        {{Form::Label('IrwFarrier','Herrador',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('text','IrwFarrier','',array('required'=>'true'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('IrwDateIronWork','Fecha Enfermedad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','IrwDateIronWork','',array('required'=>'true'))}}
        </div>
    </div>
    
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($Objeto->GetTextos()["Create"]["BtnName"],$Objeto->GetTextos()["Create"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
</div>


@stop