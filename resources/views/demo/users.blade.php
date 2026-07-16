@extends('layouts.admin')

@section('title', 'Demo Users')

@push('styles')
    <!-- DataTables CSS are bundled via Vite (app.css) -->
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Demo Users</h3>
                </div>
                <div class="card-body">
                    <table id="users-table" class="table-striped table-bordered w-100 table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Verified</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                                    <td>{{ $user->created_at->toDateTimeString() }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- DataTables + Buttons (CDN) -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#users-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('demo.users.data') }}',
                        type: 'GET'
                    },
                    columns: [{
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'verified'
                        },
                        {
                            data: 'created_at'
                        }
                    ],
                    dom: 'Bfrtip',
                    buttons: [{
                            extend: 'copy',
                            className: 'btn btn-sm btn-outline-secondary'
                        },
                        {
                            extend: 'csv',
                            className: 'btn btn-sm btn-outline-secondary'
                        },
                        {
                            extend: 'excel',
                            className: 'btn btn-sm btn-outline-secondary'
                        },
                        {
                            extend: 'pdf',
                            className: 'btn btn-sm btn-outline-secondary'
                        },
                        {
                            extend: 'print',
                            className: 'btn btn-sm btn-outline-secondary'
                        }
                    ],
                    responsive: true,
                    order: [
                        [0, 'desc']
                    ]
                });
            });
        </script>
    @endpush
    </script>
@endpush
