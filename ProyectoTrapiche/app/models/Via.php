<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Via extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Via';
    public $timestamps = false;
    protected $primaryKey = 'PrpIdPrep';
    protected $Nombre = 'PrpNamePrep';

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
        return $this->PrpNamePrep;
    }

    public function GetIdEstado() {
        return $this->PrpIdStatePrep;
    }

    public function GetId() {
        return $this->PrpIdPrep;
    }

    public function SetNombre($Nombre) {
        $this->PrpNamePrep = $Nombre;
    }

    public function SetIdEstado($IdState) {
        $this->PrpIdStatePrep = $IdState;
    }

}
