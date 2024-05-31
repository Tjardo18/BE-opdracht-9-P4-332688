<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('img/store-avatar.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ $title }}</title>
</head>

<body>

<div class="logo">
    <a href="{{ url('/') }}">
        <img src="{{ asset('img/logo-wit.png') }}">
    </a>
</div>

<div class="card">
    <div class="title">
        <h1>
            {{ $title }}
        </h1>
    </div>
    <form method="post" action="{{ route('leverancier-details.store') }}">
        @csrf
        @method('POST')

        <input type="hidden" name="leverancierId" value="{{ $LId }}">
        <input type="hidden" name="contactId" value="{{ $result[0]->contactId }}">

        <label for="naam">Naam</label>
        <input type="text" name="naam" id="naam"
               value="{{ $result[0]->Lnaam }}" required>
        <label for="contactPersoon">Contactpersoon</label>
        <input type="text" name="contactPersoon" id="contactPersoon"
               value="{{ $result[0]->contactPersoon }}" required>
        <label for="leverancierNummer">Leveranciernummer</label>
        <input type="text" name="leverancierNummer" id="leverancierNummer"
               value="{{ $result[0]->leverancierNummer }}" required>
        <label for="mobiel">Mobiel</label>
        <input type="tel" name="mobiel" id="mobiel" pattern="[0-9]{2}-[0-9]{8}" placeholder="06-12345678"
               value="{{ $result[0]->mobiel }}" required>
        <label for="straatnaam">Straatnaam</label>
        <input type="text" name="straatnaam" id="straatnaam"
               value="{{ $result[0]->straat }}" {{ is_null($result[0]->contactId) ? 'disabled' : '' }} required>
        <label for="huisnummer">Huisnummer</label>
        <input type="text" name="huisnummer" id="huisnummer"
               value="{{ $result[0]->huisnummer }}" {{ is_null($result[0]->contactId) ? 'disabled' : '' }} required>
        <label for="postcode">Postcode</label>
        <input type="text" name="postcode" id="postcode"
               value="{{ $result[0]->postcode }}"
               {{ is_null($result[0]->contactId) ? 'disabled' : 'placeholder=1234AB' }} required>
        <label for="stad">Stad</label>
        <input type="text" name="stad" id="stad"
               value="{{ $result[0]->stad }}" {{ is_null($result[0]->contactId) ? 'disabled' : '' }} required>

        <div class="snel">
            <a class="button" href="/leverancier-overzicht">Terug</a>
            <input type="submit" value="Wijzig">
        </div>
    </form>

</div>

<script src="{{ asset('js/column.js') }}"></script>

</body>

</html>
