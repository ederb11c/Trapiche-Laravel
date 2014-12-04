<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Sexo extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Sexo';
    public $timestamps = false;
    protected $primaryKey = 'SxIdSex';
    protected $Nombre = 'SxNameSx';

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
        return $this->SxNameSx;
    }

    public function GetIdEstado() {
        return $this->SxIdState;
    }

    public function GetEstado() {
        return $this->hasOne('Estado', 'StId', 'SxIdState');
    }

    public function GetId() {
        return $this->SxIdSex;
    }

    public function SetNombre($Nombre) {
        $this->SxNameSx = $Nombre;
    }

    public function SetIdEstado($IdState) {
        $this->SxIdState = $IdState;
    }

}
