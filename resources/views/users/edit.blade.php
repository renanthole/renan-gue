@extends('layouts.app')

@section('content')
    <div class="content">
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="mb-3">
            @csrf
            @method('PUT')
            <card-component title="Usuários">
                <template v-slot:body>
                    <div class="container-fluid">
                        <div class="form-group">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="name">Nome *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" id="email"
                                        value="{{ old('email', $user->email) }}" class="form-control" required>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" id="phone"
                                        value="{{ old('phone', $user->phone) }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="birth_date">Data de Nascimento</label>
                                    <input type="date" name="birth_date" id="birth_date"
                                        value="{{ old('birth_date', $user->birth_date) }}" class="form-control">
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" id="city"
                                        value="{{ old('city', $user->city) }}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                                        class="form-control">
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="password">Confirmar Senha</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                        <hr />
                    </div>
                </template>
                <template v-slot:footer>
                    <button class="btn btn-primary">Salvar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                </template>
            </card-component>
        </form>
        <form action="{{ route('users.company', $user->id) }}" method="POST">
            @csrf
            @method('POST')
            <card-component title="Empresas">
                <template v-slot:body>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <select name="companies" id="companies" class="form-control">
                                    @forelse ($Empresas as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                        <option disabled selected>Nenhuma empresa cadastrada</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <button class="btn btn-primary">Cadastrar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Empresa</th>
                                            <th class="text-center">CPNJ</th>
                                            <th class="text-right">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user->empresas as $item)
                                            <tr>
                                                <td class="text-center">{{ $item->empresa->name }}</td>
                                                <td class="text-center">{{ $item->empresa->cnpj }}</td>
                                                <td class="text-right"><a href="#"
                                                        class="btn btn-danger btn-fill">Excluir</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </template>
            </card-component>
        </form>
    </div>
@endsection
