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
                        <h1>WINS Certification</h1>
                    </div>
                </div>
            </div>
    </div>

     <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-sm-left">Certification Name</h5>
                                <p>{{ $data->name}}</p>
                                <h5 class="text-sm-left">Start Date</h5>
                                <p>{{ $data->start_date}}</p>
                                <h5 class="text-sm-left">Finish Date</h5>
                                <p>{{ $data->finish_date}}</p>
                                <h5 class="text-sm-left">Location</h5>
                                <p>{{ $data->location}}</p>
                                <h5 class="text-sm-left">Academy</h5>
                                <p>{{ $data->academy}}</p>
                                <h5 class="text-sm-left">Certification Institution</h5>
                                <p>{{ $data->institution}}</p>
                                <h5 class="text-sm-left">Category</h5>
                                <p>{{ $data->category}}</p>
                                <h5 class="text-sm-left">Internal</h5>
                                <p>{{ $data->internal}}</p>
                                <h5 class="text-sm-left">CFU/FU</h5>
                                <p>{{ $data->cfu_fu}}</p>
                                <h5 class="text-sm-left">Certification Level</h5>
                                <p>{{ $data->level}}</p>
                                <h5 class="text-sm-left">Certification Outline</h5>
                                <p>{{ $data->outline}}</p>
                                @if($data->expired_at == '2100-12-12')
                                    <h5 class="text-sm-left">Expired Date</h5>
                                    <p>All Time</p>
                                @else
                                    <h5 class="text-sm-left">Expired Date</h5>
                                    <p>{{ $data->expired_at}}</p>
                                @endif
                                <h5 class="text-sm-left">Telkom Main Program</h5>
                                <p>{{ $data->telkom_main}}</p>
                                <h5 class="text-sm-left">Job Family</h5>
                                <p>{{ $data->job_family}}</p>
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
                  <table id="bootstrap-data-table-export-2" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Certification Name</th>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Participant Status</th>
                        <th>Job Position</th>
                        <th>Division</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 1)
                        @foreach($data_detail as $datas)
                                <tr>
                                <td>{{ $nomor++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td><a href="../profile_detail/{{ $datas->nik }}" style="color: black;">{{ $datas->nik }}</a></td>
                                <td><a href="../profile_detail/{{ $datas->nik }}" style="color: black;">{{ $datas->nama }}</a></td>
                                <td>{{ $datas->participant_status }}</td>
                                <td>{{ $datas->job }}</td>
                                <td>{{ $datas->division }}</td>
                                <td>{{ $datas->email }}</td>
                                <td>{{ $datas->phone_number }}</td>
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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endpush

@endsection