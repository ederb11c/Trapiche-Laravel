@extends('Layaouts.master')
@section('Title')
<title>{{$Objeto->GetTextos()["Maestro"]["Legend"].$Objeto->GetNombreModelo()}}</title>
@stop
@section('body')
<script>
    $(document).ready(function() {
<?php
foreach ($Datos["Open"] as $key => $value) {
    echo "$('" . $key . "').addClass('" . $value . "');";
}
?>

    });
</script>
<div class="row">
    <h2>{{ HTML::link($Objeto->GetTextos()["Detallar"]["NAMEURL"], $Objeto->GetTextos()["Maestro"]['Legend']. $Objeto->GetNombreModelo())}}

        @foreach ($Datos["URL"] as $key => $value) 
        {{HTML::link($value,"/".$key  )}}
        @endforeach
    </h2>
    <?php
    if (isset($Objeto)) {
        $Fin = "/" . $Objeto->GetId();
    }
    ?>
    <div class="row">
        <div class="col-sm-3 col-md-3">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default M">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  href="{{asset($Objeto->GetTextos()["Detallar"]["NAMEURL"])}}"><span class="glyphicon glyphicon-folder-close">
                                </span> {{$Objeto->GetNombreModelo()}}</a>
                        </h4>
                    </div>
                </div>
                <div  class="panel panel-default V">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{asset('mula/vitaminas'.$Fin)}}"> <span class="glyphicon glyphicon-heart">
                                </span>  Vitaminas</a>
                        </h4>
                    </div>

                </div>
                <div  class="panel panel-default H">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{asset('mula/herrajes'.$Fin)}}"><span class="glyphicon glyphicon-record">
                                </span> Herrajes</a>
                        </h4>
                    </div>
                </div>
                <div class="panel panel-default E">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{asset('mula/enfermedades'.$Fin)}}"><span class="glyphicon glyphicon-heart-empty">
                                </span> Enfermedades</a>
                        </h4>
                    </div>

                </div>
                <div class="panel panel-default D">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="{{asset('mula/desparacitaciones'.$Fin)}}"><span class="glyphicon glyphicon-leaf">
                                </span> Desparacitaciones</a>
                        </h4>
                    </div>
                </div>

                <div class="panel panel-default P">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a  href="{{asset("mula/pesajes".$Fin)}}
                                "><span class="glyphicon glyphicon-dashboard">
                                </span> Pesajes</a>
                        </h4>
                    </div>
                </div>
            </div>
            @include('Layaouts.PieFormulario')
        </div>

        <div class="col-sm-9 col-md-9">
            <div class="panel panel-default T">
                <div class="panel-heading">
                    <h3 class="panel-title">{{($Datos["Legends"]["Legend"])}}</h3>
                        <div class="pull-right">
                            @if(isset($HerrajeSeleccionado))
                                <a href="{{ asset($HerrajeSeleccionado->GetTextos()["Editar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-pencil"> </a>
                                <a href="{{ asset($HerrajeSeleccionado->GetTextos()["Detallar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-align-justify"></a>
                                <a href="{{ asset($HerrajeSeleccionado->GetTextos()["Eliminar"]["NAMEURL"])}}" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a>
                            @elseif(isset($VitaminaSeleccionada))
                                <a href="{{ asset($VitaminaSeleccionada->GetTextos()["Editar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-pencil"> </a>
                                <a href="{{ asset($VitaminaSeleccionada->GetTextos()["Detallar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-align-justify"></a>
                                <a href="{{ asset($VitaminaSeleccionada->GetTextos()["Eliminar"]["NAMEURL"])}}" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a>
                            @elseif(isset($EnfermedadSeleccionada))
                                <a href="{{ asset($EnfermedadSeleccionada->GetTextos()["Editar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-pencil"> </a>
                                <a href="{{ asset($EnfermedadSeleccionada->GetTextos()["Detallar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-align-justify"></a>
                                <a href="{{ asset($EnfermedadSeleccionada->GetTextos()["Eliminar"]["NAMEURL"])}}" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a>
                            @elseif(isset($PesajeSeleccionado))
                                <a href="{{ asset($PesajeSeleccionado->GetTextos()["Editar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-pencil"> </a>
                                <a href="{{ asset($PesajeSeleccionado->GetTextos()["Detallar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-align-justify"></a>
                                <a href="{{ asset($PesajeSeleccionado->GetTextos()["Eliminar"]["NAMEURL"])}}" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a>
                            @elseif(isset($DesparacitacionSeleccionada))
                                <a href="{{ asset($DesparacitacionSeleccionada->GetTextos()["Editar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-pencil"> </a>
                                <a href="{{ asset($DesparacitacionSeleccionada->GetTextos()["Detallar"]["NAMEURL"])}}" class="btn btn-info  btn-sm glyphicon glyphicon-align-justify"></a>
                                <a href="{{ asset($DesparacitacionSeleccionada->GetTextos()["Eliminar"]["NAMEURL"])}}" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></a>
                            
                            @endif
                            
                        </div> 
                </div>
                      
                <div class="panel-body">
                    @if(Session::has('success'))
                    <div class="alert alert-success">   
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    @if(isset($Datos["Eliminado"]['Legend']))
                    <p>{{$Objeto->GetTextos()["Eliminado"]['Legend'] }}
                    </p>
                    @endif
                    @if(isset($I))

                        @if($I=='V')                        
                            <a href="{{ URL::route($Vitaminas[0]->GetTextos()["Crear"]["NAMEURL"]).$Fin }}" class="btn btn-info"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        @elseif($I=='E')
                            <a href="{{ URL::route($Enfermedades[0]->GetTextos()["Crear"]["NAMEURL"]).$Fin }}" class="btn btn-info"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        @elseif($I=='H')
                            <a href="{{ URL::route($Herrajes[0]->GetTextos()["Crear"]["NAMEURL"]).$Fin }}" class="btn btn-info"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        @elseif($I=='P')
                            <a href="{{ URL::route($Pesajes[0]->GetTextos()["Crear"]["NAMEURL"]).$Fin }}" class="btn btn-info"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        @elseif($I=='D')
                            <a href="{{ URL::route($Desparacitaciones[0]->GetTextos()["Crear"]["NAMEURL"]).$Fin }}" class="btn btn-info"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        @endif
                        
                    @endif

                    @yield('Vista')
                </div>
            </div>
        </div>
    </div>


</div>

@stop




