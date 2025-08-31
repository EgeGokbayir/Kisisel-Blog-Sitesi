<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('created_at','DESC')->get();
        return view('back.contact.index',compact('contacts'));
    }

    public function see($id)
    {
        $contact = Contact::find($id);
        return view('back.contact.see',compact('contact'));
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        toastr()->success('Başarılı','Mesaj başarıyla silindi.');
        return redirect()->route('admin.contact.index');
    }
}
