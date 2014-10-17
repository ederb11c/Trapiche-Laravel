<?php

class ApronteController extends \BaseController {

    /**
     * Display a listing of Aprontes
     *
     * @return Response
     */
    public function index() {
        $Aprontes = Apronte::all();

        return View::make('Apronte.index', compact('Aprontes'));
    }

    /**
     * Show the form for creating a new Apronte
     *
     * @return Response
     */
    public function Crear() {
        $Datos[] = array();
        $Arrieros = array();
        $Datos["EstadosDeApronte"] = $this->GetVectorForSelect(EstadoApronte::where('SttaState', '=', 1)->get());
        $Datos["Cosechero"] = $this->GetVectorForSelect(Cosechero::where('HrvIdState', '=', 1)->get());
        $Datos["Sembreado"] = $this->GetVectorForSelect(Sembrado::all());
        $Datos["Mula"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', 1)->get());
        $Datos["Arrieros"] = $this->GetVectorForSelect(Arriero::all());

        //$Arrieros =(Cosechero::all());
        return View::make('Apronte.Crear')->with("Datos", $Datos);
    }

    public function Creado($IdMolienda = null) {
        $validator = Validator::make($data = Input::all(), Apronte::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Apronte = new Apronte;
        $Apronte->SetIdMolienda($IdMolienda);
        $Apronte->SetIdCosechero($data["AprIdHarvester"]);
        $Apronte->SetIdArriero($data["AprIdMuledriver"]);
        $Apronte->SetIdSembrado($data["AprIdSembrado"]);
        $Apronte->SetIdMula($data["AprIdMule"]);
        $Apronte->SetPesoCarga($data["AprMaximunLoad"]);
        $Apronte->SetPesoNeto($data["AprNetWeight"]);
        $Apronte->SetFechaLlegada($data["AprArrivalDate"]);

        $Apronte->SetIdEstado(1);
        $Apronte->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Apronte->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Apronte->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Apronte->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Apronte->save();

        return View::make('Apronte/Index')->with('Aprontes', Apronte::all());
    }

    /**
     * Store a newly created Apronte in storage.
     *
     * @return Response
     */

    /**
     * Display the specified Apronte.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $validator = Validator::make($data = Input::all(), Apronte::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $Apronte = Apronte::findOrFail($id);
        $Apronte->SetNombre($data["Nombre"]);
        $Apronte->SetPApellido($data["PApellido"]);
        $Apronte->SetSApellido($data["SApellido"]);
        $Apronte->SetIdSexo($data["IdSexo"]);
        $Apronte->SetIdTipoId($data["IdTipoId"]);
        $Apronte->SetNumeroId($data["NoId"]);
        $Apronte->SetEmail($data["Email"]);
        if (isset($data["Foto"])) {
            $Apronte->SetFoto($data["Foto"]);
        }
        $Apronte->SetFechaNacimiento($data["FechaNacimiento"]);
        $Apronte->SetIdTrapiche($data["IdTrapiche"]);
        $Apronte->SetIdEstado($data["IdEstado"]);
        //$Apronte->SetFechaRegistro(date("Y-m-d h:m:s"));
        //$Apronte->SetUsuarioRegistro(Auth::user()->GetId());
        $Apronte->SetFechaUltimaModificacion(date("Y-m-d h:m:s"));
        $Apronte->save();
        return View::make('Apronte/Index')->with('Aprontes', Apronte::all());
    }

    /**
     * Show the form for Editaring the specified Apronte.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Apronte = Apronte::find($id);
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["Attr"] = array('disabled');

        return View::make('Apronte.Detalles', compact('Apronte'))->with('Datos', $Datos);
    }

    public function Editar($id) {
        $Apronte = Apronte::find($id);
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["Attr"] = array('disabled');

        return View::make('Apronte.Editar', compact('Apronte'))->with('Datos', $Datos);
    }

    /**
     * Remove the specified Apronte from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Apronte = Apronte::find($id);
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["Attr"] = array('disabled');

        return View::make('Apronte.Eliminar', compact('Apronte'))->with('Datos', $Datos);
    }

    public function Eliminado($id) {
        $Apronte = Apronte::find($id);
        $Apronte->delete();
        $Aprontes = Apronte::all();
        return View::make('Apronte.index', compact('Aprontes'));
    }

}
