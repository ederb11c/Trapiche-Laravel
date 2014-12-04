<?php

class Herraje extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Herraje';
    protected $primaryKey = 'IrwIdIronWork';
    protected $ColNombre = 'MlName';
    protected $NombreModelo = ' Herraje';
    protected $NombreUrl = 'herraje';
    public $NombreModeloPlural = ' Herrajes';

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
        return $this->IrwIdIronWork;
    }

    public function GetIdMarca() {
        return $this->IrwMrkId;
    }

    public function SetIdMarca($Nombre) {
        $this->IrwMrkId = $Nombre;
    }

    public function GetIdTamano() {
        return $this->IrwIdSize;
    }

    public function SetIdTamano($Nombre) {
        $this->IrwIdSize = $Nombre;
    }

    public function GetIdMula() {
        return $this->IrwIdMule;
    }

    public function SetIdMula($Nombre) {
        $this->IrwIdMule = $Nombre;
    }

    public function GetIdEstado() {
        return $this->IrwIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->IrwIdState = $Nombre;
    }
      public function GetHerrador() {
        return $this->IrwFarrier;
    }

    public function SetHerrador($Nombre) {
        $this->IrwFarrier = $Nombre;
    }
    public function GetIdUsuarioRegistro() {
        return $this->IrwIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->IrwIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->IrwIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->IrwIdUserLastEdition = $Nombre;
    }

    public function GetFechaHerraje($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->IrwDateIronWork));
    }

    public function SetFechaHerraje($Parametro) {
        $this->IrwDateIronWork = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->IrwDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->IrwDateRecord = $Parametro;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->IrwDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->IrwDateLastEdition = $Parametro;
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
        return $this->belongsto('Mula', 'IrwIdMule', 'MlIdMule');
    }

    public function GetTamano() {
        return $this->belongsto('Tamano', 'IrwIdSize', 'SzIdSize');
    }
    
    public function GetMarca() {
        return $this->belongsto('MarcasDeHerradura', 'IrwMrkId', 'MrkId');
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
