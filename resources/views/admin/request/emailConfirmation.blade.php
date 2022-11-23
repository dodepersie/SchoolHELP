@component('mail::message')
<h2>Accepted Offer</h2>

<p>Congratulation! The offer has been <span style="color:#2dce89;"><strong>Accepted</strong></span>.<br>
  <span>Offer ID: <strong>{{ $message['id'] }}</strong></span><br>
  <span>Offer Date: <strong>{{ $message['date'] }}</strong></span><br>
  <span>Remarks: <strong>{{ $message['remarks'] }}</strong></span><br>
</p>
<br>


Best Regards,
<br>
<br>
{{ config('app.name') }}
@endcomponent
