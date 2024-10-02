@extends('dashboard.layouts.master')
@section('title') Manage Admin @endsection
@push('dashboard_styles')
        <!-- Datatables css -->
        <link href="{{ asset('dashboard-assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard-assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard-assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard-assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard-assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('dashboard-assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('dashboard_content')
<x-breadcrumb title="Admin Management" />
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('dashboard.admin.create') }}" class="btn btn-primary">Create Admin</a>
            </div>
            <div class="card-body">
                <table id="fixed-header-datatable"
                    class="table table-striped dt-responsive nowrap table-striped w-100">
                    <thead>
                        <tr>
                            <th>SL/NO</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                        <tr class="align-middle">
                            <td>{{ $loop->index + 1 }}</td>
                            <td><img class="w-25" src="{{ asset('images/users/'. $admin->avatar ) }}" alt="{{ $admin->name }}"></td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->country }}</td>
                            <td>{{ $admin->status }}</td>
                            <td>
                                <button class="btn btn-info btn-sm">
                                    <a href="" class="text-white">Edit</a>
                                </button>
                                <button class="btn btn-danger btn-sm">
                                    <a href="" class="text-white">Delete</a>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div> <!-- end row-->
@endsection
@push('dashboard_scripts')
    <!-- Datatables js -->
    <script src="{{ asset('dashboard-assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-fixedcolumns-bs5/js/fixedColumns.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('dashboard-assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <!-- Datatable Demo Aapp js -->
    <script src="{{ asset('dashboard-assets/js/pages/datatable.init.js') }}"></script>
@endpush