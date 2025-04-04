@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="margin-bottom: 30px">
                <div class="card-header" style="display: flex; justify-content: center"><h3>Bem-vindo, você possui {{ $contacts->count() }} contatos cadastrados.</h3></div>
            </div>
            @foreach($contacts as $contact)
                <div class="card" style="margin-bottom: 10px">
                    <div class="card-header"><h4><a href="{{ route('contacts.show', $contact->id) }}">{{ $contact->nome }}</a></h4></div>

                    <div class="card-body">
                        <div>
                           <ul style="list-style: none">
                               <li><b>Telefone:</b> {{ $contact->telefone }}</li>
                               <li><b>E-mail:</b> {{ $contact->email }}</li>
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
            @endforeach
        </div>
    </div>
</div>
@endsection
