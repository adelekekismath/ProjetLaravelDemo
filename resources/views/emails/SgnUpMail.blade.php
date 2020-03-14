@component('mail::message')
# Bienvenu {{ $nom }}  {{ $prenom }}



@component('mail::button', ['url' => '' ])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
