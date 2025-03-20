@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($contacts as $contact)
                <div class="card">
                    <div class="card-header"><h4>{{ $contact->nome }}</h4></div>

                    <div class="card-body">
                        <div>
                           <ul style="list-style: none">
                               <li><b>Telefone:</b> {{ $contact->telefone }}</li>
                               <li><b>E-mail:</b> {{ $contact->email }}</li>
                           </ul>
                        </div>
                        <div style="display: flex; justify-content: flex-end;">
                            <a style="margin: 2px;" href="{{ route('restore', $contact->id) }}"><button class="btn btn-success">Restaurar</button></a>
                            <form style="margin: 2px;" action="{{ route('forceDelete', $contact->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
