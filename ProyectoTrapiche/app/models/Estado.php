<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Estado extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Estado';
    public $timestamps = false;
    protected $primaryKey = 'StId';
    protected $Nombre = 'StNameState';

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
        return $this->StNameState;
    }

    public function GetDescripcion() {
        return $this->StDescription;
    }

    public function GetIdEstado() {
        return $this->StIdState;
    }

    public function GetId() {
        return $this->StId;
    }

    public function SetNombre($Nombre) {
        $this->StNameState = $Nombre;
    }

    public function SetDescripcion($Description) {
        $this->StDescription=$Description;
    }

    public function SetIdEstado($IdState) {
         $this->StIdState=$IdState;
    }

}
