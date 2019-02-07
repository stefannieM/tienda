<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Estadopedido;


class EstadospedidosController extends Controller
{
   
    public function index()
    {
        $estadospedidos = Estadopedido::paginate(20);
        return view('admin.estadospedidos.index',compact('estadospedidos'));
    }

    
    public function create()
    {
        return view('admin.estadospedidos.crear');
        //
    }

    
    public function store(Request $request)
    {
         $estadopedido= Estadopedido::create([
            'nombre'=> $request->nombre,
           
        ]);
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $estadopedido= Estadopedido::find($id);
        return view('admin.estadospedidos.editar', compact('estadopedido'));
    }

   
    public function update(Request $request, $id)
    {
         $estadopedido= Estadopedido::find($id);
        $estadopedido->save();

       return redirect()->route('admin.estadospedidos.index');
    }

   
    public function destroy($id)
    {
        $estadopedido=Estadopedido::find($id);
        $estadopedido->delete();

        return redirect()->route('admin.estadospedidos.index');
    }
}
