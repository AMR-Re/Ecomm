@component('mail::message')
Hi <b>{{$user->name}}</b>,

<p>Forgot password on your Arabica account ?!</p>

<p>Simply click the button below to reset your password .</p>

<p>
  @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
   Reset Password
  @endcomponent
</p>

<p>IN case you have any issues resseting your password please contact us ! 
    Thanks.</p>
{{config('app.name')}}
@endcomponent
