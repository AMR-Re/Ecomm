@component('mail::message')
Hi <b>{{$user->name}}</b>,

<p>You're almost ready to enjoy using Arabica!</p>

<p>Simply click the button below to verify your email address.</p>

<p>
  @component('mail::button', ['url' => url('activate/'.base64_encode($user->id))])
    Verify Your Email
  @endcomponent
</p>

<p>This will verify your email address, and then you'll officially be a part of the Arabica community.</p>

@endcomponent
