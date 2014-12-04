<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Usuario extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Usuario';
    public $timestamps = false;
    protected $primaryKey = 'SrIdUser';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');


    /* Metodos Get */


    public function GetId() {
        return $this->SrIdUser;
    }

    public function GetNombre() {
        return $this->SrNamesUser;
    }

    public function GetPApellido() {
        return $this->SrFirtName;
    }

    public function GetSApellido() {
        return $this->SrLastName;
    }

    public function GetIdTipoId() {
        return $this->SrTypeId;
    }

    public function GetNumeroDeId() {
        return $this->NumberId;
    }

    public function GetIdRol() {
        return $this->SrIdRol;
    }

    public function GetIdSexo() {
        return $this->SrIdSex;
    }

    public function GetEmail() {
        return $this->SrEmail;
    }

    public function GetLogin() {
        return $this->SrLogin;
    }

    public function GetContrasena() {
        return $this->password;
    }

    public function GetFoto() {
        return $this->SrFoto;
    }

    public function GetIdEstado() {
        return $this->SrIdEstado;
    }

    public function GetIntentosDisponibles() {
        return $this->SrTrysAviable;
    }

    public function GetIntentos() {
        return $this->SrTrysAviable;
    }

    public function GetFechaUltimaEntrada($Formato = 'Y-m-d : hh-mm-ss') {
        return date($Formato, strtotime(SrDateLastJoin));
    }

    public function GetFechaNacimiento($Formato = 'Y-m-d') {
        return date($Formato, strtotime($this->SrDateOfBirth));
    }

    public function GetFechaUltimaActualizacion($Formato = 'Y-m-d : hh-mm-ss') {
        return date($Formato, strtotime($this->SrdateLastEdition));
    }

    public function GetFechaRegistro($Formato = 'Y-m-d : hh-mm-ss') {
        return date($Formato, strtotime($this->SrDateRecord));
    }

    /* Get Objetos */

    public function SetNombre($Parametro) {
        $this->SrNamesUser = $Parametro;
    }

    public function SetPApellido($Parametro) {
        $this->SrFirtName = $Parametro;
    }

    public function SetSApellido($Parametro) {
        $this->SrLastName = $Parametro;
    }

    public function SetIdTipoId($Parametro) {
        $this->SrTypeId = $Parametro;
    }

    public function SetNumeroDeId($Parametro) {
        $this->NumberId = $Parametro;
    }

    public function SetIdRol($Parametro) {
        $this->SrIdRol = $Parametro;
    }

    public function SetIdSexo($Parametro) {
        $this->SrIdSex = $Parametro;
    }

    public function SetEmail($Parametro) {
        $this->SrEmail = $Parametro;
    }

    public function SetLogin($Parametro) {
        $this->SrLogin = $Parametro;
    }

    public function SetContrasena($Parametro) {
        $this->password = Hash::make($Parametro);
    }

    public function SetFoto($Parametro) {
        $this->SrFoto = $Parametro;
    }

    public function SetIdEstado($Parametro) {
        $this->SrIdEstado = $Parametro;
    }

    public function SetIntentosDisponibles($Parametro) {
        $this->SrTrysAviable = $Parametro;
    }

    public function SetIntentos($Parametro) {
        $this->SrTrys = $Parametro;
    }

    public function SetFechaUltimaEntrada($Parametro) {
        $this->SrDateLastJoin = $Parametro;
    }

    public function SetFechaNacimiento($Fecha) {
        $this->SrDateOfBirth = $Fecha;
    }

    public function SetFechaUltimaActualizacion($Parametro) {
        $this->SrdateLastEdition = $Parametro;
    }

    public function SetFechaRegistro($Fecha) {
        $this->SrDateRecord = $Fecha;
    }

    public function GetEstado() {
        return $this->belongsto('Estado', 'SrIdEstado', 'StId');
    }

    public function GetRol() {
        return $this->belongsto('Rol', 'SrIdRol', 'RlIdRole');
    }

    public function GetSexo() {
        return $this->belongsto('Sexo', 'SrIdSex', 'SxIdSex');
    }

    public function GetTipoId() {
        return $this->belongsto('TiposDeIdentificacion', 'SrTypeId', 'TypIdTypeId');
    }

}
