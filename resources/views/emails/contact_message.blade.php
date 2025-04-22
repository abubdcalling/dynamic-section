<h2>New Contact Message Received</h2>

<p><strong>Name:</strong> {{ $contact->first_name }} {{ $contact->last_name }}</p>
<p><strong>Email:</strong> {{ $contact->email_address }} </p>
<p><strong>Phone Number:</strong> {{ $contact->phone_number }}</p>
<p><strong>Company:</strong> {{ $contact->company_name }}</p>
<p><strong>Message:</strong> {{ $contact->comments }}</p>