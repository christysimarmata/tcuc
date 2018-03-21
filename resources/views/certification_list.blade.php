@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Certification List</h1>
                    </div>
                </div>
            </div>
    </div>

    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <a href="/createSertificate" class="btn btn-primary" style="margin-left: 20px; margin-bottom: 20px;">Create New Certification</a>
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
                        <th>Certification</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Location</th>
                        <th>Academy</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 0)
                    	@foreach($datas as $data)
                            @foreach($data as $certificate)
	                      	<tr>
	                        <td>{{ ++$nomor }}</td>
                        	<td><a href="createnewfinal/{{ $certificate->name }}" >{{ $certificate->name }}</a></td>
                        	<td>{{ $certificate->start_date }}</td>
                            <td>{{ $certificate->finish_date }}</td>
                        	<td>{{ $certificate->location }}</td>
                            <td>{{ $certificate->academy }}</td>
                            <td>
                                <button class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-info="{{$nomor}},{{$certificate->name}},{{$certificate->start_date}},{{$certificate->finish_date}},{{$certificate->location}},{{$certificate->academy}}">
                                    <span class="glyphicon glyphicon-edit"></span> Edit<span class="namebefore" style="display: none;">{{$certificate->name}}</span>
                                </button>
                                <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#myModal"
                                    data-info="{{ $certificate->name }}">
                                    <span class="glyphicon glyphicon-trash"></span> Delete
                                </button>
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
                        <div class=" row form-group">
                            <label class="control-label col-sm-2">No</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnomor" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnik">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname">
                            </div>
                        </div>


                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnama">Start Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fstart">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fjob">Finish Date</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ffinish">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fdivision">Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="flocation">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fubpp">Academy</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="facademy">
                            </div>
                        </div>
                            {{ csrf_field() }}
                    </form>
                    <div class="deleteContent">
                        Are you Sure you want to delete <span class="dname"></span> ? 
                    </div>
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
        $(document).on('click', '.delete-modal', function() {
            console.log('asdasd');
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').removeClass('edit');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.deleteContent').show();
            $('.form-horizontal').hide();
            var stuff = $(this).data('info');
            $('.dname').html(stuff);
        });

         $('.modal-footer').on('click', '.delete', function() {
            console.log('asdasd');
            $.ajax({
                type: 'post',
                url: '/deleteCertification',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fnama': $('.dname').html()
                },
                success: function(data) {
                    setTimeout(function() {
                        location.reload();
                    },500);
                }
            });
        });
    </script>


    <script>

            $(document).on('click', '.edit-modal', function() {
            $('#footer_action_button').text(" Update");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Edit');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            var stuff = $(this).data('info').split(',');
            console.log(stuff);
            fillmodalData(stuff)

        });


        function fillmodalData(details){
            $('#fnomor').val(details[0]);
            $('#fname').val(details[1]);
            $('#fstart').val(details[2]);
            $('#ffinish').val(details[3]);
            $('#flocation').val(details[4]);
            $('#facademy').val(details[5]);
        }


        $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editCertification',
            data: {
                '_token': $('input[name=_token]').val(),
                'fnamebefore' : $('.namebefore').html(),
                'fnameafter' : $('#fname').val(),
                'fnomor': $("#fnomor").val(),
                'fstart' : $("#fstart").val(),
                'ffinish': $('#ffinish').val(),
                'flocation': $('#flocation').val(),
                'facademy': $('#facademy').val()            
            },
            success: function(data) {
                    setTimeout(function() {
                        location.reload();
                    },500);
 
                 }
        });
    });       

</script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endpush

@endsection