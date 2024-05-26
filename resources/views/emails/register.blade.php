@component('mail::message')
Hi <b>{{$user->name}}</b>,
@php
$getSetting=App\Models\SystemSettingModel::getSingle()
@endphp
<p>You're almost ready to enjoy using {{$getSetting->website_name}}</p>

<p>Simply click the button below to verify your email address.</p>

<p>
  @component('mail::button', ['url' => url('activate/'.base64_encode($user->id))])
    Verify Your Email
  @endcomponent
</p>

<p>This will verify your email address, and then you'll officially be a part of the {{$getSetting->website_name}} community.</p>

@endcomponent
