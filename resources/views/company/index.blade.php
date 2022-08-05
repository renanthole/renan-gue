@extends('layouts.app')

@section('content')
    <div class="content">
        <card-component title="Empresas">
            <template v-slot:body>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('company.create') }}" class="btn btn-primary">Novo</a>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">CPNJ</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Empresas as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->cnpj }}</td>
                                        <td class="text-right"><a href="{{ route('company.edit', $item->id) }}" class="btn btn-warning btn-fill">Editar</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </template>
        </card-component>
    </div>
@endsection
