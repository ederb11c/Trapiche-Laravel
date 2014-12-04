@extends('Mula.Maestro')
@section('Vista')

<div class="form-horizontal">
    {{Form::open(array('url'=>'mula/editado/'.$Objeto->GetId()))}}
    <div class="form-group">
        {{Form::Label('MlName','Nombre Mula',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('MlName',$Objeto->GetNombre(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('MlSpecie','Especie',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MlSpecie',$Objeto->GetEspecie(),array('required'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MlDescription','Descrpcion',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::textarea('MlDescription',$Objeto->GetDescripcion(),array('required'=>'true','rows'=>'5','cols'=>'24'))}}
        </div>
    </div>

    <div class="form-group">
        {{Form::Label('MlIdSex','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdSex',$Datos["Sexos"],$Objeto->GetIdSexo(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('MlIdState','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('MlIdState',$Datos["Estados"],$Objeto->GetIdEstado(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
</div>
@stop