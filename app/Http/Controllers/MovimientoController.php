<?php

namespace App\Http\Controllers;

use App\Movimiento;
use Illuminate\Http\Request;

/**
 * Class MovimientoController
 * @package App\Http\Controllers
 */
class MovimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movimientos = Movimiento::paginate();

        return view('movimiento.index', compact('movimientos'))
            ->with('i', (request()->input('page', 1) - 1) * $movimientos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movimiento = new Movimiento();
        return view('movimiento.create', compact('movimiento'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Movimiento::$rules);

        $movimiento = Movimiento::create($request->all());

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento = Movimiento::find($id);

        return view('movimiento.show', compact('movimiento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movimiento = Movimiento::find($id);

        return view('movimiento.edit', compact('movimiento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento)
    {
        request()->validate(Movimiento::$rules);

        $movimiento->update($request->all());

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movimiento = Movimiento::find($id)->delete();

        return redirect()->route('movimientos.index')
            ->with('success', 'Movimiento deleted successfully');
    }

    public function create_for_me(Request $request){
        $user=auth()->user();
        $persona=\App\Persona::where('id',$user->persona_id)->first();
        $token_entrada=new \App\Token();
        $token_entrada->code=random_int(100000,999999);
        $token_salida=new \App\Token();
        $token_salida->code=random_int(100000,999999);
        $token_entrada->save();
        $token_salida->save();
        $movimiento=new \App\Movimiento();
        $movimiento->token_entrada=$token_entrada->id;
        $movimiento->token_salida=$token_salida->id;
        $movimiento->persona_id=$user->persona_id;
        $movimiento->save();
        
        return redirect()->route('home');
    }

    public function create_for_else(Request $request){
        return $request;
    }

}