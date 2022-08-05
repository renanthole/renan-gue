@extends('layouts.app')

@section('content')
    <div class="content">
        <card-component title="Usuários">
            <template v-slot:body>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <a href="{{ route('users.create') }}" class="btn btn-primary">Novo</a>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Telefone</th>
                                    <th class="text-center">Nascimento</th>
                                    <th class="text-center">Cidade</th>
                                    <th class="text-right">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Users as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->name }}</td>
                                        <td class="text-center">{{ $item->email }}</td>
                                        <td class="text-center">{{ $item->phone === null ? ' - ' : $item->phone }}</td>
                                        <td class="text-center">{{ $item->birth_date === null ? ' - ' : date('d/m/Y', strtotime($item->birth_date)) }}</td>
                                        <td class="text-center">{{ $item->city === null ? ' - ' : $item->city }}</td>
                                        <td class="text-right"><a href="{{ route('users.edit', $item->id) }}" class="btn btn-warning btn-fill">Editar</a></td>
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
