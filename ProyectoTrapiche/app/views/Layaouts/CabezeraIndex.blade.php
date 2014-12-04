@extends('Layaouts.master')
@section('Title')
<title>{{$Objetos[0]->GetNombreModeloPlural() }}</title>
@stop
@section('body')

<h3>{{$Objetos[0]->GetTextos()['Index']['LegendAux'].$Objetos[0]->GetNombreModeloPlural() }}</h3>
<p>{{ HTML::link($Objetos[0]->GetTextos()['Crear']['NAMEURL'],$Objetos[0]->GetTextos()['Crear']['Legend'].$Objetos[0]->GetNombreModelo())}}</p>

@yield('Contenedor')
@include('Layaouts.PieIndex')
@stop








