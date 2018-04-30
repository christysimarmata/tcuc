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
                        <h1>Create New User</h1>
                    </div>
                </div>
            </div>
    </div>

    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

            <div class="col-md-9 col-lg-9">        
                <div class="card">
                    <div class="card-header">
                        Create Multiple Certificate
                    </div>
                        <form method="post" action="addcertificatemultiple" class="form-horizontal" enctype="multipart/form-data" role="form">
                                <button type="button" id="button-template" class="btn btn-success" style="margin-bottom: 20px;"><a href="documents/templateCertificate.xlsx" style="color: white;" download>Download Template</a></button>
                                <div class="row form-group">
                                    <label class="control-label col-sm-2">List Certificate (Excel)</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" id="input-multiple" name="certificate_excel" class="form-control" required="">
                                    </div>
                                </div>                    
                            
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>
            </div> 

            <div class="col-md-9 col-lg-9">        
                <div class="card">
                    <div class="card-header">
                        Create Multiple User
                    </div>
                        <form method="post" action="addusermultiple" class="form-horizontal" enctype="multipart/form-data" role="form">
                                <button type="button" id="button-template" class="btn btn-success" style="margin-bottom: 20px;"><a href="documents/templateUser.xlsx" style="color: white;" download>Download Template</a></button>
                                <div class="row form-group">
                                    <label class="control-label col-sm-2">List User (Excel)</label>
                                    <div class="col-sm-10">
                                        <input type="file" accept=".xls,.xlsx, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel" id="input-multiple" name="participant_excel" class="form-control" required="">
                                    </div>
                                </div>                    
                            
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                </div>
            </div> 


            <div class="col-md-9 col-lg-9">        
                <div class="card">
                    <div class="card-header">
                        Create Single User
                    </div>
                        <form method="post" action="addusersingle" class="form-horizontal" role="form">
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2">NIK</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fnik" required="">
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname" required="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fpassword" required="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Role</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="frole">
                                            <option value="user">User</option>
                                            <option value="sso">SSO</option>
                                            <option value="lde">LDE</option>
                                            <option value="pnc">PnC</option>
                                            <option value="nonlde">Non LDE</option>
                                        </select> 
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="femail" required="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Phone_number</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fphone" required="">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Job</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fjob" required="">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <label class="control-label col-sm-2" for="fjob">Division</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fdivision" required="">
                                    </div>
                                </div>
                                    
                            
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" value="Submit"></button>
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