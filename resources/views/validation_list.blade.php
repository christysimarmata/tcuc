@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Validate Certification</h1>
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

                            <form action="validate" method="post" class="form-inline" style="margin-left: 15px;">
                              <div class="form-group"><label for="startDate" class="pr-1  form-control-label">Period </label><input type="date" id="startDate" class="form-control" name="start_date"></div>
                              <div class="form-group"><label for="finishDate" class="px-1  form-control-label">To : </label><input type="date" id="finishDate" class="form-control" name="finish_date"></div>

                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="submit" value="Search" class="btn btn-primary btn-sm" style="margin-left: 30px;">
                            </form>
                            <hr>

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Certification</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Certification Location</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 0)
                    	@foreach($datas as $data)
                            @foreach($data as $certificate)
	                        <tr>
	                        <td>{{ ++$nomor }}</td>
                        	<td>{{ $certificate->name }}</a></td>
                        	<td>{{ $certificate->start_date }}</td>
                            <td>{{ $certificate->finish_date }}</td>
                        	<td>{{ $certificate->location }}</td>
                            <td>
                                <button class="edit-modal btn btn-info" data-info="{{$nomor}},{{$certificate->name}},{{$certificate->start_date}},{{$certificate->finish_date}},{{$certificate->location}},{{$certificate->academy}}">Edit </button>
                                <button class="delete-modal btn btn-danger" title="Need Clarification to SSO" data-toggle="modal" data-target="#myModal" data-info="{{$certificate->name}}"><i class="fa fa-refresh"></i></button>
                            </td>
	                       </tr>
                            @endforeach
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
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fill Comment</label></div>
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
        $(document).on('click', '.edit-modal', function() {

            var stuff = $(this).data('info').split(',');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                type: 'post',
                url: '/editValidation',
                data: {
                    'fnomor' : stuff[0],
                    'fnama' : stuff[1],
                    'fstartdate' : stuff[2],
                    'ffinishdate' : stuff[3],
                    'flocation' : stuff[4],
                    'facademy' : stuff[5]
                },
                 success: function(response) {
                    setTimeout(function() {
                        window.location = "formValidation";
                    },500);
 
                 }
            })
        });
    </script>


    <script>
        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Send");
                $('#footer_action_button').addClass('glyphicon-check');
                $('#footer_action_button').removeClass('glyphicon-trash');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').removeClass('btn-danger');
                $('.actionBtn').removeClass('delete');
                $('.actionBtn').addClass('delete');
                $('.modal-title').text('Commend');
                $('.form-horizontal').show();
                var stuff = $(this).data('info');
                console.log(stuff);
                $('.dname').html(stuff);
        });

         $('.modal-footer').on('click', '.delete', function() {
            console.log('asdasd');
            $.ajax({
                type: 'post',
                url: '/deleteValidation',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fnama': $('.dname').html(),
                    'fcommend': $('#text-input').val() 
                },
                success: function(data) {
                    setTimeout(function() {
                        location.reload();
                    },500);
                }
            });
        });
    </script>

@endpush

@endsection