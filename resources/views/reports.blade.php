@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>REPORTS</h1>
                    </div>
                </div>
            </div>
    </div>

    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                        <form action="businesscer" method="post" class="form-inline" >
                            <div class="form-group">
                                <label for="startDate" class="pr-1  form-control-label">Period </label>
                                <input type="date" id="startDate" class="form-control" name="start_date">
                            </div>
                            <div class="form-group">
                                <label for="finishDate" class="px-1  form-control-label">To : </label>
                                <input type="date" id="finishDate" class="form-control" name="finish_date">
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="academy" class="form-control-label">Academy</label>
                                <input type="date" id="academy" class="form-control" name="academy">
                            </div>
                            <div class="form-group">
                                <label for="mainprogram" class="form-control-label">Telkom Main Program</label>
                                <input type="date" id="mainprogram" class="form-control" name="mainprogram">
                            </div>
                            <div class="form-group">
                                <label for="jobfamily" class="form-control-label">Job Family</label>
                                <input type="date" id="jobfamily" class="form-control" name="jobfamily">
                            </div>

                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" value="Search" class="btn btn-primary btn-sm" style="margin-left: 30px;">
                        </form>
                        <hr>

                        </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

@push('scripts')
@endpush

@endsection