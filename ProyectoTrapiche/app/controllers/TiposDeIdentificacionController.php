<?php

class TiposDeIdentificacionController extends BaseController {
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
       $TiposDeIdentificaciones = TiposDeIdentificacion::all();
        return View::make('TiposDeIdentificacion/Index')->with('TiposDeIdentificaciones',$TiposDeIdentificaciones);
    }

    public function Crear() {
        
        return View::make('TiposDeIdentificacion/Crear')->with('Estados', $this->GetVectorEstado());
    }

    public function Creado() {
        $TiposDeIdentificacion = new TiposDeIdentificacion;
        $TiposDeIdentificacion->SetNombre(Input::get('Nombre'));
        $TiposDeIdentificacion->SetIdEstado(Input::get('IdEstado'));
        $TiposDeIdentificacion->save();
        return View::make('TiposDeIdentificacion/Index')->with('TiposDeIdentificaciones', TiposDeIdentificacion::all());
    }

    public function Editar($Id) {
        $TiposDeIdentificacion = TiposDeIdentificacion::findOrFail($Id);
        if (($TiposDeIdentificacion['error'] == true)) {
            return View::make('TiposDeIdentificacion/Editar')->withErrors($TiposDeIdentificacion['mensaje'])->withInput();
        } else {
            return View::make('TiposDeIdentificacion/Editar')->with('Estados',$this->GetVectorEstado())->with('TipoDeIdentificacion', $TiposDeIdentificacion);
        }
    }

    public function Editado($Id) {
        $TiposDeIdentificacion = TiposDeIdentificacion::findOrFail($Id);
        if (($TiposDeIdentificacion['error'] == true)) {
            return View::make('TiposDeIdentificacion/Editar/' . $Id);
        } else {
            $TiposDeIdentificacion->SetNombre(Input::get('Nombre'));
            $TiposDeIdentificacion->SetIdEstado(Input::get('IdEstado'));
            $TiposDeIdentificacion->save();
            $TiposDeIdentificaciones = TiposDeIdentificacion::all();
            return View::make('TiposDeIdentificacion/Index')->with('TiposDeIdentificaciones', $TiposDeIdentificaciones);
        }
    }

    public function Eliminar($Id) {
        
        return View::make('TiposDeIdentificacion/Eliminar')->with('TipoDeIdentificacion', TiposDeIdentificacion::find($Id))->with('Estados', $this->GetVectorEstado());
    }

    public function Eliminado($Id) {

        $TiposDeIdentificacion = TiposDeIdentificacion::findOrFail($Id);
        $TiposDeIdentificacion->delete();
        return View::make('TiposDeIdentificacion/Index')->with('TiposDeIdentificaciones', TiposDeIdentificacion::all());
    }

    public function Detalles($Id) {
       
        return View::make('TiposDeIdentificacion/Detalles')->with('TipoDeIdentificacion', TiposDeIdentificacion::find($Id))->with('Estados', $this->GetVectorEstado());
    }

}
