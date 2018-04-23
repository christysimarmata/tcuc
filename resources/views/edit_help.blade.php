@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">

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
                        <h1>Edit Help Contacts</h1>
                    </div>
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
                            </div>
                            <div class="card-body">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Academy</th>
                            <th>NIK</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php ($nomor = 0)
                                @foreach($datas as $data)
                                    <tr>
                                    <td>{{ ++$nomor }}</td>
                                    <td>{{ $data->academy }}</td>
                                    <td>{{ $data->nik }}</td>
                                    <td>
                                        <center><button class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-info="{{$data->academy}},{{$data->nik}}" style="width: 80px;">
                                            <span class="glyphicon glyphicon-edit"></span> Change
                                        </button></center>      
                                    </td>
                                    </tr>
                                @endforeach
                        </tbody>
                      </table>
                            </div>
                        </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


<div id="myModal" class="modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog" style="width: 750px;">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class=" row form-group">
                            <label class="control-label col-sm-2">Academy</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="facademy" readonly="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnik">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnik" required="">
                            </div>
                        </div>
                        
                            {{ csrf_field() }}
                    </form>
                    
                    <div class="modal-footer">
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

            $(document).on('click', '.edit-modal', function() {
            $('#footer_action_button').text("Change");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Change');
            $('.form-horizontal').show();
            var stuff = $(this).data('info').split(',');
            fillmodalData(stuff)

        });


        function fillmodalData(details){
            $('#facademy').val(details[0]);
            $('#fnik').val(details[1]);
        }


        $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/changeHelp',
            data: {
                '_token': $('input[name=_token]').val(),
                'facademy': $("#facademy").val(),
                'fnik' : $("#fnik").val()
            },
            success: function(response) {
                    setTimeout(function() {
                        location.reload();
                    },500);
 
                 },
            error: function(response) {
                window.alert('NIK tidak terdaftar');
            }
        });
    });       

    </script>

    
@endpush

@endsection