<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Rol extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Rol'; //Le digo a laravel que utilece esta tabla como un objeto  :)
    public $timestamps = false;    /* Los timestamps son loas campos de fecha 
     * registro y fecha ultima actualizacion,
     *  creat_up y Update_up, falsos porque mi modelos no tienen ese campo  */
    protected $primaryKey = 'RlIdRole'; //Le digo a laravel que esta es mi primary key :)
    protected $Nombre = 'RlNameRole';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    /* Get Metodos */
    public function GetPrimaryKey() {
        return $this->primaryKey;
    }

    public function GetNombreColumna() {
        return $this->Nombre;
    }

    public function GetId() {
        return $this->RlIdRole;
    }

    public function GetNombre() {
        return $this->RlNameRole;
    }

    public function GetDescripcion() {
        return $this->RlDescription;
    }

    public function GetIdEstado() {
        return $this->RlIdstatus;
    }

    public function GetEstado() {
        return $this->hasOne('Estado', 'StId', 'RlIdstatus');
    }

    /* Set metodos */

    public function SetNombre($Nombre) {
        $this->RlNameRole = $Nombre;
    }

    public function SetDescripcion($Descripcion) {
        $this->RlDescription = $Descripcion;
    }

    public function SetIdEstado($IdEstado) {
        $this->RlIdstatus = $IdEstado;
    }

}
