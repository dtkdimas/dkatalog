<!DOCTYPE html>
<html>

<head>
    <title>Product Statistics</title>
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
            @foreach ($statistics as $statistic)
                <tr>
                    <td>{{ $statistic->date }}</td>
                    <td>{{ $statistic->click }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
