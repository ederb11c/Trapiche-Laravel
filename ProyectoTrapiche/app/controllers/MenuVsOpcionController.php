<?php

class MenuVsOpcionController extends \BaseController {

    /**
     * Display a listing of Estados
     *
     * @return Response
     */
    public function Index() {
        $MenusVsOpciones = MenuVsOpcion::where('MvoIdEstado', '>', '0')->get();

        return View::make('MenusVsOpciones.Index')->with('Objetos', $MenusVsOpciones);
    }

    /**
     * Show the form for creating a new Rol
     *
     * @return Response
     */
    public function Crear() {
        $MenuVsOpcion = new MenuVsOpcion; //Para Invocar Las Legendas del formulario
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Opciones"] = $this->GetVectorForSelect(Opcion::where('OpcIdEstado', '=', '1')->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Crear"]; //Titulos
       
        return View::make('MenusVsOpciones.Crear')->with('Datos', $Datos)->with("Objeto", $MenuVsOpcion); //->with("mensaje",'Usd No pose Permisos :U');
    }

    /**
     * Store a newly Creard Rol in storage.
     *
     * @return Response
     */
    public function Creado() {


        $validator = Validator::make($data = Input::all(), MenuVsOpcion::$rules, $this->messages);

        if ($validator->fails()) {
            $this->messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $MenuVsOpcion = new Opcion($data);
        $MenuVsOpcion->MvoIdEstado = 1;
        $MenuVsOpcion->save();
        return Redirect::to("menuvsopcion")->withSuccess($this->Creado);
    }

    /**
     * Display the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $MenuVsOpcion = MenuVsOpcion::findOrFail($id);
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Opciones"] = $this->GetVectorForSelect(Opcion::where('OpcIdEstado', '=', '1')->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Detallar"]; //Titulos
        $Datos["Index"] = $MenuVsOpcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('MenusVsOpciones.Detalles')->with('Datos',$Datos)->with("Objeto", $MenuVsOpcion);
    }

    /**
     * Show the form for Editaring the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editar($id) {
        
        $MenuVsOpcion = MenuVsOpcion::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
         $Datos["Opciones"] = $this->GetVectorForSelect(Opcion::where('OpcIdEstado', '=', '1')->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Editado"]; //Titulos
        $Datos["Index"] = $MenuVsOpcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('MenusVsOpciones.Editar')->with("Datos",$Datos)->with("Objeto",$MenuVsOpcion);
    }

    /**
     * Update the specified Rol in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $MenuVsOpcion = MenuVsOpcion::findOrFail($id);

        $messages = array(
            'required' => 'El :attribute no Puede ser nulo.',
        );
        $validator = Validator::make($data = Input::all(), MenuVsOpcion::$rules,$messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $MenuVsOpcion->update($data);
        $MenuVsOpcion->save();
        return Redirect::to("menuvsopcion")->withSuccess($this->Editado);
    
    }

    
    /**
     * Remove the specified Rol from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $MenuVsOpcion = MenuVsOpcion::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
         $Datos["Opciones"] = $this->GetVectorForSelect(Opcion::where('OpcIdEstado', '=', '1')->get());
        $Datos["Menus"] = $this->GetVectorForSelect(Menu::where('MenIdEstado', '=', '1')->get());
       
        $Datos["Legends"] = $MenuVsOpcion->GetTextos()["Eliminado"]; //Titulos
        $Datos["Index"] = $MenuVsOpcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('MenusVsOpciones.Eliminar')->with("Datos",$Datos)->with("Objeto",$MenuVsOpcion);
    }

    public function Eliminado($id) {
        $MenuVsOpcion = MenuVsOpcion::findOrFail($id);
        $MenuVsOpcion->MvoIdEstado=0;
        $MenuVsOpcion->save();
        return Redirect::to("menuvsopcion")->withSuccess($this->Eliminado);
    }

}
