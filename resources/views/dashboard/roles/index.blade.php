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
<x-breadcrumb title="Roles Management" />
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-end">
                <a href="{{ route('dashboard.roles.create') }}" class="btn btn-primary">Create Role</a>
            </div>
            <div class="card-body">
                <table id="fixed-header-datatable"
                    class="table table-striped dt-responsive nowrap table-striped w-100">
                    <thead>
                        <tr>
                            <th>SL/NO</th>
                            <th>Name</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr class="align-middle">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $permission)
                                    <span class="badge bg-info mr-1">
                                        {{ $permission->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="d-flex">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="">
                                        <a class="dropdown-item" href="{{ route('dashboard.roles.edit', $role->id) }}">Edit</a>
                                        <form method="POST" action="{{ route('dashboard.roles.destroy', $role->id) }}">
                                            @csrf
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button type="submit" class="show_confirm dropdown-item" data-toggle="tooltip" title='Delete'>Delete</button>
                                        </form>
                                    </div>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Datatable Demo Aapp js -->
    <script src="{{ asset('dashboard-assets/js/pages/datatable.init.js') }}"></script>
    <script>
        $(".show_confirm").on("click", function(e){
            e.preventDefault();
            var form =  $(this).closest("form");
            Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        })
    </script>
@endpush