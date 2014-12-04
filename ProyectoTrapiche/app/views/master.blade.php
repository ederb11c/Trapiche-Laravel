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
                        </button><a class="navbar-brand" href="../Home/About ">
                            <i class="icon-home icon-white"> </i> Trapi Soft - Sup. Adminitrador</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">
                            <li  class="menu-item dropdown">
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Configuracion <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../Usuarios/Index" >Usuarios</a></li>
                                    <li><a href="../TiposdeIdentificacion/Index" >Tipos de Identificacion</a></li>
                                    <li><a href="../UnidadesDeMedida/Index" >Unidades De Medida</a>
                                    </li><li><a href="../MarcasDeHerradura/Index">Marcas De Herradura</a></li>
                                    <li><a href="../TiposDeOperario/Index" >Tipos De Operario</a></li>
                                    <li><a href="../Parametros/Index" >Parametros</a></li>
                                </ul>
                            </li>
                            <li  class="menu-item dropdown"> 
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Datos Operativos <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../Cosecheros/Index" >Cosecheros</a></li>
                                    <li  class="menu-item dropdown dropdown-submenu"> 
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mulas</a>
                                        <ul class="dropdown-menu">
                                            <li class="menu-item"><a href="../Mulas/Index" >Datos Basicos</a></li>
                                            <li class="menu-item dropdown dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Historia Clinica</a>
                                                <ul class="dropdown-menu">
                                                    <li class="menu-item"><a href="../Vitaminas/Index     " >Vitaminas</a></li>
                                                    <li class="menu-item"><a href="../Enfermedades/Index     " >Enfermedades</a></li>
                                                    <li class="menu-item"><a href="../Herrajes/Index     " >Herrajes</a></li>
                                                    <li class="menu-item"><a href="../Pesajes/Index     " >Pesajes</a></li>
                                                    <li class="menu-item"><a href="../Desparacitacion/Index     " >Desparacitacion</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="../Sembrados/Index     " >Sembrados</a></li>
                                    <li><a href="../Moliendas/Index     " >Moliendas</a></li>
                                </ul>
                            </li>
                            <li  class="menu-item dropdown"> 
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Moliendas <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../MoliendasVsOperarios/Create    " >MoliendasVsOperarios</a></li>
                                    <li><a href="../Aprotes/Index     " >Aprotes</a></li>
                                    <li><a href="../Moliendas/CierreMolienda" >Cierre De Molienda</a></li>
                                    <li><a href="../Moliendas/LiquidacionMolienda" >Liquidacion de Molienda</a></li>
                                    <li><a href="../Moliendas/LiquidacionCosecheros" >Liquidacion de Cosecheros</a></li>
                                    <li><a href="../Moliendas/LiquidacionOperarios" >Liquidacion Operarios</a></li>
                                    <li><a href="../Moliendas/LiquidacionGastosMolienda" >Liquidacion de Gastos de Molienda</a></li>
                                </ul>
                            </li>
                            <li  class="menu-item dropdown"> 
                                <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Reportes <b class='caret'></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../Moliendas/ReporteLiquidacion" >Moliendas</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="menu-item dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">EDER BARRIOS <b class="caret"></b></a>  
                                <ul class="dropdown-menu">
                                    <li> <a href="../Usuarios/MisDatos/4"<span class="glyphicon glyphicon-user"></span> Mis Datos</a> </li>
                                    <li><a href="../Home/Logout"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> 
            </div>
        </div>
        <div class="container">
            @yield('body')
            <footer>
                {{ date('d M Y m:H') }}
            </footer>
        </div>

    </body>


</html>