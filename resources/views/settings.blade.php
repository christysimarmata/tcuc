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

                <div class="card" >
                    <div class="card-header">
                        Add Telkom Main Program
                    </div>
                        <form method="post" action="addprogram" class="form-horizontal" role="form">
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fnik">Program Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newprogram" >
                                    </div>
                                </div>
                                
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>

                <div class="card" >
                    <div class="card-header">
                        Delete Telkom Main Program
                    </div>
                        <form method="post" action="deleteprogram" class="form-horizontal" role="form">
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fnik">Program Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="deletedprogram">
                                            @foreach($listprogram as $list)
                                            <option value="{{ $list->name }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" value="Delete"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>

                <div class="card" >
                    <div class="card-header">
                        Add Job Family
                    </div>
                        <form method="post" action="addfamily" class="form-horizontal" role="form">
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fnik">Job Family Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="newfamily" >
                                    </div>
                                </div>
                                
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>

                <div class="card" >
                    <div class="card-header">
                        Delete Job Family
                    </div>
                        <form method="post" action="deletefamily" class="form-horizontal" role="form">
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fnik">Job Family Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="deletedfamily">
                                            @foreach($listfamily as $list)
                                            <option value="{{ $list->name }}">{{ $list->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-danger" value="Delete"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>


            </div>    

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


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


    
@endpush

@endsection