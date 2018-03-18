@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
@endpush
@section('content')

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
                    		</div>
                    	</div>	
                    </div>



    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Certification List</h1>
                    </div>
                </div>
            </div>
    </div>

            @foreach($family as $datas)
                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                            <strong class="card-title mb-3">{{ $datas[0][0]->job_family }}</strong>
                                </div>
                                <div class="card-body">
                @foreach($datas as $data) 
                    @foreach($data as $dat)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mx-auto d-block">
                                                <img class="mx-auto d-block" src="{{ URL::to('/') }}/storage/{{ $dat->name }}/{{$user->nik}}.jpg" alt="Card image cap" style="width: 200px; height: 200px;">
                                                
                                                <h5 class="text-sm-center mt-2 mb-1"><a href="../{{$dat->academy}}cer/{{$dat->name}}"> {{ $dat->name }}</a></h5>
                                                <center><div>{{ $dat->telkom_main }}</div></center>
                                            </div>
                                            <div class="card-text text-sm-center">
                                                {{ $dat->expired_at }} <a href=""><i class="fa fa-download"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                    @endforeach
                @endforeach
           

                                </div>
                            </div>
                        </div>
                         @endforeach

@push('scripts')
@endpush

@endsection