@extends('Mula.Maestro')
@section('Vista')
<div class="form-horizontal">
   
    {{Form::open(array('url'=>$HerrajeSeleccionado->GetTextos()["Editado"]["NAMEURL"]."/".$HerrajeSeleccionado->GetId()))}}
    <div class="form-group">
        {{Form::Label('IrwIdMule','Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IrwIdMule',$Datos["Mulas"],$HerrajeSeleccionado->GetIdMula(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
   <div class="form-group">
        {{Form::Label('IrwMrkId','Marca',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IrwMrkId',$Datos["Marcas"],$HerrajeSeleccionado->GetIdMarca(),array('class' => 'text-box single-line'))}}
        </div>
    </div>    
    
   <div class="form-group">
        {{Form::Label('IrwIdSize','Tamaño',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IrwIdSize',$Datos["Tamanos"],$HerrajeSeleccionado->GetIdTamano(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
      
    <div class="form-group">
        {{Form::Label('IrwFarrier','Herrador',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('text','IrwFarrier',$HerrajeSeleccionado->GetHerrador(),array('required'=>'true'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('IrwDateIronWork','Fecha Enfermedad',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::input('date','IrwDateIronWork',$HerrajeSeleccionado->GetFechaHerraje(),array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit($HerrajeSeleccionado->GetTextos()["Editar"]["Legend"],$HerrajeSeleccionado->GetTextos()["Editar"]["AttrBtn"])}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link($HerrajeSeleccionado->GetTextos()["Index"]["NAMEURL"],$HerrajeSeleccionado->GetTextos()["Index"]["Legend"])}}</p>
   
</div>


@stop
