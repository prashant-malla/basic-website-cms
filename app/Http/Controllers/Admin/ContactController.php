<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate();

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        $success = $contact->delete();
        if ($success) {
            session()->flash('success', 'contact deleted!');
        } else {
            session()->flash('error', 'something went wrong!');
        }

        return to_route('admin.contacts.index');
    }
}
