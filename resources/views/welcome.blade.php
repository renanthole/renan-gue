@extends('layouts.app')

@section('content')
    <card-component>
        <template v-slot:body>
            <h4>Sistema de gerenciamento de Empresas e Usuários</h4>
            <hr />
            <p class="text-justify">Sistema desenvolvido utilizando Laravel com Vue JS + Bootstrap</p>
            <p class="text-justify">Para dar início, clique no botão "Registrar" no menu superior</p>
        </template>
    </card-component>
@endsection
