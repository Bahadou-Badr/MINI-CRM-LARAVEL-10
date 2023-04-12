<x-mail::message>
# Invitation 

Veuillez cliquer sur le lien ci-dessous afin de compléter votre inscription

<x-mail::button :url="$url">
Registration
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
