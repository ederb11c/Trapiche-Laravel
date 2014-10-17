<?php

class Molienda extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = [];
    protected $table = 'Molienda';
    public $timestamps = false;
    protected $primaryKey = 'GrnId';
    protected $NombreColumna = 'GrnId';

    public function GetPrimaryKey() {
        return $this->primaryKey;
    }

    public function GetNombreColumna() {
        return $this->NombreColumna;
    }

    public function GetId() {
        return $this->GrnId;
    }

    public function GetComentarios() {
        return $this->GrnComents;
    }

    public function SetComentarios($Parametro) {
        $this->GrnComents = $Parametro;
    }

    public function GetTotalEnKg() {
        return $this->GrnTotal;
    }

    public function SetTotalEnKg($Parametro) {
        $this->GrnTotal = $Parametro;
    }

    public function GetPrecioBase() {
        return $this->GrnFactoryPrice;
    }

    public function SetPrecioBase($Parametro) {
        $this->GrnFactoryPrice = $Parametro;
    }

    public function GetIdUnidadDeMedida() {
        return ($this->GrnIdUnitMeasurement);
    }

    public function SetIdUnidadDeMedida($Parametro) {
        $this->GrnIdUnitMeasurement = $Parametro;
    }

    public function GetIdEstado() {
        return $this->GrnIdState;
    }

    public function SetIdEstado($Parametro) {
        $this->GrnIdState = $Parametro;
    }

    public function GetIdEstadoMolienda() {
        return $this->GrnIdStateGrn;
    }

    public function SetIdEstadoMolienda($Parametro) {
        $this->GrnIdStateGrn = $Parametro;
    }

    public function GetIdTrapiche() {
        return $this->GrnIdTrapiche;
    }

    public function SetIdTrapiche($Parametro) {
        $this->GrnIdTrapiche = $Parametro;
    }

    public function GetFechaDeRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->GrnDateRecord));
    }

    public function SetFechaDeRegistro($Parametro) {
        $this->GrnDateRecord = $Parametro;
    }

    public function GetFechaDeCierre($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->GrnSellByDate));
    }

    public function SetFechaDeCierre($Parametro) {
        $this->GrnSellByDate = $Parametro;
    }

    public function GetFechaDeApertura($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->GrnDateLaunch));
    }

    public function SetFechaDeApertura($Parametro) {
        $this->GrnDateLaunch = $Parametro;
    }

    public function GetFechaLiquidacion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->GrnDateLiquidation));
    }

    public function SetFechaLiquidacion($Parametro) {
        $this->GrnDateLiquidation = $Parametro;
    }

    public function GetFechaUltimaModificacion($Formato = 'Y-m-d h:mm:ss') {
        return date($Formato, strtotime($this->GrnDateLastEdition));
    }

    public function SetFechaUltimaModificacion($Parametro) {
        $this->GrnDateLastEdition = $Parametro;
    }

    public function GetIdUsuarioRegistro() {
        return $this->GrnIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Parametro) {
        $this->GrnIdUserRegister = $Parametro;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->GrnIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Parametro) {
        $this->GrnIdUserLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'GrnIdUserRegister', 'SrIdUser');
    }

    public function GetUnidadDeMedida() {
        return $this->belongsto('UnidadDeMedida', 'GrnIdUnitMeasurement', 'UntmIdUnitMeasurement');
    }

    public function GetEstadoMolienda() {
        return $this->belongsto('EstadoMolienda', 'GrnIdStateGrn', 'SttmIdStateGrinding');
    }

    public function GetEstado() {
        return $this->belongsto('Estado', 'GrnIdState', 'StdIdState');
    }

}
