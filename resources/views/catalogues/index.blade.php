<x-app-layout>
    <x-slot name="header">
        <div class="flex-wrap d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h1">{{ __('Catalogues') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Catalogues') }}</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('catalogues.create') }}" class="btn btn-warning">{{ __('Create Catalogue') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="card p-5 ">
        <h3 class="h3 fw-bold mb-48">{{ __('List of Catalogues') }}</h3>
        @if (session('success'))
            <div class="alert alert-left alert-success alert-dismissible fade show mb-3" role="alert">
                <span> {{ session('success') }}</span>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 5000);
            </script>
        @endif
        <div class="table-responsive">
            <table class="table my-5 w-100" id="catalogue-table">
                <thead>
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Catalogue Name') }}</th>
                        <th>{{ __('Brand') }}</th>
                        <th>{{ __('Size') }}</th>
                        <th>{{ __('Impression') }}</th>
                        <th>{{ __('Total Product') }}</th>
                        <th>{{ __('CTR') }}</th>
                        <th>{{ __('Last Update') }}</th>
                        <th>{{ __('Create Product') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $("#catalogue-table").DataTable({
            processing: false,
            serverSide: true,
            ajax: {
                url: "{{ route('catalogues.index') }}",
                type: "GET",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                }
            },
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
                    data: "brand",
                    name: "brand",
                    orderable: true
                },
                {
                    data: "size",
                    name: "size"
                },
                {
                    data: "impression",
                    name: "impression"
                },
                {
                    data: "products_count",
                    name: "products_count"
                },
                {
                    data: "ctr",
                    name: "ctr",
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
                    data: "action",
                    name: "action",
                    orderable: false,
                    searchable: false,
                }
            ],
            "columnDefs": [{
                    "targets": 1,
                    "className": "max-text-20ch"
                },
                {
                    "targets": 2,
                    "className": "max-text-20ch"
                }
            ]
        });
    });
</script>
