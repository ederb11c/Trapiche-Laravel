<html>
    <head>
        <meta charset="UTF-8">
        @section('Title')
        @show
        @section('head')
        {{ HTML::style('Css/bootstrap-3.2.0-dist/css/bootstrap.css') }}
        {{ HTML::style('Css/Css/CssSite/Site.css') }}
        {{ HTML::style('Css/Css/CssMenu/Menu.css') }}
        {{ HTML::script('Js/Jquery/jquery-1.11.0.min.js') }}
        {{ HTML::script('Js/Js/JsMenu/Menu.js') }}
        {{ HTML::script('Css/bootstrap-3.2.0-dist/js/bootstrap.js') }}

        <!--<link rel="stylesheet" href="../../public/bootstrap-3.2.0-dist/css/bootstrap.css" />-->

<!--        <style>
        @import url(//fonts.googleapis.com/css?family=Lato:700);

        body {
                margin:0;
                font-family:'Lato', sans-serif;
                text-align:center;
                color: #999;
        }

        .welcome {
                width: 300px;
                height: 200px;
                position: absolute;
                left: 50%;
                top: 50%;
                margin-left: -150px;
                margin-top: -100px;
        }

        a, a:visited {
                text-decoration:none;
        }

        h1 {
                font-size: 32px;
                margin: 16px 0 0 0;
        }
</style>-->
        @show
    </head>
    <body>

        <div class="navbar-header">

            <div class="navbar navbar-default  navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header"> 
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button><a class="navbar-brand" href="../home/about ">
                            <i class="icon-home icon-white"> </i> Trapi Soft -{{Auth::user()->GetRol->GetNombre()}}</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li  class="menu-item dropdown">
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Configuracion <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../usuario/index" >Usuarios</a></li>
                                    <li><a href="../tiposdeidentificacion/index" >Tipos de Identificacion</a></li>
                                    <li><a href="../unidaddemedida/index" >Unidades De Medida</a>
                                    </li><li><a href="../marcasdeherradura/index">Marcas De Herradura</a></li>
                                    <li><a href="../tiposdeoperario/index" >Tipos De Operario</a></li>
                                    <li><a href="../parametros/index" >Parametros</a></li>
                                </ul>
                            </li>
                            <li  class="menu-item dropdown"> 
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Datos Operativos <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../cosechero/index" >Cosecheros</a></li>
                                    <li  class="menu-item dropdown dropdown-submenu"> 
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mulas</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item"><a href="../mula/index" >Datos Basicos</a></li>
                                            <li class="menu-item dropdown dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historia Clinica</a>
                                                <ul class="dropdown-menu">
                                                    <li class="menu-item"><a href="../vitaminas/index     " >Vitaminas</a></li>
                                                    <li class="menu-item"><a href="../enfermedades/index     " >Enfermedades</a></li>
                                                    <li class="menu-item"><a href="../herrajes/index     " >Herrajes</a></li>
                                                    <li class="menu-item"><a href="../pesajes/index     " >Pesajes</a></li>
                                                    <li class="menu-item"><a href="../desparacitacion/index     " >Desparacitacion</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="../sembrado/index     " >Sembrados</a></li>
                                    <li><a href="../molienda/index     " >Moliendas</a></li>
                                </ul>
                            </li>
                            <li  class="menu-item dropdown"> 
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Moliendas <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../moliendasVsoperarios/create    " >MoliendasVsOperarios</a></li>
                                    <li><a href="../apronte/index     " >Aprotes</a></li>
                                    <li><a href="../moliendas/cierreMolienda" >Cierre De Molienda</a></li>
                                    <li><a href="../moliendas/liquidacionMolienda" >Liquidacion de Molienda</a></li>
                                    <li><a href="../moliendas/liquidacionCosecheros" >Liquidacion de Cosecheros</a></li>
                                    <li><a href="../moliendas/liquidacionOperarios" >Liquidacion Operarios</a></li>
                                    <li><a href="../moliendas/liquidacionGastosMolienda" >Liquidacion de Gastos de Molienda</a></li>
                                </ul>
                            </li>
                            <li  class="menu-item dropdown"> 
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Reportes <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../moliendas/reporteLiquidacion" >Moliendas</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{(Auth::user()->GetNombre()).' '.(Auth::user()->GetPApellido())}} <b class="caret"></b></a>  
                                <ul class="dropdown-menu">
                                    <li> <a href="../usuario/misdatos/{{Auth::user()->GetId()}}"<span class="glyphicon glyphicon-user"></span> Mis Datos</a> </li>
                                    <li><a href="../home/logout"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
        <div>
         
        </div>
        <div class="container">
            @yield('body')
            <footer>
                {{ date('Y-m-d H:i:s') }}
            </footer>
        </div>

    </body>


</html>