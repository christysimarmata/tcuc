@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Help</h1>
                    </div>
                </div>
            </div>
    </div>
                @foreach($datas as $data)    
					<div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">{{ $data[0] }}</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $data[1]}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $data[2] }}</h5>
                                    <div class="location text-sm-center">{{ $data[3] }}</div>
                                    <div class="location text-sm-center">{{ $data[4] }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $data[5] }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                 
@push('scripts')
@endpush

@endsection