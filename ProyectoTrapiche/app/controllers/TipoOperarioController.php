<?php

class TipoDeOperarioController extends BaseController {
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
        $TiposDeOperarios = TipoDeOperario::where('WrkStateAlternative ', '=', '1')->get();
        if (count($TiposDeOperarios) < 1) {
            $TiposDeOperarios[0] = new TipoDeOperario;
        }

        return View::make('TipoDeOperario/Index')->with('Objetos', $TiposDeOperarios);
    }

    public function Crear() {
        $TipoDeOperario = new TipoDeOperario;
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState','=','1'));
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState','=','1'));
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());

        return View::make('TipoDeOperario/Crear')->with('Datos', $Datos)->with("Objeto", $TipoDeOperario);
    }

    public function Creado() {
        $TipoDeOperario = new TipoDeOperario;
        $TipoDeOperario->SetIdMarca(Input::get('IrwMrkId'));
        $TipoDeOperario->SetIdMula(Input::get('IrwIdMule'));
        $TipoDeOperario->SetIdTamano(Input::get('IrwIdSize'));
        $TipoDeOperario->SetHerrador(Input::get('IrwFarrier'));
        $TipoDeOperario->SetFechaTipoDeOperario(date($this->FormatoFecha, strtotime(Input::get('IrwDateIronWork'))));

        $TipoDeOperario->SetIdEstado(1);
        $TipoDeOperario->SetFechaRegistro(date($this->FormatoFecha));
        $TipoDeOperario->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $TipoDeOperario->SetIdUsuarioRegistro(Auth::user()->GetId());
        $TipoDeOperario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $TipoDeOperario->save();
        return View::make('TipoDeOperario/Index')->with('Objeto', TipoDeOperario::where('LlnIdstate', '=', '1')->get());
    }

    public function Editar($Id) {
        $TipoDeOperario = TipoDeOperario::findOrFail($Id);
        if (($TipoDeOperario['error'] == true)) {
            return View::make('TipoDeOperario/Editar')->withErrors($TipoDeOperario['mensaje'])->withInput();
        } else {


        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState','=','1'));
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState','=','1'));
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());

            return View::make('TipoDeOperario/Editar')->with('Objeto', $TipoDeOperario)->with('Datos', $Datos);
        }
    }

    public function Editado($Id) {
        $TipoDeOperario = TipoDeOperario::findOrFail($Id);
        if (($TipoDeOperario['error'] == true)) {
            return View::make('TipoDeOperario/Editar')->withErrors($TipoDeOperario['mensaje'])->withInput();
        } else {

            $TipoDeOperario->SetIdMarca(Input::get('IrwMrkId'));
            $TipoDeOperario->SetIdMula(Input::get('IrwIdMule'));
            $TipoDeOperario->SetIdTamano(Input::get('IrwIdSize'));
            $TipoDeOperario->SetHerrador(Input::get('IrwFarrier'));

            $TipoDeOperario->SetFechaTipoDeOperario(date($this->FormatoFecha, strtotime(Input::get('IrwDateIronWork'))));
            $TipoDeOperario->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $TipoDeOperario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $TipoDeOperario->save();
            return View::make('TipoDeOperario/Index')->with('Objetos', TipoDeOperario::where('WrkStateAlternative ', '=', '1')->get());
        }
    }

    public function Eliminar($Id) {

        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState','=','1'));
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState','=','1'));
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());

        return View::make('TipoDeOperario/Eliminar')->with('Objeto', TipoDeOperario::find($Id))->with('Datos', $Datos);
    }

    public function Eliminado($Id) {
        $TipoDeOperario = TipoDeOperario::findOrFail($Id);
        $TipoDeOperario->SetIdEstado('0');
        $TipoDeOperario->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $TipoDeOperario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $TipoDeOperario->save();
        return View::make('TipoDeOperario/Index')->with('Objetos', TipoDeOperario::where('WrkStateAlternative ', '=', '1')->get());
    }

    public function Detalles($Id) {

        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::where('SxIdState','=','1'));
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState','=','1'));
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());

        return View::make('TipoDeOperario/Detalles')->with('Objeto', TipoDeOperario::find($Id))->with('Datos', $Datos);
    }

}
