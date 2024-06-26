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
        <h3>
            Product Naam: <span>{{ $product[0]->PNaam }}</span>
        </h3>
        <h3>
            Barcode: <span>{{ $product[0]->barcode }}</span>
        </h3>
        <table>
            <thead>
                @if ($result == null)
                @else
                    <th>Naam</th>
                    <th>Omschrijving</th>
                @endif
            </thead>
            <tbody>
                @if ($result == null)
                    <h1 style='text-align: center'>In dit product zitten geen stoffen die een<br>allergische reactie kan
                        veroorzaken</h1>
                @else
                    @foreach ($result as $allergien)
                        <tr>
                            <td>{{ $allergien->ANaam }}</td>
                            <td>{{ $allergien->omschrijving }}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/column.js') }}"></script>

</body>

</html>
