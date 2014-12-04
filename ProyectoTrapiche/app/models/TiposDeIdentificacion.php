<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class TiposDeIdentificacion extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoIdentificacion';
    public $timestamps = false;
    protected $primaryKey = 'TypIdTypeId';
    protected $Nombre = 'TypNameTypeId';

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
        return $this->TypNameTypeId;
    }

    public function GetIdEstado() {
        return $this->TypStatetypeId;
    }

    public function GetId() {
        return $this->TypIdTypeId;
    }

    public function GetEstado() {
        return $this->hasOne('Estado', 'StId', 'TypStatetypeId');
    }

    public function SetNombre($Nombre) {
        $this->TypNameTypeId = $Nombre;
    }

    public function SetIdEstado($IdEstado) {
        $this->TypStatetypeId = $IdEstado;
    }

}
