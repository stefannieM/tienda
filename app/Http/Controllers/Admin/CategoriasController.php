<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categoria;


class CategoriasController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::paginate(20);
        return view('admin.categorias.index',compact('categorias'));
    }

    
    public function create()
    {
        return view('admin.categorias.crear');
        
    }

    
    public function store(Request $request)
    {
        $categoria= Categoria::create([
            'nombre'=> $request->nombre,
           
        ]);
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $categoria= Categoria::find($id);
        return view('admin.categorias.editar', compact('categoria'));
    }

    
    public function update(Request $request, $id)
    {
        $categoria= Categoria::find($id);
        $categoria->save();

       return redirect()->route('admin.categorias.index');
    }

    
    public function destroy($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index');
    }
}
