@component('mail::message')
# Dear Admin,
## New Customer has subscribed for your newsletter.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
