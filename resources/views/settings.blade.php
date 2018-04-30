@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
<style type="text/css">
    .topbutton {
        float: right;
        margin-left: 10px;
    }

    form {
        padding-left: 10px;
        padding-right: 10px;
        margin-top: 10px;
    }
</style>

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
                        <h1>Settings</h1>
                    </div>
                </div>
            </div>
    </div>

    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

            <div class="col-md-8">        
                <div class="card">
                    <div class="card-header">
                        Change Info
                    </div>
                        <form method="post" action="changeinfo" class="form-horizontal" role="form">
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fnik">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="faddress" value="{{ $address }}" placeholder="{{ $address }}">
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Phone Number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fphone" value="{{ $phone_number }}" placeholder="{{ $phone_number }}">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="femail" value="{{ $email }}" placeholder="{{ $email }}">
                                    </div>
                                </div>
                                    
                            
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>
            </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Telkom Main Program</strong>
                            <button class="create-program btn btn-warning" data-toggle="modal" data-target="#myModal" style="width: 80px; float: right; margin-right: 12px; ">
                                            <span class="glyphicon glyphicon-plus"></span> Create
                                        </button>
                        </div>
                        <div class="card-body">
                              <table id="bootstrap-data-table-khusus" class="table table-striped table-bordered">

                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Telkom Main Program</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php ($nomor = 1)
                                        @foreach($listprogram as $data) 
                                            <tr>
                                            <td>{{ $nomor++ }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <button class="delete-program btn btn-danger" data-toggle="modal" data-target="#myModal"
                                                    data-info="{{$nomor}},{{$data->name}}" style="width: 80px;">
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

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Job Family</strong>
                            <button class="create-family btn btn-warning" data-toggle="modal" data-target="#myModal" style="width: 80px; float: right; margin-right: 12px; ">
                                            <span class="glyphicon glyphicon-plus"></span> Create
                            </button>
                        </div>
                        <div class="card-body">
                              <table id="bootstrap-data-table-khusus" class="table table-striped table-bordered">

                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Job Family</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php ($nomor = 0)
                                        @foreach($listfamily as $data) 
                                            <tr>
                                            <td>{{ ++$nomor }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <button class="delete-family btn btn-danger" data-toggle="modal" data-target="#myModal"
                                                    data-info="{{$nomor}},{{$data->name}}" style="width: 80px;">
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

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Edit Academy</strong>
                            <button class="create-academy btn btn-warning" data-toggle="modal" data-target="#myModal" style="width: 80px; float: right; margin-right: 12px; ">
                                            <span class="glyphicon glyphicon-plus"></span> Create
                            </button>
                        </div>
                        <div class="card-body">
                              <table id="bootstrap-data-table-khusus" class="table table-striped table-bordered">

                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>Academy</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @php ($nomor = 0)
                                        @foreach($listacademy as $data) 
                                            <tr>
                                            <td>{{ ++$nomor }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <button class="delete-academy btn btn-danger" data-toggle="modal" data-target="#myModal"
                                                    data-info="{{$nomor}},{{$data->name}}" style="width: 80px;">
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
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    

                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">

                        <div class="row form-group inputprogram">
                            <label class="control-label col-sm-2" for="fprogram">Main Program</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fprogram">
                            </div>
                        </div>

                        <div class="row form-group inputfamily">
                            <label class="control-label col-sm-2" for="ffamily">Job Family</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ffamily">
                            </div>
                        </div>

                        <div class="row form-group inputacademy">
                            <label class="control-label col-sm-2" for="facademy">Academy</label>
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

            $(document).on('click', '.create-program', function() {
                $('#footer_action_button').text(" Create");
                $('#footer_action_button').addClass('glyphicon-check');
                $('#footer_action_button').removeClass('glyphicon-trash');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').removeClass('btn-danger');
                $('.actionBtn').removeClass('delete');
                $('.actionBtn').addClass('create_program');
                $('.modal-title').text('Create');
                $('.deleteContent').hide();
                $('.form-horizontal').show();
                $('.inputfamily').hide();
                $('.inputacademy').hide();

            });


            $('.modal-footer').on('click', '.create_program', function() {
            $.ajax({
                type: 'post',
                url: '/createprogram',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fprogram' : $("#fprogram").val()
                },
                success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        },500);
     
                     }
            });
        });      


            $(document).on('click', '.create-family', function() {
                $('#footer_action_button').text(" Create");
                $('#footer_action_button').addClass('glyphicon-check');
                $('#footer_action_button').removeClass('glyphicon-trash');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').removeClass('btn-danger');
                $('.actionBtn').removeClass('delete');
                $('.actionBtn').addClass('create_family');
                $('.modal-title').text('Create');
                $('.deleteContent').hide();
                $('.form-horizontal').show();
                $('.inputprogram').hide();
                $('.inputacademy').hide();

            });


            $('.modal-footer').on('click', '.create_family', function() {
            $.ajax({
                type: 'post',
                url: '/createfamily',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'ffamily' : $("#ffamily").val()
                },
                success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        },500);
     
                     }
            });
        });      


            $(document).on('click', '.create-academy', function() {
                $('#footer_action_button').text(" Create");
                $('#footer_action_button').addClass('glyphicon-check');
                $('#footer_action_button').removeClass('glyphicon-trash');
                $('.actionBtn').addClass('btn-success');
                $('.actionBtn').removeClass('btn-danger');
                $('.actionBtn').removeClass('delete');
                $('.actionBtn').addClass('create_academy');
                $('.modal-title').text('Create');
                $('.deleteContent').hide();
                $('.form-horizontal').show();
                $('.inputprogram').hide();
                $('.inputfamily').hide();
            });


            $('.modal-footer').on('click', '.create_academy', function() {
            $.ajax({
                type: 'post',
                url: '/createacademy',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'facademy' : $("#facademy").val()
                },
                success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        },500);
     
                     }
            });
        });      


            $(document).on('click', '.delete-program', function() {
                $('#footer_action_button').text(" Delete");
                $('#footer_action_button').removeClass('glyphicon-check');
                $('#footer_action_button').addClass('glyphicon-trash');
                $('.actionBtn').removeClass('btn-success');
                $('.actionBtn').addClass('btn-danger');
                $('.actionBtn').removeClass('edit');
                $('.actionBtn').addClass('delete_program');
                $('.modal-title').text('Delete');
                $('.deleteContent').show();
                $('.form-horizontal').hide();
                var stuff = $(this).data('info').split(',');
                $('.dname').html(stuff[1]);

            });


            $('.modal-footer').on('click', '.delete_program', function() {
            $.ajax({
                type: 'post',
                url: '/deleteprogram',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fprogram' : $(".dname").html()
                },
                success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        },500);
     
                     }
            });
        });      

            $(document).on('click', '.delete-family', function() {
                $('#footer_action_button').text(" Delete");
                $('#footer_action_button').removeClass('glyphicon-check');
                $('#footer_action_button').addClass('glyphicon-trash');
                $('.actionBtn').removeClass('btn-success');
                $('.actionBtn').addClass('btn-danger');
                $('.actionBtn').removeClass('edit');
                $('.actionBtn').addClass('delete_family');
                $('.modal-title').text('Delete');
                $('.deleteContent').show();
                $('.form-horizontal').hide();
                var stuff = $(this).data('info').split(',');
                $('.dname').html(stuff[1]);

            });


            $('.modal-footer').on('click', '.delete_family', function() {
            $.ajax({
                type: 'post',
                url: '/deletefamily',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'ffamily' : $(".dname").html()
                },
                success: function(data) {
                        setTimeout(function() {
                            location.reload();
                        },500);
     
                     }
            });
        });      

            $(document).on('click', '.delete-academy', function() {
                $('#footer_action_button').text(" Delete");
                $('#footer_action_button').removeClass('glyphicon-check');
                $('#footer_action_button').addClass('glyphicon-trash');
                $('.actionBtn').removeClass('btn-success');
                $('.actionBtn').addClass('btn-danger');
                $('.actionBtn').removeClass('edit');
                $('.actionBtn').addClass('delete_academy');
                $('.modal-title').text('Delete');
                $('.deleteContent').show();
                $('.form-horizontal').hide();
                var stuff = $(this).data('info').split(',');
                $('.dname').html(stuff[1]);

            });


            $('.modal-footer').on('click', '.delete_academy', function() {
            $.ajax({
                type: 'post',
                url: '/deleteacademy',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'facademy' : $(".dname").html()
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