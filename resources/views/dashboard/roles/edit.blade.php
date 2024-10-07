@extends('dashboard.layouts.master')
@section('dashboard_content')
<x-breadcrumb title="Update Role" />
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
                                    <x-form action="{{ route('dashboard.roles.update', $role->id) }}">
                                        <x-form-input label="Role Name" name="name" value="{{ $role->name }}" placeholder="Enter a Role Name" />
                                        <div class="form-group">
                                            <label for="name">Permissions</label>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1" {{ App\Models\Admin::roleHasPermissions($role, $all_permissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="checkPermissionAll">All</label>
                                            </div>
                                            <hr>
                                            @php $i = 1; @endphp
                                            @foreach ($permission_groups as $group)
                                                <div class="row">
                                                    @php
                                                        $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                        $j = 1;
                                                    @endphp
                                                    
                                                    <div class="col-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)" {{ App\Models\Admin::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                                       
                                                        @foreach ($permissions as $permission)
                                                            <div class="form-check">
                                                                <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
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
                                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Role</button>
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
                 $('input[type=checkbox]').prop('checked', true);
             }else{
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
            implementAllChecked();
         }
         function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
         }
         function implementAllChecked() {
             const countPermissions = {{ count($all_permissions) }};
             const countPermissionGroups = {{ count($permission_groups) }};
             if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
         }
    </script>
@endpush