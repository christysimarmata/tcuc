@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
@endpush
@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Change Password</h1>
                    </div>
                </div>
            </div>
    </div>

					<div class="col-md-10">
                        <div class="card">
                            
                                <div class="card-header">
                                    Update Password
                                </div>
                                <div class="card-body">
                                    <form method="post" action="updatepassword" class="form-horizontal" role="form">
                                            
                                            <div class="row form-group">
                                                <label class="control-label col-sm-2" for="old">Old Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="old" class="form-control" name="oldpassword" required="">
                                                </div>
                                            </div>
                                            
                                            <div class="row form-group">
                                                <label class="control-label col-sm-2" for="new">New Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="new" class="form-control" name="newpassword" required="">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <label class="control-label col-sm-2" for="confirm">Confirm Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" id="confirm" class="form-control" name="confirmpassword">
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-success" style="float: right;" value="Update"></button>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                        </div>
                    </div>

                    

@push('scripts')
@endpush

@endsection