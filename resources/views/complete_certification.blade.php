@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endpush
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Complete Certification</h1>
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

                            <form action="complete" method="post" class="form-inline" style="margin-left: 15px;">
                              <div class="form-group"><label for="startDate" class="pr-1  form-control-label">Period </label><input type="date" id="startDate" class="form-control" name="start_date"></div>
                              <div class="form-group"><label for="finishDate" class="px-1  form-control-label">To : </label><input type="date" id="finishDate" class="form-control" name="finish_date"></div>

                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <input type="submit" value="Search" class="btn btn-primary btn-sm" style="margin-left: 30px;">
                            </form>
                            <hr>

                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Certification</th>
                        <th>Start Date</th>
                        <th>Finish Date</th>
                        <th>Certification Location</th>
                        <th>Academy</th>
                        <th>Presence</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php ($nomor = 0)
                    	@foreach($datas as $data)
                            @foreach($data as $certificate)
	                        <tr>
	                        <td>{{ ++$nomor }}</td>
                        	<td><a href="/details/{{ $certificate->academy}}/{{ $certificate->name }}" style="color: black;" >{{ $certificate->name }}</a></td>
                        	<td>{{ $certificate->start_date }}</td>
                            <td>{{ $certificate->finish_date }}</td>
                        	<td>{{ $certificate->location }}</td>
                            <td>{{ $certificate->academy }}</td>
                            @if($certificate->filename != '')
                                <td>
                                    <button class="btn btn-success"><a href="{{ URL::to('/') }}/storage/presence_upload/{{ $certificate->filename }}" style="color: white;" download> Download </a></button>
                                </td>
                            @else
                                <td>
                                    <button class="btn btn-danger" disabled=""> Download </button>
                                </td>
                            @endif
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