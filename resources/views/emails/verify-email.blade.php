<x-mail::message>
# Email Verifaction

you are loged in, now

<x-mail::button :url="$url">
view you'r dashboard</x-mail::button>

good luck,<br>
{{ config('app.name') }}
</x-mail::message>
