<x-app-layout>
    <x-slot name="header">
        <div class="flex-wrap d-flex justify-content-between align-items-center">
            <div>
                <h1 class="h1">{{ __('Users') }}</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Users') }}</li>
                    </ol>
                </nav>
            </div>
            <div>
                <a href="{{ route('users.create') }}" class="btn btn-warning">{{ __('Create Users') }}</a>
            </div>
        </div>
    </x-slot>

    <div class="card p-5 ">
        <h3 class="h3 fw-bold mb-48">{{ __('List of Users') }}</h3>
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
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Created At') }}</th>
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
        // Initialize DataTables
        $('#catalogue-table').DataTable({
            processing: false,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'created_at',
                    name: 'created_at',
                    render: function(data, type, row) {
                        const date = new Date(data);
                        const options = {
                            day: '2-digit',
                            month: 'short',
                            year: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit',
                            second: '2-digit',
                            hour12: false
                        };
                        return date.toLocaleDateString('en-GB', options).replace(',',
                            '');
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, row) {
                        return `
                            <a href="/users/${row.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/users/${row.id}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete ${row.name}?');">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        `;
                    }
                }
            ],
            "columnDefs": [{
                "targets": 1,
                "className": "max-text-20ch"
            }],
            order: [
                [5, 'desc']
            ],
        });
    });
</script>
