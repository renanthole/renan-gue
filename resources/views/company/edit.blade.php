@extends('layouts.app')

@section('content')
    <div class="content">
        <form action="{{ route('company.update', $empresas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <card-component title="Empresas">
                <template v-slot:body>
                    <div class="container-fluid">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="name">Nome *</label>
                                    <input type="text" name="name" id="name"
                                        value="{{ old('name', $empresas->name) }}" class="form-control" required>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <label for="cnpj">CNPJ *</label>
                                    <input type="text" name="cnpj" id="cnpj"
                                        value="{{ old('cnpj', $empresas->cnpj) }}" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
                <template v-slot:footer>
                    <button class="btn btn-primary">Cadastrar</button>
                    <a href="{{ route('company.index') }}" class="btn btn-default">Cancelar</a>
                </template>
            </card-component>
        </form>
    </div>
@endsection
