<?php

class PesajesController extends BaseController {
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
        $Pesajes = Pesaje::where('WgnIdState', '=', '1')->get();
        if (count($Pesajes) < 1) {
            $Pesajes[0] = new Pesaje;
        }
        return View::make('Pesaje/Index')->with('Objetos', $Pesajes);
    }

    public function Crear($Id = 3) {

        $Pesaje = new Pesaje;
        if (($Id) == 3) {
            $Mula = new Mula;
            $Datos["Mulas"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', '1')->get());
        } else {
            $Mula = Mula::find($Id);
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        }

        $Datos["Mulas"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', '1')->get());
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
        $Datos["Legends"] = $Pesaje->GetTextos()["Crear"]; //Titulos

        $Datos["Open"] = array("#collapseSix" => "in", ".P" => "panel-primary", ".T" => "panel-primary", '.PC' => 'list-group-item-info');
        $Datos["URL"] = array($Pesaje->GetNombreModeloPlural() => "mulas/herrajes" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"] . "/" . $Pesaje->GetId());

        return View::make('Pesaje/Crear')->with(array('Datos' => $Datos, "Objeto" => $Mula));
    }

    public function Creado() {
        $Pesaje = new Pesaje;
        $Pesaje->SetIdMula(Input::get('WgnIdMuleWeighing'));
        $Pesaje->SetIdUndDeMedida(Input::get("WgnIdUnitMeasurement"));
        $Pesaje->SetPeso(Input::get('WgnWeightWeighing'));

        $Pesaje->SetDescripcion(Input::get("WgnComents"));
        $Pesaje->SetFechaPesaje(date($this->FormatoFecha, strtotime(Input::get('WgnDateWeighing'))));

        $Pesaje->SetIdEstado(1);
        $Pesaje->SetFechaRegistro(date($this->FormatoFecha));
        $Pesaje->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Pesaje->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Pesaje->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Pesaje->save();
        return Redirect::to('pesaje/detalles/' . Pesaje::all()->last()->GetId())->withSuccess($this->Registrado);
    }

    public function Editar($Id) {
        $Pesaje = Pesaje::findOrFail($Id);
        if (($Pesaje['error'] == true)) {
            return View::make('Pesaje/Editar')->withErrors($Pesaje['mensaje'])->withInput();
        } else {

            $Mula = Mula::find($Pesaje->GetIdMula());
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
            $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
            $Datos["Legends"] = $Pesaje->GetTextos()["Editar"]; //Titulos

            $Datos["Open"] = array("#collapseSix" => "in", ".P" => "panel-primary", ".T" => "panel-primary", '.PU' => 'list-group-item-info');
            $Datos["URL"] = array($Pesaje->GetNombreModeloPlural() => "mulas/herrajes" . "/" . $Mula->GetId(),
                $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

            return View::make('Pesaje/Editar')->with(array('PesajeSeleccionado' => $Pesaje, 'Datos' => $Datos, 'Objeto' => $Mula));
        }
    }

    public function Editado($Id) {
        $Pesaje = Pesaje::findOrFail($Id);
        if (($Pesaje['error'] == true)) {
            return View::make('Pesaje/Editar')->withErrors($Pesaje['mensaje'])->withInput();
        } else {

            $Pesaje->SetIdUndDeMedida(Input::get('WgnIdMuleWeighing'));
            $Pesaje->SetIdMula(Input::get('WgnIdMuleWeighing'));
            $Pesaje->SetIdUndDeMedida(Input::get("WgnIdUnitMeasurement"));
            $Pesaje->SetPeso(Input::get('WgnWeightWeighing'));

            $Pesaje->SetDescripcion(Input::get("WgnComents"));
            $Pesaje->SetFechaPesaje(date($this->FormatoFecha, strtotime(Input::get('WgnDateWeighing'))));

            $Pesaje->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Pesaje->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Pesaje->save();
            return Redirect::back()->withSuccess($this->Editado);
        }
    }

    public function Eliminar($Id) {
        $Pesaje = Pesaje::find($Id);
        $Mula = Mula::find($Pesaje->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
        $Datos["Legends"] = $Pesaje->GetTextos()["Eliminar"]; //Titulos
        $Datos["Eliminado"] = $Pesaje->GetTextos()["Eliminado"]; //Titulos

        $Datos["Open"] = array("#collapseSix" => "in", ".P" => "panel-danger", ".T" => "panel-danger", '.PR' => 'list-group-item-danger');
        $Datos["URL"] = array($Pesaje->GetNombreModeloPlural() => "mulas/herrajes" . "/" . $Mula->GetId(),
            $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

        return View::make('Pesaje/Eliminar')->with(array('PesajeSeleccionado' => $Pesaje, 'Datos' => $Datos, 'Objeto' => $Mula));
    }

    public function Eliminado($Id) {
        $Pesaje = Pesaje::findOrFail($Id);
        $Mula = Mula::find($Pesaje->GetIdMula());
        
        $Pesaje->SetIdEstado('0');
        $Pesaje->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Pesaje->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Pesaje->save();
        return Redirect::to('mula/pesajes/'.$Mula->GetId())->withSuccess($this->Eliminado);
        
    }

    public function Detalles($Id) {
        $Pesaje = Pesaje::find($Id);
        $Mula = Mula::find($Pesaje->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
        $Datos["Legends"] = $Pesaje->GetTextos()["Detallar"]; //Titulos

        $Datos["Open"] = array("#collapseSix" => "in", ".P" => "panel-primary", ".T" => "panel-primary", '.PD' => 'list-group-item-info');
        $Datos["URL"] = array($Pesaje->GetNombreModeloPlural() => "mulas/herrajes" . "/" . $Mula->GetId(),
            $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

        return View::make('Pesaje/Detalles')->with(array('PesajeSeleccionado' => $Pesaje, 'Datos' => $Datos, 'Objeto' => $Mula));
    }

}
