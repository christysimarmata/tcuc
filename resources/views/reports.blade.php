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
                        <form action="updatereports" method="get" >
                            <div class="form-group col-md-5">
                                <label for="startDate" class="pr-1  form-control-label">Starting Years </label>
                                @if(isset($_GET['start_date']))
                                    <input type="number" id="startDate" class="form-control" name="start_date" placeholder="{{ $_GET['start_date'] }}" value="{{ $_GET['start_date'] }}" required="">
                                @else
                                    <input type="number" id="startDate" class="form-control" name="start_date" required="">
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="finishDate" class="pr-1  form-control-label">Period</label>
                                <select id="finishDate" name="finish_date" class="form-control" required="">
                                    @if(isset($_GET['finish_date']))                                    
                                        @if($_GET['finish_date'] == '1')                                    
                                            <option value="1" selected="">1 years</option>
                                            <option value="2">2 years</option>
                                            <option value="3">3 years</option>
                                            <option value="4">4 years</option>
                                            <option value="5">5 years</option>
                                        @elseif($_GET['finish_date'] == '2')
                                            <option value="1">1 years</option>
                                            <option value="2" selected="">2 years</option>
                                            <option value="3">3 years</option>
                                            <option value="4">4 years</option>
                                            <option value="5">5 years</option>
                                        @elseif($_GET['finish_date'] == '3')
                                            <option value="1">1 years</option>
                                            <option value="2">2 years</option>
                                            <option value="3" selected="">3 years</option>
                                            <option value="4">4 years</option>
                                            <option value="5">5 years</option>
                                        @elseif($_GET['finish_date'] == '4')
                                            <option value="1">1 years</option>
                                            <option value="2">2 years</option>
                                            <option value="3">3 years</option>
                                            <option value="4" selected="">4 years</option>
                                            <option value="5">5 years</option>
                                        @elseif($_GET['finish_date'] == '5')
                                            <option value="1">1 years</option>
                                            <option value="2">2 years</option>
                                            <option value="3">3 years</option>
                                            <option value="4">4 years</option>
                                            <option value="5" selected="">5 years</option>
                                        @endif
                                    @else
                                        <option value="1">1 years</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                        <option value="4">4 years</option>
                                        <option value="5">5 years</option>
                                    @endif

                                </select>
                            </div>
                            <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 30px; margin-left: 20px;">
                            <div class="form-group col-md-4">
                                <label for="academy" class="form--label">Academy*</label>
                                @if(isset($_GET['academy']))
                                    @if($_GET['academy'] == 'all') 
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all" selected="">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Nits')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits" selected="">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Consumer')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer" selected="">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Disp')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp" selected="">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Wins')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins" selected="">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Mobile')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile" selected="">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Enterprise')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise" selected="">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Business')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business" selected="">Business Enabler</option>
                                            <option value="Leadership">Leadership</option>
                                        </select>
                                    @elseif($_GET['academy'] == 'Leadership')
                                        <select id="academy" name="academy" class="form-control">
                                            <option value="all">All Academy</option>
                                            <option value="Nits">NITS</option>
                                            <option value="Consumer">Consumer</option>
                                            <option value="Disp">DISP</option>
                                            <option value="Wins">WINS</option>
                                            <option value="Mobile">Mobile</option>
                                            <option value="Enterprise">Enterprise</option>
                                            <option value="Business">Business Enabler</option>
                                            <option value="Leadership" selected="">Leadership</option>
                                        </select>
                                    @endif
                                @else 
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
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="mainprogram" class="form-control-label">Telkom Main Program*</label>
                                <select id="mainprogram" name="mainprogram" class="form-control">
                                    @if(isset($_GET['mainprogram']))
                                        @if($_GET['mainprogram'] == 'all')
                                            <option value="all" selected="">All Program</option>
                                            @foreach($mainprogram as $data)
                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="all" selected="">All Program</option>
                                            @foreach($mainprogram as $data)
                                                @if($_GET['mainprogram'] == $data->name)
                                                    <option value="{{$data->name}}" selected="">{{$data->name}}</option>
                                                @else
                                                    <option value="{{$data->name}}">{{$data->name}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        <option value="all">All Program</option>
                                        @foreach($mainprogram as $data)
                                            <option value="{{$data->name}}">{{$data->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="jobfamily" class="form-control-label">Job Family*</label>
                                <select id="jobfamily" name="jobfamily" class="form-control">
                                    @if(isset($_GET['jobfamily']))
                                        @if($_GET['jobfamily'] == 'all')
                                            <option value="all" selected="">All Family</option>
                                            @foreach($jobfamily as $data)
                                                <option value="{{$data->name}}">{{$data->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="all" selected="">All Family</option>
                                            @foreach($jobfamily as $data)
                                                @if($_GET['jobfamily'] == $data->name)
                                                    <option value="{{$data->name}}" selected="">{{$data->name}}</option>
                                                @else
                                                    <option value="{{$data->name}}">{{$data->name}}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @else
                                        <option value="all">All Family</option>
                                        @foreach($jobfamily as $data)
                                            <option value="{{$data->name}}">{{$data->name}}</option>
                                        @endforeach
                                    @endif
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