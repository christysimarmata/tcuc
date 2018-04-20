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
                        <h1>DISP Certification</h1>
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

                            <form action="DISPcer" method="post" class="form-inline" style="margin-left: 15px;">
                          <div class="form-group"><label for="startDate" class="pr-1  form-control-label">Period </label><input type="date" id="startDate" class="form-control" name="start_date"></div>
                          <div class="form-group"><label for="finishDate" class="px-1  form-control-label">To : </label><input type="date" id="finishDate" class="form-control" name="finish_date"></div>

                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" value="Search" class="btn btn-primary btn-sm" style="margin-left: 30px;">
                        </form>
                        <hr>
                  <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Certification Name</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Location</th>
                        <th>Academy</th>
                        <th>Certification Institution</th>
                        <th>Category</th>
                        <th>Internal</th>
                        <th>CFU/FU</th>
                        <th>Certification Level</th>
                        <th>Outline</th>
                        <th>Telkom Main</th>
                        <th>Job Family</th>
                        <th>Released Date</th>
                        <th>Expired At</th>
                        <th>Validity</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 1)
                        @php ($today = date("Y-m-d"))
                        @foreach($data as $dataNits)
                            <tr>
                            <td>{{ $nomor++ }}</td>
                            <td><a href="DISPcer/{{ $dataNits->name }}" style="color: black;">{{ $dataNits->name }}</td>
                            <td>{{ date('d-m-Y', strtotime($dataNits->start_date)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($dataNits->finish_date)) }}</td>
                            <td>{{ $dataNits->location }}</td>
                            <td>{{ $dataNits->academy }}</td>
                            <td>{{ $dataNits->institution }}</td>
                            <td>{{ $dataNits->category }}</td>
                            <td>{{ $dataNits->internal }}</td>
                            <td>{{ $dataNits->cfu_fu }}</td>
                            <td>{{ $dataNits->level }}</td>
                            <td>{{ $dataNits->outline }}</td>
                            <td>{{ $dataNits->telkom_main }}</td>
                            <td>{{ $dataNits->job_family }}</td>
                            <td>{{ $dataNits->released_date }}</td>
                            <td>{{ $dataNits->expired_at }}</td>
                            @if($dataNits->expired_at > $today )
                                <td><button class="btn btn-success" style="width: 100px;" disabled="">Valid</button></td>
                            @else
                                <td><button class="btn btn-danger" style="width: 100px;" disabled="">Not Valid</button></td>
                            @endif
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