@extends('agent.agent_dashboard')
@section('agent')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="row profile-body">
            <!-- left wrapper start -->
            <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                <div class="card rounded">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <img class="wd-100 rounded-circle"
                                    src="{{ !empty($profileData->photo) ? url('upload/agent_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                    alt="profile">
                                <span class="h4 ms-3 ">{{ $profileData->username }}</span>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
                            <p class="text-muted">{{ $profileData->name }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                            <p class="text-muted">{{ $profileData->email }}</p>
                        </div>
                        <div class="mt-3">
                            <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                            <p class="text-muted">{{ $profileData->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- middle wrapper start -->
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">

                            <h6 class="card-title">Update Agent Profile</h6>

                            <form method="POST" action="{{ route('agent.profile.store') }}" class="forms-sample"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">User Name</label>
                                    <input type="text" name="username" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->username }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->name }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->email }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->address }}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputUsername1" class="form-label">Description</label>
                                    {{-- <input type="text" name="address" class="form-control" id="exampleInputUsername1"
                                        autocomplete="off" value="{{ $profileData->description }}"> --}}
                                    <textarea type="text" name="description" class="form-control"
                                    rows="5"> {{ $profileData->description }} </textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="formFile">Upload Photo</label>
                                    <input class="form-control" name="photo" type="file" id="image">
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <div>
                                        <img id="showImage" class="wd-80 rounded-circle"
                                            src="{{ !empty($profileData->photo) ? url('upload/agent_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                            alt="profile">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
