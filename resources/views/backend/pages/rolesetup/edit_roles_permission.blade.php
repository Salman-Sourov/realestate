@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style type="text/css">
        .form-check-label {
            text-transform: capitalize;
        }
    </style>

    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Edit Roles in Permission </h6>

                            <form id="myForm" method="POST" action="{{ route('admin.roles.update',$role->id) }}"
                                class="forms-sample">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Roles Name </label>
                                    <h3> Position: {{ $role->name }}</h3>
                                </div>

                                <div class="form-check mb-2">
                                    <input type="checkbox" class="form-check-input" id="checkDefaultmain">
                                    <label class="form-check-label" for="checkDefaultmain">
                                        Permission All
                                    </label>
                                </div>

                                <hr>

                                @php
                                    // Create an instance of the User model (only once)
                                    $user = new \App\Models\User();
                                @endphp

                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-3">
                                            @php
                                                // Call the non-static method on the User instance
                                                $permissions = $user->getPermissionByGroupName($group->group_name);
                                            @endphp

                                            <div class="form-check mb-2">
                                                <input type="checkbox" class="form-check-input" id="checkDefault"
                                                    {{ $user->roleHasPermissions($role, $permissions) ? 'checked' : '' }}>

                                                <label class="form-check-label" for="checkDefault">
                                                    {{ $group->group_name }}
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-9">
                                            @foreach ($permissions as $permission)
                                                <div class="form-check mb-2">
                                                    <input type="checkbox" class="form-check-input" name="permission[]"
                                                        id="checkDefault{{ $permission->id }}" value="{{ $permission->id }}"
                                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="checkDefault{{ $permission->id }}">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <br>
                                @endforeach

                                <button type="submit" class="btn btn-primary me-2">Save Changes </button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $('#checkDefaultmain').click(function() {
            if ($(this).is(':checked')) {
                $('input[ type= checkbox]').prop('checked', true);
            } else {
                $('input[ type= checkbox]').prop('checked', false);
            }
        });
    </script>
@endsection
