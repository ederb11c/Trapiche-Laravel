<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class TiposDeOperario extends Eloquent implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    //protected $layout = 'layouts.master';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'TipoOperario';
    public $timestamps = false;
    protected $primaryKey = 'TwkrIdTypeWorker';
      protected $Nombre = 'TwkrNameTypeWorker';
  
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

      public function GetNombre() {
        return $this->TwkrNameTypeWorker;
    }

    public function GetIdEstado() {
        return $this->TwkrIdStateTypeWorker;
    }

    public function GetId() {
        return $this->TwkrIdTypeWorker;
    }
    
    public function GetEstado() {
         return $this->hasOne('Estado', 'StId', 'TwkrIdStateTypeWorker');

    }

    public function SetNombre($Nombre) {
        $this->TwkrNameTypeWorker = $Nombre;
    }

    public function SetIdEstado($IdEstado) {
        $this->TwkrIdStateTypeWorker=$IdEstado;
    }


}
