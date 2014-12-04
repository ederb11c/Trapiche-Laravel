<?php

class BaseController extends Controller {

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected $FormatoFecha = 'Y-m-d h:m:s';
    protected $messages = array(
        'required' => 'El :attribute no Puede ser nulo.',
        'min' => 'El :attribute Muy Corto.',
        'unique' => 'El :attribute Debe ser Unico.',
        'email' => 'El :attribute Debe Ser Un Email.'
    );
    protected $Editado = 'Update It!';
    protected $Registrado = 'Save It!';
    protected $Eliminado = 'Delete It!';

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

    public function GetVectorForSelect($Objetos, $Abrir = "[", $Cierre = "]", $Espacio = " ") {
        $Vector = array();
        foreach ($Objetos as $Value) {
            $NombresColumnas = $Value->GetNombreColumna();
            if (is_array($NombresColumnas)) {
                $RealValue = "";
                foreach ($NombresColumnas as $Propiedad) {
                    $RealValue.=$Abrir . $Value[$Propiedad] . $Cierre . $Espacio;
                }
                $Vector[$Value[$Value->GetPrimaryKey()]] = $RealValue;
            } else {
                $Vector[$Value[$Value->GetPrimaryKey()]] = $Value[$Value->GetNombreColumna()];
            }
        }
        return $Vector;
    }

}
