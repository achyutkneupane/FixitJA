Welcome {{ config('app.name', 'FixitJA') }}!
<br>
Please click the below link to Reset Your Password
<br><br>


                @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <a href="http://127.0.0.1:8000/reset-password/{{ $token }}">Click Here</a>.
                </div>
                <br><br>
Thank you!
<br>
{{ config('app.name', 'FixitJA') }}
