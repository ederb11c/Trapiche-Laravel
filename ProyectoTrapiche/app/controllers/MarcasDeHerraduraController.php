<?php

class MarcasDeHerraduraController extends BaseController {
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
        $MarcasDeHerraduras = MarcasDeHerradura::all();
        return View::make('MarcasDeHerradura/Index')->with('MarcasDeHerraduras', $MarcasDeHerraduras);
    }

    public function Crear() {

        return View::make('MarcasDeHerradura/Crear')->with('Estados', $this->GetVectorEstado());
    }

    public function Creado() {
        $MarcasDeHerradura = new MarcasDeHerradura;
        $MarcasDeHerradura->SetNombre(Input::get('Nombre'));
        $MarcasDeHerradura->SetIdEstado(Input::get('IdEstado'));
        $MarcasDeHerradura->save();
        return View::make('MarcasDeHerradura/Index')->with('MarcasDeHerraduras', MarcasDeHerradura::all());
    }

    public function Editar($Id) {
        $MarcasDeHerradura = MarcasDeHerradura::findOrFail($Id);
        if (($MarcasDeHerradura['error'] == true)) {
            return View::make('MarcasDeHerradura/Editar')->withErrors($MarcasDeHerradura['mensaje'])->withInput();
        } else {
            return View::make('MarcasDeHerradura/Editar')->with('Estados', $this->GetVectorEstado())->with('MarcasDeHerradura', $MarcasDeHerradura);
        }
    }

    public function Editado($Id) {
        $MarcasDeHerradura = MarcasDeHerradura::findOrFail($Id);
        if (($MarcasDeHerradura['error'] == true)) {
            return View::make('MarcasDeHerradura/Editar/' . $Id);
        } else {
            $MarcasDeHerradura->SetNombre(Input::get('Nombre'));
            $MarcasDeHerradura->SetIdEstado(Input::get('IdEstado'));
            $MarcasDeHerradura->save();
            $MarcasDeHerraduras = MarcasDeHerradura::all();
            return View::make('MarcasDeHerradura/Index')->with('MarcasDeHerraduras', $MarcasDeHerraduras);
        }
    }

    public function Eliminar($Id) {

        return View::make('MarcasDeHerradura/Eliminar')->with('MarcasDeHerradura', MarcasDeHerradura::find($Id))->with('Estados', $this->GetVectorEstado());
    }

    public function Eliminado($Id) {

        $MarcasDeHerradura = MarcasDeHerradura::findOrFail($Id);
        $MarcasDeHerradura->delete();
        return View::make('MarcasDeHerradura/Index')->with('MarcasDeHerraduras', MarcasDeHerradura::all());
    }

    public function Detalles($Id) {

        return View::make('MarcasDeHerradura/Detalles')->with('MarcasDeHerradura', MarcasDeHerradura::find($Id))->with('Estados', $this->GetVectorEstado());
    }

}
