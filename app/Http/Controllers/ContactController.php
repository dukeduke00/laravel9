<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendContactRequest;
use App\Models\ContactModel;
use App\Repositories\ContactRepository;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ContactRepository();

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

        $this->productRepo->createContact($request);


        return redirect("/shop");
    }

    public function deleteContact($contact)
    {
        $singleContact = $this->productRepo->getContactById($contact);

        if($singleContact === null)
        {
            die("Ovaj kontakt ne postoji");
        }

        $singleContact->delete();

        return redirect()->back();
    }


}
