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
                        <form action="reports" method="post" >
                            <div class="form-group col-md-5">
                                <label for="startDate" class="pr-1  form-control-label">Period </label>
                                <input type="date" id="startDate" class="form-control" name="start_date">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="finishDate" class="px-1  form-control-label">To : </label>
                                <input type="date" id="finishDate" class="form-control" name="finish_date">
                            </div>
                            <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 30px; margin-left: 20px;">
                            <div class="form-group col-md-4">
                                <label for="academy" class="form--label">Academy*</label>
                                <select id="academy" name="academy" class="form-control">
                                    <option value="all">All Academy</option>
                                    <option value="Nits">NITS</option>
                                    <option value="Consumer">Consumer</option>
                                    <option value="Disp">DISP</option>
                                    <option value="Wins">WINS</option>
                                    <option value="Mobile">Mobile</option>
                                    <option value="Enterprise">Enterprise</option>
                                    <option value="Business">Business Enabler</option>
                                    <option value="Leadership">Leadership</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mainprogram" class="form-control-label">Telkom Main Program*</label>
                                <select id="mainprogram" name="mainprogram" class="form-control">
                                        <option value="all">All Program</option>
                                    @foreach($mainprogram as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jobfamily" class="form-control-label">Job Family*</label>
                                <select id="jobfamily" name="jobfamily" class="form-control">
                                        <option value="all">All Job Family</option>
                                    @foreach($jobfamily as $data)
                                        <option value="{{$data->name}}">{{$data->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{ csrf_field() }}
                        </form>
                        </div>

                        <div class="col-md-10"> 
                            {!! $chartprogram->render() !!}
                        </div>
                        <hr>
                        <div class="col-md-10"> 
                            {!! $chartfamily->render() !!}
                        </div>

                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        


@push('scripts')
@endpush

@endsection