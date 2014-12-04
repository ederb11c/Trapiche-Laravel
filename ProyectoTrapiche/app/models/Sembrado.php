<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Sembrado extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

      public static $rules = [
            // 'title' => 'required'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Sembrado';
    public $timestamps = false;
    protected $primaryKey = 'ClfId';
    protected $Nombre = 'ClfName';

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

    function GetId() {
        return $this->ClfId;
    }

    function GetNombre() {
        return $this->ClfName;
    }

    function SetNombre($Parametro) {
        $this->ClfName = $Parametro;
    }

    function GetIdCosechero() {
        return $this->ClfIdHarvester;
    }

    function SetIdCosechero($Parametro) {
        $this->ClfIdHarvester = $Parametro;
    }

    function GetArea() {
        return $this->ClfArea;
    }

    function SetArea($Parametro) {
        $this->ClfArea = $Parametro;
    }

    function GetDireccion() {
        return $this->ClfDireccion;
    }

    function SetDireccion($Parametro) {
        $this->ClfDireccion = $Parametro;
    }

    /* Objetos */

    public function GetCosechero() {
        return $this->hasOne('Cosechero', 'HrvIdharvester', 'ClfIdHarvester');
    }

}
