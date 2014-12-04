<?php

class Tamano extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Tamano';
    protected $primaryKey = 'SzIdSize';
    protected $Nombre = 'SzNameSize';
    protected $NombreModelo = ' Tamaño';
    protected $NombreUrl = 'tamano';
    public $NombreModeloPlural = ' Tamaños';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public function GetPrimaryKey() {
        return $this->primaryKey;
    }


    public function GetNombreColumna() {
        return $this->Nombre;
    }

    public function GetId() {
        return $this->SzIdSize;
    }

    public function GetNombre() {
        return $this->SzNameSize;
    }

    public function SetNombre($Nombre) {
        $this->SzNameSize = $Nombre;
    }
    public function GetIdEstado() {
        return $this->IrwIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->SzIdSize = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->SzIdSize;
    }


    /* Get Objects */


    public function GetEstado() {
        return $this->belongsto('Estado', 'SzIdState', 'StId');
    }

    

}
