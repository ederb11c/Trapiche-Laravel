<?php

class ArrieroController extends \BaseController {

    /**
     * Display a listing of Arrieros
     *
     * @return Response
     */
    public function index() {
        $Arrieros = Arriero::all();

        return View::make('Arriero.index', compact('Arrieros'));
    }

    /**
     * Show the form for creating a new Arriero
     *
     * @return Response
     */
    public function Crear() {
        $Datos[] = array();
        $Datos["TiposId"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        return View::make('Arriero.Crear')->with("Datos", $Datos);
    }

    public function Creado() {
        $validator = Validator::make($data = Input::all(), Arriero::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Arriero = new Arriero;
        $Arriero->SetNombre($data["MldName"]);
        $Arriero->SetPApellido($data["MldFirstName"]);
        $Arriero->SetSApellido($data["MldLastName"]);
        $Arriero->SetIdSexo($data["MlIdSex"]);
        $Arriero->SetIdTipoId($data["MldIdTypeId"]);
        $Arriero->SetNumeroId($data["MldNumberId"]);
        $Arriero->SetEmail($data["MlEmail"]);
//        if (isset($data["Foto"])) {
//            $Arriero->SetFoto($data["Foto"]);
//        }
        $Arriero->SetFechaNacimiento($data["MlDateOfBirth"]);
        $Arriero->SetIdEstado($data["MldIdState"]);
        
        $Arriero->SetFechaRegistro(date($this->FormatoFecha));
        $Arriero->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Arriero->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Arriero->SetFechaUltimaModificacion(date($this->FormatoFecha));
        $Arriero->save();

        return View::make('Arriero/Index')->with('Arrieros', Arriero::all());
    }

    /**
     * Store a newly created Arriero in storage.
     *
     * @return Response
     */

    /**
     * Display the specified Arriero.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $Arriero = Arriero::find($id);
        
        $validator = Validator::make($data = Input::all(), Arriero::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $Arriero->SetNombre($data["MldName"]);
        $Arriero->SetPApellido($data["MldFirstName"]);
        $Arriero->SetSApellido($data["MldLastName"]);
        $Arriero->SetIdSexo($data["MlIdSex"]);
        $Arriero->SetIdTipoId($data["MldIdTypeId"]);
        $Arriero->SetNumeroId($data["MldNumberId"]);
        $Arriero->SetEmail($data["MlEmail"]);
//        if (isset($data["Foto"])) {
//            $Arriero->SetFoto($data["Foto"]);
//        }
        $Arriero->SetFechaNacimiento($data["MlDateOfBirth"]);
        $Arriero->SetIdEstado($data["MldIdState"]);
        $Arriero->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Arriero->SetFechaUltimaModificacion(date($this->FormatoFecha));
        $Arriero->save();
        return View::make('Arriero/Index')->with('Arrieros', Arriero::all());
    }

    /**
     * Show the form for Editaring the specified Arriero.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Arriero = Arriero::find($id);
        $Datos["TiposId"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Attr"] = array('disabled');

        return View::make('Arriero.Detalles', compact('Arriero'))->with('Datos', $Datos);
    }

    public function Editar($id) {
        $Arriero = Arriero::find($id);
        $Datos["TiposId"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Attr"] = array('disabled');

        return View::make('Arriero.Editar', compact('Arriero'))->with('Datos', $Datos);
    }

    /**
     * Remove the specified Arriero from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Arriero = Arriero::find($id);
        $Datos["TiposId"] = $this->GetVectorForSelect(TiposDeIdentificacion::where('TypStatetypeId', '=', 1)->get());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Attr"] = array('disabled');
        $Datos["Attr"] = array('disabled');

        return View::make('Arriero.Eliminar', compact('Arriero'))->with('Datos', $Datos);
    }

    public function Eliminado($id) {
        $Arriero = Arriero::find($id);
        $Arriero->delete();
        $Arrieros = Arriero::all();
        return View::make('Arriero.index', compact('Arrieros'));
    }

}
