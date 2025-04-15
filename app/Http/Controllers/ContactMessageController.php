<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function show()
    {
        $msg = ContactMessage::first();
        return response()->json($msg);
    }
    public function store(Request $request)
    {
        // return 'zabrrt';
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'comments' => 'nullable|string',
            'email_address' => 'required|email|unique:contact_messages,email_address',  // fixed table name here
        ]);

        $contact = ContactMessage::create($validated);

        return response()->json([
            'message' => 'Contact message saved successfully.',
            'last_inserted_id' => $contact->id,
            'data' => $contact
        ], 201);
    }
}
