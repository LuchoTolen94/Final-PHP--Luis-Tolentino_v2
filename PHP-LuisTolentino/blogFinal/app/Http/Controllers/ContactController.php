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
        // Recuperar el listado de contactos de la tabla contacts
        $contacts = Contact::all(); 
        // Pasar esta información recuperada a la vista
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $request->validate(['nickname' => 'required', 'first_name' => 'required', 'last_name' => 'required', 'email' => 'required']);
        
        $contact = new Contact([
            'nickname' => $request->get('nickname'),
            'first_name' => $request->get('first_name'), 
            'last_name' => $request->get('last_name'), 
            'email' => $request->get('email'), 
            'city' => $request->get('city'), 
            'country' => $request->get('country')
        ]);     
           
        $contact->save();
        return redirect('/contacts')->with('success', 'Contact saved!');   
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          // Obtener la información del contacto cuyo id sea el valor de la variable id en la URL
          $contact = Contact::find($id);
        
          return view('contacts.edit', compact('contact')); 
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
        $request->validate(['first_name'=>'required', 'last_name'=>'required','email'=>'required']);

        $contact = Contact::find($id);        
        
        $contact->nickname = $request->get('nickname');
        $contact->first_name = $request->get('first_name');
        $contact->last_name = $request->get('last_name');
        $contact->email = $request->get('email');
        $contact->city = $request->get('city');
        $contact->country = $request->get('country');
        
        $contact->save();  
        
        return redirect('/contacts')->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        
        return redirect('/contacts')->with('success', 'Contact deleted!'); 
    }
}
