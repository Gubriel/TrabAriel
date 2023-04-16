<?php

namespace App\Http\Controllers;

use App\Models\Local;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class LocaisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locais = Local::paginate(25);
        Paginator::useBootstrap();
        return view('local.lista', compact('locais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('local.formulario');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $local = new Local();
        $local->fill($request->all());
        if ($local->save()){
            $request->session()->flash('mensagem_sucesso', 'Local Salvo');
        } else {
            $request-> session()->flash('mensagem_erro', 'Deu Erro');
        }

        return Redirect::to('local/create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Local $local)
    {
        $local = Local::findOrFail($local->id);
        return view('local.formulario', compact('local'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Local $local)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Local $local)
    {
        $local = Local::findOrFail($local->id);
        $local->fill($request->all());
        if ($local->save()){
            $request->session()->flash('mensagem_sucesso', 'Local Alterado');
        } else {
            $request-> session()->flash('mensagem_erro', 'Deu Erro');
        }

        return Redirect::to('local/' . $local->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Local $local)
    {
        $local = Local::findOrFail($local->id);
        $local->delete();
        return Redirect::to('local');
     }
}
