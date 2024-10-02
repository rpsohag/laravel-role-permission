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
                            <h4 class="fs-17 ellipsis">{{ authAdmin()->fullname }}</h4>
                            <p class="font-13">{{ authAdmin()->designation }}</p>
                            <p class="text-muted mb-0"><small>{{ authAdmin()->country }}</small></p>
                        </div>
                        <div class="profile-user-img">
                            {{-- <img src="{{ asset('dashboard-assets/images/users/avatar-1.jpg') }}" alt="admin-avatar" id="adminProfileAvatar" class="avatar-lg rounded-circle"> --}}
                            <img src="{{ asset('images/users/'. authAdmin()->avatar ) }}" alt="admin-avatar" id="adminProfileAvatar" class="avatar-lg rounded-circle">
                            <input class="adminProfileAvatarInput" type="file" name="pic" accept="image/*">
                            <label><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></label>
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
                                            <x-form-input label="First Name" name="first_name" value="{{ authAdmin()->first_name }}" />
                                            <x-form-input label="Last Name" name="last_name" value="{{ authAdmin()->last_name }}" />
                                            <x-form-input label="Username" name="username" value="{{ authAdmin()->username }}" />
                                            <x-form-input label="Email" name="email" value="{{ authAdmin()->email }}" />
                                            <x-form-input label="Designation" name="designation" value="{{ authAdmin()->designation }}" />
                                            <x-form-input label="Country" name="country" value="{{ authAdmin()->country }}" />
                                            <x-form-input label="Phone" name="phone" value="{{ authAdmin()->phone }}" />
                                            <div class="col-sm-12 mb-3">
                                                <label class="form-label" for="bio">Bio</label>
                                                <textarea style="height: 125px;" name="bio" id="bio" class="form-control">{{ authAdmin()->bio }}</textarea>
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
@push('dashboard_scripts')
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.adminProfileAvatarInput').on('change', function(){
                let formData = new FormData();
                formData.append('avatar', $(this)[0].files[0])

                $.ajax({
                    type: 'POST',
                    url: '{{ route("dashboard.profile.avatar.update") }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success) {
                            $('#adminProfileAvatar').attr('src', "{{ asset('images/users/') }}/" + data.avatar);
                            $('.adminImageAvatar').attr('src', "{{ asset('images/users/') }}/" + data.avatar);
                            flasher.success('Your item has been added to your cart.');
                        } else {
                            flasher.success("Data has been saved successfully!");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        flasher.success("Data has been saved successfully!");
                    }
                });
            })
        });
    </script>
@endpush