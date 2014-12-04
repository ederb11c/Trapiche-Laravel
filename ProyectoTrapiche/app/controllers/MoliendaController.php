<?php

class MoliendaController extends \BaseController {

    /**
     * Display a listing of cosecheros
     *
     * @return Response
     */
    public function index() {
        $Moliendas = Molienda::all();
        return View::make('Molienda.index', compact('Moliendas'));
    }

    /**
     * Show the form for creating a new Molienda
     *
     * @return Response
     */
    public function Crear() {
        $Datos[] = array();
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["UnidadDeMedida"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', 1)->get());
     
        return View::make('Molienda.Crear')->with("Datos", $Datos);
    }

    public function Creado() {
        $validator = Validator::make($data = Input::all(), Molienda::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Molienda = new Molienda;
        $Molienda->SetComentarios($data["GrnComents"]);
        $Molienda->SetIdTrapiche($data["GrnIdTrapiche"]);
        $Molienda->SetIdUnidadDeMedida($data["GrnIdUnitMeasurement"]);
        $Molienda->SetFechaDeApertura($data["GrnDateLaunch"]);
        $Molienda->SetFechaDeCierre($data["GrnSellByDate"]);
        $Molienda->SetFechaLiquidacion($data["GrnDateLiquidation"]);
        $Molienda->SetPrecioBase($data["GrnFactoryPrice"]);
        $Molienda->SetTotalEnKg(0);
        $Molienda->SetIdEstado(1);
        $Molienda->SetIdEstadoMolienda(1);
        $Molienda->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Molienda->SetFechaUltimaModificacion(date("Y-m-d H:i:s"));
        $Molienda->SetFechaDeRegistro(date("Y-m-d H:i:s"));
        
        $Molienda->save();

        return View::make('molienda/index')->with('Moliendas', Molienda::all());
    }

    /**
     * Store a newly created Molienda in storage.
     *
     * @return Response
     */

    /**
     * Display the specified Molienda.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        
        $Molienda = Molienda::find($id);
        $validator = Validator::make($data = Input::all(), Molienda::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $Molienda->SetComentarios($data["GrnComents"]);
        $Molienda->SetIdTrapiche($data["GrnIdTrapiche"]);
        $Molienda->SetIdUnidadDeMedida($data["GrnIdUnitMeasurement"]);
        $Molienda->SetFechaDeApertura($data["GrnDateLaunch"]);
        $Molienda->SetFechaDeCierre($data["GrnSellByDate"]);
        $Molienda->SetFechaLiquidacion($data["GrnDateLiquidation"]);
        $Molienda->SetPrecioBase($data["GrnFactoryPrice"]);
        $Molienda->SetTotalEnKg($data["GrnTotal"]);
        $Molienda->SetIdEstado($Molienda->GetIdEstado());
        $Molienda->SetIdEstadoMolienda($Molienda->GetIdEstadoMolienda());
        $Molienda->SetFechaUltimaModificacion(date("Y-m-d H:i:s"));
        //$Molienda->GrnDateLastEdition=date("Y-m-d h:m:s");
        $Molienda->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        
        $Molienda->save();

        return View::make('molienda/index')->with('Moliendas', Molienda::all());
    }

    /**
     * Show the form for Editaring the specified Molienda.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Molienda = Molienda::find($id);
     
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["UnidadDeMedida"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', 1)->get());
     
        $Datos["Attr"] = array('disabled');

        return View::make('Molienda.Detalles', compact('Molienda'))->with('Datos', $Datos);
    }

    public function Editar($id) {
        $Molienda = Molienda::find($id);
        
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["UnidadDeMedida"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', 1)->get());
     
        return View::make('Molienda.Editar', compact('Molienda'))->with('Datos', $Datos);
    }

    /**
     * Remove the specified Molienda from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Molienda = Molienda::find($id);
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["UnidadDeMedida"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', 1)->get());
     
        $Datos["Attr"] = array('disabled');

        return View::make('Molienda.Eliminar', compact('Molienda'))->with('Datos', $Datos);
    }

    public function Eliminado($id) {
        $Molienda = Molienda::find($id);
        $Molienda->delete();
        $Moliendas = Molienda::all();
        return View::make('Molienda.index', compact('Moliendas'));
    }

}
