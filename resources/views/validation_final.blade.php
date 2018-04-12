@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('css/form_style.css') }}">
@endpush
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Certification</h1>
                    </div>
                </div>
            </div>
    </div>

    <div class="col-lg-12">
                <div class="card">
                    <div class="card-block">
                        <form class="form-horizontal" id="msform">
                            <ul id="progressbar">
                            <li>Detail Sertificate</li>
                            <li>Input Participant</li>
                            <li class="active">Preview</li>
                          </ul>
                        </form>
                          <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="text-sm-left">Certification Name</h5>
                                                    <p class="val_name">{{ $data_detail[0] }}</p>
                                                    <h5 class="text-sm-left">Start Date</h5>
                                                    <p class="val_start">{{ $data_detail[1] }}</p>
                                                    <h5 class="text-sm-left">Finish Date</h5>
                                                    <p class="val_finish">{{ $data_detail[2] }}</p>
                                                    <h5 class="text-sm-left">Certificate Location</h5>
                                                    <p class="val_location">{{ $data_detail[3] }}</p>
                                                    <h5 class="text-sm-left">Academy</h5>
                                                    <p class="val_academy">{{ $data_detail[4] }}</p>
                                                    <h5 class="text-sm-left">CFU/FU</h5>
                                                    <p class="val_cfu">{{ $data_detail[5] }}</p>
                                                    <h5 class="text-sm-left">Certification Level</h5>
                                                    <p class="val_level">{{ $data_detail[6] }}</p>
                                                    <h5 class="text-sm-left">Released Date</h5>
                                                    <p class="val_release">{{ $data_detail[7] }}</p>
                                                    <h5 class="text-sm-left">Outline Certification</h5>
                                                    <p class="val_outline">{{ $data_detail[8] }}</p>
                                                    @if($data_detail[9] == '2100/12/12')
                                                        <h5 class="text-sm-left">Expired Date</h5>
                                                        <p>All Time</p>
                                                        <p class="val_expired" style="display: none;">2100/12/12</p>
                                                    @else
                                                        <h5 class="text-sm-left">Expired Date</h5>
                                                        <p class="val_expired">{{ $data_detail[9] }}</p>
                                                    @endif
                                                    <h5 class="text-sm-left">Telkom Main Program</h5>
                                                    <p class="val_program">{{ $data_detail[10] }}</p>
                                                    <h5 class="text-sm-left">Job Family</h5>
                                                    <p class="val_family">{{ $data_detail[11] }}</p>
                                                </div>
                                            </div>  
                                        </div>

                        <div class="content mt-3">
                                <div class="animated fadeIn">
                                    <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">

                                                <strong class="card-title">Data Table</strong>
                                                <button class="commend-modal btn btn-info" data-info="{{ $data_detail[0] }}" data-toggle="modal" data-target="#myModal" style="float: right;">Validate</button>
                                            </div>
                                            <div class="card-body">
                                                
                                      <table id="bootstrap-data-table" class="table table-striped table-bordered ttotsave">
                                        <thead>

                                          <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Name</th>
                                            <th>Certificate</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @php ($nomor = 0)
                                            @foreach($participant_detail as $datas)
                                                        <tr>
                                                        <td>{{ ++$nomor }}</td>
                                                        <td>{{ $datas->nik }}</td>
                                                        <td>{{ $datas->nama }}</td>
                                                        
                                                            @if($details[$nomor-1]->file_name)
                                                                <td>
                                                                    {{ $details[$nomor-1]->file_name }}
                                                                </td>
                                                            @else
                                                                <td>
                                                                    -    
                                                                </td>
                                                            @endif                                             
                                                        </tr>
                                            @endforeach
                                        </tbody>
                                      </table>
                                            </div>
                                            <div class="card-footer" >
                                                <button class="submitdata btn btn-success" style="float: right; margin-left: 20px; margin-right: 40px;">SUBMIT </button>
                                                <button class="draftdata btn btn-warning" style="float: right;">SAVE AS DRAFT </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div><!-- .animated -->
                                
                            </div><!-- .content -->                    
                    </div>
                </div>

                
            </div>


