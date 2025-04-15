<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function show()
    {
        $contact = Contact::first();
        return response()->json($contact);
    }


    public function storeOrUpdate(Request $request)
    {
        $contact = Contact::first();

        $data = [
            'breadcrumb'                     => $request->input('breadcrumb'),
            'main_title'                     => $request->input('main_title'),
            'sub_title'                      => $request->input('sub_title'),

        

            'title_our_address_section'      => $request->input('title_our_address_section'),
            'icon_our_address_section'       => $request->input('icon_our_address_section'),
            'address_our_address_section'    => $request->input('address_our_address_section'),

            'title_our_contact_section'      => $request->input('title_our_contact_section'),
            'mail_icon_our_contact_section'  => $request->input('mail_icon_our_contact_section'),
            'mail_address_our_contact_section' => $request->input('mail_address_our_contact_section'),

            'icon_our_contact_section'       => $request->input('icon_our_contact_section'),
            'phone_number_our_contact_section' => $request->input('phone_number_our_contact_section'),
            'copyright'                      => $request->input('copyright'),
        ];

        if ($contact) {
            $contact->update($data);
        } else {
            $contact = Contact::create($data);
        }

        return response()->json($contact);
    }


    

}
