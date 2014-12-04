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

        <div class="navbar navbar-default  navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><i class="icon-home icon-white"> </i> Trapi Soft</a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar">
                        <li><a href="LogIn">LogIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            @yield('body')
            <footer>
                {{ date('d M Y m:H') }} TrapiSoft
            </footer>
        </div>

    </body>


</html>