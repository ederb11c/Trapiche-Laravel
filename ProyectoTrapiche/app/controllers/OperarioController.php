<?php

class OperarioController extends BaseController {
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
        $Operarios = Operario::where('WrkStateAlternative', '=', '1')->get();
        if (count($Operarios) < 1) {
            $Operarios[0] = new Operario;
        }

        return View::make('Operario/Index')->with('Objetos', $Operarios);
    }

    public function Crear() {
        $Operario = new Operario;

        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState', '=', 1)->get());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', 1)->get());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["TiposDeOperarios"] = $this->GetVectorForSelect(TiposDeOperario::where('TwkrIdStateTypeWorker', '=', 1)->get());

        return View::make('Operario/Crear')->with('Datos', $Datos)->with("Objeto", $Operario);
    }

    public function Creado() {
        $Operario = new Operario;
        $Operario->SetNombre(Input::get('WkrName'));
        $Operario->SetPApellido(Input::get('WkrFirstName'));
        $Operario->SetSApellido(Input::get('WkrLastName'));
        $Operario->SetIdTipoId(Input::get('WkrIdTypeId'));
        $Operario->SetNumeroId(Input::get('WkrNumberId'));
        $Operario->SetEmail(Input::get('WkrEmail'));
        $Operario->SetFechaNacimiento(Input::get('WkrDateOfBirth'));
        $Operario->SetIdTipoOperario(Input::get('WkrIdTypeId'));
        $Operario->SetIdSexo(Input::get('WrkIdSex'));
        $Operario->SetIdTrapiche(Input::get('WkrIdTrapiche'));
        $Operario->SetIdEstado(Input::get('WkrIdState'));


        $Operario->SetIdEstadoAux(1);
        $Operario->SetFechaRegistro(date($this->FormatoFecha));
        $Operario->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Operario->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Operario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Operario->save();

        return View::make('Operario/Index')->with('Objeto', Operario::where('WrkStateAlternative', '=', '1')->get());
    }

    public function Editar($Id) {
        $Operario = Operario::findOrFail($Id);
        if (($Operario['error'] == true)) {
            return View::make('Operario/Editar')->withErrors($Operario['mensaje'])->withInput();
        } else {

            $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
            $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState', '=', 1)->get());
            $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', 1)->get());
            $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
            $Datos["TiposDeOperarios"] = $this->GetVectorForSelect(TiposDeOperario::where('TwkrIdStateTypeWorker', '=', 1)->get());
            return View::make('Operario/Editar')->with('Objeto', $Operario)->with('Datos', $Datos);
        }
    }

    public function Editado($Id) {
        $Operario = Operario::findOrFail($Id);
        if (($Operario['error'] == true)) {
            return View::make('Operario/Editar')->withErrors($Operario['mensaje'])->withInput();
        } else {

            $Operario->SetNombre(Input::get('WkrName'));
            $Operario->SetPApellido(Input::get('WkrFirstName'));
            $Operario->SetSApellido(Input::get('WkrLastName'));
            $Operario->SetIdTipoId(Input::get('WkrIdTypeId'));
            $Operario->SetNumeroId(Input::get('WkrNumberId'));
            $Operario->SetEmail(Input::get('WkrEmail'));
            $Operario->SetFechaNacimiento(Input::get('WkrDateOfBirth'));
            $Operario->SetIdTipoOperario(Input::get('WkrIdTypeId'));
            $Operario->SetIdSexo(Input::get('WrkIdSex'));
            $Operario->SetIdTrapiche(Input::get('WkrIdTrapiche'));
            $Operario->SetIdEstado(Input::get('WkrIdState'));


            $Operario->SetIdEstado(1);
            $Operario->SetFechaRegistro(date($this->FormatoFecha));
            $Operario->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Operario->SetIdUsuarioRegistro(Auth::user()->GetId());
            $Operario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

            $Operario->save();
            return View::make('Operario/Index')->with('Objetos', Operario::where('WrkStateAlternative ', '=', '1')->get());
        }
    }

    public function Eliminar($Id) {

        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState', '=', 1)->get());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', 1)->get());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["TiposDeOperarios"] = $this->GetVectorForSelect(TiposDeOperario::where('TwkrIdStateTypeWorker', '=', 1)->get());
        return View::make('Operario/Eliminar')->with('Objeto', Operario::find($Id))->with('Datos', $Datos);
    }

    public function Eliminado($Id) {
        $Operario = Operario::findOrFail($Id);
        $Operario->SetIdEstadoAux(0);
        $Operario->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Operario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Operario->save();
        return View::make('Operario/Index')->with('Objetos', Operario::where('WrkStateAlternative ', '=', '1')->get());
    }

    public function Detalles($Id) {


        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["TiposDeOperarios"] = $this->GetVectorForSelect(TiposDeOperario::where('TwkrIdStateTypeWorker', '=', 1)->get());
            
        return View::make('Operario/Detalles')->with('Objeto', Operario::find($Id))->with('Datos', $Datos);
    }

}