<div id="myModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fill Commend</label></div>
                            <div class="col-12 col-md-9">
                              <textarea id="text-input" name="commend" class="form-control" rows="7"></textarea></div>
                        </div>
                    </form>
                    
                    <div class="modal-footer">
                        <span class="dname" style="display: none;"></span>
                        <button type="button" class="btn actionBtn" data-dismiss="modal">
                            <span id="footer_action_button" class='glyphicon'> </span>
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
            


            

@push('scripts')

	<script src="{{ asset('js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('js/lib/data-table/datatables-init.js') }}"></script>    

    <script>
        
        $(document).on('click', '.commend-modal', function() {
                $('#footer_action_button').text(" Send");
                $('#footer_action_button').addClass('glyphicon-check');
                $('#footer_action_button').removeClass('glyphicon-trash');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').removeClass('btn-danger');
                $('.actionBtn').removeClass('delete');
                $('.actionBtn').addClass('commend');
                $('.modal-title').text('Commend');
                $('.form-horizontal').show();
                var stuff = $(this).data('info');
                console.log(stuff);
                $('.dname').html(stuff);
            });


            


            $('.modal-footer').on('click', '.commend', function() {
                console.log($('#text-input').val());
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                type: 'post',
                url: '/commendtoSSO',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fnama': $('.dname').html(),
                    'fcommend': $('#text-input').val()       
                },
                success: function(data) {
                        setTimeout(function() {
                            window.location = "validate";
                        },500);
     
                     }
            });
        });    

        $(document).on('click', '.draftdata', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                type: 'post',
                url: '/draftLDE',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name' : document.getElementsByClassName('val_name')[0].innerHTML,
                    'start' : document.getElementsByClassName('val_start')[0].innerHTML,
                    'finish' : document.getElementsByClassName('val_finish')[0].innerHTML,
                    'location' : document.getElementsByClassName('val_location')[0].innerHTML,
                    'academy' : document.getElementsByClassName('val_academy')[0].innerHTML,
                    'cfu_fu' : document.getElementsByClassName('val_cfu')[0].innerHTML,
                    'level' : document.getElementsByClassName('val_level')[0].innerHTML,
                    'released_date' : document.getElementsByClassName('val_release')[0].innerHTML,
                    'outline' : document.getElementsByClassName('val_outline')[0].innerHTML,
                    'expired_date' : document.getElementsByClassName('val_expired')[0].innerHTML,
                    'main_program' : document.getElementsByClassName('val_program')[0].innerHTML,
                    'job_family' : document.getElementsByClassName('val_family')[0].innerHTML
                },
                 success: function(data) {
                    setTimeout(function() {
                        window.location = "validate";
                    },500);
 
                 }
            })
        })


    </script>

    <script>
        
        $(document).on('click', '.submitdata', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                type: 'post',
                url: '/submitComplete',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name' : document.getElementsByClassName('val_name')[0].innerHTML,
                    'start' : document.getElementsByClassName('val_start')[0].innerHTML,
                    'finish' : document.getElementsByClassName('val_finish')[0].innerHTML,
                    'location' : document.getElementsByClassName('val_location')[0].innerHTML,
                    'academy' : document.getElementsByClassName('val_academy')[0].innerHTML,
                    'cfu_fu' : document.getElementsByClassName('val_cfu')[0].innerHTML,
                    'level' : document.getElementsByClassName('val_level')[0].innerHTML,
                    'released_date' : document.getElementsByClassName('val_release')[0].innerHTML,
                    'outline' : document.getElementsByClassName('val_outline')[0].innerHTML,
                    'expired_date' : document.getElementsByClassName('val_expired')[0].innerHTML,
                    'main_program' : document.getElementsByClassName('val_program')[0].innerHTML,
                    'job_family' : document.getElementsByClassName('val_family')[0].innerHTML
                },
                 success: function(response) {
                    setTimeout(function() {
                        window.location = "validate";
                    },500);
 
                 }
            })
        })


    </script>

@endpush

@endsection