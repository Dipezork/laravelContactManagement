<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Verificar se o usuário está autenticado e possui a role igual a 1
        if (auth()->check() && auth()->user()->role_id == 2) {
            //
            $request->validate([
                'name' => 'required|min:5',
                'contact' => 'required|digits:9',
                'email' => 'required|email|unique:contacts',
            ]);

            $contact = new Contact;
            $contact->name = $request->name;
            $contact->contact = $request->contact;
            $contact->email = $request->email;
            $contact->save();

            return redirect()->route('contacts.index')->with('success', 'Contato adicionado com sucesso!');
        } else {
            // Usuário não autorizado, redirecionar ou mostrar uma mensagem de erro
            return redirect()->route('contacts.index')->with('error', 'Você não tem permissão para cadastrar um novo contato.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = Contact::findOrFail($id);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Verificar se o usuário está autenticado e possui a role igual a 1
        if (auth()->check() && auth()->user()->role_id == 2) {

            $contact = Contact::findOrFail($id);

            return view('contacts.edit', compact('contact'));
        } else {
            // Usuário não autorizado, redirecionar ou mostrar uma mensagem de erro
            return redirect()->route('contacts.index')->with('error', 'Você não tem permissão para editar um contato.');
        }
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Verificar se o usuário está autenticado e possui a role igual a 2
        if (auth()->check() && auth()->user()->role_id == 2) {
            $contact = Contact::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|min:5',
                'contact' => 'required|digits:9',
                'email' => 'required|email|unique:contacts,email,' . $contact->id,
            ]);

            $contact->update($validatedData);

            return redirect()->route('contacts.show', $contact->id)->with('success', 'Contato atualizado com sucesso!');
        } else {
            // Usuário não autorizado, redirecionar ou mostrar uma mensagem de erro
            return redirect()->route('contacts.index')->with('error', 'Você não tem permissão para editar um contato');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Verificar se o usuário está autenticado e possui a role igual a 2
        if (auth()->check() && auth()->user()->role_id == 2) {
            //
            $contact = Contact::findOrFail($id);
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Contato excluído com sucesso!');
        } else {
            // Usuário não autorizado, redirecionar ou mostrar uma mensagem de erro
            return redirect()->route('contacts.index')->with('error', 'Você não tem permissão para deletar um contato');
        }
    }
}
