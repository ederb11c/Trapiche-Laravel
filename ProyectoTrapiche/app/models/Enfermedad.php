<?php

class Enfermedad extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Enfermedad';
    protected $primaryKey = 'LlnIdIllnes';
    protected $Nombre = 'MlName';
    protected $NombreModelo = ' Enfermedad';
    protected $NombreUrl = 'enfermedad';
    public $NombreModeloPlural = ' Enfermedades';

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
        return $this->LlnIdIllnes;
    }

    public function GetTratamiento() {
        return $this->LlnTreatment;
    }

    public function SetTratamiento($Nombre) {
        $this->LlnTreatment = $Nombre;
    }

    public function GetDescripcion() {
        return $this->LlnComents;
    }

    public function SetDescripcion($Nombre) {
        $this->LlnComents = $Nombre;
    }

    public function GetIdMula() {
        return $this->LlnIdMule;
    }

    public function SetIdMula($Nombre) {
        $this->LlnIdMule = $Nombre;
    }

    public function GetIdEstado() {
        return $this->LlnIdstate;
    }

    public function SetIdEstado($Nombre) {
        $this->LlnIdstate = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->LlnIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->LlnIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->LlnIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->LlnIdUserLastEdition = $Nombre;
    }

    public function GetFechaEnfermedad($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->LlnDateIllenes));
    }

    public function SetFechaEnfermedad($Parametro) {
        $this->LlnDateIllenes = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->LlnDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->LlnDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->LlnDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->LlnDateLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'LlnIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'LlnIdUserLastEdition', 'SrIdUser');
    }

//    public function GetEstado() {
//        return $this->belongsto('Estado', 'VtmIdstate', 'StId');
//    }

    public function GetMula() {
        return $this->belongsto('Mula', 'LlnIdMule', 'MlIdMule');
    }

    /* Especial para los formularios */

    public function GetTextos() {
        $Titulos = array();
        $Titulos["Create"] = array('AttrBtn' => $this->BtnCreate, 'Legend' => $this->LegendCreate, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlCreate, 'BtnName' => $this->BtnCreateName, 'C');
        $Titulos["Editado"] = array('AttrBtn' => $this->BtnEditado, 'Legend' => $this->LegendEditado, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEditado, 'BtnName' => $this->BtnEditadoName, 'C');
        $Titulos["Eliminado"] = array('AttrBtn' => $this->BtnEliminado, 'Legend' => $this->LegendEliminado, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEliminado, 'BtnName' => $this->BtnEliminadoName, 'C' => '1');
        $Titulos["Editar"] = array('AttrBtn' => $this->BtnEditar, 'Legend' => $this->LegendEditar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEditar . "/" . $this->GetId(), 'BtnName' => $this->BtnEditarName, 'C');
        $Titulos["Eliminar"] = array('AttrBtn' => $this->BtnEliminar, 'Legend' => $this->LegendEliminar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEliminar . "/" . $this->GetId(), 'BtnName' => $this->BtnEliminarName, 'C');
        $Titulos["Detallar"] = array('AttrBtn' => $this->BtnDetallar, 'Legend' => $this->LegendDetallar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlDetallar . "/" . $this->GetId(), 'BtnName' => $this->BtnDetallarName, 'C');
        $Titulos["Index"] = array('AttrBtn' => $this->BtnIndex, 'Legend' => $this->LegendIndex, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlIndex, "LegendAux" => $this->LegendIndexAux, 'BtnName' => '', 'C');
        $Titulos["Crear"] = array('AttrBtn' => $this->BtnCreate, 'Legend' => $this->LegendCreate, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlCrear, 'BtnName' => $this->BtnCreateName, 'C');
        $Titulos["Maestro"] = array('AttrBtn' => $this->BtnMaestro, 'Legend' => $this->LegendMaestro, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlMaestro, 'BtnName' => $this->BtnMaestroName, 'C');

        return $Titulos;
    }

}
