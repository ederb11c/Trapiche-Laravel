<?php

class EstadoController extends BaseController {
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
        $Estados = Estado::all();
        return View::make('Estado/Index')->with('Estados', $Estados);
        //->;
    }

    public function Crear() {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return View::make('Estado/Crear')->with('Estados', $Estados);
    }

    public function Creado() {

        $Estado = new Estado;
        $Estado->SetIdEstado(Input::get('IdEstado'));
        $Estado->SetDescripcion(Input::get('Descripcion'));
        $Estado->SetNombre(Input::get('Nombre'));
        $Estado->save();
        return View::make('Estado/Index')->with('Estados', Estado::all());
    }

    public function Editar($Id) {
        $Estado = Estado::findOrFail($Id);
        
        if (($Estado['error'] == true)) {
            return View::make('Estado/Editar')->withErrors($respuesta['mensaje'])->withInput();
        } else {
            $Estados = array();
            foreach (Estado::all() as $Value) {
                $Estados[$Value["StId"]] = $Value["StNameState"];
            }
            return View::make('Estado/Editar')->with('Estados', $Estados)->with('Estado', $Estado);
        }
    }

    public function Editado($Id) {
        $Estado = Estado::findOrFail($Id);
        if (($Estado['error'] == true)) {
            return View::make('Estado/Editar/' . $Id);
        } else {

            $Estado->SetIdEstado(Input::get('IdEstado'));
            $Estado->SetDescripcion(Input::get('Descripcion'));
            $Estado->SetNombre(Input::get('Nombre'));
            $Estado->save();
            $Estados = Estado::all();
            return View::make('Estado/Index')->with('Estados', $Estados);
        }
    }

    public function Eliminar($Id) {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return View::make('Estado/Eliminar')->with('Estado', Estado::find($Id))->with('Estados', $Estados);
    }

    public function Eliminado($Id) {

        $Estado = Estado::findOrFail($Id);
        $Estado->delete();
         return View::make('Estado/Index')->with('Estados', Estado::all());
    }

    public function Detalles($Id) {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return View::make('Estado/Detalles')->with('Estado', Estado::find($Id))->with('Estados', $Estados);
    }

}
