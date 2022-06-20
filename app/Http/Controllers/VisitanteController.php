<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Movimiento;
use \App\Persona;
use \App\Token;

class VisitanteController extends Controller
{
    public function create()
    {
        $movimiento = new Movimiento();
        return view('movimiento.create', compact('movimiento'));
    }

    public function store(Request $request){
        $movimiento = Persona::create($request->all());

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento created successfully.');
    }
}
