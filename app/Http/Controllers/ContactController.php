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

        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|max:30',
            'cep' => 'required|max:10',
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:15',
            'bairro' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:255',
            'pais' => 'required|max:255'
        ]);

        Contact::create([
            'user_id' => $user_id,
            'nome' => $request->get('nome'),
            'email' => $request->get('email'),
            'telefone' => $request->get('telefone'),
            'cep' => $request->get('cep'),
            'logradouro' => $request->get('logradouro'),
            'numero' => $request->get('numero'),
            'bairro' => $request->get('bairro'),
            'cidade' => $request->get('cidade'),
            'estado' => $request->get('estado'),
            'pais' => $request->get('pais')
        ]);

        return redirect()->route('home');
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

        $request->validate([
            'nome' => 'required|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|max:30',
            'cep' => 'required|max:10',
            'logradouro' => 'required|max:255',
            'numero' => 'required|max:15',
            'bairro' => 'required|max:255',
            'cidade' => 'required|max:255',
            'estado' => 'required|max:255',
            'pais' => 'required|max:255'
        ]);

        if ($contact->exists) {
            $contact->nome = $request->get('nome');
            $contact->email = $request->get('email');
            $contact->telefone = $request->get('telefone');
            $contact->logradouro = $request->get('logradouro');
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

        return redirect()->route('home');
    }

    public function trashed() {
        $contacts = Contact::onlyTrashed()->get();

        return view('contacts.trashed', ['contacts' => $contacts]);
    }

    public function forceDelete($id)
    {
        $contact = Contact::withTrashed()->find($id);

        $contact->forceDelete();


        return redirect()->route('home');
    }

    public function restore($id) {

        $contact = Contact::withTrashed()->find($id);

        $contact->restore();


        return redirect()->route('home');
    }
}
