<?php

/* Rutas de el Home */

Route::get('/', "HomeController@LogIn");
Route::get('home/', "HomeController@LogIn");
Route::get('home/login', "HomeController@LogIn");
Route::get('login/', "HomeController@LogIn");
Route::get('LogIn/', "HomeController@LogIn");
Route::post('home/loged', "HomeController@Loged");

Route::post('Home/Loged', "HomeController@Loged");
Route::group(array('before' => 'auth'), function() {
    /* Primer Modulo
      /* Index */
    Route::get('home/logout', "HomeController@LogOut");

    Route::get('home/index', "HomeController@Index");
    /* Rutas del Usuario */
    Route::get('usuario/', "UsuarioController@Index");
    Route::get('usuario/index', "UsuarioController@Index");
    Route::get('usuario/crear', "UsuarioController@Crear");
    Route::post('usuario/creado', "UsuarioController@Creado");
    Route::get('usuario/editar/{Id}', "UsuarioController@Editar");
    Route::post('usuario/editado/{Id}', "UsuarioController@Editado");
    Route::get('usuario/detalles/{Id}', "UsuarioController@Detalles");
    Route::get('usuario/eliminar/{Id}', "UsuarioController@Eliminar");
    Route::post('usuario/eliminado/{Id}', "UsuarioController@Eliminado");
    /* Rutas de los estados */
    Route::get('Estado/', "EstadoController@Index");
    Route::get('Estado/Index', "EstadoController@Index");
    Route::get('Estado/Crear', "EstadoController@Crear");
    Route::post('Estado/Creado', "EstadoController@Creado");
    Route::get('Estado/Editar/{Id}', "EstadoController@Editar");
    Route::post('Estado/Editado/{Id}', "EstadoController@Editado");
    Route::get('Estado/Eliminar/{Id}', "EstadoController@Eliminar");
    Route::post('Estado/Eliminado/{Id}', "EstadoController@Eliminado");
    Route::get('Estado/Detalles/{Id}', "EstadoController@Detalles");
    /* Rutas de los Rol */
    Route::get('Rol/', "RolController@Index");
    Route::get('Rol/Index', "RolController@Index");
    Route::get('Rol/Crear', "RolController@Crear");
    Route::post('Rol/Creado', "RolController@Creado");
    Route::post('Rol/Editado/{Id}', "RolController@Editado");
    Route::get('Rol/Editar/{Id}', "RolController@Editar");
    Route::get('Rol/Detalles/{Id}', "RolController@Detalles");
    Route::get('Rol/Eliminar/{Id}', "RolController@Eliminar");
    Route::post('Rol/Eliminado/{Id}', "RolController@Eliminado");
    /* Rutas Tipos Unidades de Medidas */
    Route::get('unidaddemedida/', "UnidadDeMedidaController@Index");
    Route::get('unidaddemedida/index', "UnidadDeMedidaController@Index");
    Route::get('unidaddemedida/crear', "UnidadDeMedidaController@Crear");
    Route::post('unidaddemedida/creado', "UnidadDeMedidaController@Creado");
    Route::post('unidaddemedida/editado/{Id}', "UnidadDeMedidaController@Editado");
    Route::get('unidaddemedida/editar/{Id}', "UnidadDeMedidaController@Editar");
    Route::get('unidaddemedida/detalles/{Id}', "UnidadDeMedidaController@Detalles");
    Route::get('unidaddemedida/eliminar/{Id}', "UnidadDeMedidaController@Eliminar");
    Route::post('unidaddemedida/eliminado/{Id}', "UnidadDeMedidaController@Eliminado");

    /* Rutas Tipos de Identificacion */
    Route::get('tiposdeidentificacion/', "TiposDeIdentificacionController@Index");
    Route::get('tiposdeidentificacion/index', "TiposDeIdentificacionController@Index");
    Route::get('tiposdeidentificacion/crear', "TiposDeIdentificacionController@Crear");
    Route::post('tiposdeidentificacion/creado', "TiposDeIdentificacionController@Creado");
    Route::post('tiposdeidentificacion/editado/{Id}', "TiposDeIdentificacionController@Editado");
    Route::get('tiposdeidentificacion/editar/{Id}', "TiposDeIdentificacionController@Editar");
    Route::get('tiposdeidentificacion/detalles/{Id}', "TiposDeIdentificacionController@Detalles");
    Route::get('tiposdeidentificacion/eliminar/{Id}', "TiposDeIdentificacionController@Eliminar");
    Route::post('tiposdeidentificacion/eliminado/{Id}', "TiposDeIdentificacionController@Eliminado");

    /* Tipos de Operario */
    Route::get('tiposdeoperario/', "TiposDeOperarioController@Index");
    Route::get('tiposdeoperario/index', "TiposDeOperarioController@Index");
    Route::get('tiposdeoperario/crear', "TiposDeOperarioController@Crear");
    Route::post('tiposdeoperario/creado', "TiposDeOperarioController@Creado");
    Route::post('tiposdeoperario/editado/{Id}', "TiposDeOperarioController@Editado");
    Route::get('tiposdeoperario/editar/{Id}', "TiposDeOperarioController@Editar");
    Route::get('tiposdeoperario/detalles/{Id}', "TiposDeOperarioController@Detalles");
    Route::get('tiposdeoperario/eliminar/{Id}', "TiposDeOperarioController@Eliminar");
    Route::post('tiposdeoperario/eliminado/{Id}', "TiposDeOperarioController@Eliminado");
    /* Marcas de Herradura */
    Route::get('marcasdeherradura/', "MarcasDeHerraduraController@Index");
    Route::get('marcasdeherradura/index', "MarcasDeHerraduraController@Index");
    Route::get('marcasdeherradura/crear', "MarcasDeHerraduraController@Crear");
    Route::post('marcasdeherradura/creado', "MarcasDeHerraduraController@Creado");
    Route::post('marcasdeherradura/editado/{Id}', "MarcasDeHerraduraController@Editado");
    Route::get('marcasdeherradura/editar/{Id}', "MarcasDeHerraduraController@Editar");
    Route::get('marcasdeherradura/detalles/{Id}', "MarcasDeHerraduraController@Detalles");
    Route::get('marcasdeherradura/eliminar/{Id}', "MarcasDeHerraduraController@Eliminar");
    Route::post('marcasdeherradura/eliminado/{Id}', "MarcasDeHerraduraController@Eliminado");
    
         /* Rutas de los Menu */
    Route::get('menu/', "MenuController@Index");
    Route::get('menu/index', "MenuController@Index");
    Route::get('menu/crear', "MenuController@Crear");
    Route::post('menu/creado', "MenuController@Creado");
    Route::post('menu/editado/{Id}', "MenuController@Editado");
    Route::get('menu/editar/{Id}', "MenuController@Editar");
    Route::get('menu/detalles/{Id}', "MenuController@Detalles");
    Route::get('menu/eliminar/{Id}', "MenuController@Eliminar");
    Route::post('menu/eliminado/{Id}', "MenuController@Eliminado");

    
         /* Rutas de los Menu */
    Route::get('opcion/', "OpcionController@Index");
    Route::get('opcion/index', "OpcionController@Index");
    Route::get('opcion/crear', "OpcionController@Crear");
    Route::post('opcion/creado', "OpcionController@Creado");
    Route::post('opcion/editado/{Id}', "OpcionController@Editado");
    Route::get('opcion/editar/{Id}', "OpcionController@Editar");
    Route::get('opcion/detalles/{Id}', "OpcionController@Detalles");
    Route::get('opcion/eliminar/{Id}', "OpcionController@Eliminar");
    Route::post('opcion/eliminado/{Id}', "OpcionController@Eliminado");
    
         /* Rutas de los Menu Vs OPcion */
    Route::get('menuvsopcion/', "MenuVsOpcionController@Index");
    Route::get('menuvsopcion/index', "MenuVsOpcionController@Index");
    Route::get('menuvsopcion/crear', "MenuVsOpcionController@Crear");
    Route::post('menuvsopcion/creado', "MenuVsOpcionController@Creado");
    Route::post('menuvsopcion/editado/{Id}', "MenuVsOpcionController@Editado");
    Route::get('menuvsopcion/editar/{Id}', "MenuVsOpcionController@Editar");
    Route::get('menuvsopcion/detalles/{Id}', "MenuVsOpcionController@Detalles");
    Route::get('menuvsopcion/eliminar/{Id}', "MenuVsOpcionController@Eliminar");
    Route::post('menuvsopcion/eliminado/{Id}', "MenuVsOpcionController@Eliminado");
        
         /* Rutas de los Menu Vs Rol */
    Route::get('menuvsrol/', "MenuVsRolController@Index");
    Route::get('menuvsrol/index', "MenuVsRolController@Index");
    Route::get('menuvsrol/crear', "MenuVsRolController@Crear");
    Route::post('menuvsrol/creado', "MenuVsRolController@Creado");
    Route::post('menuvsrol/editado/{Id}', "MenuVsRolController@Editado");
    Route::get('menuvsrol/editar/{Id}', "MenuVsRolController@Editar");
    Route::get('menuvsrol/detalles/{Id}', "MenuVsRolController@Detalles");
    Route::get('menuvsrol/eliminar/{Id}', "MenuVsRolController@Eliminar");
    Route::post('menuvsrol/eliminado/{Id}', "MenuVsRolController@Eliminado");
    


    /* Fin Primer modulo */
    /*Rutas del segundo Modulo*/
    /* Rutas del Cosechero */
    Route::get('cosechero/', "CosecheroController@Index");
    Route::get('cosechero/index', "CosecheroController@Index");
    Route::get('cosechero/crear', "CosecheroController@Crear");
    Route::post('cosechero/creado', "CosecheroController@Creado");
    Route::post('cosechero/editado/{Id}', "CosecheroController@Editado");
    Route::get('cosechero/editar/{Id}', "CosecheroController@Editar");
    Route::get('cosechero/detalles/{Id}', "CosecheroController@Detalles");
    Route::get('cosechero/eliminar/{Id}', "CosecheroController@Eliminar");
    Route::post('cosechero/eliminado/{Id}', "CosecheroController@Eliminado");

    
    /* Rutas de  Mula */
    Route::any('mula/', "MulaController@Index");
    Route::any('mula/index', "MulaController@Index");
    Route::get('mula/crear/{Id?}', "MulaController@Crear");
    Route::post('mula/creado', "MulaController@Creado");
    Route::post('mula/editado/{Id}', "MulaController@Editado");
    Route::get('mula/editar/{Id}', "MulaController@Editar");
    Route::get('mula/detalles/{Id}', "MulaController@Detalles");
    Route::get('mula/eliminar/{Id}', "MulaController@Eliminar");
    Route::post('mula/eliminado/{Id}', "MulaController@Eliminado");
    
    Route::any('mula/vitaminas/{Id?}', "MulaController@IndexVitaminas");
    Route::any('mula/herrajes/{Id?}', "MulaController@IndexHerrajes");
    Route::any('mula/enfermedades/{Id?}', "MulaController@IndexEnfermedades");
    Route::any('mula/desparacitaciones/{Id?}', "MulaController@IndexDesparacitaciones");
    Route::any('mula/pesajes/{Id?}',array(
    'as'   => 'pesajes/index', // This is the route's name
    'uses' => "MulaController@Indexpesajes"));



    /* Rutas del Sembrado */
    Route::get('sembrado/', "SembradoController@Index");
    Route::get('sembrado/index', "SembradoController@Index");
    Route::get('sembrado/crear', "SembradoController@Crear");
    Route::post('sembrado/creado', "SembradoController@Creado");
    Route::post('sembrado/editado/{Id}', "SembradoController@Editado");
    Route::get('sembrado/editar/{Id}', "SembradoController@Editar");
    Route::get('sembrado/detalles/{Id}', "SembradoController@Detalles");
    Route::get('sembrado/eliminar/{Id}', "SembradoController@Eliminar");
    Route::post('sembrado/eliminado/{Id}', "SembradoController@Eliminado");
    
     /* Rutas del sembrado */
    Route::get('molienda/', "moliendaController@Index");
    Route::get('molienda/index', "moliendaController@Index");
    Route::get('molienda/crear', "moliendaController@Crear");
    Route::post('molienda/creado', "moliendaController@Creado");
    Route::post('molienda/editado/{Id}', "moliendaController@Editado");
    Route::get('molienda/editar/{Id}', "moliendaController@Editar");
    Route::get('molienda/detalles/{Id}', "moliendaController@Detalles");
    Route::get('molienda/eliminar/{Id}', "moliendaController@Eliminar");
    Route::post('molienda/eliminado/{Id}', "moliendaController@Eliminado");
 
    /*Rutas del los arrieros*/
    Route::get('arriero/', "ArrieroController@Index");
    Route::get('arriero/index', "ArrieroController@Index");
    Route::get('arriero/crear', "ArrieroController@Crear");
    Route::post('arriero/creado', "ArrieroController@Creado");
    Route::post('arriero/editado/{Id}', "ArrieroController@Editado");
    Route::get('arriero/editar/{Id}', "ArrieroController@Editar");
    Route::get('arriero/detalles/{Id}', "ArrieroController@Detalles");
    Route::get('arriero/eliminar/{Id}', "ArrieroController@Eliminar");
    Route::post('arriero/eliminado/{Id}', "ArrieroController@Eliminado");
    
    
      /*Rutas del los Vitaminas*/
    Route::get('vitamina/', "VitaminasController@Index");
    Route::get('vitamina/index', "VitaminasController@Index");
    Route::get('vitamina/crear/{Id?}',array(
    'as'   => 'vitamina/crear', // This is the route's name
    'uses' =>  "VitaminasController@Crear"));
    Route::post('vitamina/creado', "VitaminasController@Creado");
    Route::post('vitamina/editado/{Id}', "VitaminasController@Editado");
    Route::get('vitamina/editar/{Id}', "VitaminasController@Editar");
    Route::get('vitamina/detalles/{Id}', "VitaminasController@Detalles");
    Route::get('vitamina/eliminar/{Id}', "VitaminasController@Eliminar");
    Route::post('vitamina/eliminado/{Id}', "VitaminasController@Eliminado");

    
      /*Rutas del los Enfermedades*/
    Route::get('enfermedad/', "EnfermedadesController@Index");
    Route::get('enfermedad/index', "EnfermedadesController@Index");
    Route::get('enfermedad/crear/{Id?}',array(
    'as'   => 'enfermedad/crear', // This is the route's name
    'uses' =>   "EnfermedadesController@Crear"));
    Route::post('enfermedad/creado', "EnfermedadesController@Creado");
    Route::post('enfermedad/editado/{Id}', "EnfermedadesController@Editado");
    Route::get('enfermedad/editar/{Id}', "EnfermedadesController@Editar");
    Route::get('enfermedad/detalles/{Id}', "EnfermedadesController@Detalles");
    Route::get('enfermedad/eliminar/{Id}', "EnfermedadesController@Eliminar");
    Route::post('enfermedad/eliminado/{Id}', "EnfermedadesController@Eliminado");
    
    
    Route::get('herraje/', "HerrajesController@Index");
    Route::get('herraje/index', "HerrajesController@Index");
    Route::get('herraje/crear/{Id?}',array(
    'as'   => 'herraje/crear', // This is the route's name
    'uses' =>  "HerrajesController@Crear"));
    Route::post('herraje/creado', "HerrajesController@Creado");
    Route::post('herraje/editado/{Id}', "HerrajesController@Editado");
    Route::get('herraje/editar/{Id}', "HerrajesController@Editar");
    Route::get('herraje/detalles/{Id}', "HerrajesController@Detalles");
    Route::get('herraje/eliminar/{Id}', "HerrajesController@Eliminar");
    Route::post('herraje/eliminado/{Id}', "HerrajesController@Eliminado");

    
    Route::get('pesaje/', "PesajesController@Index");
    Route::get('pesaje/index', "PesajesController@Index");
    Route::get('pesaje/crear/{Id?}',array(
    'as'   => 'pesaje/crear', // This is the route's name
    'uses' => "PesajesController@Crear"));
    Route::post('pesaje/creado', "PesajesController@Creado");
    Route::post('pesaje/editado/{Id}', "PesajesController@Editado");
    Route::get('pesaje/editar/{Id}', "PesajesController@Editar");
    Route::get('pesaje/detalles/{Id}', "PesajesController@Detalles");
    Route::get('pesaje/eliminar/{Id}', "PesajesController@Eliminar");
    Route::post('pesaje/eliminado/{Id}', "PesajesController@Eliminado");

    /*Rutas de las Desparacitacion*/
    Route::get('desparacitacion/', "DesparacitacionesController@Index");
    Route::get('desparacitacion/index', "DesparacitacionesController@Index");
    Route::get('desparacitacion/crear/{Id?}',array(
    'as'   => 'desparacitacion/crear', // This is the route's name
    'uses' =>  "DesparacitacionesController@Crear"));
    Route::post('desparacitacion/creado', "DesparacitacionesController@Creado");
    Route::post('desparacitacion/editado/{Id}', "DesparacitacionesController@Editado");
    Route::get('desparacitacion/editar/{Id}', "DesparacitacionesController@Editar");
    Route::get('desparacitacion/detalles/{Id}', "DesparacitacionesController@Detalles");
    Route::get('desparacitacion/eliminar/{Id}', "DesparacitacionesController@Eliminar");
    Route::post('desparacitacion/eliminado/{Id}', "DesparacitacionesController@Eliminado");

    /*tercer modulo*/
    /*----moliendas Vs Operario*/
    
    Route::get('moliendavsoperario/', "MoliendaVsOperarioController@Index");
    Route::get('moliendavsoperario/index', "MoliendaVsOperarioController@Index");
    Route::get('moliendavsoperario/crear', "MoliendaVsOperarioController@Crear");
    Route::post('moliendavsoperario/creado', "MoliendaVsOperarioController@Creado");
    Route::post('moliendavsoperario/editado/{Id}', "MoliendaVsOperarioController@Editado");
    Route::get('moliendavsoperario/editar/{Id}', "MoliendaVsOperarioController@Editar");
    Route::get('moliendavsoperario/detalles/{Id}', "MoliendaVsOperarioController@Detalles");
    Route::get('moliendavsoperario/eliminar/{Id}', "MoliendaVsOperarioController@Eliminar");
    Route::post('moliendavsoperario/eliminado/{Id}', "MoliendaVsOperarioController@Eliminado");
    
    /*Operarios*/
    Route::get('operario/', "OperarioController@Index");
    Route::get('operario/index', "OperarioController@Index");
    Route::get('operario/crear', "OperarioController@Crear");
    Route::post('operario/creado', "OperarioController@Creado");
    Route::post('operario/editado/{Id}', "OperarioController@Editado");
    Route::get('operario/editar/{Id}', "OperarioController@Editar");
    Route::get('operario/detalles/{Id}', "OperarioController@Detalles");
    Route::get('operario/eliminar/{Id}', "OperarioController@Eliminar");
    Route::post('operario/eliminado/{Id}', "OperarioController@Eliminado");
    
});

View::composer('Layaouts.master', function($view) {
    $Usuario = Usuario::find(Auth::user()->GetId());
    $path ="";// base_path("app");
    $root="";//Request::root();
    $asset="";//asset('/');
    $view->with(array('Usuario'=> $Usuario,'Path'=>$path,'Root'=>$root));
});
