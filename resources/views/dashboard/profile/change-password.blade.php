@extends('dashboard.layouts.master')
@section('dashboard_content')
<x-breadcrumb title="Change Password" />
    <!-- start page title -->
    <!-- end row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="profile-content">
                        <ul class="nav nav-underline nav-justified gap-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" type="button">Change Password</button>
                            </li>
                        </ul>
                        <div class="tab-content m-0 p-4">
                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane active show" role="tabpanel">
                                <div class="user-profile-content">
                                    <x-form action="{{ route('dashboard.change.password.store') }}" method="PATCH">
                                        <div class="row">
                                            <div class="col-md-6 offset-md-3">
                                                <x-form-input label="Current Password" type="password" name="current_password" placeholder="Enter your current password" />
                                                <x-form-input label="New Password" type="password" name="new_password" placeholder="Enter new password" />
                                                <x-form-input label="Confirm Password" type="password" name="confirm_password" placeholder="Enter new password again" />
                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit"><i class="ri-save-line me-1 fs-16 lh-1"></i>Change Password</button>
                                                </div>
                                            </div>
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
