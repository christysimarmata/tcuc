@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/searchbar.css') }}">

@endpush
@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
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

                    <!-- <div class="form-wrapper">
                        <input type="text" id="search" placeholder="Search..">
                        <button id="advance" data-toggle="modal" data-target="#myModal">Advanced Search </button>
                        <button id="submit" class="basicsearch">GO </button>
                    </div> -->


                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>


<div id="myModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width: 750px; margin: auto;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Advanced Search</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="get" action="advancesearch" class="form-horizontal" role="form">
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnik">Certification Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="fname" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnama">Academy</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="facademy">
                                    
                                    <option value="NITS">NITS</option>
                                    <option value="Consumer">Consumer</option>        
                                    <option value="DISP">DISP</option>
                                    <option value="WINS">WINS</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Enterprise">Enterprise</option>
                                    <option value="Business Enabler">Business Enabler</option>
                                    <option value="Leadership">Leadership</option>
                                    
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fjob">Certification Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="flocation" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fstart">Starting Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="fstart" required="">
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="ffinish">End Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="ffinish" required="">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fdivision">Telkom Main Program</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="fprogram">
                                    @foreach(session('listprogram') as $data)
                                    <option value="{{ $data }}">{{ $data }}</option>        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fubpp">Job Family</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="ffamily">
                                    @foreach(session('listfamily') as $data)
                                    <option value="{{ $data }}">{{ $data }}</option>        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            
                    
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Search"></button>
                    </div>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>


        
@push('scripts')
        <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
        <script>
        
            $(document).on('click', '.basicsearch', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                type: 'post',
                url: '/basicsearch',
                data:{ 
                    '_token': $('input[name=_token]').val(),
                    'fsearch': $("#search").val()
                },
                 success: function(response) {
                    setTimeout(function() {
                        window.location = "dashboard";
                    },500);
 
                 }
            })
        })
    
       
    </script>


@endpush

@endsection