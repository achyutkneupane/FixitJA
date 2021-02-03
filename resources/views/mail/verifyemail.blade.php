Hello {{$email_data['name']}}
<br><br>
Welcome to my  {{ config('app.name', 'FixitJA') }} Website!
<br>
Please click the below link to verify your email and activate your account!
<br><br>
<a href="http://localhost/my_tuts/send-emails/blog/public/verify?code={{$email_data['verfication_code']}}">Click Here!</a>

<br><br>
Thank you!
<br>
{{ config('app.name', 'FixitJA') }}