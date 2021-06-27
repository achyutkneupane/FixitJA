@component('mail::message')
# Reset Password

Please click the below button to Reset Your Password

@component('mail::button', ['url' => route('resetPasswordWithToken',$token)])
Reset Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent