@extends('dashboard.layouts.master')
@section('title') Edit Admin @endsection
@push('dashboard_styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('dashboard_content')
<x-breadcrumb title="Edit Admin" />
    <!-- end row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="profile-content">
                        <div class="tab-content m-0 p-4">
                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane active show" role="tabpanel">
                                <div class="user-profile-content">
                                    <x-form action="{{ route('dashboard.admin.update', $admin->id) }}" method="PUT" enctype="multipart/form-data">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <x-form-input label="First Name" name="first_name" value="{{ $admin->first_name }}" placeholder="Enter first name" />
                                            <x-form-input label="Last Name" name="last_name" value="{{ $admin->last_name }}" placeholder="Enter last name" />
                                            <x-form-input label="Username" name="username" value="{{ $admin->username }}" placeholder="Enter username" />
                                            <x-form-input label="Email" name="email" value="{{ $admin->email }}" placeholder="Enter email" />
                                            <x-form-input label="Designation" name="designation" value="{{ $admin->designation }}" placeholder="Enter designation" />
                                            <x-form-input label="Country" name="country" value="{{ $admin->country }}" placeholder="Enter country" />
                                            <x-form-input label="Phone" class="w-full" name="phone" value="{{ $admin->phone }}" placeholder="Enter phone number" />
                                            <div></div>
                                                <div class=" mb-3">
                                                    <label class="form-label" for="roles">Assign Roles</label>
                                                    <select name="roles[]" id="roles" class="form-control select2" multiple>
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}" {{ $admin->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="bio">Bio</label>
                                                <textarea style="height: 125px;" name="bio" id="bio" class="form-control">{{ $admin->bio }}</textarea>
                                            </div>
                                            <div class="d-flex flex-column mt--100">
                                                <x-form-input label="Avatar" type="file" name="avatar" />
                                                <div class="w-100 text-center">
                                                    <img  src="{{ asset('images/users/'. $admin->avatar ) }}" alt="" class="EditAdminAvatar previewAvatar">
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="active" name="status" class="form-check-input" value="active" {{ $admin->status == 'active' ? 'checked' :  '' }} >
                                                    <label class="form-check-label" for="active">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="inactive" {{ $admin->status == 'inactive' ? 'checked' :  '' }}>
                                                    <label class="form-check-label" for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit"><i class="ri-save-line me-1 fs-16 lh-1"></i> Update</button>
                                        </div>
                                    </x-form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
@endsection
@push('dashboard_scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
const input = document.querySelector('input[type="file"]');
const img = document.querySelector('.previewAvatar');
input.addEventListener('change', (e) => {
  const file = e.target.files[0];
  const reader = new FileReader();
  reader.addEventListener('load', () => {
    const url = URL.createObjectURL(file);
    img.width = '100';
    img.src = url;
  });
  reader.readAsDataURL(file);
});
</script>
@endpush