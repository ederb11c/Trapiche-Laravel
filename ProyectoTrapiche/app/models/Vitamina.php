<?php

class Vitamina extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Vitaminizacion';
    public $timestamps = false;
    protected $primaryKey = 'VtmIdVitaminize';
    protected $NombreModelo = ' Vitamina';
    protected $NombreUrl = 'vitamina';
    public $NombreModeloPlural = ' Vitaminas';

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
        return $this->VtmIdVitaminize;
    }

    public function GetNombreProducto() {
        return $this->VtmProduct;
    }

    public function SetNombreProducto($Nombre) {
        $this->VtmProduct = $Nombre;
    }

    public function GetIdUnidadDeMedida() {
        return $this->VtmIdUntMeasurement;
    }

    public function SetIdUnidadDeMedida($Nombre) {
        $this->VtmIdUntMeasurement = $Nombre;
    }

    public function GetIdVia() {
        return $this->VtmIdPrep;
    }

    public function SetIdVia($Nombre) {
        $this->VtmIdPrep = $Nombre;
    }

    public function GetCantidad() {
        return round($this->VtmQuantity,$this->Presicion);
    }

    public function SetCantidad($Nombre) {
        $this->VtmQuantity = $Nombre;
    }

    public function GetDescripcion() {
        return $this->VtmComents;
    }

    public function SetDescripcion($Nombre) {
        $this->VtmComents = $Nombre;
    }

    public function GetIdMula() {
        return $this->VtmIdMule;
    }

    public function SetIdMula($Nombre) {
        $this->VtmIdMule = $Nombre;
    }

    public function GetIdEstado() {
        return $this->VtmIdstate;
    }

    public function SetIdEstado($Nombre) {
        $this->VtmIdstate = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->VtmIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->VtmIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->VtmIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->VtmIdUserLastEdition = $Nombre;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->VtmDateRecord));
    }

    public function GetFechaAplicacion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->VtmAplicationDate));
    }

    public function SetFechaAplicacion($Parametro) {
        $this->VtmAplicationDate = $Parametro;
    }

    public function SetFechaRegistro($Parametro) {
        $this->VtmDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->VtmDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->VtmDateLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'VtmIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'VtmIdUserLastEdition', 'SrIdUser');
    }

    public function GetVia() {
        return $this->belongsto('Via', 'VtmIdPrep', 'PrpIdPrep');
    }

//    public function GetEstado() {
//        return $this->belongsto('Estado', 'VtmIdstate', 'StId');
//    }

    public function GetMula() {
        return $this->belongsto('Mula', 'VtmIdMule', 'MlIdMule');
    }
    

    public function GetUndDeMedida() {
        return $this->belongsto('UnidadDeMedida', 'VtmIdUntMeasurement', 'UntmIdUnitMeasurement');
    }

    public function GetTextos() {
        $Titulos = array();
        $Titulos["Create"] = array('AttrBtn' => $this->BtnCreate, 'Legend' => $this->LegendCreate, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlCreate, 'BtnName' => $this->BtnCreateName, 'C');
        $Titulos["Editado"] = array('AttrBtn' => $this->BtnEditado, 'Legend' => $this->LegendEditado, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEditado, 'BtnName' => $this->BtnEditadoName, 'C');
        $Titulos["Eliminado"] = array('AttrBtn' => $this->BtnEliminado, 'Legend' => $this->LegendEliminado, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEliminado, 'BtnName' => $this->BtnEliminadoName, 'C' => '1');
        $Titulos["Editar"] = array('AttrBtn' => $this->BtnEditar, 'Legend' => $this->LegendEditar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEditar . "/" . $this->GetId(), 'BtnName' => $this->BtnEditarName, 'C');
        $Titulos["Eliminar"] = array('AttrBtn' => $this->BtnEliminar, 'Legend' => $this->LegendEliminar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEliminar . "/" . $this->GetId(), 'BtnName' => $this->BtnEliminarName, 'C');
        $Titulos["Detallar"] = array('AttrBtn' => $this->BtnDetallar, 'Legend' => $this->LegendDetallar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlDetallar . "/" . $this->GetId(), 'BtnName' => $this->BtnDetallarName, 'C');
        $Titulos["Index"] = array('AttrBtn' => $this->BtnIndex, 'Legend' => $this->LegendIndex, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlIndex, "LegendAux" => $this->LegendIndexAux, 'BtnName' => '', 'C');
        $Titulos["Crear"] = array('AttrBtn' => $this->BtnCreate, 'Legend' => $this->LegendCreate, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlCrear, 'BtnName' => $this->BtnCreateName, '');
        $Titulos["Maestro"] = array('AttrBtn' => $this->BtnMaestro, 'Legend' => $this->LegendMaestro, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlMaestro, 'BtnName' => $this->BtnMaestroName, '');
        return $Titulos;
    }

}
