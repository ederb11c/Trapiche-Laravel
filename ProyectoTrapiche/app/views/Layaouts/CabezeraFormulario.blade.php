@extends('Layaouts.master')
    @section('Title')
        <title>{{$Datos["Legends"]["Legend"].$Objeto->GetNombreModelo()}}</title>
    @stop
    @section('body')
        <h2>{{$Datos["Legends"]['Legend']. $Objeto->GetNombreModelo() }}</h2>
            @if(isset($Datos["Eliminado"]['Legend']))
                <p>{{$Datos["Eliminado"]['Legend'] }}</p>
            @endif
    @yield('Formulario')
        @include('Layaouts.PieFormulario')
@stop




