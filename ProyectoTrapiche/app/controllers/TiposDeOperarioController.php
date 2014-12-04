<?php

class TiposDeOperarioController extends BaseController {
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
       $TiposDeOperarios = TiposDeOperario::all();
        return View::make('TiposDeOperario/Index')->with('TiposDeOperarios',$TiposDeOperarios);
    }

    public function Crear() {
        
        return View::make('TiposDeOperario/Crear')->with('Estados', $this->GetVectorEstado());
    }

    public function Creado() {
        $TiposDeOperario = new TiposDeOperario;
        $TiposDeOperario->SetNombre(Input::get('Nombre'));
        $TiposDeOperario->SetIdEstado(Input::get('IdEstado'));
        $TiposDeOperario->save();
        return View::make('TiposDeOperario/Index')->with('TiposDeOperarios', TiposDeOperario::all());
    }

    public function Editar($Id) {
        $TiposDeOperario = TiposDeOperario::findOrFail($Id);
        if (($TiposDeOperario['error'] == true)) {
            return View::make('TiposDeOperario/Editar')->withErrors($TiposDeOperario['mensaje'])->withInput();
        } else {
            return View::make('TiposDeOperario/Editar')->with('Estados',$this->GetVectorEstado())->with('TipoDeIdentificacion', $TiposDeOperario);
        }
    }

    public function Editado($Id) {
        $TiposDeOperario = TiposDeOperario::findOrFail($Id);
        if (($TiposDeOperario['error'] == true)) {
            return View::make('TiposDeOperario/Editar/' . $Id);
        } else {
            $TiposDeOperario->SetNombre(Input::get('Nombre'));
            $TiposDeOperario->SetIdEstado(Input::get('IdEstado'));
            $TiposDeOperario->save();
            $TiposDeOperarios = TiposDeOperario::all();
            return View::make('TiposDeOperario/Index')->with('TiposDeOperarios', $TiposDeOperarios);
        }
    }

    public function Eliminar($Id) {
        
        return View::make('TiposDeOperario/Eliminar')->with('TipoDeIdentificacion', TiposDeOperario::find($Id))->with('Estados', $this->GetVectorEstado());
    }

    public function Eliminado($Id) {

        $TiposDeOperario = TiposDeOperario::findOrFail($Id);
        $TiposDeOperario->delete();
        return View::make('TiposDeOperario/Index')->with('TiposDeOperarios', TiposDeOperario::all());
    }

    public function Detalles($Id) {
       
        return View::make('TiposDeOperario/Detalles')->with('TipoDeIdentificacion', TiposDeOperario::find($Id))->with('Estados', $this->GetVectorEstado());
    }

}
