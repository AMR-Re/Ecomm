@component('mail::message')
@php
  $logoUrl = url('front/assets/images/logo-no-background.png'); // Replace with the actual path to your logo
  $getSetting=App\Models\SystemSettingModel::getSingle()

@endphp

<img src="{{ $logoUrl }}" alt="{{ $getSetting->website_name }} Logo" style="height: auto; max-width: 100px;">

Hi Admin,

<p><b>Name:</b>{{$user->name}} </p>
<p><b>Email:</b>{{$user->email}} </p>
<p><b>Phone:</b>{{$user->phone}} </p>
<p><b>Subject:</b>{{$user->subject}} </p>
<p><b>Message:</b>{{$user->message}} </p>



<p>Simply click the button below to verify your email address.</p>



<p>This will verify your email address, and then you'll officially be a part of the {{$getSetting->website_name}} community.</p>

@endcomponent
