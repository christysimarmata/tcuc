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
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Name</th>
                                <th>Certification Name</th>
                                <th>Academy</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php ($nomor = 0)
                                @foreach($datanits as $nits)
                                    @foreach($parnits[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                @foreach($dataconsumer as $nits)
                                    @foreach($parconsumer[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                @foreach($datadisp as $nits)
                                    @foreach($pardisp[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                @foreach($datawins as $nits)
                                    @foreach($parwins[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach   
                                @foreach($datamobile as $nits)
                                    @foreach($parmobile[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                @foreach($dataenterprise as $nits)
                                    @foreach($parenterprise[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                @foreach($databusiness as $nits)
                                    @foreach($parbusiness[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
                                    </tr>
                                    @endforeach
                                @endforeach
                                @foreach($dataleadership as $nits)
                                    @foreach($parleadership[$nits->name] as $pnits)
                                    <tr>
                                        <td>{{ ++$nomor }}</td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nik }}</a></td>
                                        <td><a href="../profile_detail/{{ $pnits->nik }}" >{{ $pnits->nama }}</a></td>
                                        <td><a href="{{$nits->academy}}cer/{{ $nits->name }}">{{ $nits->name }}</a></td>
                                        <td><a href="../{{$nits->academy}}cer">{{ $nits->academy }}</a></td>
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