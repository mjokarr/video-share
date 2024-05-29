<x-mail::message>
# Order Shipped

you are loged in, now

<x-mail::button :url="$url">
view dashboard</x-mail::button>

good luck,<br>
{{ config('app.name') }}
</x-mail::message>
