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

					<div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">NITS</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_nits->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_nits->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_nits->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_nits->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_nits->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">Consumer</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_consumer->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_consumer->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_consumer->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_consumer->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_consumer->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">DISP</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_disp->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_disp->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_disp->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_disp->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_disp->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">WINS</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_wins->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_wins->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_wins->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_wins->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_wins->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">Mobile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_mobile->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_mobile->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_mobile->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_mobile->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_mobile->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">Enterprise</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_enterprise->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_enterprise->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_enterprise->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_enterprise->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_enterprise->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">Business Enabler</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_business->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_business->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_business->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_business->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_business->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-3">Leadership</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/uploads/{{ $lde_leadership->avatar}}" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_leadership->nama }}</h5>
                                    <div class="location text-sm-center">{{ $lde_leadership->nik }}</div>
                                    <div class="location text-sm-center">{{ $lde_leadership->email }}</div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                    <h5 class="text-sm-center mt-2 mb-1">{{ $lde_leadership->phone_number }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
@push('scripts')
@endpush

@endsection