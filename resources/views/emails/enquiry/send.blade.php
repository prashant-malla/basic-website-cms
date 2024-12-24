<x-mail::message>
# Enquiry Mail from {{ $name }}

<x-mail::panel>
<p>Email {{ $email}}</p>
<p>Phone {{ $phone}}</p>
</x-mail::panel>

{{ $message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
