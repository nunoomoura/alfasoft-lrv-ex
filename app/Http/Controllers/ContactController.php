<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contacts.create');
    }
    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->validated());

        return redirect()->route('contacts.show', $contact)->withSuccess('Contact created successfully');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', ['contact' => $contact]);
    }

    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return redirect()->back()->withSuccess('Contact updated successfully');
    }

    public function delete(Contact $contact) {
        $contact->delete();

        return redirect()->route('dashboard');
    }
}
