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

        <div class="filter" style="width: 50%">
            <form id="dateForm" action="{{ route('geleverde-producten.filterByDateRange') }}" method="GET">
                <label for="filter_startDatum">Startdatum:</label>
                <input type="date" id="filter_startDatum" name="filter_startDatum">
                <label for="filter_eindDatum">Einddatum:</label>
                <input type="date" id="filter_eindDatum" name="filter_eindDatum">
                <input type="submit" value="Maak Selectie">
            </form>
        </div>

        <table>
            <thead>
                @if ($result == null)
                @else
                    <th>Naam Leverancier</th>
                    <th>Contactpersoon</th>
                    <th>Productnaam</th>
                    <th>Totaal geleverd</th>
                    <th>Specificatie</th>
                @endif
            </thead>
            <tbody>
                @if ($result == null)
                    <h1>Er zijn <span>geen</span> leveringen geweest van <span>producten</span> in <span>deze
                            periode</span></h1>
                @else
                    @foreach ($result as $product)
                        <tr>
                            <td>{{ $product->lNaam }}</td>
                            <td>{{ $product->contactPersoon }}</td>
                            <td>{{ $product->pNaam }}</td>
                            <td>{{ $product->totaalGeleverd }}</td>
                            <td>
                                <a href="/leverancier/{{ $product->lId }}">
                                    <i class='fa-solid fa-question' style='color: #0000ff;'></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/column.js') }}"></script>

    <script>
        function submitForm() {
            document.getElementById('filterForm').submit();
        }
    </script>

</body>

</html>
