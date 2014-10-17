<?php

class Arriero extends Eloquent {


    
     // Add your validation rules here
    public static $rules = [
            // 'title' => 'required'
    ];
    // Don't forget to fill this array
    protected $fillable = [];
    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Arriero';
    public $timestamps = false;
    protected $primaryKey = 'MldIdMuleDriver';
    protected $Nombre = 'MldName';

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
        return $this->NombreColumna;
    }

    public function GetId() {
        return $this->MldIdMuleDriver;
    }

    public function GetNombre() {
        return $this->MldName;
    }

    public function SetNombre($Parametro) {
        $this->MldName = $Parametro;
    }

    public function GetPApellido() {
        return $this->MldFirstName;
    }

    public function SetPApellido($Parametro) {
        $this->MldFirstName = $Parametro;
    }

    public function GetSApellido() {
        return $this->MldLastName;
    }

    public function SetSApellido($Parametro) {
        $this->MldLastName = $Parametro;
    }

    public function GetIdTipoId() {
        return $this->MldIdTypeId;
    }

    public function SetIdTipoId($Parametro) {
        $this->MldIdTypeId = $Parametro;
    }

    public function GetNumeroId() {
        return $this->MldNumberId;
    }

    public function SetNumeroId($Parametro) {
        $this->MldNumberId = $Parametro;
    }

    public function GetIdSexo() {
        return $this->MlIdSex;
    }

    public function SetIdSexo($Parametro) {
        $this->MlIdSex = $Parametro;
    }

    public function GetEmail() {
        return $this->MlEmail;
    }

    public function SetEmail($Parametro) {
        $this->MlEmail = $Parametro;
    }

    public function GetFoto() {
        return $this->MldFoto;
    }

    public function SetFoto($Parametro) {
        $this->MldFoto = $Parametro;
    }

    public function GetFechaNacimiento($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->MlDateOfBirth));
    }

    public function SetFechaNacimiento($Parametro) {
        $this->MlDateOfBirth = $Parametro;
    }

    public function GetIdUsuarioRegistro() {
        return $this->MlIdUserRecord;
    }

    public function SetIdUsuarioRegistro($Parametro) {
        $this->MlIdUserRecord = $Parametro;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->MlIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Parametro) {
        $this->MlIdUserLastEdition = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d h:m:s') {
        return date($Formato, strtotime($this->MlDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->MlDateRecord = $Parametro;
    }
 
    public function GetFechaUltimaModificacion($Formato = 'Y-m-d h:m:s') {
        return date($Formato, strtotime($this->MlDateLastEdition));
    }

    public function SetFechaUltimaModificacion($Parametro) {
        $this->MlDateLastEdition = $Parametro;
    }

    public function GetIdEstado() {
        return $this->MldIdState;
    }

    public function SetIdEstado($Parametro) {
        $this->MldIdState = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'MlIdUserRecord', 'SrIdUser');
    }
    
    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'MlIdUserLastEdition', 'SrIdUser');
    }

    public function GetSexo() {
        return $this->belongsto('Sexo', 'MlIdSex', 'SxIdSex');
    }

    public function GetTiPoId() {
        return $this->belongsto('TiposDeIdentificacion', 'MldIdTypeId', 'TypIdTypeId');
    }

    public function GetEstado() {
        return $this->belongsto('Estado', 'MldIdState', 'StId');
    }

}
