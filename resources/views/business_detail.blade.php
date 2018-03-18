@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Business Certification</h1>
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
                                <h5 class="text-sm-left">Certification Outline</h5>
                                <p>{{ $data->outline}}</p>
                                <h5 class="text-sm-left">Expired Date</h5>
                                <p>{{ $data->expired_at}}</p>
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
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Job Position</th>
                        <th>Division</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 1)
                    	@foreach($data_detail as $datas)
							@foreach($datas as $data) 
								<tr>
	                       		<td>{{ $nomor++ }}</td>
                        		<td><a href="../profile_detail/{{ $data->nik }}" >{{ $data->nik }}</a></td>
                        		<td>{{ $data->nama }}</td>
                        		<td>{{ $data->job }}</td>
                        		<td>{{ $data->division }}</td>
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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>
@endpush

@endsection