<?php

class MulaController extends BaseController {
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
        $Mulas = Mula::all();
        //$Mulas=Mula::where();
        return View::make('Mula/Index')->with('Mulas', $Mulas);
    }

    public function Crear() {
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        return View::make('Mula/Crear')->with('Datos', $Datos);
    }

    public function Creado() {
        $Mula = new Mula;
        $Mula->SetNombre(Input::get('MlName'));
        $Mula->SetDescripcion(Input::get('MlDescription'));
        $Mula->SetEspecie(Input::get('MlSpecie'));
        $Mula->SetIdSexo(Input::get("MlIdSex"));
        $Mula->SetIdEstado(Input::get('MlIdState'));
        $Mula->SetFechaRegistro(date($this->FormatoFecha));
        $Mula->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Mula->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Mula->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            
        $Mula->save();
        return View::make('Mula/Index')->with('Mulas', Mula::all());
    }

    public function Editar($Id) {
        $Mula = Mula::findOrFail($Id);
        if (($Mula['error'] == true)) {
            return View::make('Mula/Editar')->withErrors($Mula['mensaje'])->withInput();
        } else {
            $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
            $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
            
            return View::make('Mula/Editar')->with('Mula',$Mula)->with('Datos', $Datos);
        }
    }

    public function Editado($Id) {
        $Mula = Mula::findOrFail($Id);
        if (($Mula['error'] == true)) {
            return View::make('Mula/Editar/' . $Id);
        } else {
            $Mula->SetNombre(Input::get('MlName'));
            $Mula->SetDescripcion(Input::get('MlDescription'));
            $Mula->SetEspecie(Input::get('MlSpecie'));
            $Mula->SetIdSexo(Input::get("MlIdSex"));
            $Mula->SetIdEstado(Input::get('MlIdState'));

            $Mula->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Mula->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Mula->save();
            return View::make('Mula/Index')->with('Mulas', Mula::all());
        }
    }

    public function Eliminar($Id) {
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());

        return View::make('Mula/Eliminar')->with('Mula', Mula::find($Id))->with('Datos', $Datos);
        ;
    }

    public function Eliminado($Id) {

        $Mula = Mula::findOrFail($Id);
        $Mula->delete();
        return View::make('Mula/Index')->with('Mulas', Mula::all());
    }

    public function Detalles($Id) {
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        return View::make('Mula/Detalles')->with('Mula', Mula::find($Id))->with('Datos', $Datos);
    }

}
