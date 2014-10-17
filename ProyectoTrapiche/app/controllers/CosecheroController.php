<?php

class CosecheroController extends \BaseController {

    /**
     * Display a listing of cosecheros
     *
     * @return Response
     */
    public function index() {
        $Cosecheros = Cosechero::all();

        return View::make('cosechero.index', compact('Cosecheros'));
    }

    /**
     * Show the form for creating a new cosechero
     *
     * @return Response
     */
    public function Crear() {
        $Datos[] = array();
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        return View::make('cosechero.Crear')->with("Datos", $Datos);
    }

    public function Creado() {
        $validator = Validator::make($data = Input::all(), Cosechero::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Cosechero = new Cosechero;
        $Cosechero->SetNombre($data["Nombre"]);
        $Cosechero->SetPApellido($data["PApellido"]);
        $Cosechero->SetSApellido($data["SApellido"]);
        $Cosechero->SetIdSexo($data["IdSexo"]);
        $Cosechero->SetIdTipoId($data["IdTipoId"]);
        $Cosechero->SetNumeroId($data["NoId"]);
        $Cosechero->SetEmail($data["Email"]);
        if (isset($data["Foto"])) {
            $Cosechero->SetFoto($data["Foto"]);
        }
        $Cosechero->SetFechaNacimiento($data["FechaNacimiento"]);
        $Cosechero->SetIdTrapiche($data["IdTrapiche"]);
        $Cosechero->SetIdEstado($data["IdEstado"]);
        $Cosechero->SetFechaRegistro(date("Y-m-d h:m:s"));
        $Cosechero->SetUsuarioRegistro(Auth::user()->GetId());
        $Cosechero->SetFechaUltimaModificacion(date("Y-m-d h:m:s"));

        $Cosechero->save();

        return View::make('Cosechero/Index')->with('Cosecheros', Cosechero::all());
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
        $validator = Validator::make($data = Input::all(), Cosechero::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $Cosechero = Cosechero::findOrFail($id);
        $Cosechero->SetNombre($data["Nombre"]);
        $Cosechero->SetPApellido($data["PApellido"]);
        $Cosechero->SetSApellido($data["SApellido"]);
        $Cosechero->SetIdSexo($data["IdSexo"]);
        $Cosechero->SetIdTipoId($data["IdTipoId"]);
        $Cosechero->SetNumeroId($data["NoId"]);
        $Cosechero->SetEmail($data["Email"]);
        if (isset($data["Foto"])) {
            $Cosechero->SetFoto($data["Foto"]);
        }
        $Cosechero->SetFechaNacimiento($data["FechaNacimiento"]);
        $Cosechero->SetIdTrapiche($data["IdTrapiche"]);
        $Cosechero->SetIdEstado($data["IdEstado"]);
        //$Cosechero->SetFechaRegistro(date("Y-m-d h:m:s"));
        //$Cosechero->SetUsuarioRegistro(Auth::user()->GetId());
        $Cosechero->SetFechaUltimaModificacion(date("Y-m-d h:m:s"));
        $Cosechero->save();
        return View::make('Cosechero/Index')->with('Cosecheros', Cosechero::all());
    }

    /**
     * Show the form for Editaring the specified cosechero.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Cosechero = Cosechero::find($id);
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["Attr"] = array('disabled');

        return View::make('cosechero.Detalles', compact('Cosechero'))->with('Datos', $Datos);
    }

    public function Editar($id) {
        $Cosechero = Cosechero::find($id);
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["Attr"] = array('disabled');

        return View::make('cosechero.Editar', compact('Cosechero'))->with('Datos', $Datos);
    }

    /**
     * Remove the specified cosechero from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Cosechero = Cosechero::find($id);
        $Datos["TiposIds"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Trapiches"] = $this->GetVectorForSelect(Trapiche::where('TrpIdState', '=', 1)->get());
        $Datos["Attr"] = array('disabled');

        return View::make('cosechero.Eliminar', compact('Cosechero'))->with('Datos', $Datos);
    }

    public function Eliminado($id) {
        $Cosechero = Cosechero::find($id);
        $Cosechero->delete();
        $Cosecheros = Cosechero::all();
        return View::make('cosechero.index', compact('Cosecheros'));
    }

}
