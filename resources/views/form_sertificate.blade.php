@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/form_style.css') }}">
<link rel="stylesheet" href="{{ asset('css/date_picker.css') }}">


@endpush
@section('content')

	<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>New Certification</h1>
                    </div>
                </div>
            </div>
    </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="newcertificate" method="POST" enctype="multipart/form-data" class="form-horizontal" id="msform">
                            <ul id="progressbar">
                            <li class="active">Detail Sertificate</li>
                            <li>Input Participant</li>
                            <li>Preview</li>
                          </ul>
                          <fieldset>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Name<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="cer_name" class="form-control" required="true"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input-start" class="form-control-label">Start Date<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input-start" name="start_date" class="form-control" required="true"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input-finish" class="form-control-label">Finish Date<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input-finish" name="finish_date" class="form-control" required="true"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Location<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="cer_location" class="form-control" required="true"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Academy<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9">
                              <select name="cer_academy" id="selectAcademy" class="form-control" required="">
                                <option value="pilih">-- Pilih --</option>
                                <option value="NITS">NITS</option>
                                <option value="Consumer">Consumer</option>
                                <option value="DISP">Disp</option>
                                <option value="WINS">Wins</option>
                                <option value="Mobile">Mobile</option>
                                <option value="Enterprise">Enterprise</option>
                                <option value="Business Enabler">Business Enabler</option>
                                <option value="Leadership">Leadership</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Institution<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="cer_institution" class="form-control" required="true"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Category<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9">
                              <select name="cer_category" id="selectCategory" class="form-control">
                                <option value="pilih">-- Pilih --</option>
                                <option value="National">National</option>
                                <option value="International">International</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Internal<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9">
                              <select name="cer_internal" id="selectInternal" class="form-control" required="">
                                <option value="pilih">-- Pilih --</option>
                                <option value="YES">YES</option>
                                <option value="NO">NO</option>
                              </select>
                              <span style="color: #414141; font-size: 12px; font-style: italic;">* Opsi YES hanya untuk sertifikasi yang dibiayai oleh Telkom Group</span>
                            </div>

                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Input Peserta<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9">
                              <select name="select" id="selectInput" class="form-control">
                                <option value="pilih">-- Pilih --</option>
                                <option value="manual">Manual Input</option>
                                <option value="multiple">Excel (Multiple Input)</option>
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="file-presence" class=" form-control-label">Presence Participant Upload</label></div>
                            <div class="col-12 col-md-9"><input type="file" accept="image/*,.jpg,.jpeg,.pdf,.png,image/png,application/pdf" id="file-presence" name="cer_presence" class="form-control-file">
                              <span style="color: #414141; font-size: 12px; font-style: italic;">* Format file only .jpg, .jpeg, .png and .pdf. Max size 5 MB.</span></div>
                          </div>
                            <input type="button" name="next" class="next1 action-button" value="Next" />
                          </fieldset>
                           <fieldset>
                            <button type="button" id="button-template" class="btn btn-success" style="margin-bottom: 20px; color: white;"><a href="documents/template.xlsx" style="color: white;" download>Download Template</a></button>
                            <div class="row form-group">
                            <div class="col col-md-3"><label for="input-manual" id="label-input-1" class="form-control-label hidden">List Participant<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="text" id="input-manual" name="cer_participant" placeholder="nik1,nik2,nik3,..." class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="input-multiple" id="label-input-2" class="form-control-label hidden">List Participant Upload<span style="color: red;">*</span></label></div>
                            <div class="col-12 col-md-9"><input type="file" id="input-multiple" name="cer_participant_excel" class="form-control-file"></div>
                          </div>
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                            <input type="submit" name="next" class="next2 action-button" value="Next" />
                            <input type="button" name="previous" class="previous action-button" value="Previous" />
                          </fieldset>
                        </form>
                    </div>
                </div>
            </div>
    

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
    <script src="{{ asset('js/date_picker.js') }}"></script>
    <script src="{{ asset('js/form_script.js') }}"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table').DataTable();

          var date_awal = $('input[name="start_date"]');
          var date_akhir = $('input[name="finish_date"]');
          date_awal.datepicker({
              format: 'yyyy-mm-dd',
              orientation: 'top right',
              todayHighlight: true,
              autoclose: true
          });

          date_akhir.datepicker({
              format: 'yyyy-mm-dd',
              orientation: 'top right',
              todayHighlight: true,
              autoclose: true
          });
        } );
        
    </script>

@endpush

@endsection