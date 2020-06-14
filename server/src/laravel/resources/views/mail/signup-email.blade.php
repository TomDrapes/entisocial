Hello {{$email_data['name']}}
<br><br>
You are one step away from accessing your account.
<br>
Please click the link below to verify your email and activate your account!
<br><br>
<a href="http://localhost:8080/api/verify?code={{$email_data['verification_code']}}">Click Here!</a>

<br><br>
Have a nice day.
