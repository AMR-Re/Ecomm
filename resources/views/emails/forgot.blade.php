@component('mail::message')
@php
  $logoUrl = url('front/assets/images/logo-no-background.png'); // Replace with the actual path to your logo
  $getSetting=App\Models\SystemSettingModel::getSingle()

@endphp

<img src="{{ $logoUrl }}" alt="{{ $getSetting->website_name }} Logo" style="height: auto; max-width: 100px;">
Hi <b>{{$user->name}}</b>,


<p>Forgot password on your {{ $getSetting->website_name }} account ?!</p>

<p>Simply click the button below to reset your password .</p>

<p>
  @component('mail::button', ['url' => url('reset/'.$user->remember_token)])
   Reset Password
  @endcomponent
</p>

<p>IN case you have any issues resseting your password please contact us ! 
    Thanks.</p>
{{config('app.name')}} {{ $getSetting->website_name }}
@endcomponent
