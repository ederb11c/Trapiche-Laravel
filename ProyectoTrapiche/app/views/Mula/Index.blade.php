@extends('Layaouts.master')
@section('Title')
<title>Mulas</title>
@stop
@section('body')
<h3>Lista de Mulas</h3>
<p><a href="{{ asset('mula/crear')}}" class="btn btn-info "> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </a></p>
<div class="well-lg">
        {{Form::open(array('url'=>'mula',"class"=>"form form-inline"))}}
        <div class="form-group">
            {{Form::Label('MlName','Nombre Mula',array())}}
            {{Form::text('MlName',@$Datos["Formulario"]["MlName"],Config::get("constants.BasicAttrForm"))}}
        </div>

        <div class="form-group">
            {{Form::Label('MlIdSex','Sexo',array())}}
            {{Form::select('MlIdSex[]',@$Datos["Sexos"],@$Datos["Formulario"]["MlIdSex"],Config::get("constants.BasicAttrFormSelectMultiple"))}}
        </div>
        {{Form::submit('',(Config::get("constants.arrayAttrButtonIndex")))}}
    </div>
<div class="row">
   
<table class="table table-bordered table-hover table-striped table-condensed table-responsive">
        <thead>
            <tr>
                <th>Nombre</th><th>Especie</th><th>Descripcion</th><th>Sexo</th><th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Mulas as $Mula)          

            <tr><td>{{ $Mula->GetNombre() }}</td><td> {{ $Mula->GetEspecie() }}</td><td> {{ $Mula->GetDescripcion() }}</td><td>{{$Mula->GetSexo->GetNombre()}}</td>
                <td> {{($Mula->GetEstado->GetNombre()) }}</td>
                <td> 
                    <a href="{{ asset('mula/editar/'.$Mula->GetId())}}" class="btn btn-info  btn-sm"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <a/>
                        <a href="{{ asset('mula/detalles/'.$Mula->GetId())}}" class="btn btn-info  btn-sm"> <span class="glyphicon glyphicon-align-justify" aria-hidden="true"></span> <a/>
                            <a href="{{ asset('mula/eliminar/'.$Mula->GetId())}}" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> <a/>

                                </td>
                                </tr>
                                @endforeach

                                </tbody>

                                </table>  
                                </div>
                                @stop

