@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">

@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>My Certification</h1>
                    </div>
                </div>
            </div>
    </div>

            @foreach($family as $datas)
                <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                            <strong class="card-title mb-3">{{ $datas[0][0]->job_family }}</strong>
                                </div>
                                <div class="card-body">
                @foreach($datas as $data) 
                    @foreach($data as $dat)
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mx-auto d-block">
                                                <img class="mx-auto d-block" src="images/admin.jpg" alt="Card image cap" style="width: 200px; height: 200px;">
                                
                                                <h5 class="text-sm-center mt-2 mb-1">{{ $dat->name }}</h5>
                                                <center><div>{{ $dat->telkom_main }}</div></center>
                                            </div>
                                            <div class="card-text text-sm-center">
                                                {{ $dat->expired_at }} <i class="fa fa-download"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                    @endforeach
                @endforeach
           

                                </div>
                            </div>
                        </div>
                         @endforeach

  

     
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
    <script src="{{ asset('js/form_script.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();
        } );
    </script>

@endpush

@endsection