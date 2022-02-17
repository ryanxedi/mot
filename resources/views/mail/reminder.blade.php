@component('mail::message')
# Your MOT is due in 1 month

The body of your message.

@component('mail::button', ['url' => '{{ $registration }}'])
Check your expiry date
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
