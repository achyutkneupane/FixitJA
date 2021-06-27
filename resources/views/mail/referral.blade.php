@component('mail::message')
# Invitation to {{ config('app.name') }}

Hello there,<br>
You have been invited to <a href="{{ asset('/') }}">FixitJA</a> by <b>{{ auth()->user()->name }}</b>({{ auth()->user()->email() }}).<br>
Click on the button below to register.

@component('mail::button', ['url' => route('registerWithToken',$refer->token)])
Register to {{ config('app.name') }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent