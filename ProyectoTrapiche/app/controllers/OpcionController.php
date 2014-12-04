<?php

class OpcionController extends \BaseController {

    /**
     * Display a listing of Estados
     *
     * @return Response
     */
    public function Index() {
        $Opciones = Opcion::where('OpcIdEstado', '>', '0')->get();

        return View::make('Opciones.Index')->with('Objetos', $Opciones);
    }

    /**
     * Show the form for creating a new Rol
     *
     * @return Response
     */
    public function Crear() {
        $Opcion = new Opcion; //Para Invocar Las Legendas del formulario
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["TiposDeOpcion"] = $this->GetVectorForSelect(TipoOpcion::where('TioIdEstado', '>', '0')->get());
       
        $Datos["Legends"] = $Opcion->GetTextos()["Crear"]; //Titulos
       
        return View::make('Opciones.Crear')->with('Datos', $Datos)->with("Objeto", $Opcion); //->with("mensaje",'Usd No pose Permisos :U');
    }

    /**
     * Store a newly Creard Rol in storage.
     *
     * @return Response
     */
    public function Creado() {


        $validator = Validator::make($data = Input::all(), Opcion::$rules, $this->messages);

        if ($validator->fails()) {
            $this->messages = $validator->messages();
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Opcion = new Opcion($data);
        $Opcion->OpcIdEstado = 1;
        $Opcion->save();
        return Redirect::to("opcion")->withSuccess($this->Registrado);
    }

    /**
     * Display the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Detalles($id) {
        $Opcion = Opcion::findOrFail($id);
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["Legends"] = $Opcion->GetTextos()["Detallar"]; //Titulos
        $Datos["Index"] = $Opcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('Opciones.Detalles')->with('Datos',$Datos)->with("Objeto", $Opcion);
    }

    /**
     * Show the form for Editaring the specified Rol.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editar($id) {
        
        $Opcion = Opcion::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["TiposDeOpcion"] = $this->GetVectorForSelect(TipoOpcion::where('TioIdEstado', '>', '0')->get());
       
        $Datos["Legends"] = $Opcion->GetTextos()["Editado"]; //Titulos
        $Datos["Index"] = $Opcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('Opciones.Editar')->with("Datos",$Datos)->with("Objeto",$Opcion);
    }

    /**
     * Update the specified Rol in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Editado($id) {
        $Opcion = Opcion::findOrFail($id);

        $messages = array(
            'required' => 'El :attribute no Puede ser nulo.',
        );
        $validator = Validator::make($data = Input::all(), Opcion::$rules,$messages);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $Opcion->update($data);
        $Opcion->save();
        return Redirect::to("opcion")->withSuccess($this->Editado);
    
    }

    
    /**
     * Remove the specified Rol from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function Eliminar($id) {
        $Opcion = Opcion::find($id);
        
        $Datos["Estados"] = $this->GetVectorForSelect(Estado::where('StIdState', '=', '1')->get());
        $Datos["TiposDeOpcion"] = $this->GetVectorForSelect(TipoOpcion::where('TioIdEstado', '>', '0')->get());
       
        $Datos["Legends"] = $Opcion->GetTextos()["Eliminado"]; //Titulos
        $Datos["Index"] = $Opcion->GetTextos()["Index"]; //Titulos           
        
        return View::make('Opciones.Eliminar')->with("Datos",$Datos)->with("Objeto",$Opcion);
    }

    public function Eliminado($id) {
        $Opcion = Opcion::findOrFail($id);
        $Opcion->OpcIdEstado=0;
        $Opcion->save();
        return Redirect::to("opcion")->withSuccess($this->Eliminado);
    }

}
