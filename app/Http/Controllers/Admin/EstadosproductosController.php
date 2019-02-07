<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estadoproducto;


class EstadosproductosController extends Controller
{
   
    public function index()
    {
        $estadosproductos = Estadoproducto::paginate(20);
        return view('admin.estadosproductos.index',compact('estadosproductos'));
    }

   
    public function create()
    {
        return view('admin.estadosproductos.crear');
        
    }

   
    public function store(Request $request)
    {
         $estadosproductos= Estadoproducto::create([
            'nombre'=> $request->nombre,
           
        ]);
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
          $estadosproductos= Estadoproducto::find($id);
        return view('admin.estadosproductos.editar', compact('estadosproductos'));
    }

    
    public function update(Request $request, $id)
    {
        $estadosproductos= Estadoproducto::find($id);
        $estadosproductos->save();

       return redirect()->route('admin.estadosproductos.index');
    }

   
    public function destroy($id)
    {
       $estadosproductos=Estadoproducto::find($id);
        $estadosproductos->delete();

        return redirect()->route('admin.estadosproductos.index');
    }
}
