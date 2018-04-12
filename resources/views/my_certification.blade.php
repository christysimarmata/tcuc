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
                        @foreach($filee as $file)
                            @foreach($file as $fil)
                                @if(($fil->name === $dat->name) && ($fil->peserta === session('userAktif')))
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="mx-auto d-block">
                                                            <img class="mx-auto d-block" src="{{ URL::to('/') }}/storage/{{ $dat->name }}/{{ $fil->file_name}}" alt="Card image cap" style="width: 200px; height: 200px;">
                                                            
                                                            <h5 class="text-sm-center mt-2 mb-1"><a href="../{{$dat->academy}}cer/{{$dat->name}}"> {{ $dat->name }}</a></h5>
                                                            <center><div>{{ $dat->telkom_main }}</div></center>
                                                        </div>
                                                        <div class="card-text text-sm-center">
                                                            @if($dat->expired_at === '2100-12-12')
                                                                All Time <a href="{{ URL::to('/') }}/storage/{{ $dat->name }}/{{ session('userAktif') }}.jpg" download><i class="fa fa-download"></i></a>
                                                            @else 
                                                                {{ $dat->expired_at }} <a href="{{ URL::to('/') }}/storage/{{ $dat->name }}/{{ session('userAktif') }}.jpg" download><i class="fa fa-download"></i></a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                            @endforeach
                        @endforeach
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