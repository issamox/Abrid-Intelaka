<x-mail::message>
# Bonjour {{ $memberData['name'] }},

Nous vous remercions sincèrement pour votre candidature , svp consultez le lien suivant pour compléter votre demande


<x-mail::button :url="route('candidate.tracking', ['id' => $memberData['id']])">
Consulter
</x-mail::button>


Bien cordialement,<br>
{{ config('app.name') }}
</x-mail::message>
