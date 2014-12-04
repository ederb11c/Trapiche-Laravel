<?php

class Cosechero extends \Eloquent {

    // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = [];
    protected $table = 'Cosechero';
    public $timestamps = false;
    protected $primaryKey = 'HrvIdharvester';
    protected  $NombreColumna = 'HrvName';


    public function GetPrimaryKey() {
        return $this->primaryKey;
    }
public function GetNombreColumna() {
        return $this->NombreColumna;
    }

    public function GetId() {
        return $this->HrvIdharvester;
    }

    public function GetNombre() {
        return $this->HrvName;
    }

    public function SetNombre($Parametro) {
        $this->HrvName = $Parametro;
    }

    public function GetPApellido() {
        return $this->HrvFirstName;
    }

    public function SetPApellido($Parametro) {
        $this->HrvFirstName = $Parametro;
    }

    public function GetSApellido() {
        return $this->HrvLastName;
    }

    public function SetSApellido($Parametro) {
        $this->HrvLastName = $Parametro;
    }

    public function GetIdSexo() {
        return $this->HrvIdSex;
    }

    public function SetIdSexo($Parametro) {
        $this->HrvIdSex = $Parametro;
    }

    public function GetIdEstado() {
        return $this->HrvIdState;
    }

    public function SetIdEstado($Parametro) {
        $this->HrvIdState = $Parametro;
    }

    public function GetIdTipoId() {
        return $this->HrvtypeId;
    }

    public function SetIdTipoId($Parametro) {
        $this->HrvtypeId = $Parametro;
    }

    public function GetNumeroId() {
        return $this->HrvNumberId;
    }

    public function SetNumeroId($Parametro) {
        $this->HrvNumberId = $Parametro;
    }

    public function GetEmail() {
        return $this->HrvEmail;
    }

    public function SetEmail($Parametro) {
         $this->HrvEmail = $Parametro;
    }

    public function GetFoto() {
        return $this->HrvFoto;
    }

    public function SetFoto($Parametro) {
        $this->HrvFoto = $Parametro;
    }

    public function GetFechaNacimiento($Formato = 'Y-m-d') {
      
          return date($Formato, strtotime($this->HrvDateOfBirth));
    }
   
    public function SetFechaNacimiento($Parametro) {
        $this->HrvDateOfBirth = $Parametro;
    }

    public function GetIdUsuarioRegistro() {
        return $this->HrvIdUserRegister;
    }

    public function SetUsuarioRegistro($Parametro) {
        $this->HrvIdUserRegister = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d hh:mm:ss') {
        return date($Formato, strtotime($this->HrvDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->HrvDateRecord = $Parametro;
    }

    public function GetFechaUltimaModificacion($Formato = 'Y-m-d h:mm:ss') {
        return date($Formato,  strtotime($this->HrvDateLastEdition ));
    }

    public function SetFechaUltimaModificacion($Parametro) {
         $this->HrvDateLastEdition = $Parametro;
    }

    public function GetIdTrapiche() {
        return $this->HrvIdTrapiche;
    }

    public function SetIdTrapiche($Parametro) {
        $this->HrvIdTrapiche = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'HrvIdUserRegister', 'SrIdUser');
    }

    public function GetSexo() {
        return $this->belongsto('Sexo', 'HrvIdSex', 'SxIdSex');
    }

    public function GetTipoId() {
        return $this->belongsto('TiposDeIdentificacion', 'HrvtypeId', 'TypIdTypeId');
    }

    public function GetTrapiche() {
        return $this->belongsto('Trapiche', 'HrvIdTrapiche', 'TrpIdTrapiche');
    }

    public function GetEstado() {
        return $this->belongsto('Estado', 'HrvIdState', 'StId');
    }

}
