<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Mula extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Mula';
    public $timestamps = false;
    protected $primaryKey = 'MlIdMule';
    protected $Nombre = 'MlName';

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

    public function GetId() {
        return $this->MlIdMule;
    }

    public function GetNombre() {
        return $this->MlName;
    }

    public function SetNombre($Nombre) {
        $this->MlName = $Nombre;
    }

    public function GetIdSexo() {
        return $this->MlIdSex;
    }

    public function SetIdSexo($Nombre) {
        $this->MlIdSex = $Nombre;
    }

    public function GetEspecie() {
        return $this->MlSpecie;
    }

    public function SetEspecie($Nombre) {
        $this->MlSpecie = $Nombre;
    }

    public function GetDescripcion() {
        return $this->MlDescription;
    }

    public function SetDescripcion($Nombre) {
        $this->MlDescription = $Nombre;
    }

    public function GetIdEstado() {
        return $this->MlIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->MlIdState = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->MlIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->MlIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->MlIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->MlIdUserLastEdition = $Nombre;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->MlDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->MlDateLastEdition = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->MlDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->MlDateRecord = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'MlIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'MlIdUserLastEdition', 'SrIdUser');
    }

    
    public function GetSexo() {
        return $this->belongsto('Sexo', 'MlIdSex', 'SxIdSex');
    }
    public function GetEstado() {
        return $this->belongsto('Estado', 'MlIdState', 'StId');
    }

}
