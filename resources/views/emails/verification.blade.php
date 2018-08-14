@component('mail::message')

<h4>
    Hello, {{ $name }}
</h4>

<p>
    We are excited to have you with us. Could you please verify your email address?
</p>

@component('mail::button', ['url' => $link])
Verify
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
