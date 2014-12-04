<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class EstadoApronte extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'EstadoApronte';
    public $timestamps = false;
    protected $primaryKey = 'SttaIdstateApronte';
    protected $Nombre = 'SttaName';

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
        return $this->SttaIdstateApronte;
    }

    public function GetNombre() {
        return $this->SttaName;
    }

    public function SetNombre($Nombre) {
        $this->SttaName = $Nombre;
    }

    public function GetIdEstado() {
        return $this->SttaState;
    }

    public function SetIdEstado($Nombre) {
        $this->SttaState = $Nombre;
    }

}
