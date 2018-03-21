@extends('layout.dashboard'.session('roleUserAktif'))

@section('content')
@push('styles')
@endpush

    <div class="breadcrumbs">
            <div class="col-sm-12" >
                <div class="page-header float-left">
                    
                        <h1 style="font-size: 35px; font-weight: 700;">Dashboard</h1>
                        <h1 style="font-size: 20px;">Welcome to TELKOM Certification</h1>
                </div>
                    <div class="card col-lg-3 col-md-6 no-padding no-shadow" style="float: right; margin-left: 20px; margin-top: 10px;">
                        <div class="card-body bg-flat-color-5" style="float: right;">
                            <i class="fa fa-child text-light" style="float: right; font-size: 200%"></i>
                            <div class="h4 mb-0 text-light">{{ session('totalparticipants') }}</div>
                            <h4 class="text-uppercase font-weight-bold text-light"><a href="allparticipant" style="color: white;">Total Participants</a></h4>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    
                    <div class="card col-lg-3 col-md-6 no-padding no-shadow" style="float: right; margin-top: 10px;">    
                        <div class="card-body bg-flat-color-4" >
                            <i class="fa fa-file text-light" style="float: right; font-size: 200%"></i>
                            <div class="h4 mb-0 text-light">{{ session('totalcertificate') }}</div>
                            <h4 class="text-light text-uppercase font-weight-bold"><a href="allcertification" style="color: white;">Total Certification</a></h4>
                            <div class="progress progress-xs mt-3 mb-0 bg-light" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
            </div>
            <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-lg-5"> 
                                {!! session('chartfamily')->render() !!}
                            </div>
                            <div class="col-lg-5"> 
                                {!! session('chartprogram')->render() !!}
                            </div>

                  
                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

            
        </div>

        


        
@push('scripts')
@endpush

@endsection