<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Intermediate extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //public $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $Presicion = '4';
    public $timestamps = false;
    /* Interno */
    public $UrlCreate = 'creado';
    public $UrlCrear = 'crear';
    public $UrlEditado = 'editado';
    public $UrlEliminado = 'eliminado';
    public $UrlEditar = 'editar';
    public $UrlEliminar = 'eliminar';
    public $UrlDetallar = 'detalles';
    public $UrlIndex = 'index';
    /* Externo */
    public $LegendCreate = 'Registrar';
    public $LegendEditado = 'Editar';
    public $LegendEliminado = 'Estas seguro de Eliminar el siguiente registro?';
    public $LegendEditar = 'Editar';
    public $LegendEliminar = 'Eliminar';
    public $LegendDetallar = 'Detalles';
    public $LegendIndex = ' Ir a La Lista ';
    public $LegendIndexAux = 'Lista de ';
    public $LegendMaestro = ' Maestro de ';


    /* Css BTN */
    public $BtnCreateName = 'Registrar';
    public $BtnEditadoName = 'Editar';
    public $BtnEliminadoName = 'Eliminar';
    public $BtnEditarName = 'Editar';
    public $BtnEliminarName = 'Eliminar';
    public $BtnDetallarName = 'Detalles';
    public $BtnIndexName = '';
    public $BtnMaestroName = ' Btn Maestro';
    public $BtnCreate = array('class' => 'btn btn-primary');
    public $BtnEditado =array('class' => 'btn btn-primary');
    public $BtnEliminado = array('class' => 'btn btn-danger');
    public $BtnEditar = array('class' => 'btn btn-primary');
    public $BtnEliminar = array('class' => 'btn btn-danger');
    public $BtnDetallar = array('class' => 'btn btn-primary', 'disabled');
    public $BtnIndex = '';
    protected $NombreModelo = '';
    protected $NombreModeloPlural = '';
    protected $NombreUrl = '';
    protected $ColNombre = "";
    protected $Textos = array();

    function GetNombreModelo() {
        return $this->NombreModelo;
    }

    function GetNombreModeloUrl() {
        return $this->NombreUrl;
    }

    public function GetNombreModeloPlural() {
        return $this->NombreModeloPlural;
    }

    public function GetPrimaryKey() {
        return $this->primaryKey;
    }

    public function GetNombreColumna() {
        return $this->ColNombre;
    }

}
