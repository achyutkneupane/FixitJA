Welcome to my  {{ config('app.name', 'FixitJA') }} Website!
<br>
Please click the below link to verify your account
<br><br>


                @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <a href="http://127.0.0.1:8000/verify/{{ $verification_code }}">Click Here</a>.
                </div>
                <br><br>
Thank you!
<br>
{{ config('app.name', 'FixitJA') }}
