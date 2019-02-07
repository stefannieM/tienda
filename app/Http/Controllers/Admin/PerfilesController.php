<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perfil;

class PerfilesController extends Controller
{
    //Función para listar los perfiles
    public function index()
    {
        $perfiles = Perfil::paginate(20);
        return view('admin.perfiles.index',compact('perfiles'));
    }

    //Función para mostrar el formulario para crear un nuevo perfil
    public function create()
    {
        return view('admin.perfiles.crear');
    }
   

   //Funcion para recibir, validar y guardar un nuevo perfil
    public function store(Request $request)
    {
         //Validar los datos
        $request->validate([
            'nombre'=>'required|max:10',
            
        ]);
//Guardar los datos recibidos del Perfil en la tabla perfiles

        $perfil= Perfil::create([
            'nombre'=> $request->nombre,
           
        ]);
//Redireccionar a la ruta del listado de clientes
        return redirect()->route('admin.perfiles.index')->with('mensaje','guardado con exito');
    }

    
    public function show($id)
    {
    
    }

//Función para mostrar el formulario de edición de un Perfil
//Buscar la información del ID Perfil recibido    
    public function edit($id)
    {
        $perfil= Perfil::find($id);
        return view('admin.perfiles.editar', compact('perfil'));
    }

    public function update(Request $request, $id)
    {
        $perfil= Perfil::find($id);
        $perfil->save();

       return redirect()->route('admin.perfiles.index');
    }

    
    public function destroy($id)
    {
        $perfil=Perfil::find($id);
        $perfil->delete();

        return redirect()->route('admin.perfiles.index');
    }
}
