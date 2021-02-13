Hello ,{{$email_data['name']}}

<br><br>
Welcome {{ config('app.name', 'FixitJA') }}!
<br>
Please click the link below to verify your email and activate your account!
<br><br>

<a href="{{ asset('/') }}/verify/?code={{$email_data['verfication_code']}}"
         style="background-color:#ffbe00; color:#000000; display:inline-block; padding:12px 40px 12px 40px; text-align:center; text-decoration:none;"
         target="_blank">Verfiy Your Email</a>

<br><br>
Thank you!
<br>
{{ config('app.name', 'FixitJA') }}
