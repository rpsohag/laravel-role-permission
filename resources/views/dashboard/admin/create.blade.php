@extends('dashboard.layouts.master')
@section('dashboard_content')
<x-breadcrumb title="Create Admin" />
    <!-- end row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="profile-content">
                        <ul class="nav nav-underline nav-justified gap-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" type="button">Create New Admin</button>
                            </li>
                        </ul>
                        <div class="tab-content m-0 p-4">
                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane active show" role="tabpanel">
                                <div class="user-profile-content">
                                    <x-form action="{{ route('dashboard.admin.store') }}" enctype="multipart/form-data">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <x-form-input label="First Name" name="first_name" value="{{ old('first_name') }}" placeholder="Enter first name" />
                                            <x-form-input label="Last Name" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name" />
                                            <x-form-input label="Username" name="username" value="{{ old('username') }}" placeholder="Enter username" />
                                            <x-form-input label="Email" name="email" value="{{ old('email') }}" placeholder="Enter email" />
                                            <x-form-input label="Designation" name="designation" value="{{ old('designation') }}" placeholder="Enter designation" />
                                            <x-form-input label="Country" name="country" value="{{ old('country') }}" placeholder="Enter country" />
                                            <x-form-input label="Phone" name="phone" value="{{ old('phone') }}" placeholder="Enter phone number" />
                                            <x-form-input label="Avatar" type="file" name="avatar" />
                                            <x-form-input label="Password" name="password" value="{{ old('password') }}" placeholder="Enter password" />
                                            <x-form-input label="Confirm password" name="password" value="{{ old('confirm_password') }}" placeholder="Enter confirm password" />
                                            <div class="col-sm-12 mb-3">
                                                <label class="form-label" for="bio">Bio</label>
                                                <textarea style="height: 125px;" name="bio" id="bio" class="form-control">{{ old('bio') }}</textarea>
                                            </div>
                                            <div class="">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="active" name="status" class="form-check-input" value="active" {{ old('status') == 'active' ? 'checked' : (empty(old('status')) ? 'checked' : '') }} >
                                                    <label class="form-check-label" for="active">Active</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" id="inactive" name="status" class="form-check-input" value="inactive" {{ old('status') == 'inactive' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="inactive">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-primary" type="submit"><i class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
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

@endpush