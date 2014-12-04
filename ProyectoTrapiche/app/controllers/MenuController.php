<?php

class MenuController extends \BaseController {

    /**
     * Display a listing of Estados
     *
     * @return Response
     */
    public function Index() {
        $Menus = Menu::where('MenIdEstado', '>', '0')->get();

        return View::make('Menus.Index')->with('Objetos', $Menus);
    }

    /**
     * Show the form for creating a new Rol
     *
     * @return Response
     */
    public function Crear() {
        $Menu = new Menu; //Para Invocar Las Legendas del formulario
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["TiposDeMenu"] = $this->GetVectorForSelect(TipoMenu::where('TimIdEstado', '>', '0')->get());
       
        $Datos["Legends"] = $Menu->GetTextos()["Crear"]; //Titulos
       
        return View::make('Menus.Crear')->with('Datos', $Datos)->with("Objeto", $Menu); //->with("mensaje",'Usd No pose Permisos :U');
    }

    /**
     * Store a newly Creard Rol in storage.
     *
     * @return Response
     */
    public function Creado() {


        $messages = array(
            'required' => 'El :attribute no Puede ser nulo.',
        );
        $validator = Validator::make($data = Input::all(), Menu::$rules, $messages);

        if ($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Menu = new Menu($data);
        $Menu->MenIdEstado = 1;
        $Menu->save();
        return Redirect::to("menu")->withSuccess($this->Registrado);
    }

    /**
     * Display the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Menu = Menu::findOrFail($id);
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Legends"] = $Menu->GetTextos()["Detallar"]; //Titulos
        $Datos["Index"] = $Menu->GetTextos()["Index"]; //Titulos           
        
        return View::make('Menus.Detalles')->with('Datos',$Datos)->with("Objeto", $Menu);
    }

    /**
     * Show the form for Editaring the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editar($id) {
        
        $Menu = Menu::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
            $Datos["TiposDeMenu"] = $this->GetVectorForSelect(TipoMenu::where('TimIdEstado', '>', '0')->get());
    
        $Datos["Legends"] = $Menu->GetTextos()["Editado"]; //Titulos
        $Datos["Index"] = $Menu->GetTextos()["Index"]; //Titulos           
        
        return View::make('Menus.Editar')->with("Datos",$Datos)->with("Objeto",$Menu);
    }

    /**
     * Update the specified Rol in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $Menu = Menu::findOrFail($id);

        $messages = array(
            'required' => 'El :attribute no Puede ser nulo.',
        );
        $validator = Validator::make($data = Input::all(), Menu::$rules,$messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Menu->update($data);
        $Menu->save();
        return Redirect::to("menu")->withSuccess($this->Editado);
    
    }

    
    /**
     * Remove the specified Rol from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Menu = Menu::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
            $Datos["TiposDeMenu"] = $this->GetVectorForSelect(TipoMenu::where('TimIdEstado', '>', '0')->get());
    
        $Datos["Legends"] = $Menu->GetTextos()["Eliminado"]; //Titulos
        $Datos["Index"] = $Menu->GetTextos()["Index"]; //Titulos           
        
        return View::make('Menus.Eliminar')->with("Datos",$Datos)->with("Objeto",$Menu);
    }

    public function Eliminado($id) {
        $Menu = Menu::findOrFail($id);
        $Menu->MenIdEstado=0;
        $Menu->save();
        return Redirect::to("menu")->withSuccess($this->Eliminado);
    }

}
