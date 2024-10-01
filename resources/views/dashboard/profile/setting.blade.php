@extends('dashboard.layouts.master')
@section('dashboard_content')
<x-breadcrumb title="Profile Setting" />
    <!-- start page title -->
    <div class="row">
        <div class="col-sm-12">
            <!-- meta -->
            <div class="profile-user-box">
                <div class="row">
                    <div class="col-md-12 d-flex justify-content-between">
                        <div class="">
                            <h4 class="fs-17 ellipsis">{{ $setting->fullname }}</h4>
                            <p class="font-13">{{ $setting->designation }}</p>
                            <p class="text-muted mb-0"><small>{{ $setting->country }}</small></p>
                        </div>
                        <div class="profile-user-img">
                            <img src="{{ asset('dashboard-assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-lg rounded-circle">
                        </div>
                    </div>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="profile-content">
                        <ul class="nav nav-underline nav-justified gap-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" type="button">Settings</button>
                            </li>
                        </ul>
                        <div class="tab-content m-0 p-4">
                            <!-- settings -->
                            <div id="edit-profile" class="tab-pane active show" role="tabpanel">
                                <div class="user-profile-content">
                                    <x-form action="{{ route('dashboard.profile.setting.update') }}">
                                        <div class="row row-cols-sm-2 row-cols-1">
                                            <x-form-input label="First Name" name="first_name" value="{{ $setting->first_name }}" />
                                            <x-form-input label="Last Name" name="last_name" value="{{ $setting->last_name }}" />
                                            <x-form-input label="Username" name="username" value="{{ $setting->username }}" />
                                            <x-form-input label="Email" name="email" value="{{ $setting->email }}" />
                                            <x-form-input label="Designation" name="designation" value="{{ $setting->designation }}" />
                                            <x-form-input label="Country" name="country" value="{{ $setting->country }}" />
                                            <x-form-input label="Phone" name="phone" value="{{ $setting->phone }}" />
                                            <div class="col-sm-12 mb-3">
                                                <label class="form-label" for="bio">Bio</label>
                                                <textarea style="height: 125px;" name="bio" id="bio" class="form-control">{{ $setting->bio }}</textarea>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" type="submit"><i class="ri-save-line me-1 fs-16 lh-1"></i> Save</button>
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