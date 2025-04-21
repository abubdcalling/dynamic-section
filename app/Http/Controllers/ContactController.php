<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ContactController extends Controller
{
    public function show()
    {
        try {
            $contact = Contact::first();

            if ($contact) {
                $contact->breadcrumb                     = $contact->breadcrumb ? url('uploads/Contacts/' . $contact->breadcrumb) : null;
                $contact->icon_our_address_section       = $contact->icon_our_address_section ? url('uploads/Contacts/' . $contact->icon_our_address_section) : null;
                $contact->mail_icon_our_contact_section  = $contact->mail_icon_our_contact_section ? url('uploads/Contacts/' . $contact->mail_icon_our_contact_section) : null;
                $contact->icon_our_contact_section       = $contact->icon_our_contact_section ? url('uploads/Contacts/' . $contact->icon_our_contact_section) : null;
            }

            return response()->json([
                'success' => true,
                'message' => 'Contact content retrieved successfully.',
                'data'    => $contact
            ]);
        } catch (Exception $e) {
            Log::error('Error fetching contact content: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve contact content.'
            ], 500);
        }
    }

    public function storeOrUpdate(Request $request)
    {
        try {
            $validated = $request->validate([
                'breadcrumb'                        => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'main_title'                        => 'nullable|string|max:255',
                'sub_title'                         => 'nullable|string',

                'title_our_address_section'         => 'nullable|string|max:255',
                'icon_our_address_section'          => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'address_our_address_section'       => 'nullable|string|max:255',

                'title_our_contact_section'         => 'nullable|string|max:255',
                'mail_icon_our_contact_section'     => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'mail_address_our_contact_section'  => 'nullable|email|max:255',

                'icon_our_contact_section'          => 'nullable|image|mimes:jpg,jpeg,png,webp,gif|max:10240',
                'phone_number_our_contact_section'  => 'nullable|string|max:255',

                'copyright'                         => 'nullable|string|max:255',
            ]);

            $contact = Contact::first();

            // Keep previous icons if not re-uploaded
            $breadcrumb     = $contact->breadcrumb ?? null;
            $iconAddress    = $contact->icon_our_address_section ?? null;
            $iconMail       = $contact->mail_icon_our_contact_section ?? null;
            $iconPhone      = $contact->icon_our_contact_section ?? null;

            if ($request->hasFile('breadcrumb')) {
                $file = $request->file('breadcrumb');
                $breadcrumb = time() . '_breadcrumb.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Contacts'), $breadcrumb);
            }

            if ($request->hasFile('icon_our_address_section')) {
                $file = $request->file('icon_our_address_section');
                $iconAddress = time() . '_address_icon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Contacts'), $iconAddress);
            }

            if ($request->hasFile('mail_icon_our_contact_section')) {
                $file = $request->file('mail_icon_our_contact_section');
                $iconMail = time() . '_mail_icon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Contacts'), $iconMail);
            }

            if ($request->hasFile('icon_our_contact_section')) {
                $file = $request->file('icon_our_contact_section');
                $iconPhone = time() . '_phone_icon.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/Contacts'), $iconPhone);
            }

            $data = array_merge($validated, [
                'breadcrumb'                     => $breadcrumb,
                'icon_our_address_section'       => $iconAddress,
                'mail_icon_our_contact_section'  => $iconMail,
                'icon_our_contact_section'       => $iconPhone,
            ]);

            if ($contact) {
                $contact->update($data);
            } else {
                $contact = Contact::create($data);
            }

            // Convert file names to full URLs
            $contact->breadcrumb                    = $contact->breadcrumb ? url('uploads/Contacts/' . $contact->breadcrumb) : null;
            $contact->icon_our_address_section      = $contact->icon_our_address_section ? url('uploads/Contacts/' . $contact->icon_our_address_section) : null;
            $contact->mail_icon_our_contact_section = $contact->mail_icon_our_contact_section ? url('uploads/Contacts/' . $contact->mail_icon_our_contact_section) : null;
            $contact->icon_our_contact_section      = $contact->icon_our_contact_section ? url('uploads/Contacts/' . $contact->icon_our_contact_section) : null;

            return response()->json([
                'success' => true,
                'message' => 'Contact content saved successfully.',
                'data'    => $contact
            ]);
        } catch (Exception $e) {
            Log::error('Error saving contact content: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to save contact content.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
}
