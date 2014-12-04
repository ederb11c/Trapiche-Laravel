<?php

class RolController extends BaseController {
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

    public function Index() {
        $Roles = Rol::all();
        //$Roles=Rol::where();
        return View::make('Rol/Index')->with('Roles', $Roles);
    }

    public function Crear() {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return View::make('Rol/Crear')->with('Estados', $Estados);
    }

    public function Creado() {
        $Rol = new Rol;
        $Rol->SetNombre(Input::get('Nombre'));
        $Rol->SetDescripcion(Input::get('Descripcion'));
        $Rol->SetIdEstado(Input::get('IdEstado'));
        $Rol->save();
        return View::make('Rol/Index')->with('Roles', Rol::all());
    }

    public function Editar($Id) {
        $Rol = Rol::findOrFail($Id);
        if (($Rol['error'] == true)) {
            return View::make('Rol/Editar')->withErrors($Rol['mensaje'])->withInput();
        } else {
            $Estados = array();
            foreach (Estado::all() as $Value) {
                $Estados[$Value["StId"]] = $Value["StNameState"];
            }
            return View::make('Rol/Editar')->with('Estados', $Estados)->with('Rol', $Rol);
        }
    }

    public function Editado($Id) {
        $Rol = Rol::findOrFail($Id);
        if (($Rol['error'] == true)) {
            return View::make('Rol/Editar/' . $Id);
        } else {
            $Rol->SetNombre(Input::get('Nombre'));
            $Rol->SetDescripcion(Input::get('Descripcion'));
            $Rol->SetIdEstado(Input::get('IdEstado'));
            $Rol->save();
            $Roles = Rol::all();
            return View::make('Rol/Index')->with('Roles', $Roles);
        }
    }

    public function Eliminar($Id) {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return View::make('Rol/Eliminar')->with('Rol', Rol::find($Id))->with('Estados', $Estados);
    }

    public function Eliminado($Id) {

        $Rol = Rol::findOrFail($Id);
        $Rol->delete();
        return View::make('Rol/Index')->with('Roles', Rol::all());
    }

    public function Detalles($Id) {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return View::make('Rol/Detalles')->with('Rol', Rol::find($Id))->with('Estados', $Estados);
    }

}
