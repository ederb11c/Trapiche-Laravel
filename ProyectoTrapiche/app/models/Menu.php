<?php

class Menu extends Intermediate {

    protected $table = 'MenMenus';
    protected $primaryKey = 'MenId';
    protected $ColNombre = array("MenNombre","MenDescripcion");
    protected $NombreModelo = ' Menu';
    protected $NombreUrl = 'menu';
    public $NombreModeloPlural = ' Menus';
    protected $fillable = array('MenNombre',
        'MenDescripcion',
        'MenLink',
        'MenTipoMenu',
        'MenIdEstado');
    protected $Textos = array();
    public static $rules = array(
        'MenNombre' => 'required',
        'MenLink' => 'required',
        'MenTipoMenu' => 'required',
        'MenIdEstado' => 'required'
    );

    function GetId() {
        return $this->MenId;
    }

    function GetNombre() {
        return $this->MenNombre;
    }
    public function GetTextos() {
        $Titulos = array();
        $Titulos["Create"] = array('AttrBtn' => $this->BtnCreate, 'Legend' => $this->LegendCreate, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlCreate, 'BtnName' => $this->BtnCreateName, 'C');
        $Titulos["Editado"] = array('AttrBtn' => $this->BtnEditado, 'Legend' => $this->LegendEditado, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEditado . "/" . $this->GetId(), 'BtnName' => $this->BtnEditadoName, 'C');
        $Titulos["Eliminado"] = array('AttrBtn' => $this->BtnEliminado, 'Legend' => $this->LegendEliminado, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEliminado . "/" . $this->GetId(), 'BtnName' => $this->BtnEliminadoName, 'C' => '1');
        $Titulos["Editar"] = array('AttrBtn' => $this->BtnEditar, 'Legend' => $this->LegendEditar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEditar . "/" . $this->GetId(), 'BtnName' => $this->BtnEditarName, 'C');
        $Titulos["Eliminar"] = array('AttrBtn' => $this->BtnEliminar, 'Legend' => $this->LegendEliminar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlEliminar . "/" . $this->GetId(), 'BtnName' => $this->BtnEliminarName, 'C');
        $Titulos["Detallar"] = array('AttrBtn' => $this->BtnDetallar, 'Legend' => $this->LegendDetallar, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlDetallar . "/" . $this->GetId(), 'BtnName' => $this->BtnDetallarName, 'C');
        $Titulos["Index"] = array('AttrBtn' => $this->BtnIndex, 'Legend' => $this->LegendIndex, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlIndex, "LegendAux" => $this->LegendIndexAux, 'BtnName' => '', 'C');
        $Titulos["Crear"] = array('AttrBtn' => $this->BtnCreate, 'Legend' => $this->LegendCreate, "NAMEURL" => $this->NombreUrl . "/" . $this->UrlCrear, 'BtnName' => $this->BtnCreateName, 'C');
        return $Titulos;
    }
     public function GetEstado() {
        return $this->belongsto('Estado', 'MenIdEstado', 'StId');
    }

    public function GetTipoMenu() {
    
        return $this->belongsto('TipoMenu', 'MenTipoMenu', 'TimId');
        
    }

}
