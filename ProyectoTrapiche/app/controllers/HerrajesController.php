<?php

class HerrajesController extends BaseController {
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
        $Herrajes = Herraje::where('IrwIdState ', '=', '1')->get();
        if (count($Herrajes) < 1) {
            $Herrajes[0] = new Herraje;
        }

        return View::make('Herraje/Index')->with('Objetos', $Herrajes);
    }

    public function Crear($Id = 3) {
        if (($Id) == 3) {
            $Mula = new Mula;
            $Datos["Mulas"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', '1')->get());
        } else {
            $Mula = Mula::find($Id);
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        }

        $Herraje = new Herraje;
        $Datos["Legends"] = $Herraje->GetTextos()["Create"]; //Titulos           
        $Datos["Open"] = array("#collapseTree" => "in", ".H" => "panel-primary", ".T" => "panel-primary", '.HC' => 'list-group-item-info');
        $Datos["URL"] = array("Herrajes" => "mulas/herrajes" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => "herraje/crear" . "/" . $Mula->GetId());
        $Datos["Tamanos"] = $this->GetVectorForSelect(Tamano ::where('SzIdState', '=', '1')->get());
        $Datos["Marcas"] = $this->GetVectorForSelect(MarcasDeHerradura::where('MrkIIdState', '=', '1')->get());

        return View::make('Herraje/Crear')->with('Datos', $Datos)->with("Objeto", $Mula);
    }

    public function Creado() {
        $Herraje = new Herraje;
        $Herraje->SetIdMarca(Input::get('IrwMrkId'));
        $Herraje->SetIdMula(Input::get('IrwIdMule'));
        $Herraje->SetIdTamano(Input::get('IrwIdSize'));
        $Herraje->SetHerrador(Input::get('IrwFarrier'));
        $Herraje->SetFechaHerraje(date($this->FormatoFecha, strtotime(Input::get('IrwDateIronWork'))));

        $Herraje->SetIdEstado(1);
        $Herraje->SetFechaRegistro(date($this->FormatoFecha));
        $Herraje->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Herraje->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Herraje->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Herraje->save();
        return Redirect::back()->withSuccess($this->Registrado);
    }

    public function Editar($Id) {
        $Herraje = Herraje::findOrFail($Id);
        $Mula = Mula::find($Herraje->GetIdMula());
        if (($Herraje['error'] == true)) {
            return View::make('Herraje/Editar')->withErrors($Herraje['mensaje'])->withInput();
        } else {
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
            $Datos["Tamanos"] = $this->GetVectorForSelect(Tamano ::where('SzIdState', '=', '1')->get());
            $Datos["Marcas"] = $this->GetVectorForSelect(MarcasDeHerradura::where('MrkIIdState', '=', '1')->get());

            $Datos["Legends"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           

            $Datos["Open"] = array("#collapseTree" => "in", ".H" => "panel-primary", ".T" => "panel-primary", '.HU' => 'list-group-item-info');

            $Datos["URL"] = array("Herrajes" => "mulas/herrajes" . "/" . $Mula->GetId()
                , $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);
            return View::make('Herraje/Editar')->with('HerrajeSeleccionado', $Herraje)->with('Datos', $Datos)->with("Objeto", $Mula);
        }
    }

    public function Editado($Id) {
        $Herraje = Herraje::findOrFail($Id);
        if (($Herraje['error'] == true)) {
            return View::make('Herraje/Editar')->withErrors($Herraje['mensaje'])->withInput();
        } else {

            $Herraje->SetIdMarca(Input::get('IrwMrkId'));
            $Herraje->SetIdMula(Input::get('IrwIdMule'));
            $Herraje->SetIdTamano(Input::get('IrwIdSize'));
            $Herraje->SetHerrador(Input::get('IrwFarrier'));

            $Herraje->SetFechaHerraje(date($this->FormatoFecha, strtotime(Input::get('IrwDateIronWork'))));
            $Herraje->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Herraje->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Herraje->save();
            return Redirect::back()->withSuccess($this->Editado);
        }
    }

    public function Eliminar($Id) {
        $Herraje = Herraje::findOrFail($Id);
        $Mula = Mula::find($Herraje->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        $Datos["Tamanos"] = $this->GetVectorForSelect(Tamano ::where('SzIdState', '=', '1')->get());
        $Datos["Marcas"] = $this->GetVectorForSelect(MarcasDeHerradura::where('MrkIIdState', '=', '1')->get());

        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Eliminado"] = $Mula->GetTextos()["Eliminado"]; //Titulos                     
        $Datos["Legends"] = $Herraje->GetTextos()["Eliminar"]; //Titulos Para Sidebar           

        $Datos["Open"] = array("#collapseTree" => "in", ".H" => "panel-danger", ".T" => "panel-danger", '.HR' => 'list-group-item-danger');

        $Datos["URL"] = array("Herrajes" => "mulas/herrajes" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

        return View::make('Herraje/Eliminar')->with('HerrajeSeleccionado', $Herraje)->with('Datos', $Datos)->with("Objeto", $Mula);
    }

    public function Eliminado($Id) {

        $Herraje = Herraje::findOrFail($Id);
        $Herraje->SetIdEstado('0');
        $Herraje->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Herraje->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Herraje->save();
        return Redirect::to('mula/herrajes/' . $Herraje->GetIdMula())->withSuccess($this->Eliminado);
    }

    public function Detalles($Id) {

        $Herraje = Herraje::findOrFail($Id);
        $Mula = Mula::find($Herraje->GetIdMula());

        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        $Datos["Tamanos"] = $this->GetVectorForSelect(Tamano ::where('SzIdState', '=', '1')->get());
        $Datos["Marcas"] = $this->GetVectorForSelect(MarcasDeHerradura::where('MrkIIdState', '=', '1')->get());


        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
        $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
        $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
        $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
        $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
        $Datos["Legends"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar           

        $Datos["Open"] = array("#collapseTree" => "in", ".H" => "panel-primary", ".T" => "panel-primary", '.HD' => 'list-group-item-info');

        $Datos["URL"] = array("Herrajes" => "mulas/herrajes" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => $Datos["Legends"]["NAMEURL"]);

        return View::make('Herraje/Detalles')->with(array('HerrajeSeleccionado' => $Herraje, 'Datos' => $Datos, "Objeto" => $Mula));
    }

}
