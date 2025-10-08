<x-mail::message>
# Hello {{ $user->name }}

Please login to {{ config('app.name') }} using the link provided below.
This is a one time login URL and cannot be used twice.
Please note that this link will expire soon.

<x-mail::button :url="$url" color="success">
Login
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
