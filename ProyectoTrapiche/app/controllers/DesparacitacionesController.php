<?php

class DesparacitacionesController extends BaseController {
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
        $Desparacitaciones = Desparacitacion::where('DwrIdState', '=', '1')->get();
        if (count($Desparacitaciones) < 1) {
            $Desparacitaciones[0] = new Desparacitacion;
        }
        return View::make('Desparacitacion/Index')->with('Objetos', $Desparacitaciones);
    }

    public function Crear($Id = null) {
        $Desparacitacion = new Desparacitacion;

        if (is_null($Id)) {
            $Mula = new Mula;
            $Datos["Mulas"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', '1')->get());
        } else {
            $Mula = Mula::find($Id);
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        }


        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());

        $Datos["Legends"] = $Desparacitacion->GetTextos()["Create"]; //Titulos

        $Datos["Open"] = array("#collapseFive" => "in", ".D" => "panel-primary", ".T" => "panel-primary", '.DC' => 'list-group-item-info');
        $Datos["URL"] = array($Desparacitacion->GetNombreModeloPlural() => "mula/enfermedades" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => $Datos["Legends"]["Legend"] . "/" . $Desparacitacion->GetId());

        return View::make('Desparacitacion/Crear')->with('Datos', $Datos)->with("Objeto", $Mula);
    }

    public function Creado() {
        $Desparacitacion = new Desparacitacion;

        $Desparacitacion->SetIdMula(Input::get('DwrIdMule'));
        $Desparacitacion->SetIdUndDeMedida(Input::get("DwrIdUntMeasurement"));
        $Desparacitacion->SetIdVia(Input::get('DwrIdPrep'));
        $Desparacitacion->SetProducto(Input::get('DwrProduct'));
        $Desparacitacion->SetCantidad(Input::get('DwrQuantity'));
        $Desparacitacion->SetDescripcion(Input::get('DwrComents'));
        $Desparacitacion->SetFechaDesparacitacion(date($this->FormatoFecha, strtotime(Input::get('DwrAplicationDate'))));

        $Desparacitacion->SetIdEstado(1);
        $Desparacitacion->SetFechaRegistro(date($this->FormatoFecha));
        $Desparacitacion->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Desparacitacion->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Desparacitacion->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Desparacitacion->save();

        return Redirect::to('desparacitacion/detalles/' . Desparacitacion::all()->last()->GetId())->withSuccess($this->Registrado);
    }

    public function Editar($Id) {
        $Desparacitacion = Desparacitacion::findOrFail($Id);
        if (($Desparacitacion['error'] == true)) {
            return View::make('Desparacitacion/Editar')->withErrors($Desparacitacion['mensaje'])->withInput();
        } else {
            $Mula = Mula::find($Desparacitacion->GetIdMula());
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
            $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
            $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
            $Datos["Legends"] = $Desparacitacion->GetTextos()["Editar"]; //Titulos
            $Datos["Open"] = array("#collapseFive" => "in", ".D" => "panel-info", ".T" => "panel-info", '.DU' => 'list-group-item-info');
            $Datos["URL"] = array($Desparacitacion->GetNombreModeloPlural() => "mula/desparacitaciones" . "/" . $Mula->GetId(),
                $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

            return View::make('Desparacitacion/Editar')->with(array('DesparacitacionSeleccionada' => $Desparacitacion, 'Datos' => $Datos, 'Objeto' => $Mula));
        }
    }

    public function Editado($Id) {
        $Desparacitacion = Desparacitacion::findOrFail($Id);
        if (($Desparacitacion['error'] == true)) {
            return View::make('Desparacitacion/Editar')->withErrors($Desparacitacion['mensaje'])->withInput();
        } else {

            $Desparacitacion->SetIdMula(Input::get('DwrIdMule'));
            $Desparacitacion->SetIdUndDeMedida(Input::get("DwrIdUntMeasurement"));
            $Desparacitacion->SetIdVia(Input::get('DwrIdPrep'));
            $Desparacitacion->SetProducto(Input::get('DwrProduct'));
            $Desparacitacion->SetCantidad(Input::get('DwrQuantity'));
            $Desparacitacion->SetDescripcion(Input::get('DwrComents'));
            $Desparacitacion->SetFechaDesparacitacion(date($this->FormatoFecha, strtotime(Input::get('DwrAplicationDate'))));

            $Desparacitacion->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Desparacitacion->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Desparacitacion->save();
            return Redirect::back()->withSuccess($this->Editado);
        }
    }

    public function Eliminar($Id) {
        $Desparacitacion = Desparacitacion::find($Id);
        $Mula = Mula::find($Desparacitacion->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
        $Datos["Legends"] = $Desparacitacion->GetTextos()["Eliminar"];
        $Datos["Eliminado"] = $Desparacitacion->GetTextos()["Eliminado"];

        $Datos["Open"] = array("#collapseFive" => "in", ".D" => "panel-danger", ".T" => "panel-danger", '.DR' => 'list-group-item-danger');
        $Datos["URL"] = array($Desparacitacion->GetNombreModeloPlural() => "mula/desparacitaciones" . "/" . $Mula->GetId(),
            $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);


        return View::make('Desparacitacion/Eliminar')->with(array('Objeto' => $Mula, 'Datos' => $Datos, "DesparacitacionSeleccionada" => $Desparacitacion));
    }

    public function Eliminado($Id) {
        $Desparacitacion = Desparacitacion::findOrFail($Id);
        $Desparacitacion->SetIdEstado('0');
        $Desparacitacion->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Desparacitacion->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Desparacitacion->save();
        return Redirect::to('mula/desparacitaciones/' . $Desparacitacion->GetIdMula())->withSuccess($this->Eliminado);
    }

    public function Detalles($Id) {
        $Desparacitacion = Desparacitacion::find($Id);
        $Mula = Mula::find($Desparacitacion->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());
        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
        $Datos["Legends"] = $Desparacitacion->GetTextos()["Detallar"];
        $Datos["Open"] = array("#collapseFive" => "in", ".D" => "panel-primary", ".T" => "panel-primary", '.DD' => 'list-group-item-info');
        $Datos["URL"] = array($Desparacitacion->GetNombreModeloPlural() => "mula/desparacitaciones" . "/" . $Mula->GetId(),
        $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);
        return View::make('Desparacitacion/Detalles')->with(array('Objeto' => $Mula, 'Datos' => $Datos, "DesparacitacionSeleccionada" => $Desparacitacion));
    }

}
