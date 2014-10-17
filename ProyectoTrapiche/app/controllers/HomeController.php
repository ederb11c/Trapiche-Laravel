<?php

class HomeController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function LogIn() {
        // Verificamos que el usuario no esté autenticado
        if (Auth::check()) {
            // Si está autenticado lo mandamos a la raíz donde estara el mensaje de bienvenida.
            return Redirect::to('home/index');
        }
        // Mostramos la vista login.blade.php (Recordemos que .blade.php se omite.)

        return View::make('home/login');
    }

    public function Loged() {
        // Guardamos en un arreglo los datos del usuario.
        // Guardamos en un arreglo los datos del usuario.
        $Input = Input::all();

        $userdata = array(
            'SrLogin' => $Input['username'],
            'password' => ($Input['password'])
        );
//        
//         $userdata = array(
//            'SrLogin' => 'katerinegomez@gmail.com',
//            'password' => '2');
       
        if (Auth::attempt($userdata)) {
            // De ser datos válidos nos mandara a la bienvenida
            return Redirect::to('home/index');
            //return Redirect::intended('dashboard');
        }
        // En caso de que la autenticación haya fallado manda un mensaje al formulario de login y también regresamos los valores enviados con withInput().
        return Redirect::to('login')->with('mensaje_error', 'Tus datos son incorrectos')->withInput();
    }

    public function Index() {
        return View::make('Home/Index');
    }

    public function LogOut() {
        Auth::logout();
        return Redirect::to('login')
                        ->with('mensaje_error', 'Tu sesión ha sido cerrada.');
    }

}
