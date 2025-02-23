{{-- Welcome to my {{ config('app.name', 'FixitJA') }} Website!
<br>
Please click the below link to verify your account
<br><br>


@if (session('resent'))
    <div class="alert alert-success" role="alert">
        {{ __('A fresh verification link has been sent to your email address.') }}
    </div>
@endif
<a href="{{ asset('/') }}verify/{{ $verification_code }}/{{ $email }}">Click Here</a>.
</div>
<br><br>
Thank you!
<br>
{{ config('app.name', 'FixitJA') }} --}}

@component('mail::message')
# Order Shipped

Your order has been shipped!

@component('mail::button', ['url' => 'https://google.com'])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent