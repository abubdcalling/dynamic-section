<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    // Show the first contact message
    public function show()
    {
        try {
            $msg = ContactMessage::first();

            if ($msg) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contact message fetched successfully.',
                    'data' => $msg
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No contact message found.'
                ], 404);
            }
        } catch (Exception $e) {
            Log::error('Error fetching contact message: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contact message.'
            ], 500);
        }
    }

    // Store a new contact message
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'company_name' => 'nullable|string|max:255',
                'comments' => 'nullable|string',
                'email_address' => 'required|email|unique:contact_messages,email_address',  // fixed table name here
            ]);

            $contact = ContactMessage::create($validated);
            // Send email to abubdcalling@gmail.com
            Mail::to('sozibbdcalling2025@gmail.com')->send(new ContactMessageMail($contact));

            return response()->json([
                'success' => true,
                'message' => 'Messaage sent successfully.',
                'last_inserted_id' => $contact->id,
                'data' => $contact
            ], 201);
        } catch (Exception $e) {
            Log::error('Error saving contact message: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to save contact message.'
            ], 500);
        }
    }
}
