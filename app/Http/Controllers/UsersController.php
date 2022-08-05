<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUsersRequest;
use App\Http\Resources\UsersResource;
use App\Models\Empresas;
use App\Models\User;
use App\Models\UsersEmpresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ["Users" => User::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsersRequest $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'city' => $request->city,
            'password' => Hash::make($request->password),
            'created_at' => now()
        ]);

        Alert::toast("Cadastro inserido com sucesso", "success");
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return UsersResource::collection($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'), ["Empresas" => Empresas::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
            'city' => $request->city,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'updated_at' => now()
        ]);

        Alert::toast("Cadastro alterado com sucesso", "success");
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::toast("Cadastro excluído com sucesso", "warning");
        return redirect()->route('users.index');
    }

    public function userCompany(Request $request, User $user)
    {
        UsersEmpresas::firstOrCreate(['empresa_id' => $request->input("companies"), 'user_id' => $user->id], ['created_at' => now()]);
        Alert::toast("Vinculo realizado com sucesso", "success");
        return redirect()->route('users.edit', $user->id);
    }

    public function destroyUserCompany(Request $request, UsersEmpresas $user)
    {
        $user->delete();
        Alert::toast("Cadastro excluído com sucesso", "warning");
        return redirect()->route('users.edit', $user->id);
    }
}
