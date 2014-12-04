<?php

class Operario extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Operario';
    protected $primaryKey = 'WkrId';
    protected $Nombre = 'WkrName';
    protected $NombreModelo = ' Operario';
    protected $NombreUrl = 'operario';
    public $NombreModeloPlural = ' Operarios';

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
        return $this->WkrId;
    }

    public function GetNombre() {
        return $this->WkrName;
    }

    public function SetNombre($Nombre) {
        $this->WkrName = $Nombre;
    }

    public function GetPApellido() {
        return $this->WkrFirstName;
    }

    public function SetPApellido($Nombre) {
        $this->WkrFirstName = $Nombre;
    }

    public function SetSApellido($Nombre) {
        $this->WkrLastName = $Nombre;
    }

    public function GetSApellido() {
        return $this->WkrLastName;
    }

    public function SetIdSexo($Nombre) {
        $this->WrkIdSex = $Nombre;
    }

    public function GetIdSexo() {
        return $this->WrkIdSex;
    }

    public function SetIdTipoOperario($Nombre) {
        $this->WrkIdTypeWorker = $Nombre;
    }

    public function GetIdTipoOperario() {
        return $this->WrkIdTypeWorker;
    }

    public function SetIdTipoId($Nombre) {
        $this->WkrIdTypeId = $Nombre;
    }

    public function GetIdTipoId() {
        return $this->WkrIdTypeId;
    }

    public function SetIdTrapiche($Nombre) {
        $this->WkrIdTrapiche = $Nombre;
    }

    public function GetIdTrapiche() {
        return $this->WkrIdTrapiche;
    }

    public function GetNumeroId() {
        return $this->WkrNumberId;
    }

    public function SetNumeroId($Nombre) {
        $this->WkrNumberId = $Nombre;
    }

    public function GetEmail() {
        return $this->WkrEmail;
    }

    public function SetEmail($Nombre) {
        $this->WkrEmail = $Nombre;
    }

    public function SetIdEstado($Nombre) {
        $this->WkrIdState = $Nombre;
    }

    public function GetIdEstado() {
        return $this->WkrIdState;
    }
      public function SetIdEstadoAux($Nombre) {
        $this->WrkStateAlternative = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->WrkIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->WrkIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->WkrIdUserLasEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->WkrIdUserLasEdition = $Nombre;
    }

    public function GetFechaNacimiento($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->WkrDateOfBirth));
    }

    public function SetFechaNacimiento($Parametro) {
        $this->WkrDateOfBirth = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->WkrDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->WkrDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->WkrDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->WkrDateLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'IrwIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'IrwIdUserLastEdition', 'SrIdUser');
    }

    public function GetEstado() {
        return $this->belongsto('Estado', 'WkrIdState', 'StId');
    }

    
    public function GetSexo() {
        return $this->belongsto('Sexo', 'WrkIdSex', 'SxIdSex');
    }

    public function GetTipoId() {
        return $this->belongsto('TiposDeIdentificacion', 'WkrIdTypeId', 'TypIdTypeId');
    }

    public function GetTrapiche() {
        return $this->belongsto('Trapiche', 'WkrIdTrapiche', 'TrpIdTrapiche');
    }

    public function GetTipoOperario() {
        return $this->belongsto('TiposDeOperario', 'WrkIdTypeWorker', 'TwkrIdTypeWorker');
    }

//
    /* Especial para los formularios */

    public function GetTextos() {
        return $this->Textos;
    }

    function __construct() {
        parent::__construct($this->NombreUrl, $this->GetId());
    }

}
