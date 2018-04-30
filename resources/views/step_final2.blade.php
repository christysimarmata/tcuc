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
                    
                          <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="text-sm-left">Certification Name</h5>
                                                    <p class="val_name">{{ $data_detail[0]->name }}</p>
                                                    <h5 class="text-sm-left">Start Date</h5>
                                                    <p>{{ $data_detail[0]->start_date }}</p>
                                                    <h5 class="text-sm-left">Finish Date</h5>
                                                    <p>{{ $data_detail[0]->finish_date }}</p>
                                                    <h5 class="text-sm-left">Location</h5>
                                                    <p>{{ $data_detail[0]->location }}</p>
                                                    <h5 class="text-sm-left">Academy</h5>
                                                    <p>{{ $data_detail[0]->academy }}</p>
                                                    <h5 class="text-sm-left">Certification Institution</h5>
                                                    <p>{{ $data_detail[0]->institution }}</p>
                                                    <h5 class="text-sm-left">Category</h5>
                                                    <p>{{ $data_detail[0]->category }}</p>
                                                    <h5 class="text-sm-left">Internal Certification</h5>
                                                    <p>{{ $data_detail[0]->internal }}</p>
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
                                                
                                      <table id="bootstrap-data-table" class="table table-striped table-bordered ttotsave">
                                        <button class="create-modal btn btn-info" data-toggle="modal" data-target="#myModal" style="width: 100px; float: right; margin-right: 12px;">
                                            <span class="glyphicon glyphicon-plus"></span> Create
                                        </button>
                                        <thead>
                                          <tr>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Name</th>
                                            <th>Job Position</th>
                                            <th>Division</th>
                                            <th>Actions</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @php ($nomor = 0)
                                            @foreach($participant_detail as $datas)
                                                @if($datas->status == 'fix')
                                                        <tr class="datas{{ ++$nomor }}">
                                                        <td>{{ $nomor }}</td>
                                                        <td>{{ $datas->nik }}</td>
                                                        <td>{{ $datas->nama }}</td>
                                                        <td>{{ $datas->job }}</td>
                                                        <td>{{ $datas->division }}</td>
                                                        <td><button class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-info="{{$nomor}},{{$datas->nik}},{{$datas->nama}},{{$datas->job}},{{$datas->division}}">
            <span class="glyphicon glyphicon-edit"></span> Edit
        </button>
        <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#myModal"
            data-info="{{$nomor}},{{$datas->nik}},{{$datas->nama}},{{$datas->job}},{{$datas->division}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
        </button>
                                                        </td>                                              
                                                        </tr>
                                                @else
                                                        <tr class="datas{{ ++$nomor }}">
                                                        <td>{{ $nomor }}</td>
                                                        <td style="color:red;">{{ $datas->nik }}</td>
                                                        <td>{{ $datas->nama }}</td>
                                                        <td>{{ $datas->job }}</td>
                                                        <td>{{ $datas->division }}</td>
                                                        <td><button class="edit-modal btn btn-info" data-toggle="modal" data-target="#myModal" data-info="{{$nomor}},{{$datas->nik}},{{$datas->nama}},{{$datas->job}},{{$datas->division}}">
            <span class="glyphicon glyphicon-edit"></span> Edit
        </button>
        <button class="delete-modal btn btn-danger" data-toggle="modal" data-target="#myModal"
            data-info="{{$nomor}},{{$datas->nik}},{{$datas->nama}},{{$datas->job}},{{$datas->division}}">
            <span class="glyphicon glyphicon-trash"></span> Delete
        </button>
                                                        </td>                                              
                                                        </tr>
                                                @endif
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
                        <div class=" row form-group">
                            <label class="control-label col-sm-2">No</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnomor" disabled>
                            </div>
                        </div>

                        <div class="row form-group">
                            <label class="control-label col-sm-2" for="fnik">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnik">
                            </div>
                        </div>


                        <div class="row form-group satu">
                            <label class="control-label col-sm-2" for="fnama">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fnama">
                            </div>
                        </div>
                        
                        <div class="row form-group dua">
                            <label class="control-label col-sm-2" for="fjob">Job:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fjob">
                            </div>
                        </div>
                        
                        <div class="row form-group tiga">
                            <label class="control-label col-sm-2" for="fdivision">Division</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="fdivision">
                            </div>
                        </div>
                        
                        {{ csrf_field() }}
                    </form>
                    <div class="deleteContent">
                        Are you Sure you want to delete <span class="dname"></span> ? <span
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
        
        $(document).on('click', '.draftdata', function() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                type: 'post',
                url: '/draftFormNew',
                 success: function(response) {
                    setTimeout(function() {
                        window.location = "../certificationlist";
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
                url: '/submitFormNew',
                data:{
                    '_token': $('input[name=_token]').val(),
                    'fname' : $('.val_name').html()
                },
                 success: function(response) {
                    setTimeout(function() {
                        window.location = "../certificationlist";
                    },500);
 
                 },
                 error: function(response) {
                    window.alert("Please fill all the field");
                 }
            })
        })


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
            url: '/editItem2',
            data: {
                '_token': $('input[name=_token]').val(),
                'fname' : $('.val_name').html(),
                'fnomor': $("#fnomor").val(),
                'fnik' : $("#fnik").val(),
                'fnama': $('#fnama').val(),
                'fjob': $('#fjob').val(),
                'fdivision': $('#fdivision').val()          
            },
            success: function(data) {
                    setTimeout(function() {
                        location.reload();
                    },500);
 
                 }
        });
    });       


        $(document).on('click', '.create-modal', function() {
            $('#footer_action_button').text(" Update");
            $('#footer_action_button').addClass('glyphicon-check');
            $('#footer_action_button').removeClass('glyphicon-trash');
            $('.actionBtn').addClass('btn-success');
            $('.actionBtn').removeClass('btn-danger');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').addClass('create');
            $('.modal-title').text('Create');
            $('.satu').hide();
            $('.dua').hide();
            $('.tiga').hide();
            $('.empat').hide();
            $('.deleteContent').hide();
            $('.form-horizontal').show();

        });


        $('.modal-footer').on('click', '.create', function() {
        $.ajax({
            type: 'post',
            url: '/createItem2',
            data: {
                '_token': $('input[name=_token]').val(),
                'fname' : $('.val_name').html(),
                'fnomor': $("#fnomor").val(),
                'fnik' : $("#fnik").val(),
                'fnama': '',
                'fjob': '',
                'fdivision': ''         
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
            $('.form-horizontal').hide();
            var stuff = $(this).data('info').split(',');
            $('.did').text(stuff[0]);
            $('.did1').text(stuff[1]);
            $('.dname').html(stuff[2]);
            console.log($('.did1').html());
        });

         $('.modal-footer').on('click', '.delete', function() {
            console.log($('.did1').html());
            $.ajax({
                type: 'post',
                url: 'deleteItem2',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'fnomor': $('.did').html(),
                    'fnik' : $('.did1').html(),
                    'fname' : $('.val_name').html()
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