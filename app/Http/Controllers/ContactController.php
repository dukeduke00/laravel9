<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $contactRepo;

    public function __construct()
    {
        $this->contactRepo = new ContactRepository();

    }

    public function index()
    {
        return view("Contact");
    }

    public function getAllContacts()
    {
        $allContacts = ContactModel::all(); // Isto kao da smo napisali : SELECT * FROM contacts
        return view("allContacts", compact("allContacts"));

    }

    public function sendContact(SendContactRequest $request)
    {

        $this->contactRepo->createContact($request);


        return redirect("/shop");
    }

    public function deleteContact(ContactModel $contact)
    {

        $contact->delete();

        return redirect()->back();
    }


}
