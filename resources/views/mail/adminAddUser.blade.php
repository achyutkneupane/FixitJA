@component('mail::message')
# User Account Created

Hello <b>{{ $user->name }}</b>,

Your account has been created for {{ config('app.name','FixitJA') }}.


Please reset your password to get started.

@component('mail::button', ['url' => route('resetPasswordWithToken',$token)])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
