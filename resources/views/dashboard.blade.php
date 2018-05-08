@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/searchbar.css') }}">
<style type="text/css">
    .hidden {
        display: none;
    }
</style>
@endpush
@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <div class="breadcrumbs" >
            <div class="col-sm-12">
                <div class="page-header float-left">
                    
                        <h1 style="font-size: 35px; font-weight: 700;">Dashboard</h1>
                        <h1 style="font-size: 27px;">Welcome to TELKOM Certification</h1>
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
                            
                            <div class="col-lg-6"> 
                                <center>{!! session('chartprogram')->render() !!}</center>
                            </div>

                            <div class="col-lg-6"> 
                                <center>{!! session('chartfamily')->render() !!}</center>
                            </div>
                             



                        </div>
                         <button type="button" class="btn btn-outline-success btn-lg advance" data-toggle="modal" data-target="#modalFirst"><i class="fa fa-search"></i>&nbsp; Advanced Search</button>             
                    </div>

                   
                </div>
                   
                    
                    
                </div>

            </div><!-- .animated -->

        </div><!-- .content -->
    </div>


<div id="modalFirst" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" style="width: 500px; margin: auto;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Search Options</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="get" action="advancesearch" class="form-horizontal" role="form">
                        <div class="row form-group">
                        
                            <div class="col-sm-10">
                                <div class="form-check">
                                <div class="checkbox">
                                  <label for="checkbox1" class="form-check-label" style="font-size: 16px;">
                                    <input type="checkbox" id="checkbox1" name="filter[]" value="name" class="form-check-input "> Certification Name
                                  </label>
                                </div>
                                <div class="row form-group hidden" id="input1">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="fname">
                                    </div>
                                </div>
                                <div class="checkbox">
                                  <label for="checkbox2" class="form-check-label" style="font-size: 16px;">
                                    <input type="checkbox" id="checkbox2" name="filter[]" value="academy" class="form-check-input"> Academy
                                  </label>
                                </div>
                                <div class="row form-group hidden" id="input2">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="facademy">
                                            @foreach(session('listacademy') as $academy)
                                                <option value="{{ $academy }}">{{ $academy }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="checkbox">
                                  <label for="checkbox3" class="form-check-label" style="font-size: 16px;">
                                    <input type="checkbox" id="checkbox3" name="filter[]" value="location" class="form-check-input"> Certification Location
                                  </label>
                                </div>
                                <div class="row form-group hidden" id="input3">
                                    
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="flocation">
                                    </div>
                                </div>
                                <div class="checkbox">
                                  <label for="checkbox4" class="form-check-label" style="font-size: 16px;">
                                    <input type="checkbox" id="checkbox4" name="filter[]" value="mainprogram" class="form-check-input"> Telkom Main Program
                                  </label>
                                </div>
                                <div class="row form-group hidden" id="input4">
                                    
                                    <div class="col-sm-12">
                                        <select class="form-control" name="fprogram">
                                            <option value="">-- Pilih --</option>
                                            @foreach(session('listprogram') as $data)
                                            <option value="{{ $data }}">{{ $data }}</option>        
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="checkbox">
                                  <label for="checkbox5" class="form-check-label" style="font-size: 16px;">
                                    <input type="checkbox" id="checkbox5" name="filter[]" value="jobfamily" class="form-check-input"> Job Family
                                  </label>
                                </div>
                                <div class="row form-group hidden" id="input5">
                                    
                                    <div class="col-sm-12">
                                        <select class="form-control" name="ffamily">
                                            <option value="">-- Pilih --</option>
                                            @foreach(session('listfamily') as $data)
                                            <option value="{{ $data }}">{{ $data }}</option>        
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md" style="float: right;" > Search <i class="fa fa-arrow-right"></i></button>
                    {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>


@push('scripts')
        <script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
        <script>
            $('#checkbox1').click(function() {
                if(document.getElementById('checkbox1').checked) {
                    document.getElementById('input1').classList.remove('hidden');
                } else {
                    document.getElementById('input1').classList.add('hidden');
                }
            });

            $('#checkbox2').click(function() {
                if($('input#checkbox2').is(':checked')) {
                    document.getElementById('input2').classList.remove('hidden');
                } else {
                    document.getElementById('input2').classList.add('hidden');
                }
            });

            $('#checkbox3').click(function() {
                if($('input#checkbox3').is(':checked')) {
                    document.getElementById('input3').classList.remove('hidden');
                } else {
                    document.getElementById('input3').classList.add('hidden');
                }
            });

            $('#checkbox4').click(function() {
                if($('input#checkbox4').is(':checked')) {
                    document.getElementById('input4').classList.remove('hidden');
                } else {
                    document.getElementById('input4').classList.add('hidden');
                }
            });

            $('#checkbox5').click(function() {
                if($('input#checkbox5').is(':checked')) {
                    document.getElementById('input5').classList.remove('hidden');
                } else {
                    document.getElementById('input5').classList.add('hidden');
                }
            });
        </script>
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