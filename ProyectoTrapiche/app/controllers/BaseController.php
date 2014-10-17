<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected $FormatoFecha = 'Y-m-d h:m:s';

    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    public function GetVectorEstado() {
        $Estados = array();
        foreach (Estado::all() as $Value) {
            $Estados[$Value["StId"]] = $Value["StNameState"];
        }
        return $Estados;
    }

    public function GetVectorForSelect($Objetos) {
        $Vector = array();
        foreach ($Objetos as $Value) {
            $Vector[$Value[$Value->GetPrimaryKey()]] = $Value[$Value->GetNombreColumna()];
        }
        return $Vector;
    }

    public function GetMenuHtml($IdRol) {
        //$resultado = DB::select('exec GeneraMenu IdUsaroio en Sessio');  
        return 'Menu';
    }

}
