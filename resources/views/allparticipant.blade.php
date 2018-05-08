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
                        <h1>All Participants</h1>
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

                        <form action="allparticipant" method="post" class="form-inline" style="margin-left: 15px;">
                          <div class="form-group"><label for="startDate" class="pr-1  form-control-label">Period </label><input type="date" id="startDate" class="form-control" name="start_date"></div>
                          <div class="form-group"><label for="finishDate" class="px-1  form-control-label">To : </label><input type="date" id="finishDate" class="form-control" name="finish_date"></div>

                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <input type="submit" value="Search" class="btn btn-primary btn-sm" style="margin-left: 30px;">
                        </form>
                        <hr>
                        <table id="bootstrap-data-table-export-4" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th> 
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Certification Name</th>
                                <th>Participant Status</th>
                                <th>Job Position</th>
                                <th>Division</th>
                                <th>Current Division</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                             
                                <th>Start Date</th>
                                <th>Finish Date</th> 
                                <th>Location</th>  
                                <th>Academy</th>
                                <th>Internal</th>
                                <th>Category</th>
                                <th>CFU/FU</th>
                                <th>Certification Institution</th>
                                <th>Certification Level</th>
                                <th>Outline</th>
                                <th>Telkom Main</th>
                                <th>Job Family</th>
                                <th>Released Date</th>
                                <th>Expired At</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php ($nomor = 0)
                                @foreach($list as $academy)
                                    @foreach($data[$academy] as $nits)
                                        @foreach($paracademy[$nits->name] as $pnits)
                                        <tr>
                                            <td>{{ ++$nomor }}</td>                                        
                                            <td><a href="../profile_detail/{{ $pnits->nik }}" style="color: black;">{{ $pnits->nik }}</a></td>
                                            <td><a href="../profile_detail/{{ $pnits->nik }}" style="color: black;">{{ $pnits->nama }}</a></td>
                                            <td><a href="{{$nits->academy}}cer/{{ $nits->name }}" style="color: black;">{{ $nits->name }}</a></td>
                                            <td>{{ $pnits->participant_status }}</td>
                                            <td>{{ $pnits->job }}</td>
                                            <td>{{ $pnits->divisi_ketika_sertifikasi }}</td>
                                            <td>{{ $pnits->division }}</td>
                                            <td>{{ $pnits->email }}</td>
                                            <td>{{ $pnits->phone_number }}</td>
                                           
                                            
                                            <td>{{ $nits->start_date }}</td>
                                            <td>{{ $nits->finish_date }}</td>
                                            <td>{{ $nits->location }}</td>
                                            <td><a href="../{{$nits->academy}}cer" style="color: black;">{{ $nits->academy }}</a></td>
                                            <td>{{ $nits->internal }}</td>
                                            <td>{{ $nits->category }}</td>
                                            <td>{{ $nits->cfu_fu }}</td>
                                            <td>{{ $nits->institution }}</td>
                                            <td>{{ $nits->level }}</td>
                                            <td>{{ $nits->outline }}</td>
                                            <td>{{ $nits->telkom_main }}</td>
                                            <td>{{ $nits->job_family }}</td>
                                            <td>{{ $nits->released_date }}</td>
                                            <td>{{ $nits->expired_at }}</td>
                                        </tr>
                                        @endforeach
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