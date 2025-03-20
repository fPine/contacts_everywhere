@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($contacts)
                @foreach($contacts as $contact)
                    <div class="card">
                        <div class="card-header"><a href="{{ route('contacts.show') }}">{{ $contact->nome }}</a></div>
                        <div class="card-body">
                            <div>
                                {{ $contact->email }}
                            </div>
                            <br>
                            <div>
                                {{ $contact->telefone }}
                            </div>
                            <br>
                            <div style="display: flex; justify-content: flex-end">
                                <a href="{{ route('contacts.edit', $contact->id) }}">
                                    <button class="btn btn-primary">
                                        {{ __('Editar') }}
                                    </button>
                                </a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Deletar') }}
                                    </button>
                                </form>
                                </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>
@endsection
