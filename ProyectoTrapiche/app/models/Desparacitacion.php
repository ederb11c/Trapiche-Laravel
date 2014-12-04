<?php

class Desparacitacion extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Desparacitacion';
    protected $primaryKey = 'DwrIdDeworming';
    protected $Nombre = 'MlName';
    protected $NombreModelo = ' Desparacitacion';
    protected $NombreUrl = 'desparacitacion';
    public $NombreModeloPlural = ' Desparacitaciones';

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
        return $this->DwrIdDeworming;
    }

    public function GetProducto() {
        return $this->DwrProduct;
    }

    public function SetProducto($Nombre) {
        $this->DwrProduct = $Nombre;
    }

    public function GetDescripcion() {
        return $this->DwrComents;
    }

    public function SetDescripcion($Nombre) {
        $this->DwrComents = $Nombre;
    }

    public function GetCantidad() {
        return round($this->DwrQuantity,  $this->Presicion);
    }

    public function SetCantidad($Nombre) {
        $this->DwrQuantity = $Nombre;
    }

    public function GetIdMula() {
        return $this->DwrIdMule;
    }

    public function SetIdMula($Nombre) {
        $this->DwrIdMule = $Nombre;
    }

    public function GetIdEstado() {
        return $this->DwrIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->DwrIdState = $Nombre;
    }

    public function GetIdVia() {
        return $this->DwrIdPrep;
    }

    public function SetIdVia($Nombre) {
        $this->DwrIdPrep = $Nombre;
    }

    public function GetIdUndDeMedida() {
        return $this->DwrIdUntMeasurement;
    }

    public function SetIdUndDeMedida($Nombre) {
        $this->DwrIdUntMeasurement = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->DwrIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->DwrIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->DwrIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->DwrIdUserLastEdition = $Nombre;
    }

    public function GetFechaDesparacitacion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->DwrAplicationDate));
    }

    public function SetFechaDesparacitacion($Parametro) {
        $this->DwrAplicationDate = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->DwrDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->DwrDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->DwrDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->DwrDateLastEdition = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'IrwIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'IrwIdUserLastEdition', 'SrIdUser');
    }

//    public function GetEstado() {
//        return $this->belongsto('Estado', 'VtmIdstate', 'StId');
//    }

    public function GetMula() {
        return $this->belongsto('Mula', 'DwrIdMule', 'MlIdMule');
    }

    public function GetUndDeMedida() {
        return $this->belongsto('UnidadDeMedida', 'DwrIdUntMeasurement', 'UntmIdUnitMeasurement');
    }

    public function GetVia() {
        return $this->belongsto('Via', 'DwrIdPrep', 'PrpIdPrep');
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
