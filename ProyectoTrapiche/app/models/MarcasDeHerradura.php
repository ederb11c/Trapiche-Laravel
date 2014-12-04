<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class MarcasDeHerradura extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'MarcaDeHerradura';
    public $timestamps = false;
    protected $primaryKey = 'MrkId';
    protected $Nombre = 'MrkIName';
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
        return $this->MrkIName;
    }

    public function GetIdEstado() {
        return $this->MrkIIdState;
    }

    public function GetId() {
        return $this->MrkId;
    }

    public function GetEstado() {
        return $this->hasOne('Estado', 'StId', 'MrkIIdState');
    }

    public function SetNombre($Nombre) {
        $this->MrkIName = $Nombre;
    }

    public function SetIdEstado($IdEstado) {
        $this->MrkIIdState = $IdEstado;
    }

}
