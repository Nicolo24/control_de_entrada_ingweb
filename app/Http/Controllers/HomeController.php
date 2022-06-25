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
        $movimientos=$movimientos->filter(function ($value,$key) use ($persona){
            return $value->persona->casa_id == $persona->casa_id;
        });
        $casas=[$persona->casa];
        $roles=[\App\Role::find(4)];
        $invitados=\App\Persona::where('casa_id',$persona->casa_id)->where('role',4)->get();
        $invitado=new \App\Persona();

        //return \Carbon\Carbon::now();
        return view('home',compact('user','persona','movimientos','casas','roles','invitados','invitado'));
    }
}
