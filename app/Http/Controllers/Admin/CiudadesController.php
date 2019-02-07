<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ciudad;


class CiudadesController extends Controller
{
    
    public function index()
    {
        $ciudades = Ciudad::paginate(20);
        return view('admin.ciudades.index',compact('ciudades'));
    }

   
    public function create()
    {
        return view('admin.ciudades.crear');
        //
    }

   
    public function store(Request $request)
    {
        $ciudad= Ciudad::create([
            'nombre'=> $request->nombre,
           
        ]);
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $ciudad= Ciudad::find($id);
        return view('admin.ciudades.editar', compact('ciudad'));
    }

    
    public function update(Request $request, $id)
    {
        $ciudad= Ciudad::find($id);
        $ciudad->save();

       return redirect()->route('admin.ciudades.index');
    }

   
    public function destroy($id)
    {
        $ciudad=Ciudad::find($id);
        $ciudad->delete();

        return redirect()->route('admin.ciudades.index');
    }
}
