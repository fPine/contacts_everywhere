<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::query()->where('user_id', Auth::id())->get();

        return view('contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();

        Contact::create([
            'user_id' => $user_id,
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'rua' => $request->get('rua'),
            'numero' => $request->get('numero'),
            'bairro' => $request->get('bairro'),
            'cidade' => $request->get('cidade'),
            'estado' => $request->get('estado'),
            'cep' => $request->get('cep'),
            'pais' => $request->get('pais'),
        ]);

        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $contact = Contact::query()->find($contact->id);

        return view('contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        $contact = Contact::query()->find($contact->id);

        return view('contacts.edit', ['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $contact = Contact::query()->find($contact->id);

        if ($contact->exists) {
            $contact->nome = $request->get('nome');
            $contact->email = $request->get('email');
            $contact->telefone = $request->get('telefone');
            $contact->rua = $request->get('rua');
            $contact->numero = $request->get('numero');
            $contact->bairro = $request->get('bairro');
            $contact->cidade = $request->get('cidade');
            $contact->estado = $request->get('estado');
            $contact->cep = $request->get('cep');
            $contact->pais = $request->get('pais');

            $contact->push();
        }

        return redirect()->route('contacts.show', ['contact' => $contact]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact = Contact::query()->find($contact->id);

        if ($contact->exists) {
            $contact->delete();
        }

        return redirect()->route('contacts.index');
    }
}
