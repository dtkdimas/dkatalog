<x-app-layout>
    <x-slot name="header">
        <div class="flex-wrap d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h1">{{ __('Brands') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Brands') }}</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('brands.create') }}" class="btn btn-warning">{{ __('Create Brand') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="card p-5 ">
        <h3 class="h3 fw-bold mb-48">{{ __('List of Brands') }}</h3>
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
            <table class="table my-5 w-100" id="brand-table">
                <thead>
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Brand Name') }}</th>
                        <th>{{ __('Total Catalogue') }}</th>
                        <th>{{ __('Create Catalogue') }}</th>
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
        $('#brand-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('brands.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'brand_name',
                    name: 'brand_name'
                },
                {
                    data: 'catalogues_count',
                    name: 'catalogues_count'
                },
                {
                    data: 'create_catalogue',
                    name: 'create_catalogue',
                    orderable: false,
                    searchable: false
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
            }],
            responsive: true
        });
    });
</script>
