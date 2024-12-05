<!DOCTYPE html>
<html>

<head>
    <title>Catalogue Statistics</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <h1>{{ __('Statistics for') }} {{ $catalogue->catalogue_name }}</h1>
    <p>
        {{ __('Range Date') }}: {{ $start_date }} - {{ $end_date }}
    </p>

    <table>
        <thead>
            <tr>
                <th>{{ __('Date') }}</th>
                <th>{{ __('Impression') }}</th>
                <th>{{ __('Click') }}</th>
                <th>{{ __('CTR') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->date }}</td>
                    <td>{{ $statistic->impression }}</td>
                    <td>{{ $statistic->click }}</td>
                    <td>{{ $statistic->ctr }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
