<!DOCTYPE html>
<html>

<head>
    <title>Product Statistics</title>
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
    <h1>Product Statistics for {{ $product->product_name }}</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Clicks</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($statisticsData as $statistic)
                <tr>
                    <td>{{ $statistic->date }}</td>
                    <td>{{ $statistic->click }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
