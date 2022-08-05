<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEmpresasRequest;
use App\Http\Resources\EmpresasResource;
use App\Models\Empresas;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index', ['Empresas' => Empresas::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Empresas::create([
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'created_at' => now()
        ]);

        Alert::toast("Cadastro inserido com sucesso", "success");
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresas)
    {
        return EmpresasResource::collection($empresas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresas)
    {
        return view('company.edit', compact('empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresas)
    {
        $empresas->update([
            'name' => $request->name,
            'cnpj' => $request->cnpj,
            'updated_at' => now()
        ]);

        Alert::toast("Cadastro alterado com sucesso", "success");
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresas $empresas)
    {
        Alert::toast("Cadastro excluído com sucesso", "warning");
        return $empresas->delete();
    }
}
