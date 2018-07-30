@component('mail::message')

<p>{{$message}}</p>

@component('mail::button', ['url' => $link])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
