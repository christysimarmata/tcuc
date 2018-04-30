@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<style type="text/css">

</style>
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
                            <div class="custom-tab">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        @if(isset($_GET['years']))
                                            <a class="nav-item nav-link" id="custom-nav-home-tab" data-toggle="tab" href="#inputrange" role="tab" aria-controls="inputrange" aria-selected="true">Range</a>
                                            <a class="nav-item nav-link active" id="custom-nav-profile-tab" data-toggle="tab" href="#inputyear" role="tab" aria-controls="inputyear" aria-selected="false">Years</a>
                                        @else
                                            <a class="nav-item nav-link active" id="custom-nav-home-tab" data-toggle="tab" href="#inputrange" role="tab" aria-controls="inputrange" aria-selected="true">Range</a>
                                            <a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#inputyear" role="tab" aria-controls="inputyear" aria-selected="false">Years</a>
                                        @endif
                                    </div>
                                </nav>
                                 @if(isset($_GET['years']))
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade" id="inputrange" role="tabpanel" aria-labelledby="custom-nav-home-tab">
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
                                                    <label for="finishDate" class="pr-1  form-control-label">Until </label>
                                                    @if(isset($_GET['finish_date']))
                                                        <input type="number" id="finishDate" class="form-control" name="finish_date" placeholder="{{ $_GET['finish_date'] }}" value="{{ $_GET['finish_date'] }}" required="">
                                                    @else
                                                        <input type="number" id="finishDate" class="form-control" name="finish_date" required="">
                                                    @endif
                                                </div>
                                                <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 30px; margin-left: 20px;">
                                                {{ csrf_field() }}
                                            </form>

                                            @if($finish == 1)
                                                <div class="col-md-10"> 
                                                    {!! $chartlulus->render() !!}
                                                </div>
                                                <div class="col-md-10"> 
                                                    {!! $chartvalid->render() !!}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade show active" id="inputyear" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                            <form action="updatereportsyear" method="get" >
                                                <div class="form-group col-md-5">
                                                    <label for="years" class="pr-1  form-control-label">Select Years </label>
                                                    @if(isset($_GET['years']))
                                                        <input type="number" id="years" class="form-control" name="years" placeholder="{{ $_GET['years'] }}" value="{{ $_GET['years'] }}" required="">
                                                    @else
                                                        <input type="number" id="years" class="form-control" name="years" required="">
                                                    @endif
                                                </div>
                                                
                                                <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 30px; margin-left: 20px;">
                                                {{ csrf_field() }}
                                            </form>

                                            @if($finish == 2)
                                                <div class="col-md-10"> 
                                                    {!! $chartlulus->render() !!}
                                                </div>
                                                <hr>
                                                <div class="col-md-10"> 
                                                    {!! $chartvalid->render() !!}
                                                </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                @else
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="inputrange" role="tabpanel" aria-labelledby="custom-nav-home-tab">
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
                                                    <label for="finishDate" class="pr-1  form-control-label">Until </label>
                                                    @if(isset($_GET['finish_date']))
                                                        <input type="number" id="finishDate" class="form-control" name="finish_date" placeholder="{{ $_GET['finish_date'] }}" value="{{ $_GET['finish_date'] }}" required="">
                                                    @else
                                                        <input type="number" id="finishDate" class="form-control" name="finish_date" required="">
                                                    @endif
                                                </div>
                                                <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 30px; margin-left: 20px;">
                                                {{ csrf_field() }}
                                            </form>

                                            @if($finish == 1)
                                                <div class="col-md-10"> 
                                                    {!! $chartlulus->render() !!}
                                                </div>
                                                <div class="col-md-10"> 
                                                    {!! $chartvalid->render() !!}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="inputyear" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
                                            <form action="updatereportsyear" method="get" >
                                                <div class="form-group col-md-5">
                                                    <label for="years" class="pr-1  form-control-label">Select Years </label>
                                                    @if(isset($_GET['years']))
                                                        <input type="number" id="years" class="form-control" name="years" placeholder="{{ $_GET['years'] }}" value="{{ $_GET['years'] }}" required="">
                                                    @else
                                                        <input type="number" id="years" class="form-control" name="years" required="">
                                                    @endif
                                                </div>
                                                
                                                <input type="submit" value="Search" class="btn btn-primary" style="margin-top: 30px; margin-left: 20px;">
                                                {{ csrf_field() }}
                                            </form>

                                            @if($finish == 2)
                                                <div class="col-md-10"> 
                                                    {!! $chartlulus->render() !!}
                                                </div>
                                                <hr>
                                                <div class="col-md-10"> 
                                                    {!! $chartvalid->render() !!}
                                                </div>
                                            @endif
                                        </div>
                                        
                                    </div>
                                @endif
                            </div>


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
    <script>
        
            $('#finishDate').focus(function() {
            if($('#finishDate').val() == "1") {
                $('#mainprogram').removeAttr('disabled');
                $('#jobfamily').removeAttr('disabled');
            } else {
                $('#mainprogram').attr('disabled', true);
                $('#jobfamily').attr('disabled', true);
            } 
        });

            $('#finishDate').click(function() {
            if($('#finishDate').val() == "1") {
                $('#mainprogram').removeAttr('disabled');
                $('#jobfamily').removeAttr('disabled');
            } else {
                $('#mainprogram').attr('disabled', true);
                $('#jobfamily').attr('disabled', true);
            } 
        });
        


    </script>
@endpush

@endsection