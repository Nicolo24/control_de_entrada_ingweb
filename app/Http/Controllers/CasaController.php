<?php

namespace App\Http\Controllers;

use App\Casa;
use Illuminate\Http\Request;

/**
 * Class CasaController
 * @package App\Http\Controllers
 */
class CasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $casas = Casa::paginate();

        return view('casa.index', compact('casas'))
            ->with('i', (request()->input('page', 1) - 1) * $casas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $casa = new Casa();
        return view('casa.create', compact('casa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Casa::$rules);

        $casa = Casa::create($request->all());

        return redirect()->route('casas.index')
            ->with('success', 'Casa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $casa = Casa::find($id);

        return view('casa.show', compact('casa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $casa = Casa::find($id);

        return view('casa.edit', compact('casa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Casa $casa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Casa $casa)
    {
        request()->validate(Casa::$rules);

        $casa->update($request->all());

        return redirect()->route('casas.index')
            ->with('success', 'Casa updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $casa = Casa::find($id)->delete();

        return redirect()->route('casas.index')
            ->with('success', 'Casa deleted successfully');
    }
}
