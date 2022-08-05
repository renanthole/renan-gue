@extends('layouts.app')

@section('content')
    <div class="content">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            @method('POST')
            <card-component title="Usuários">
                <template v-slot:body>
                    <div class="container-fluid">
                        <div class="form-group">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <label for="name">Nome *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                                        class="form-control" required>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="phone">Telefone</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="birth_date">Data de Nascimento</label>
                                    <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}"
                                        class="form-control">
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="city">Cidade</label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="password">Senha *</label>
                                    <input type="password" name="password" id="password" value="{{ old('password') }}"
                                        class="form-control" required>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="password">Confirmar Senha *</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-slot:footer>
                    <button class="btn btn-primary">Cadastrar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Cancelar</a>
                </template>
            </card-component>
        </form>
    </div>
@endsection
