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
        <table>
            <thead>
                <th>Barcode</th>
                <th>Naam</th>
                <th>Verpakkingseenheid</th>
                <th>Aantal Aanwezig</th>
                <th>Allergenen Info</th>
                <th>Leverantie Info</th>
            </thead>
            <tbody>
                @foreach ($result as $overzicht)
                    <tr>
                        <td>{{ $overzicht->Barcode }}</td>
                        <td>{{ $overzicht->Naam }}</td>
                        <td>{{ $overzicht->VerpakkingsEenheid }}</td>
                        <td>{{ $overzicht->AantalAanwezig }}</td>
                        <td>
                            <a href="allergie/{{ $overzicht->Id }}">
                                <i class='fa-solid fa-xmark' style='color: #ff0000;'></i>
                            </a>
                        </td>
                        <td>
                            <a href="leverancier/{{ $overzicht->Id }}">
                                <i class='fa-solid fa-question' style='color: #0000ff;'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/column.js') }}"></script>

</body>

</html>
