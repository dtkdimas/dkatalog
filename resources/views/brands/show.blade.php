<x-app-layout>
    <x-slot name="header">
        <h1 class="h1 line-clamp-1">{{ __('Detail') }} {{ $brand->brand_name }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('brands.index') }}">{{ __('Brands') }}</a></li>
                <li class="breadcrumb-item active max-text-20ch" aria-current="page">{{ __('Detail') }}
                    {{ $brand->brand_name }}</li>
            </ol>
        </nav>
    </x-slot>

    <div class="card p-5">
        <h3 class="h3 fw-bold mb-48">{{ __('List of Catalogue') }}</h3>
        <div class="table-responsive">
            <table class="table my-5 w-100" id="brand-catalogue-table">
                <thead>
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Catalogue Name') }}</th>
                        <th>{{ __('Size') }}</th>
                        <th>{{ __('Impression') }}</th>
                        <th>{{ __('Total Product') }}</th>
                        <th>{{ __('CTR') }}</th>
                        <th>{{ __('Last Update') }}</th>
                        <th>{{ __('Create Product') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        $('#brand-catalogue-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('brands.show', $brand->id) }}",
            columns: [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex",
                    orderable: false,
                    searchable: false
                },
                {
                    data: "catalogue_name",
                    name: "catalogue_name",
                    render: function(data, type, row) {
                        return `<a href="/catalogues/${row.id}">${data}</a>`;
                    }
                },
                {
                    data: 'size',
                    name: 'size'
                },
                {
                    data: 'impression',
                    name: 'impression'
                },
                {
                    data: 'total_product',
                    name: 'total_product'
                },
                {
                    data: 'ctr',
                    name: 'ctr'
                },
                {
                    data: "updated_at",
                    name: "updated_at",
                    render: function(data) {
                        const date = new Date(data);
                        const options = {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: false
                        };
                        return date.toLocaleDateString('en-GB', options).replace(',', '');
                    }
                },
                {
                    data: "create_product",
                    name: "create_product",
                    render: function(data, type, row) {
                        return `<a href="/catalogues/${row.id}/products/create" class="btn btn-primary btn-sm">{{ __('Create Product') }}</a>`;
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ],
            "columnDefs": [{
                "targets": 1,
                "className": "max-text-20ch"
            }]
        });
    });
</script>
