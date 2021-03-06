@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Need Clarification</h1>
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
                        <th>Certification</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Academy</th>
                        <th>Notes</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 0)
                    	@foreach($datas as $data)
                            @foreach($data as $certificate)
	                      	<tr>
	                        <td>{{ ++$nomor }}</td>
                        	<td><a href="clarificationfinal/{{$certificate->name}}"> {{ $certificate->name }}</a></td>
                        	<td>{{ $certificate->start_date }}</td>
                            <td>{{ $certificate->finish_date }}</td>
                        	<td>{{ $certificate->academy }}</td>
                            <td>{{ $certificate->commend }}</td>
                            <td>
                                <button class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-info="{{$nomor}},{{$certificate->name}},{{$certificate->start_date}},{{$certificate->finish_date}},{{$certificate->location}},{{$certificate->academy}},{{$certificate->institution}},{{$certificate->category}},{{$certificate->internal}}">
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
                            <label class="control-label col-sm-2" for="fname">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fname">
                            </div>
                        </div>


                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fstart">Start Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="fstart">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="ffinish">Finish Date</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="ffinish">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="flocation">Location</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="flocation">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="facademy">Academy</label>
                            <div class="col-sm-10">
                                <select name="cer_academy" id="facademy" class="form-control">
                                <option value="NITS">NITS</option>
                                <option value="Consumer">Consumer</option>
                                <option value="DISP">Disp</option>
                                <option value="WINS">Wins</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Enterprise">Enterprise</option>
                                <option value="Business Enabler">Business Enabler</option>
                                <option value="Leadership">Leadership</option>
                              </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="finstitution">Institution</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="finstitution">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fcategory">Category</label>
                            <div class="col-sm-10">
                                <select name="cer_category" id="fcategory" class="form-control">
                                <option value="National">National</option>
                                <option value="International">International</option>
                              </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="finternal">Internal</label>
                            <div class="col-sm-10">
                                <select name="cer_internal" id="finternal" class="form-control" required="">
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                              </select>
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
            $('#finstitution').val(details[6]);
            $('#fcategory').val(details[7]);
            $('#finternal').val(details[8]);
        }


        $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/editClarification',
            data: {
                '_token': $('input[name=_token]').val(),
                'fnamebefore' : $('.namebefore').html(),
                'fnameafter' : $('#fname').val(),
                'fnomor': $("#fnomor").val(),
                'fstart' : $("#fstart").val(),
                'ffinish': $('#ffinish').val(),
                'flocation': $('#flocation').val(),
                'facademy': $('#facademy').val(),
                'finstitution': $('#finstitution').val(),
                'fcategory': $('#fcategory').val(),
                'finternal': $('#finternal').val()            
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
                url: '/deleteClarification',
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

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endpush

@endsection