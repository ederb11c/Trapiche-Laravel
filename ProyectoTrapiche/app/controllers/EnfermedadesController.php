<?php

class EnfermedadesController extends BaseController {
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
        $Enfermedades = Enfermedad::where('LlnIdState', '=', '1')->get();
        if (count($Enfermedades) < 1) {
            $Enfermedades[0] = new Enfermedad;
        }
        return View::make('Enfermedad/Index')->with('Objetos', $Enfermedades);
    }

    public function Crear($Id = null) {
        $Enfermedad = new Enfermedad;

        if (is_null($Id)) {
            $Mula = new Mula;
            $Datos["Mulas"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', '1')->get());
        } else {
            $Mula = Mula::find($Id);
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        }
        $Datos["Legends"] = $Enfermedad->GetTextos()["Create"]; //Titulos           
        $Datos["Open"] = array("#collapseFour" => "in", ".E" => "panel-primary", ".T" => "panel-primary", '.EC' => 'list-group-item-info');
        $Datos["URL"] = array("Enfermedades" => "mula/enfermedades" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => "enfermedad/crear" . "/" . $Mula->GetId());

        return View::make('Enfermedad/Crear')->with(array('Datos' => $Datos, 'Objeto' => $Mula));
    }

    public function Creado() {
        $Enfermedad = new Enfermedad;
        $Enfermedad->SetTratamiento(Input::get('LlnTreatment'));
        $Enfermedad->SetDescripcion(Input::get('LlnComents'));
        $Enfermedad->SetIdMula(Input::get('LlnIdMule'));

        $Enfermedad->SetFechaEnfermedad(date($this->FormatoFecha, strtotime(Input::get('LlnDateIllenes'))));

        $Enfermedad->SetIdEstado(1);
        $Enfermedad->SetFechaRegistro(date($this->FormatoFecha));
        $Enfermedad->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Enfermedad->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Enfermedad->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Enfermedad->save();
       
        return Redirect::to('enfermedad/detalles/' . Enfermedad::all()->last()->GetId())->withSucess($this->Registrado);
    }

    public function Editar($Id) {
        $Enfermedad = Enfermedad::findOrFail($Id);
        if (($Enfermedad['error'] == true)) {
            return View::make('Enfermedad/Editar')->withErrors($Enfermedad['mensaje'])->withInput();
        } else {
            $Mula=  Mula::find($Enfermedad->GetIdMula());
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
            $Datos["Legends"] = $Enfermedad->GetTextos()["Editar"]; //Titulos           
            $Datos["Open"] = array("#collapseFour" => "in", ".E" => "panel-primary", ".T" => "panel-primary", '.EU' => 'list-group-item-info');
            $Datos["URL"] = array($Enfermedad->GetNombreModeloPlural() => "mula/enfermedades" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

            return View::make('Enfermedad/Editar')->with(array('Objeto'=>$Mula,'Datos'=> $Datos,"EnfermedadSeleccionada"=>$Enfermedad));
        }
    }

    public function Editado($Id) {
        $Enfermedad = Enfermedad::findOrFail($Id);
        if (($Enfermedad['error'] == true)) {
            return View::make('Enfermedad/Editar')->withErrors($Enfermedad['mensaje'])->withInput();
        } else {

            $Enfermedad->SetTratamiento(Input::get('LlnTreatment'));
            $Enfermedad->SetDescripcion(Input::get('LlnComents'));
            $Enfermedad->SetIdMula(Input::get('LlnIdMule'));

            $Enfermedad->SetFechaEnfermedad(date($this->FormatoFecha, strtotime(Input::get('LlnDateIllenes'))));
            $Enfermedad->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Enfermedad->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Enfermedad->save();
            return Redirect::back()->withSuccess($this->Editado);
        }
    }

    public function Eliminar($Id) {
        $Enfermedad = Enfermedad::find($Id);
        $Mula = Mula::find($Enfermedad->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));

        $Datos["Legends"] = $Enfermedad->GetTextos()["Eliminar"]; //Titulos           
        $Datos["Open"] = array("#collapseFour" => "in", ".E" => "panel-danger", ".T" => "panel-danger", '.ER' => 'list-group-item-danger');
        $Datos["URL"] = array($Enfermedad->GetNombreModeloPlural() => "mula/enfermedades" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] =>  $Datos["Legends"]["NAMEURL"]);

        return View::make('Enfermedad/Eliminar')->with(array('Objeto' => $Mula, 'Datos' => $Datos, 'EnfermedadSeleccionada' => $Enfermedad));
    }

    public function Eliminado($Id) {

        $Enfermedad = Enfermedad::findOrFail($Id);
        $Enfermedad->SetIdEstado('0');
        $Enfermedad->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Enfermedad->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Enfermedad->save();
        return Redirect::to('mula/enfermedades/' . $Enfermedad->GetIdMula())->withSuccess($this->Eliminado);
    }

    public function Detalles($Id) {
        $Enfermedad = Enfermedad::find($Id);
        $Mula = Mula::find($Enfermedad->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));

        $Datos["Legends"] = $Enfermedad->GetTextos()["Detallar"]; //Titulos           
        $Datos["Open"] = array("#collapseFour" => "in", ".E" => "panel-primary", ".T" => "panel-primary", '.EE' => 'list-group-item-info');
        $Datos["URL"] = array($Enfermedad->GetNombreModeloPlural() => "mula/enfermedades" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] =>  $Datos["Legends"]["NAMEURL"]);

        return View::make('Enfermedad/Detalles')->with(array('Objeto' => $Mula, 'Datos' => $Datos, 'EnfermedadSeleccionada' => $Enfermedad));
    }

}
