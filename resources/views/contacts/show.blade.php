@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Perfil do Contato') }}</div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="nome" class="col-md-4 col-form-label text-md-end">{{ __('Nome') }}</label>

                            <div class="col-md-6">
                                <h3>{{ $contact->nome }}</h3>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefone"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Telefone') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->telefone }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="logradouro"
                                   class="col-md-4 col-form-label text-md-end">{{ __('Logradouro') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->logradouro }}, {{ $contact->numero }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bairro" class="col-md-4 col-form-label text-md-end">{{ __('Bairro') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->bairro }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cidade" class="col-md-4 col-form-label text-md-end">{{ __('Cidade') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->cidade }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->estado }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="cep" class="col-md-4 col-form-label text-md-end">{{ __('CEP') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->cep }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pais" class="col-md-4 col-form-label text-md-end">{{ __('País') }}</label>

                            <div class="col-md-6">
                                <p>{{ $contact->pais }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
