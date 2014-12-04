<?php

class SembradoController extends \BaseController {

    /**
     * Display a listing of cosecheros
     *
     * @return Response
     */
    public function index() {
        $Sembrados = Sembrado::all();
            return View::make('Sembrado.index', compact('Sembrados'));
    }

    /**
     * Show the form for creating a new cosechero
     *
     * @return Response
     */
    public function Crear() {
        $Datos[] = array();
        $Datos["Cosecheros"] = $this->GetVectorForSelect(Cosechero::where('HrvIdState', '=', 1)->get());
        //$Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        return View::make('Sembrado.Crear')->with("Datos", $Datos);
    }

    public function Creado() {
        $validator = Validator::make($data = Input::all(), Sembrado::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Sembrado = new Sembrado;
        $Sembrado->SetNombre($data["ClfName"]);
        $Sembrado->SetArea($data["ClfArea"]);
        $Sembrado->SetDireccion($data["ClfDireccion"]);
        $Sembrado->SetIdCosechero($data["ClfIdHarvester"]);
        $Sembrado->save();

        return View::make('Sembrado/Index')->with('Sembrados', Sembrado::all());
    }

    /**
     * Store a newly created cosechero in storage.
     *
     * @return Response
     */

    /**
     * Display the specified cosechero.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $validator = Validator::make($data = Input::all(), Sembrado::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $Sembrado = Sembrado::findOrFail($id);
        $Sembrado->SetNombre($data["ClfName"]);
        $Sembrado->SetArea($data["ClfArea"]);
        $Sembrado->SetDireccion($data["ClfDireccion"]);
        $Sembrado->SetIdCosechero($data["ClfIdHarvester"]);
        $Sembrado->save();
        return View::make('Sembrado/Index')->with('Sembrados', Sembrado::all());
    }

    /**
     * Show the form for Editaring the specified cosechero.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Sembrado = Sembrado::find($id);
        $Datos["Cosecheros"] = $this->GetVectorForSelect(Cosechero::where('HrvIdstate', '=', 1)->get());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Attr"] = array('disabled');

        return View::make('Sembrado.Detalles', compact('Sembrado'))->with('Datos', $Datos);
    }

    public function Editar($id) {
        $Sembrado = Sembrado::find($id);
        $Datos["Cosecheros"] = $this->GetVectorForSelect(Cosechero::where('HrvIdstate', '=', 1)->get());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());  
        $Datos["Attr"] = array('disabled');

        return View::make('Sembrado.Editar', compact('Sembrado'))->with('Datos', $Datos);
    }

    /**
     * Remove the specified cosechero from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Sembrado = Sembrado::find($id);
        $Datos["Cosecheros"] = $this->GetVectorForSelect(Cosechero::where('HrvIdstate', '=', 1)->get());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());  
        $Datos["Attr"] = array('disabled');

        return View::make('Sembrado.Eliminar', compact('Sembrado'))->with('Datos', $Datos);
    }

    public function Eliminado($id) {
        $Sembrado = Sembrado::find($id);
        $Sembrado->delete();
        $Sembrados = Sembrado::all();
        return View::make('Sembrado.index', compact('Sembrados'));
    }

}


