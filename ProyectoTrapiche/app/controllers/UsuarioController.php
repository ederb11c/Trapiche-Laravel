<?php

class UsuarioController extends BaseController {
    /*
      |--------------------------------------------------------------------------
      | Default Home Controller
      |--------------------------------------------------------------------------
      |
      | You may wish to use controllers instead of, or in addition to, Closure
      | based routes. That's great! Here is an example controller method to
      | get you started. To route to this controller, just add the route:
      |
      |	Route::get('/', 'HomeController@showWelcome');
      |
     */

    public function Index() {
        $Usuarios = Usuario::all();
        //$Usuarios=Usuario::where();
        return View::make('Usuario/Index')->with('Usuarios', $Usuarios);
    }

    public function Crear() {
        $Estados = $this->GetVectorForSelect(Estado::all());
        $Roles = $this->GetVectorForSelect(Rol::all());
        $Sexos = $this->GetVectorForSelect(Sexo ::all());
        $TiposIds = $this->GetVectorForSelect(TiposDeIdentificacion:: all());
        $Datos = array();
        $Datos["Estados"] = $Estados;
        $Datos["Roles"] = $Roles;
        $Datos["Sexos"] = $Sexos;
        $Datos["TiposIds"] = $TiposIds;
        return View::make('Usuario/Crear')->with('Datos', $Datos);
    }

    public function Creado() {
        $Usuario = new Usuario;
        $Usuario->SetNombre(Input::get('Nombre'));
        $Usuario->SetPApellido(Input::get('PApellido'));
        $Usuario->SetSApellido(Input::get('SApellido'));
        $Usuario->SetContrasena((Input::get('Contrasena')));
        $Usuario->SetIdEstado(Input::get('IdEstado'));
        $Usuario->SetLogin(Input::get('Login'));
        $Usuario->SetEmail(Input::get('Email'));
        $Usuario->SetFechaNacimiento(Input::get('FechaNacimiento'));
        $Usuario->SetFechaRegistro(date("Y-m-d H:i:s"));
        $Usuario->SetFechaUltimaActualizacion(date("Y-m-d H:i:s"));
        $Usuario->SetFechaUltimaEntrada(date("Y-m-d H:i:s"));
        $Usuario->SetIdRol(Input::get('IdRol'));
        $Usuario->SetIdSexo(Input::get('IdSexo'));
        $Usuario->SetNumeroDeId(Input::get('NoId'));
        $Usuario->SetIdTipoId(Input::get('IdTipoId'));
        $Usuario->SetIntentosDisponibles('3');
        $Usuario->SetIntentos(0);

        //IdTipoId/GetNumeroDeId
        $Usuario->save();
        return View::make('Usuario/Index')->with('Usuarios', Usuario::all());
    }

    public function Editar($Id) {
        $Usuario = Usuario::findOrFail($Id);
        if (($Usuario['error'] == true)) {
            return View::make('Usuario/Editar')->withErrors($Usuario['mensaje'])->withInput();
        } else {
            $Estados = $this->GetVectorForSelect(Estado::all());
            $Roles = $this->GetVectorForSelect(Rol::all());
            $Sexos = $this->GetVectorForSelect(Sexo ::all());
            $TiposIds = $this->GetVectorForSelect(TiposDeIdentificacion:: all());
            $Datos = array();
            $Datos["Estados"] = $Estados;
            $Datos["Roles"] = $Roles;
            $Datos["Sexos"] = $Sexos;
            $Datos["TiposIds"] = $TiposIds;
            return View::make('Usuario/Editar')->with('Datos', $Datos)->with("Usuario", $Usuario);
        }
    }

    public function Editado($Id) {
        $Usuario = Usuario::findOrFail($Id);
        if (($Usuario['error'] == true)) {
            return View::make('Usuario/Editar/' . $Id);
        } else {
            $Usuario->SetNombre(Input::get('Nombre'));
            $Usuario->SetPApellido(Input::get('PApellido'));
            $Usuario->SetSApellido(Input::get('SApellido'));
            if (Input::get('Contrasena') != $Usuario->GetContrasena()) {
                $Usuario->SetContrasena((Input::get('Contrasena')));
            }
            $Usuario->SetIdEstado(Input::get('IdEstado'));
            $Usuario->SetLogin(Input::get('Login'));
            $Usuario->SetEmail(Input::get('Email'));
            $Usuario->SetFechaNacimiento(Input::get('FechaNacimiento'));
            $Usuario->SetIdRol(Input::get('IdRol'));
            $Usuario->SetIdSexo(Input::get('IdSexo'));
            $Usuario->SetNumeroDeId(Input::get('NoId'));
            $Usuario->SetIdTipoId(Input::get('IdTipoId'));
            $Usuario->save();
            $Usuarios = Usuario::all();
            return View::make('Usuario/Index')->with('Usuarios', $Usuarios);
        }
    }

    public function Eliminar($Id) {

        $Usuario = Usuario::findOrFail($Id);
        if (($Usuario['error'] == true)) {
            return View::make('Usuario/Editar')->withErrors($Usuario['mensaje'])->withInput();
        } else {
            $Estados = $this->GetVectorForSelect(Estado::all());
            $Roles = $this->GetVectorForSelect(Rol::all());
            $Sexos = $this->GetVectorForSelect(Sexo ::all());
            $TiposIds = $this->GetVectorForSelect(TiposDeIdentificacion:: all());
            $Datos = array();
            $Datos["Estados"] = $Estados;
            $Datos["Roles"] = $Roles;
            $Datos["Sexos"] = $Sexos;
            $Datos["TiposIds"] = $TiposIds;
            return View::make('Usuario/Eliminar')->with('Datos', $Datos)->with("Usuario", $Usuario);
        }
    }

    public function Eliminado($Id) {

        $Usuario = Usuario::findOrFail($Id);
        $Usuario->delete();
        return View::make('Usuario/Index')->with('Usuarios', Usuario::all());
    }

    public function Detalles($Id) {

        $Usuario = Usuario::findOrFail($Id);
        if (($Usuario['error'] == true)) {
            return View::make('Usuario/Editar')->withErrors($Usuario['mensaje'])->withInput();
        } else {
            $Estados = $this->GetVectorForSelect(Estado::all());
            $Roles = $this->GetVectorForSelect(Rol::all());
            $Sexos = $this->GetVectorForSelect(Sexo ::all());
            $TiposIds = $this->GetVectorForSelect(TiposDeIdentificacion:: all());
            $Datos = array();
            $Datos["Estados"] = $Estados;
            $Datos["Roles"] = $Roles;
            $Datos["Sexos"] = $Sexos;
            $Datos["TiposIds"] = $TiposIds;
            return View::make('Usuario/Detalles')->with('Datos', $Datos)->with("Usuario", $Usuario);
        }
    }

}
