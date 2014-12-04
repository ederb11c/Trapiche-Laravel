<?php

class MenuVsRolController extends \BaseController {

    /**
     * Display a listing of Estados
     *
     * @return Response
     */
    public function Index() {
        $MenusVsRoles = MenuVsRol::where('MvrIdEstado', '>', '0')->get();

        return View::make('MenusVsRoles.Index')->with('Objetos', $MenusVsRoles);
    }

    /**
     * Show the form for creating a new Rol
     *
     * @return Response
     */
    public function Crear() {
        $MenuVsOpcion = new MenuVsRol; //Para Invocar Las Legendas del formulario
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Roles"] = $this->GetVectorForSelect(Rol::where("RlIdStatus","=","1")->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Crear"]; //Titulos
       
        return View::make('MenusVsRoles.Crear')->with('Datos', $Datos)->with("Objeto", $MenuVsOpcion); //->with("mensaje",'Usd No pose Permisos :U');
    }

    /**
     * Store a newly Creard Rol in storage.
     *
     * @return Response
     */
    public function Creado() {


        $validator = Validator::make($data = Input::all(), MenuVsRol::$rules, $this->messages);

        if ($validator->fails()) {
            $this->messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $MenuVsOpcion = new MenuVsRol($data);
        $MenuVsOpcion->MvrIdEstado = 1;
        $MenuVsOpcion->save();
        return Redirect::to("menuvsrol")->withSuccess($this->Registrado);
    }

    /**
     * Display the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $MenuVsOpcion = MenuVsRol::findOrFail($id);
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Roles"] = $this->GetVectorForSelect(Rol::where("RlIdStatus","=","1")->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Detallar"]; //Titulos
        $Datos["Index"] = $MenuVsOpcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('MenusVsRoles.Detalles')->with('Datos',$Datos)->with("Objeto", $MenuVsOpcion);
    }

    /**
     * Show the form for Editaring the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editar($id) {
        
        $MenuVsOpcion = MenuVsRol::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Roles"] = $this->GetVectorForSelect(Rol::where("RlIdStatus","=","1")->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Editado"]; //Titulos
        $Datos["Index"] = $MenuVsOpcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('MenusVsRoles.Editar')->with("Datos",$Datos)->with("Objeto",$MenuVsOpcion);
    }

    /**
     * Update the specified Rol in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $MenuVsOpcion = MenuVsRol::findOrFail($id);

        $messages = array(
            'required' => 'El :attribute no Puede ser nulo.',
        );
        $validator = Validator::make($data = Input::all(), MenuVsRol::$rules,$messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $MenuVsOpcion->update($data);
        $MenuVsOpcion->save();
        return Redirect::to("menuvsrol")->withSuccess($this->Editado);
    
    }

    
    /**
     * Remove the specified Rol from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $MenuVsOpcion = MenuVsRol::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Roles"] = $this->GetVectorForSelect(Rol::where("RlIdStatus","=","1")->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Eliminado"]; //Titulos
        $Datos["Index"] = $MenuVsOpcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('MenusVsRoles.Eliminar')->with("Datos",$Datos)->with("Objeto",$MenuVsOpcion);
    }
    public function Eliminado($id) {
        $MenuVsOpcion = MenuVsRol::findOrFail($id);
        $MenuVsOpcion->MvrIdEstado=0;
        $MenuVsOpcion->save();
        return Redirect::to("menuvsrol")->withSuccess($this->Eliminado);
    }

}
