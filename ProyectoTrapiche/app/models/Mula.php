<?php

class Mula extends Intermediate {

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Mula';
    public $timestamps = false;
    protected $primaryKey = 'MlIdMule';
    protected $Nombre = 'MlName';
    protected $NombreModelo = ' Mula';
    protected $NombreUrl = 'mula';
    public $NombreModeloPlural = ' Mulas';

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
        return $this->MlIdMule;
    }

    public function GetNombre() {
        return $this->MlName;
    }

    public function SetNombre($Nombre) {
        $this->MlName = $Nombre;
    }

    public function GetIdSexo() {
        return $this->MlIdSex;
    }

    public function SetIdSexo($Nombre) {
        $this->MlIdSex = $Nombre;
    }

    public function GetEspecie() {
        return $this->MlSpecie;
    }

    public function SetEspecie($Nombre) {
        $this->MlSpecie = $Nombre;
    }

    public function GetDescripcion() {
        return $this->MlDescription;
    }

    public function SetDescripcion($Nombre) {
        $this->MlDescription = $Nombre;
    }

    public function GetIdEstado() {
        return $this->MlIdState;
    }

    public function SetIdEstado($Nombre) {
        $this->MlIdState = $Nombre;
    }

    public function GetIdUsuarioRegistro() {
        return $this->MlIdUserRegister;
    }

    public function SetIdUsuarioRegistro($Nombre) {
        $this->MlIdUserRegister = $Nombre;
    }

    public function GetIdUsuarioUltimaEdicion() {
        return $this->MlIdUserLastEdition;
    }

    public function SetIdUsuarioUltimaEdicion($Nombre) {
        $this->MlIdUserLastEdition = $Nombre;
    }

    public function GetFechaUltimaEdicion($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->MlDateLastEdition));
    }

    public function SetFechaUltimaEdicion($Parametro) {
        $this->MlDateLastEdition = $Parametro;
    }

    public function GetFechaRegistro($Formato = 'Y-m-d') {

        return date($Formato, strtotime($this->MlDateRecord));
    }

    public function SetFechaRegistro($Parametro) {
        $this->MlDateRecord = $Parametro;
    }

    /* Get Objects */

    public function GetUsuarioRegistro() {
        return $this->belongsto('Usuario', 'MlIdUserRegister', 'SrIdUser');
    }

    public function GetUsuarioUltimaEdicion() {
        return $this->belongsto('Usuario', 'MlIdUserLastEdition', 'SrIdUser');
    }

    public function GetSexo() {
        return $this->belongsto('Sexo', 'MlIdSex', 'SxIdSex');
    }

    public function GetEstado() {
        return $this->belongsto('Estado', 'MlIdState', 'StId');
    }

//
    public function GetVitaminas() {
        return $this->hasMany('Vitamina', 'VtmIdMule', 'MlIdMule');
    }

    public function GetHerrajes() {
        return $this->hasMany('Herraje', 'IrwIdMule', 'MlIdMule');
    }

    public function GetEnfermedades() {
        return $this->hasMany('Enfermedad', 'LlnIdMule', 'MlIdMule');
    }

    public function GetDesparacitaciones() {
        return $this->hasMany('Desparacitacion', 'DwrIdMule', 'MlIdMule');
    }

    public function GetPesajes() {
        return $this->hasMany('Pesaje', 'WgnIdMuleWeighing', 'MlIdMule');
    }

    /* Legendas Para Formularios */

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
