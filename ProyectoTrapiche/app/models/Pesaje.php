<?php

class Pesaje extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Pesaje';
    protected $primaryKey = 'WgnIdWeighing';
    protected $Nombre = 'MlName';
    protected $NombreModelo = ' Pesaje';
    protected $NombreUrl = 'pesaje';
    public $NombreModeloPlural = ' Pesajes';

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
        return $this->WgnIdWeighing;
    }

    public function GetPeso() {
        return round($this->WgnWeightWeighing,  $this->Presicion);
    }

    public function SetPeso($Nombre) {
        $this->WgnWeightWeighing = $Nombre;
    }

    public function GetDescripcion() {
        return $this->WgnComents;
    }

    public function SetDescripcion($Nombre) {
        $this->WgnComents = $Nombre;
    }

    public function GetIdUndDeMedida() {
        return $this->WgnIdUnitMeasurement;
    }

    public function SetIdUndDeMedida($Nombre) {
        $this->WgnIdUnitMeasurement = $Nombre;
    }

    public function GetIdMula() {
        return $this->WgnIdMuleWeighing;
    }

    public function SetIdMula($Nombre) {
        $this->WgnIdMuleWeighing = $Nombre;
    }

    public function GetIdEstado() {
        return $this->WgnIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->WgnIdState = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->WgnIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->WgnIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->WgnIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->WgnIdUserLastEdition = $Nombre;
    }

    public function GetFechaPesaje($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->WgnDateWeighing));
    }

    public function SetFechaPesaje($Parametro) {
        $this->WgnDateWeighing = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->WgnDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->WgnDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->WgnDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->WgnDateLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'WgnIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'IrwIdUserLastEdition', 'SrIdUser');
    }

//    public function GetEstado() {
//        return $this->belongsto('Estado', 'VtmIdstate', 'StId');
//    }

    public function GetMula() {
        return $this->belongsto('Mula', 'WgnIdMuleWeighing', 'MlIdMule');
    }

    public function GetUnidadDeMedida() {
        return $this->belongsto('UnidadDeMedida', 'WgnIdUnitMeasurement', 'UntmIdUnitMeasurement');
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
