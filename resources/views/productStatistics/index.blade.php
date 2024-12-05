<x-app-layout>
    <x-slot name="header">
        <h1 class="h1 line-clamp-1">{{ __('Statistics for') }} {{ $product->product_name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('catalogues.index') }}">{{ __('Catalogues') }}</a></li>
                <li class="breadcrumb-item max-text-20ch"><a
                        href="{{ route('catalogues.show', $catalogue->id) }}">{{ $catalogue->catalogue_name }}</a></li>
                <li class="breadcrumb-item active max-text-20ch">
                    {{ $product->product_name }}
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('Statistics') }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="card p-5">
        <h3 class="h3 fw-bold mb-48">{{ __('Product Statistics') }}</h3>

        <div class="row justify-content-between align-items-center mb-3">
            <div class="col-sm-12 col-md-6 ">
                <a id="export-pdf" href="#" class="btn btn-gray btn-sm me-2">{{ __('Export PDF') }}</a>
                <a href="#" id="export-excel" class="btn btn-gray btn-sm">{{ __('Export Excel') }}</a>
            </div>
            <div class="col-sm-12 col-md-6 d-flex justify-content-between align-items-center">
                <input type="date" id="start_date" name="start_date" class="form-control form-control-sm me-2"
                    placeholder="{{ __('Start Date') }}">
                <input type="date" id="end_date" name="end_date" class="form-control form-control-sm me-2"
                    placeholder="{{ __('End Date') }}">
                <button id="filter" class="btn btn-primary btn-sm me-2">{{ __('Filter') }}</button>
                <button id="reset" class="btn btn-outline-primary btn-sm">{{ __('Reset') }}</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table my-5 w-100" id="product-statistics-table">
                <thead>
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Click') }}</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    $(function() {
        // Initialize DataTable
        var table = $('#product-statistics-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: '{{ route('catalogues.productStatistics', ['catalogue' => $catalogue->id, 'product' => $product->id]) }}',
                type: 'GET',
                data: function(d) {
                    d.start_date = $('#start_date').val();
                    d.end_date = $('#end_date').val();
                }
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'click',
                    name: 'click'
                }
            ],
        });

        // Filter button
        $('#filter').on('click', function() {
            table.draw(); // Redraw the table with the new filter parameters
        });

        // Reset button
        $('#reset').on('click', function() {
            $('#start_date').val('');
            $('#end_date').val('');
            table.draw(); // Redraw the table with no filter
        });

        // Export PDF functionality
        $('#export-pdf').on('click', function(e) {
            e.preventDefault();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            let url =
                "{{ route('catalogues.productStatistics.export-pdf', ['catalogue' => $catalogue->id, 'product' => $product->id]) }}" +
                "?start_date=" + start_date + "&end_date=" + end_date;
            window.location.href = url;
        });

        // Export Excel functionality
        $('#export-excel').on('click', function(e) {
            e.preventDefault();
            let start_date = $('#start_date').val();
            let end_date = $('#end_date').val();
            let url =
                "{{ route('catalogues.productStatistics.export-excel', ['catalogue' => $catalogue->id, 'product' => $product->id]) }}" +
                "?start_date=" + start_date + "&end_date=" + end_date;
            window.location.href = url;
        });
    });
</script>
