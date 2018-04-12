@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
<style type="text/css">
    .topbutton {
        float: right;
        margin-left: 10px;
    }
</style>
@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Requested User</h1>
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
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Job</th>
                        <th>Division</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 1)
                        
                            @foreach($datas as $data) 
                                <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $data->nik }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->job }}</td>
                                <td>{{ $data->division }}</td>
                                <td>
                                    <button class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-info="{{$nomor}},{{$data->nik}},{{$data->nama}},{{$data->job}},{{$data->division}}" style="width: 80px;">
                                        <span class="glyphicon glyphicon-edit"></span> Create
                                    </button>
                                    <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#myModal"
                                        data-info="{{$nomor}},{{$data->nik}}" style="width: 80px;">
                                        <span class="glyphicon glyphicon-trash"></span> Delete
                                    </button>      
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
                            <label class="control-label col-sm-2">No</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnomor" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnik">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnik" required="">
                            </div>
                        </div>


                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnama">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnama" required="">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fpassword">Password</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fpassword" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="frole">Role</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="frole" id="frole">
                                    <option value="user">User</option>
                                    <option value="sso">SSO</option>
                                    <option value="lde">LDE</option>
                                    <option value="pnc">PnC</option>
                                    <option value="nonlde">Non LDE</option>
                                </select> 
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="femail">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="femail" required="">
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fphone">Phone Number</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fphone" required="">
                            </div>
                        </div>                       

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fjob">Job:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fjob" required="">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fdivision">Division</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fdivision" required="">
                            </div>
                        </div>
                        
                            {{ csrf_field() }}
                    </form>
                    <div class="deleteContent">
                        Are you sure you want to delete <span class="dname"></span> ? <span
                            class="hidden did" style="display: none;"></span>
                            <span class="hidden did1" style="display: none;"></span>
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
            $('#footer_action_button').text(" Create");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').addClass('edit');
            $('.modal-title').text('Create');
            $('.deleteContent').hide();
            $('.form-horizontal').show();
            var stuff = $(this).data('info').split(',');
            fillmodalData(stuff)

        });


        function fillmodalData(details){
            $('#fnomor').val(details[0]);
            $('#fnik').val(details[1]);
            $('#fnama').val(details[2]);
            $('#fjob').val(details[3]);
            $('#fdivision').val(details[4]);
        }


        $('.modal-footer').on('click', '.edit', function() {
        $.ajax({
            type: 'post',
            url: '/createRequest',
            data: {
                '_token': $('input[name=_token]').val(),
                'fnomor': $("#fnomor").val(),
                'fnik' : $("#fnik").val(),
                'fnama' : $("#fnama").val(),
                'fjob' : $("#fjob").val(),
                'fdivision' : $("#fdivision").val(),
                'fpassword' : $("#fpassword").val(),
                'frole' : $("#frole").val(),
                'femail' : $("#femail").val(),
                'fphone' : $("#fphone").val(),
            },
            success: function(data) {
                    setTimeout(function() {
                        location.reload();
                    },500);
 
                 }
        });
    });       
    

        $(document).on('click', '.delete-modal', function() {
            $('#footer_action_button').text(" Delete");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').removeClass('edit');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.deleteContent').show();
            $('.requestContent').hide();
            $('.form-horizontal').hide();
            var stuff = $(this).data('info').split(',');
            $('.did').text(stuff[0]);
            $('.did1').text(stuff[1]);
            $('.dname').html(stuff[1]);
        });

         $('.modal-footer').on('click', '.delete', function() {
            console.log($('.did').text());
            $.ajax({
                type: 'post',
                url: '/deleteRequest',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fnik': $('.did1').text()
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