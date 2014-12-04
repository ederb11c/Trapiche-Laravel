<?php

class MulaController extends BaseController {
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
        //$Mulas=Mula::where();
        $Formulario = Input::all();
        if (isset($Formulario["Consultar"])) {
            $Mulas = Mula::where("MlIdState", '=', "1")->Where(function($query) {
                        if (Input::get("MlIdSex")) {
                            foreach (Input::get("MlIdSex") as $value) {
                                $query = $query->orWhere("MlIdSex", "=", $value);
                            }
                        }
                    })->Where(function($query) {
                        if (Input::get("MlName")) {
                            $query = $query->where("MlName", "like", '%' . Input::get("MlName") . '%');
                        }
                    })->get();
        } else {
            $Mulas = Mula::where("MlIdState", '=', "1")->get();
        }
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());

        $Datos["Formulario"] = ($Formulario);

        return View::make('Mula/Index')->with(array('Mulas' => $Mulas, "Datos" => $Datos));
    }

    public function Crear($Id = 3) {
        if (($Id) == 3) {

            $Mula = Mula::all()->last();
        } else {
            $Mula = Mula::findOrFail($Id);
        }
        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
        $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
        $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
        $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
        $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
        $Datos["Legends"] = $Mula->GetTextos()["Crear"]; //Titulos           

        $Datos["Open"] = array("#collapseOne" => "in", ".M" => "panel-primary", ".T" => "panel-primary", '.MC' => 'list-group-item-info');

        $Datos["URL"] = array($Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);


        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());
        return View::make('Mula/Crear')->with('Datos', $Datos)->with("Objeto", $Mula);
    }

    public function Creado() {
        $Mula = new Mula;
        $Mula->SetNombre(Input::get('MlName'));
        $Mula->SetDescripcion(Input::get('MlDescription'));
        $Mula->SetEspecie(Input::get('MlSpecie'));
        $Mula->SetIdSexo(Input::get("MlIdSex"));
        $Mula->SetIdEstado(Input::get('MlIdState'));
        $Mula->SetFechaRegistro(date($this->FormatoFecha));
        $Mula->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Mula->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Mula->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Mula->save();
        $UltimoRegistro = Mula::all()->last()->GetId();
        return Redirect::to('mula/editar/' . $UltimoRegistro)->withSuccess($this->Registrado);
        ;
    }

    public function Editar($Id) {
        $Mula = Mula::findOrFail($Id);
        if (($Mula['error'] == true)) {
            return View::make('Mula/Editar')->withErrors($Mula['mensaje'])->withInput();
        } else {
            $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
            $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
            $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
            $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
            $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
            $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
            $Datos["Legends"] = $Mula->GetTextos()["Editar"]; //Titulos           

            $Datos["Open"] = array("#collapseOne" => "in", ".M" => "panel-primary", ".T" => "panel-primary", '.MU' => 'list-group-item-info');

            $Datos["URL"] = array();

            $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
            $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());

            return View::make('Mula/Editar')->with('Objeto', $Mula)->with('Datos', $Datos);
        }
    }

    public function Editado($Id) {
        $Mula = Mula::findOrFail($Id);
        if (($Mula['error'] == true)) {
            return View::make('Mula/Editar/' . $Id);
        } else {
            $Mula->SetNombre(Input::get('MlName'));
            $Mula->SetDescripcion(Input::get('MlDescription'));
            $Mula->SetEspecie(Input::get('MlSpecie'));
            $Mula->SetIdSexo(Input::get("MlIdSex"));
            $Mula->SetIdEstado(Input::get('MlIdState'));
            $Mula->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Mula->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Mula->save();
            return Redirect::back()->withSuccess($this->Editado);
        }
    }

    public function Eliminar($Id) {
        $Mula = Mula::findOrFail($Id);

        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
        $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
        $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
        $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
        $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
        $Datos["Legends"] = $Mula->GetTextos()["Eliminar"]; //Titulos           
        $Datos["Eliminado"] = $Mula->GetTextos()["Eliminado"]; //Titulos           

        $Datos["Open"] = array("#collapseOne" => "in", ".M" => "panel-danger", ".T" => "panel-danger", '.MR' => 'list-group-item-danger');

        $Datos["URL"] = array();


        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());

        return View::make('Mula/Eliminar')->with('Objeto', $Mula)->with('Datos', $Datos);
    }

    public function Eliminado($Id) {

        $Mula = Mula::findOrFail($Id);
        $Mula->delete();
        return Redirect::to('mula')->withSuccess($this->Eliminado);
    }

    public function Detalles($Id) {
        $Mula = Mula::find($Id);
        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos
        $Datos["Legends"] = $Mula->GetTextos()["Detallar"]; //Titulos           

        $Datos["Estados"] = $this->GetVectorForSelect(Estado::all());
        $Datos["Sexos"] = $this->GetVectorForSelect(Sexo::all());

        $Datos["Open"] = array("#collapseOne" => "in", ".M" => "panel-primary", ".T" => "panel-primary", '.MD' => 'list-group-item-info');

        $Datos["URL"] = array();

        return View::make('Mula/Detalles')->with('Objeto', $Mula)->with('Datos', $Datos);
    }

    public function IndexVitaminas($Id = null) {
        $Formulario = Input::all();
        if (!is_null($Id)) {
            $Mula = Mula::find($Id);
            $Vitaminas = $Mula->GetVitaminas()->where('VtmIdState', '=', '1')->get();
            if (isset($Formulario["Consultar"])) {
                $Vitaminas = $Mula->GetVitaminas()->where('VtmIdState', '=', '1')
                        ->Where(function($query) {
                            if ((Input::get("VtmIdPrep"))) {
                                foreach (Input::get("VtmIdPrep") as $value) {
                                    $query = $query->orWhere("VtmIdPrep", "=", $value);
                                }
                            }
                        })
                        ->where(function($query) {
                            if (Input::get("VtmAplicationDateI")) {
                                $query = $query->where("VtmAplicationDate", ">=", Input::get("VtmAplicationDateI"));
                            }
                            if (Input::get("VtmAplicationDateF")) {
                                $query = $query->where("VtmAplicationDate", "<=", Input::get("VtmAplicationDateF"));
                            }
                        })
                        ->get();
            }
        } else {
            $Mula = new Mula();
            $Vitaminas = Vitamina::where('VtmIdState', '=', '1')->get();
        }
        if (count($Vitaminas) < 1) {
            $Vitaminas[] = new Vitamina();
        }
        $Datos["Formulario"] = $Formulario;
        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos
        $Datos["Legends"] = null; //$Vitamina->GetTextos()["Index"]; //Titulos     
        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
        $Datos["Open"] = array("#collapseTwo" => "in", ".V" => "panel-primary", ".T" => "panel-primary", '.VL' => 'list-group-item-info');
        $Datos["URL"] = array("Vitaminas" => "mulas/vitaminas/" . $Mula->GetId());
        return View::make("Mula/IndexVitaminas")->with(array('Objeto' => $Mula, 'Datos' => $Datos, 'Vitaminas' => $Vitaminas, 'I' => 'V'));
    }

    public function IndexHerrajes($Id = null) {
        $Formulario = Input::all();
        if (!is_null($Id)) {
            $Mula = Mula::find($Id);
            $Herrajes = $Mula->GetHerrajes()->where('IrwIdState', '=', '1')->get();
            if (isset($Formulario["Consultar"])) {
                $Herrajes = $Mula->GetHerrajes()->where('IrwIdState', '=', '1')
                        ->Where(function($query) {
                            if ((Input::get("IrwIdSize"))) {
                                foreach (Input::get("IrwIdSize") as $value) {
                                    $query = $query->orWhere("IrwIdSize", "=", $value);
                                }
                            }
                        })
                        ->Where(function($query) {
                            if ((Input::get("IrwMrkId"))) {
                                foreach (Input::get("IrwMrkId") as $value) {
                                    $query = $query->orWhere("IrwMrkId", "=", $value);
                                }
                            }
                        }
                        )
                        ->where(function($query) {
                            if (Input::get("IrwDateIronWorkI")) {
                                $query = $query->where("IrwDateIronWork", ">=", Input::get("IrwDateIronWorkI"));
                            }
                            if (Input::get("IrwDateIronWorkF")) {
                                $query = $query->where("IrwDateIronWork", "<=", Input::get("IrwDateIronWorkF"));
                            }
                        }
                        )
                        ->get();
            }
        } else {
            $Mula = new Mula();
            $Herrajes = Herraje::where('IrwIdState', '=', '1')->get();
        }

        if (count($Herrajes) < 1) {
            $Herrajes[] = new Herraje();
        }
        $Datos["Formulario"] = $Formulario;
        $Datos["Legends"] = null; //$Vitamina->GetTextos()["Index"]; //Titulos     

        $Datos["Open"] = array("#collapseTree" => "in", ".H" => "panel-primary", ".T" => "panel-primary", '.HL' => 'list-group-item-info');

        $Datos["URL"] = array("Herrajes" => "mulas/vitaminas/" . $Mula->GetId());
        $Datos["Tamanos"] = $this->GetVectorForSelect(Tamano ::where('SzIdState', '=', '1')->get());
        $Datos["Marcas"] = $this->GetVectorForSelect(MarcasDeHerradura::where('MrkIIdState', '=', '1')->get());



        return View::make("Mula/IndexHerrajes")->with('Objeto', $Mula)->with(array('Datos' => $Datos, 'Herrajes' => $Herrajes, 'I' => 'H'));
    }

    public function IndexEnfermedades($Id = null) {
        if (!is_null($Id)) {

            $Mula = Mula::find($Id);
            $Enfermedades = $Mula->GetEnfermedades()->where('LlnIdState', '=', '1');
        } else {
            $Mula = new Mula();
            $Enfermedades = Enfermedad::where('LlnIdState', '=', '1');
        }
        $Fomulario = Input::all();
        if (isset($Fomulario["Consultar"])) {
            if ($Fomulario["LlnDateIllenesI"]) {
                $Enfermedades->where("LlnDateIllenes", ">=", $Fomulario["LlnDateIllenesI"]);
            }if ($Fomulario["LlnDateIllenesF"]) {
                $Enfermedades->where("LlnDateIllenes", "<=", $Fomulario["LlnDateIllenesF"]);
            }
        }
        $Enfermedades = $Enfermedades->get();
        if (count($Enfermedades) < 1) {
            $Enfermedades[] = new Enfermedad();
        }
        $Datos["Legends"] = null; //$Vitamina->GetTextos()["Index"]; //Titulos    

        $Datos["Open"] = array("#collapseFour" => "in", ".E" => "panel-primary", ".T" => "panel-primary", '.EL' => 'list-group-item-info');

        $Datos["URL"] = array("Enfermedades" => "mulas/enfermedades/");
        $Datos["Formulario"] = $Fomulario;


        return View::make("Mula/IndexEnfermedades")->with(array('Objeto' => $Mula, 'Datos' => $Datos, 'Enfermedades' => $Enfermedades, 'I' => 'E'));
    }

    public function IndexDesparacitaciones($Id = null) {
        if (!is_null($Id)) {
            $Mula = Mula::find($Id);
            $Desparacitaciones = $Mula->GetDesparacitaciones()->where('DwrIdState', '=', '1');
        } else {
            $Mula = new Mula();
            $Desparacitaciones = Desparacitacion::where('DwrIdState', '=', '1');
        }
        $Fomulario = Input::all();
        if (isset($Fomulario["Consultar"])) {
            if ($Fomulario["DwrAplicationDateI"]) {
                $Desparacitaciones->where("DwrAplicationDate", ">=", $Fomulario["DwrAplicationDateI"]);
            }if ($Fomulario["DwrAplicationDateF"]) {
                $Desparacitaciones->where("DwrAplicationDate", "<=", $Fomulario["DwrAplicationDateF"]);
            }if (isset($Fomulario["DwrIdPrep"])) {
             
                        $Desparacitaciones->where(function($query) {
                            if ((Input::get("DwrIdPrep"))) {
                                foreach (Input::get("DwrIdPrep") as $value) {
                                    $query = $query->orWhere("DwrIdPrep", "=", $value);
                                }
                            }
                        }
                        );  
            }
        }
        $Desparacitaciones=$Desparacitaciones->get();

        if (count($Desparacitaciones) < 1) {
            $Desparacitaciones[] = new Desparacitacion();
        }
        $Datos["Legends"] = null; //$Vitamina->GetTextos()["Index"]; //Titulos    
        $Datos["Open"] = array("#collapseFive" => "in", ".D" => "panel-primary", ".T" => "panel-primary", '.DL' => 'list-group-item-info');
        $Datos["URL"] = array("Desparacitaciones" => "mulas/desparacitaciones/".$Mula->GetId());
    
        $Datos["Formulario"] = $Fomulario;
        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());

        return View::make("Mula/IndexDesparacitaciones")->with(array('Objeto' => $Mula, 'Datos' => $Datos, 'Desparacitaciones' => $Desparacitaciones, 'I' => 'D'));
    }

    public function IndexPesajes($Id = null) {
        if (!is_null($Id)) {
            $Mula = Mula::find($Id);
            $Pesajes = $Mula->GetPesajes()->where('WgnIdState', '=', '1');
        } else {
            $Mula = new Mula();
            $Pesajes = Pesaje::where('WgnIdState', '=', '1');
        }
        
        $Formulario = Input::all();
        if (isset($Formulario["Consultar"])) {
            if ($Formulario["WgnDateWeighingI"]) {
                $Pesajes->where("WgnDateWeighing", ">=", $Formulario["WgnDateWeighingI"]);
            }if ($Formulario["WgnDateWeighingF"]) {
                $Pesajes->where("WgnDateWeighing", "<=", $Formulario["WgnDateWeighingF"]);
            }
        }
        $Pesajes=$Pesajes->get();

        if (count($Pesajes) < 1) {
            $Pesajes[] = new Pesaje();
        }
        $Datos["Legends"] = null; //$Vitamina->GetTextos()["Index"]; //Titulos    

        $Datos["Open"] = array("#collapseSix" => "in", ".P" => "panel-primary", ".T" => "panel-primary", '.PL' => 'list-group-item-info');
        $Datos["Formulario"]=$Formulario;
        $Datos["URL"] = array("Pesajes" => "mula/pesajes/");
        return View::make("Mula/IndexPesajes")->with(array('Objeto' => $Mula, 'Datos' => $Datos, 'Pesajes' => $Pesajes, 'I' => 'P'));
    }

}
