@component('mail::message')
Hi Admin,

<p><b>Name:</b>{{$user->name}} </p>
<p><b>Email:</b>{{$user->email}} </p>
<p><b>Phone:</b>{{$user->phone}} </p>
<p><b>Subject:</b>{{$user->subject}} </p>
<p><b>Message:</b>{{$user->message}} </p>



<p>Simply click the button below to verify your email address.</p>



<p>This will verify your email address, and then you'll officially be a part of the Arabica community.</p>

@endcomponent
