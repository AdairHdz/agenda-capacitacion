<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\PhoneNumber;
use Illuminate\Support\Facades\Session;

class ContactController extends Controller
{
    function index()
    {
        $retrievedContacts = Contact::all();
        $successMessage = Session::get("successMessage");
        if(isset($successMessage)) {
            return view("pages.home", [
                "successMessage" => $successMessage,
                "retrievedContacts" => $retrievedContacts
            ]);
        }
        
        return view("pages.home", [
            "retrievedContacts" => $retrievedContacts
        ]);
    }

    function store(StoreContactRequest $request)
    {
        $validatedData = $request->validated();
        $createdContact = new Contact;
        $firstName = $validatedData["firstName"];
        $middleName = $validatedData["middleName"];
        $lastName = $validatedData["lastName"];
        $birthDate = $validatedData["birthDate"];
        $emailAddress = $validatedData["emailAddress"];

        $phoneNumbers = [
            [
                "phone_number_type" => PhoneNumber::PHONE_HOME,
                "number" => $validatedData["homePhone"]
            ],
            [
                "phone_number_type" => PhoneNumber::PHONE_MOBILE,
                "number" => $validatedData["mobilePhone"]
            ],
            [
                "phone_number_type" => PhoneNumber::PHONE_WORK,
                "number" => $validatedData["workPhone"]
            ],
        ];

        $filledPhoneNumbers = array_filter($phoneNumbers, function($phoneNumber) {
            return !is_null($phoneNumber["number"]);
        });

        $time = strtotime($birthDate);
        $parsedDate = date("Y-m-d", $time);
        $createdContact->first_name = $firstName;
        $createdContact->middle_name = $middleName;
        $createdContact->last_name = $lastName;
        $createdContact->birth_date = $parsedDate;
        $createdContact->email_address = $emailAddress;
        $createdContact->save();

        $createdContact->phoneNumbers()->createMany($filledPhoneNumbers);

        return redirect()->route("contacts.index")->with("successMessage", "Contacto guardado correctamente");        
    }

    function edit($contactId)
    {
        $retrievedContact = Contact::find($contactId);        
        return view("pages.create-contact")->with("retrievedContact", $retrievedContact);
    }

    function update()
    {
        echo "Hola mundo";
    }

    function destroy($contactId)
    {
        $retrievedContact = Contact::find($contactId);
        $retrievedContact->delete();
        return redirect()
            ->route("contacts.index")
            ->with("successMessage", "Contacto correctamente eliminado");
    }
}
