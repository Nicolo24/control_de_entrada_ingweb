<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user=auth()->user();
        $persona=\App\Persona::where('id',$user->persona_id)->first();
        $movimientos=\App\Movimiento::orderBy('created_at','DESC')->get();

        //return \Carbon\Carbon::now();
        return view('home',compact('user','persona','movimientos'));
    }
}
