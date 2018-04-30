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
                        <h1>My Profile</h1>
                    </div>
                </div>
            </div>
    </div>

					<div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="mx-auto d-block" src="{{ URL::to('/') }}/images/uploads/{{ $user->avatar }}" alt="Card image cap" style="width: 200px; height: 200px;">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $user->nama }}</h5>
                                    <div class="location text-sm-center"><i class="fa fa-user-md"></i> {{ $user->job }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <form enctype="multipart/form-data" action="/profile" method="POST">
                                    	<label>Update Profil Picture</label>
                                    	<input type="file" name="avatar">
                                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    	<input type="submit" class="pull-right btn btn-sm btn-primary" >
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    	<div class="card">
                    		<div class="card-body">
                    			<h5 class="text-sm-left">NIK</h5>
                    			<p>{{ $user->nik}}</p>
                    			<h5 class="text-sm-left">Name</h5>
                    			<p>{{ $user->nama}}</p>
                    			<h5 class="text-sm-left">Email</h5>
                    			<p>{{ $user->email}}</p>
                    			<h5 class="text-sm-left">Phone Number</h5>
                    			<p>{{ $user->phone_number}}</p>
                    			<h5 class="text-sm-left">Job Position</h5>
                    			<p>{{ $user->job}}</p>
                    			<h5 class="text-sm-left">Division</h5>
                    			<p>{{ $user->division}}</p>
                                <hr>
                                <button type="button" class="btn btn-success" style="float: right;"><a href="changepassword" style="color: white;"><i class="fa fa-key"></i>&nbsp; Change Password</a></button>
                    		</div>
                    	</div>	
                    </div>

@push('scripts')
@endpush

@endsection