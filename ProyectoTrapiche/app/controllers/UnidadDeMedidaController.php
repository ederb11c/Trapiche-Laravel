<?php

class UnidadDeMedidaController extends BaseController {
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
        $UnidadesDeMedida = UnidadDeMedida::all();
        return View::make('UnidadDeMedida/Index')->with('UnidadesDeMedida', $UnidadesDeMedida);
    }

    public function Crear() {
        
        return View::make('UnidadDeMedida/Crear')->with('Estados', $this->GetVectorEstado());
    }

    public function Creado() {
        $UnidadDeMedida = new UnidadDeMedida;
        $UnidadDeMedida->SetNombre(Input::get('Nombre'));
        $UnidadDeMedida->SetIdEstado(Input::get('IdEstado'));
        $UnidadDeMedida->save();
        return View::make('UnidadDeMedida/Index')->with('UnidadesDeMedida', UnidadDeMedida::all());
    }

    public function Editar($Id) {
        $UnidadDeMedida = UnidadDeMedida::findOrFail($Id);
        if (($UnidadDeMedida['error'] == true)) {
            return View::make('UnidadDeMedida/Editar')->withErrors($UnidadDeMedida['mensaje'])->withInput();
        } else {
            return View::make('UnidadDeMedida/Editar')->with('Estados',$this->GetVectorEstado())->with('UnidadDeMedida', $UnidadDeMedida);
        }
    }

    public function Editado($Id) {
        $UnidadDeMedida = UnidadDeMedida::findOrFail($Id);
        if (($UnidadDeMedida['error'] == true)) {
            return View::make('UnidadDeMedida/Editar/' . $Id);
        } else {
            $UnidadDeMedida->SetNombre(Input::get('Nombre'));
            $UnidadDeMedida->SetIdEstado(Input::get('IdEstado'));
            $UnidadDeMedida->save();
            $UnidadesDeMedida = UnidadDeMedida::all();
            return View::make('UnidadDeMedida/Index')->with('UnidadesDeMedida', $UnidadesDeMedida);
        }
    }

    public function Eliminar($Id) {
        
        return View::make('UnidadDeMedida/Eliminar')->with('UnidadDeMedida', UnidadDeMedida::find($Id))->with('Estados', $this->GetVectorEstado());
    }

    public function Eliminado($Id) {

        $UnidadDeMedida = UnidadDeMedida::findOrFail($Id);
        $UnidadDeMedida->delete();
        return View::make('UnidadDeMedida/Index')->with('UnidadesDeMedida', UnidadDeMedida::all());
    }

    public function Detalles($Id) {
       
        return View::make('UnidadDeMedida/Detalles')->with('UnidadDeMedida', UnidadDeMedida::find($Id))->with('Estados', $this->GetVectorEstado());
    }

}
