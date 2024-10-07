@extends('dashboard.layouts.master')
@section('dashboard_content')
<x-breadcrumb title="Create Role" />
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
                                    <x-form action="{{ route('dashboard.roles.store') }}">
                                        <x-form-input label="Role Name" name="name" value="{{ old('name') }}" placeholder="Enter a Role Name" />
                                        <div class="form-group">
                                            <label for="name">Permissions</label>
                
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                                <label class="form-check-label" for="checkPermissionAll">All</label>
                                            </div>
                                            <hr>
                                            @php $i = 1; @endphp
                                            @foreach ($permission_groups as $group)
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                        </div>
                                                    </div>
                
                                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                                        @php
                                                            $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                            $j = 1;
                                                        @endphp
                                                        @foreach ($permissions as $permission)
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                            </div>
                                                            @php  $j++; @endphp
                                                        @endforeach
                                                        <br>
                                                    </div>
                                                </div>
                                                @php  $i++; @endphp
                                            @endforeach
                                        </div>
                
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save</button>
                                        <a href="{{ route('dashboard.roles.index') }}" class="btn btn-secondary mt-4 pr-4 pl-4">Cancel</a>
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
          /**
         * Check all the permissions
         */
         $("#checkPermissionAll").click(function(){
             if($(this).is(':checked')){
                 // check all the checkbox
                 $('input[type=checkbox]').prop('checked', true);
             }else{
                 // un check all the checkbox
                 $('input[type=checkbox]').prop('checked', false);
             }
         });
         function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                 classCheckBox.prop('checked', true);
             }else{
                 classCheckBox.prop('checked', false);
             }
         }
    </script>
@endpush