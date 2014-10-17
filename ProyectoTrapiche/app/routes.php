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
//    Route::get('marcasdeherradura/', "MarcasDeHerraduraController@Index");
//    Route::get('marcasdeherradura/Index', "MarcasDeHerraduraController@Index");
//    Route::get('marcasdeherradura/Crear', "MarcasDeHerraduraController@Crear");
//    Route::post('marcasdeherradura/Creado', "MarcasDeHerraduraController@Creado");
//    Route::post('marcasdeherradura/Editado/{Id}', "MarcasDeHerraduraController@Editado");
//    Route::get('marcasdeherradura/Editar/{Id}', "MarcasDeHerraduraController@Editar");
//    Route::get('marcasdeherradura/Detalles/{Id}', "MarcasDeHerraduraController@Detalles");
//    Route::get('marcasdeherradura/Eliminar/{Id}', "MarcasDeHerraduraController@Eliminar");
//    Route::post('marcasdeherradura/Eliminado/{Id}', "MarcasDeHerraduraController@Eliminado");
//    
    /* Fin Primer modulo */

    /* Segundo Modulo */
    Route::get('marcasdeherradura/', "MarcasDeHerraduraController@Index");
    Route::get('marcasdeherradura/index', "MarcasDeHerraduraController@Index");
    Route::get('marcasdeherradura/crear', "MarcasDeHerraduraController@Crear");
    Route::post('marcasdeherradura/creado', "MarcasDeHerraduraController@Creado");
    Route::post('marcasdeherradura/editado/{Id}', "MarcasDeHerraduraController@Editado");
    Route::get('marcasdeherradura/editar/{Id}', "MarcasDeHerraduraController@Editar");
    Route::get('marcasdeherradura/detalles/{Id}', "MarcasDeHerraduraController@Detalles");
    Route::get('marcasdeherradura/eliminar/{Id}', "MarcasDeHerraduraController@Eliminar");
    Route::post('marcasdeherradura/eliminado/{Id}', "MarcasDeHerraduraController@Eliminado");
   
    /* Fin Primer modulo */
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
    Route::get('mula/', "MulaController@Index");
    Route::get('mula/index', "MulaController@Index");
    Route::get('mula/crear', "MulaController@Crear");
    Route::post('mula/creado', "MulaController@Creado");
    Route::post('mula/editado/{Id}', "MulaController@Editado");
    Route::get('mula/editar/{Id}', "MulaController@Editar");
    Route::get('mula/detalles/{Id}', "MulaController@Detalles");
    Route::get('mula/eliminar/{Id}', "MulaController@Eliminar");
    Route::post('mula/eliminado/{Id}', "MulaController@Eliminado");
    


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
 
    /*Rutas del los Apronte*/
    Route::get('apronte/', "ApronteController@Index");
    Route::get('apronte/index', "ApronteController@Index");
    Route::get('apronte/crear', "ApronteController@Crear");
    Route::post('apronte/creado', "ApronteController@Creado");
    Route::post('apronte/editado/{Id}', "ApronteController@Editado");
    Route::get('apronte/editar/{Id}', "ApronteController@Editar");
    Route::get('apronte/detalles/{Id}', "ApronteController@Detalles");
    Route::get('apronte/eliminar/{Id}', "ApronteController@Eliminar");
    Route::post('apronte/eliminado/{Id}', "ApronteController@Eliminado");
    
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

});

View::composer('Layaouts.master', function($view) {
    $Usuario = Usuario::find(Auth::user()->GetId());
    $view->with('Menu', $Usuario);
});
