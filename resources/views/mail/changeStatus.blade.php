@component('mail::message')
# Status Changed

@if($status == "deactivated")
Hello {{ $user->name }},

Your account has been deactivated.<br>

You can re-activate your account by logging in.<br>

@component('mail::button', ['url' => route('login')])
Login
@endcomponent
@elseif($status == "deleted")
Hello {{ $user->name }},

Your account has been deleted from <a href="{{ asset('/') }}">{{ config('app.name', 'FixitJA') }}</a>.

@elseif($status == "suspended")
Hello {{ $user->name }},

Your account has been suspended from <a href="{{ asset('/') }}">{{ config('app.name', 'FixitJA') }}</a>.

You can Contact Us if you think there was some mistakes.<br><br>

@component('mail::button', ['url' => route('contactUs')])
Contact Us
@endcomponent
@elseif($status == "blocked")
Hello {{ $user->name }},

Your account has been blocked from <a href="{{ asset('/') }}">{{ config('app.name', 'FixitJA') }}</a>.

You can Contact Us if you think there was some mistakes.<br>

@component('mail::button', ['url' => route('contactUs')])
Contact Us
@endcomponent
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
