<x-mail::message>
{{-- Hero Section --}}
# 🌟 Welcome to {{ config('app.name') }}

Hi {{ $user->name ?? 'there' }},

We're thrilled to have you here! Here’s what you need to know:

{{-- Message Body --}}
## 📋 Quick Overview

- Access your dashboard any time.
- Get personalized updates.
- Enjoy premium features.

We’re constantly improving and your journey starts now.

{{-- CTA Button --}}
<x-mail::button :url="$url" color="success">
👉 Get Started Now
</x-mail::button>

{{-- Extra Content (Optional) --}}
> 💡 Need help? Just reply to this email and our team will get back to you.

{{-- Signature --}}
Thanks again,  
Warm regards,  
**The {{ config('app.name') }} Team**

{{-- Subcopy --}}
<x-mail::subcopy>
If you're having trouble clicking the "Get Started Now" button, copy and paste this URL into your browser:  
[{{ $url }}]({{ $url }})
</x-mail::subcopy>
</x-mail::message>
