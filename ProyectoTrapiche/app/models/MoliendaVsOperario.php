<?php

class MoliendaVsOperario extends Intermediate {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'MoliendasVsOperario';
    protected $primaryKey = 'GndwIdGinrdingVsWorker';
    protected $Nombre = 'MlName';
    protected $NombreModelo = ' Molienda Vs Operario';
    protected $NombreUrl = 'moliendavsoperario';
    public $NombreModeloPlural = ' Moliendas Vs Operarios';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = array('password', 'remember_token');

    public function GetPrimaryKey() {
        return $this->primaryKey;
    }

//
//    public function GetNombreColumna() {
//        return $this->Nombre;
//    }

    public function GetId() {
        return $this->GndwIdGinrdingVsWorker;
    }

    public function GetIdOperario() {
        return $this->GndwIdWorker;
    }

    public function SetIdOperario($Nombre) {
        $this->GndwIdWorker = $Nombre;
    }

    public function GetIdMolienda() {
        return $this->GndwIdGrinding;
    }

    public function SetIdMolienda($Nombre) {
        $this->GndwIdGrinding = $Nombre;
    }

    public function GetComentarios() {
        return $this->GndwComents;
    }

    public function SetComentarios($Nombre) {
        $this->GndwComents = $Nombre;
    }

    public function GetIdEstado() {
        return $this->GndwIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->GndwIdState = $Nombre;
    }
    public function GetIdUsuarioRegistro() {
        return $this->GndwIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->GndwIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->GndwIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->GndwIdUserLastEdition = $Nombre;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->GndwDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->GndwDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->GndwDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->GndwDateLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'GndwIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'GndwIdUserLastEdition', 'SrIdUser');
    }

//    public function GetEstado() {
//        return $this->belongsto('Estado', 'VtmIdstate', 'StId');
//    }

    public function GetOperario() {
        return $this->belongsto('Operario', 'GndwIdWorker', 'WkrId');
    }

    public function GetMolienda() {
        return $this->belongsto('Molienda', 'GndwIdGrinding', 'GrnId');
    }
    
    /* Especial para los formularios */

    public function GetTextos() {
        return $this->Textos;
    }

    function __construct() {
        parent::__construct($this->NombreUrl, $this->GetId());
    }

}
