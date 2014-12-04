<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Apronte extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Apronte';
    public $timestamps = false;
    protected $primaryKey = 'AprIdApronte';
    protected $Nombre = 'AprIdGrinding';

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

    public function GetIdMolienda() {
        return $this->AprIdGrinding;
    }

    public function SetIdMolienda($Nombre) {
        $this->AprIdGrinding = $Nombre;
    }

    public function GetId() {
        return $this->AprIdApronte;
    }

    public function GetIdCosechero() {
        return $this->AprIdHarvester;
    }

    public function SetIdCosechero($Nombre) {
        $this->AprIdHarvester = $Nombre;
    }

    public function GetIdArriero() {
        return $this->AprIdMuledriver;
    }

    public function SetIdArriero($Nombre) {
        $this->AprIdMuledriver = $Nombre;
    }

    public function GetIdSembrado() {
        return $this->AprIdSembrado;
    }

    public function SetIdSembrado($Nombre) {
        $this->AprIdSembrado = $Nombre;
    }

    public function GetIdMula() {
        return $this->AprIdMule;
    }

    public function SetIdMula($Nombre) {
        $this->AprIdMule = $Nombre;
    }

    public function GetPesoCarga() {
        return $this->AprMaximunLoad;
    }

    public function SetPesoCarga($Nombre) {
        $this->AprMaximunLoad = $Nombre;
    }

    public function GetPesoNeto() {
        return $this->AprNetWeight;
    }

    public function SetPesoNeto($Nombre) {
        $this->AprNetWeight = $Nombre;
    }

    public function GetIdEstado() {
        return $this->AprIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->AprIdState = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->AprIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->AprIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->AprIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->AprIdUserLastEdition = $Nombre;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->AprDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->AprDateLastEdition = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->AprDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->AprDateRecord = $Parametro;
    }

    public function GetFechaLlegada($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->AprArrivalDate));
    }

    public function SetFechaLlegada($Parametro) {
        $this->AprArrivalDate = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'AprIdUserRegister', 'SrIdUser');
    }

}
