<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class EstadoMolienda extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'EstadoMolienda';
    public $timestamps = false;
    protected $primaryKey = 'SttmIdStateGrinding';
    protected $Nombre = 'SttmNameState';

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

    public function GetNombre() {
        return $this->SttmNameState;
    }

    public function SetNombre($Nombre) {
        $this->SttmNameState = $Nombre;
    }

    public function GetId() {
        return $this->SttmIdStateGrinding;
    }

    public function GetIdEstado() {
        return $this->SttmIdState;
    }

    public function SetIdEstado($IdState) {
        $this->SttmIdState = $IdState;
    }

}
