@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Perfil do Contato') }}</div>

                    <div class="card-body">
                        <div>
                            <ul>
                                <li><b>Nome:</b> {{ $contact->nome }}</li>
                                <li><b>E-mail:</b> {{ $contact->email }}</li>
                                <li><b>Telefone:</b> {{ $contact->telefone }}</li>
                                <li><b>Logradouro:</b> {{ $contact->logradouro }}</li>
                                <li><b>Número:</b> {{ $contact->numero }}</li>
                                <li><b>Bairro:</b> {{ $contact->bairro }}</li>
                                <li><b>CEP:</b> {{ $contact->cep }}</li>
                                <li><b>Cidade:</b> {{ $contact->cidade }}</li>
                                <li><b>Estado:</b> {{ $contact->estado }}</li>
                                <li><b>País:</b> {{ $contact->pais }}</li>
                            </ul>
                        </div>
                        <div style="display: flex; justify-content: flex-end;">
                            <a style="margin: 2px;" href="{{ route('contacts.edit', $contact->id) }}"><button class="btn btn-success">Editar</button></a>
                            <form style="margin: 2px;" action="{{ route('contacts.destroy', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Enviar para Lixeira</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
