@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Meu Perfil') }}</div>

                    <div class="card-body">
                        <div>
                            <ul>
                                <li><b>Nome:</b> {{ $user->nome }}</li>
                                <li><b>E-mail:</b> {{ $user->email }}</li>
                            </ul>
                        </div>
                        <div style="display: flex; justify-content: flex-end;">
                            <a style="margin: 2px;" href="{{ route('users.edit', $user->id) }}"><button class="btn btn-success">Editar dados Cadastrais</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
