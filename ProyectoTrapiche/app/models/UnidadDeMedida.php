<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class UnidadDeMedida extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'UnidadadDeMedida';
    public $timestamps = false;
    protected $primaryKey = 'UntmIdUnitMeasurement';
    protected  $GetNombreColumna='UntmNameUnitMeasurement';


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
        return $this->GetNombreColumna;
    }

    public function GetNombre() {
        return $this->UntmNameUnitMeasurement;
    }

    public function GetIdEstado() {
        return $this->UntmIdState;
    }

    public function GetId() {
        return $this->UntmIdUnitMeasurement;
    }

    public function GetEstado() {
        return $this->hasOne('Estado', 'StId', 'UntmIdState');
    }

    public function SetNombre($Nombre) {
        $this->UntmNameUnitMeasurement = $Nombre;
    }

    public function SetIdEstado($IdEstado) {
        $this->UntmIdState = $IdEstado;
    }

}
