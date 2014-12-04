<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Trapiche extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Trapiche';
    public $timestamps = false;
    protected $primaryKey = 'TrpIdTrapiche';
    protected $Nombre = 'TrpNameTrapiche';

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
        return $this->TrpNameTrapiche;
    }

    public function GetIdEstado() {
        return $this->TrpIdState;
    }

    public function GetId() {
        return $this->SxIdSex;
    }

    public function SetNombre($Nombre) {
        $this->TrpNameTrapiche = $Nombre;
    }

    public function SetIdEstado($IdState) {
        $this->TrpIdState = $IdState;
    }

    /* Get Objeto */

    public function GetEstado() {
        return $this->hasOne('Estado', 'StId', 'TrpIdState');
    }

}
