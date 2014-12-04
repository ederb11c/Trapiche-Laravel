<?php

class TipoOpcion extends Intermediate {

    protected $table = 'TioTipoDeOpciones';
    protected $primaryKey = 'TioId';
    protected $ColNombre = 'TioNombre';
    protected $NombreModelo = ' Tipo de Opcion';
    protected $NombreUrl = 'tipoopcion';
    public $NombreModeloPlural = ' Tipos  de Opcion';
//    protected $fillable = array('MenNombre',
//        'MenDescripcion',
//        'MenLink',
//        'MenTipoMenu',
//        'MenIdEstado');
//    protected $Textos = array();
//    public static $rules = array(
//        'MenNombre' => 'required',
//        'MenLink' => 'required',
//        'MenTipoMenu' => 'required',
//        'MenIdEstado' => 'required'
//    );

    function GetId() {
        return $this->TioId;
    }

    function GetNombre() {
        return $this->TioNombre;
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
        return $this->belongsto('Estado', 'TioIdEstado', 'EstId');
    }

   

}
