<?php

class MoliendaVsOperarioController extends BaseController {
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
        $MoliendasVsOperarios = MoliendaVsOperario::where('GndwIdState ', '=', '1')->get();
        if (count($MoliendasVsOperarios) < 1) {
            $MoliendasVsOperarios[0] = new MoliendaVsOperario;
        }

        return View::make('MoliendaVsOperario/Index')->with('Objetos', $MoliendasVsOperarios);
    }

    public function Crear() {
        $MoliendaVsOperario = new MoliendaVsOperario;
        $Datos["Operarios"] = $this->GetVectorForSelect(Operario::where('WkrIdState', '=', '1')->get());
        $Datos["Moliendas"] = $this->GetVectorForSelect(Molienda::where('GrnIdState', '=', '1')->get());

        return View::make('MoliendaVsOperario/Crear')->with('Datos', $Datos)->with("Objeto", $MoliendaVsOperario);
    }

    public function Creado() {
        $MoliendaVsOperario = new MoliendaVsOperario;
        $MoliendaVsOperario->SetIdOperario(Input::get('GndwIdWorker'));
        $MoliendaVsOperario->SetIdMolienda(Input::get('GndwIdGrinding'));

        $MoliendaVsOperario->SetIdEstado(1);
        $MoliendaVsOperario->SetFechaRegistro(date($this->FormatoFecha));
        $MoliendaVsOperario->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $MoliendaVsOperario->SetIdUsuarioRegistro(Auth::user()->GetId());
        $MoliendaVsOperario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $MoliendaVsOperario->save();
        return View::make('MoliendaVsOperario/Index')->with('Objetos', MoliendaVsOperario::where('GndwIdState', '=', '1')->get());
    }

    public function Editar($Id) {
        $MoliendaVsOperario = MoliendaVsOperario::findOrFail($Id);
        if (($MoliendaVsOperario['error'] == true)) {
            return View::make('MoliendaVsOperario/Editar')->withErrors($MoliendaVsOperario['mensaje'])->withInput();
        } else {


            $Datos["Operarios"] = $this->GetVectorForSelect(Operario::where('WkrIdState', '=', '1')->get());
            $Datos["Moliendas"] = $this->GetVectorForSelect(Molienda::where('GrnIdState', '=', '1')->get());
            return View::make('MoliendaVsOperario/Editar')->with('Objeto', $MoliendaVsOperario)->with('Datos', $Datos);
        }
    }

    public function Editado($Id) {
        $MoliendaVsOperario = MoliendaVsOperario::findOrFail($Id);
        if (($MoliendaVsOperario['error'] == true)) {
            return View::make('MoliendaVsOperario/Editar')->withErrors($MoliendaVsOperario['mensaje'])->withInput();
        } else {

            $MoliendaVsOperario->SetIdOperario(Input::get('GndwIdWorker'));
            $MoliendaVsOperario->SetIdMolienda(Input::get('GndwIdGrinding'));

            $MoliendaVsOperario->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $MoliendaVsOperario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $MoliendaVsOperario->save();
            return View::make('MoliendaVsOperario/Index')->with('Objetos', MoliendaVsOperario::where('GndwIdState ', '=', '1')->get());
        }
    }

    public function Eliminar($Id) {

        $Datos["Operarios"] = $this->GetVectorForSelect(Operario::where('WkrIdState', '=', '1')->get());
        $Datos["Moliendas"] = $this->GetVectorForSelect(Molienda::where('GrnIdState', '=', '1')->get());
        return View::make('MoliendaVsOperario/Eliminar')->with('Objeto', MoliendaVsOperario::find($Id))->with('Datos', $Datos);
    }

    public function Eliminado($Id) {
        $MoliendaVsOperario = MoliendaVsOperario::findOrFail($Id);
        $MoliendaVsOperario->SetIdEstado('0');
        $MoliendaVsOperario->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $MoliendaVsOperario->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $MoliendaVsOperario->save();
        return View::make('MoliendaVsOperario/Index')->with('Objetos', MoliendaVsOperario::where('GndwIdState ', '=', '1')->get());
    }

    public function Detalles($Id) {

        $Datos["Operarios"] = $this->GetVectorForSelect(Operario::where('WkrIdState', '=', '1')->get());
        $Datos["Moliendas"] = $this->GetVectorForSelect(Molienda::where('GrnIdState', '=', '1')->get());
        return View::make('MoliendaVsOperario/Detalles')->with('Objeto', MoliendaVsOperario::find($Id))->with('Datos', $Datos);
    }

}
