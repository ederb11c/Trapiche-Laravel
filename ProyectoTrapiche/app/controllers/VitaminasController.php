
<?php

class VitaminasController extends BaseController {
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
        $Vitaminas = Vitamina::where('VtmIdState', '=', '1')->get();
        
        if(count($Vitaminas)<0){
            $Vitaminas[]= new Vitamina();
        }
        return View::make('Vitamina/Index')->with(array('Vitaminas'=>$Vitaminas));// V Para saber que es el index de vitaminas
    }

    public function Crear($Id = 3) {
        if (($Id) == 3) {
            $Mula = new Mula;
            $Datos["Mulas"] = $this->GetVectorForSelect(Mula::where('MlIdState', '=', '1')->get());
        } else {

            $Mula = Mula::find($Id);
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));
        }


        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
        $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
        $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
        $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
        $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
        $Datos["Legends"] = $Mula->GetTextos()["Crear"]; //Titulos           

        $Datos["Open"] = array("#collapseTwo" => "in", ".V" => "panel-primary", ".T" => "panel-primary", '.VC' => 'list-group-item-info');


        $Datos["URL"] = array("Vitaminas" => "mula/vitaminas" . "/" . $Mula->GetId()
            , $Datos["Legends"]["Legend"] => "vitamina/crear" . "/" . $Mula->GetId());

        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());

        return View::make('Vitamina/Crear')->with('Datos', $Datos)->with("Objeto", $Mula);
    }

    public function Creado() {
        $Vitamina = new Vitamina;
        $Vitamina->SetNombreProducto(Input::get('VtmProduct'));
        $Vitamina->SetDescripcion(Input::get('VtmComents'));
        $Vitamina->SetCantidad(Input::get('VtmQuantity'));
        $Vitamina->SetIdUnidadDeMedida(Input::get("VtmIdUntMeasurement"));
        $Vitamina->SetIdVia(Input::get('VtmIdPrep'));
        $Vitamina->SetIdMula(Input::get('VtmIdMule'));

        $Vitamina->SetFechaAplicacion(date($this->FormatoFecha, strtotime(Input::get('VtmAplicationDate'))));

        $Vitamina->SetIdEstado(1);
        $Vitamina->SetFechaRegistro(date($this->FormatoFecha));
        $Vitamina->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Vitamina->SetIdUsuarioRegistro(Auth::user()->GetId());
        $Vitamina->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());

        $Vitamina->save();
        return Redirect::to("vitamina/detalles/" . Vitamina::all()->last()->GetId())->withSuccess($this->Registrado);
    }

    public function Editar($Id) {
        $Vitamina = Vitamina::findOrFail($Id);
        if (($Vitamina['error'] == true)) {
            return View::make('Vitamina/Editar')->withErrors($Vitamina['mensaje'])->withInput();
        } else {

            $Mula = Mula::find($Vitamina->GetIdMula());
            $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));

            $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
            $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
            $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
            $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
            $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
            $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
            $Datos["Legends"] = $Mula->GetTextos()["Editar"]; //Titulos           

            $Datos["Open"] = array("#collapseTwo" => "in", ".V" => "panel-primary", ".T" => "panel-primary", '.VU' => 'list-group-item-info');


            $Datos["URL"] = array("Vitaminas" => "mula/vitaminas" . "/" . $Mula->GetId()
                , $Datos["Legends"]["Legend"] => "vitamina/editar" . "/" . $Mula->GetId());

            $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
            $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());

            return View::make('Vitamina/Editar')->with('VitaminaSeleccionada', $Vitamina)->with('Datos', $Datos)->with("Objeto", $Mula);
        }
    }

    public function Editado($Id) {
        $Vitamina = Vitamina::findOrFail($Id);
        if (($Vitamina['error'] == true)) {
            return View::make('Vitamina/Editar/' . $Id);
        } else {
            $Vitamina->SetNombreProducto(Input::get('VtmProduct'));
            $Vitamina->SetDescripcion(Input::get('VtmComents'));
            $Vitamina->SetCantidad(Input::get('VtmQuantity'));
            $Vitamina->SetIdUnidadDeMedida(Input::get("VtmIdUntMeasurement"));
            $Vitamina->SetIdVia(Input::get('VtmIdPrep'));
            $Vitamina->SetIdMula(Input::get('VtmIdMule'));
            $Vitamina->SetFechaAplicacion(date($this->FormatoFecha, strtotime(Input::get('VtmAplicationDate'))));

            $Vitamina->SetFechaUltimaEdicion(date($this->FormatoFecha));
            $Vitamina->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
            $Vitamina->save();
            return Redirect::back()->withSuccess($this->Editado);
        }
    }

    public function Eliminar($Id) {
        $Vitamina = Vitamina::find($Id);
        $Mula = Mula::find($Vitamina->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));

        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
        $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
        $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
        $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar        

        $Datos["Eliminado"] = $Mula->GetTextos()["Eliminado"]; //Titulos Para Sidebar        
        $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
        $Datos["Legends"] = $Mula->GetTextos()["Eliminar"]; //Titulos           

        $Datos["Open"] = array("#collapseTwo" => "in", ".V" => "panel-danger", ".T" => "panel-danger", '.VR' => 'list-group-item-danger');


        $Datos["URL"] = array("Vitaminas" => "mula/vitaminas" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => "vitamina/Eliminar" . "/" . $Mula->GetId());

        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());

        return View::make('Vitamina/Eliminar')->with(array('VitaminaSeleccionada' => $Vitamina, "Objeto" => $Mula))->with('Datos', $Datos);
    }

    public function Eliminado($Id) {

        $Vitamina = Vitamina::findOrFail($Id);

        $Vitamina->SetIdEstado('0');
        $Vitamina->SetFechaUltimaEdicion(date($this->FormatoFecha));
        $Vitamina->SetIdUsuarioUltimaEdicion(Auth::user()->GetId());
        $Vitamina->save();
        return Redirect::to("mula/vitaminas/" . $Vitamina->GetIdMula())->withSuccess($this->Eliminado);
    }

    public function Detalles($Id) {
        $Vitamina = Vitamina::find($Id);
        $Mula = Mula::find($Vitamina->GetIdMula());
        $Datos["Mulas"] = $this->GetVectorForSelect(array($Mula));

        $Datos["Maestro"] = $Mula->GetTextos()["Maestro"]; //Titulos Para El Maestro Sidebar
        $Datos["Index"] = $Mula->GetTextos()["Index"]; //Titulos           
        $Datos["Crear"] = $Mula->GetTextos()["Crear"]; //Titulos Para la Vista           
        $Datos["Editar"] = $Mula->GetTextos()["Editar"]; //Titulos Para Sidebar           
        $Datos["Eliminar"] = $Mula->GetTextos()["Eliminar"]; //Titulos Para Sidebar          
        $Datos["Detalles"] = $Mula->GetTextos()["Detallar"]; //Titulos Para Sidebar          
        $Datos["Legends"] = $Mula->GetTextos()["Detallar"]; //Titulos           

        $Datos["Open"] = array("#collapseTwo" => "in", ".V" => "panel-primary", ".T" => "panel-primary", '.VD' => 'list-group-item-info');

        $Datos["URL"] = array("Vitaminas" => "mula/vitaminas" . "/" . $Mula->GetId(), $Datos["Legends"]["Legend"] => "vitamina/detalles" . "/" . $Mula->GetId());

        $Datos["Vias"] = $this->GetVectorForSelect(Via::where('PrpIdStatePrep', '=', '1')->get());
        $Datos["UndsMedidas"] = $this->GetVectorForSelect(UnidadDeMedida::where('UntmIdState', '=', '1')->get());

        return View::make('Vitamina/Detalles')->with(array('VitaminaSeleccionada' => $Vitamina, "Objeto" => $Mula))->with('Datos', $Datos);
    }

}
