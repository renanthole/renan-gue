@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('Seja bem vindo! Utilize o menu superior para utilização do sistema') }}
        </div>
    </div>
@endsection
