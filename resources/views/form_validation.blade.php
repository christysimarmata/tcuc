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
                        <h1>Validate Certification</h1>
                    </div>
                </div>
            </div>
    </div>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body card-block">
                        <form action="formValidation" method="POST" enctype="multipart/form-data" class="form-horizontal" id="msform">
                            <ul id="progressbar">
                            <li class="active">Detail Sertificate</li>
                            <li>Upload Certificate</li>
                            <li>Preview</li>
                          </ul>
                          <fieldset>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Name</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="text" id="text-input" name="cer_name" placeholder="{{ $datas[0]->name }}" value="{{ $datas[0]->name }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Start Date</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="text" id="text-input" name="start_date" placeholder="{{ $datas[0]->start_date }}" value="{{ $datas[0]->start_date }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Finish Date</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="text" id="text-input" name="finish_date" placeholder="{{ $datas[0]->finish_date }}" value="{{ $datas[0]->finish_date }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Location</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="text" id="text-input" name="cer_location" placeholder="{{ $datas[0]->location }}" value="{{ $datas[0]->location }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Academy</label></div>
                            <div class="col-12 col-md-9">
                              <input readonly="" type="text" id="text-input" name="cer_academy" placeholder="{{ $datas[0]->academy }}" value="{{ $datas[0]->academy }}" class="form-control" >
                            </div>
                          </div>
                          <div class="row form-group">
                              <div class="col col-md-3"><label for="select" class=" form-control-label">CFU/FU</label></div>
                              <div class="col-12 col-md-9">
                                <select name="cfu/fu" id="select" class="form-control">
                                  <option value="CEO OFFICE">CEO OFFICE</option>
                                  <option value="CFU CONSUMER">CFU CONSUMER</option>
                                  <option value="CFU DIGITAL SERVICE">CFU DIGITAL SERVICE</option>
                                  <option value="CFU ENTERPRISE">CFU ENTERPRISE</option>
                                  <option value="CFU MOBILE">CFU MOBILE</option>
                                  <option value="CFU WHOLESALE & INTERNAL">CFU WHOLESALE & INTERNAL</option>
                                  <option value="FU FINANCE">FU FINANCE</option>
                                  <option value="FU HCM">FU HCM</option>
                                  <option value="FU ISP">FU ISP</option>
                                  <option value="FU NITS">FU NITS</option>
                                </select>
                              </div>
                            </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Certification Level</label></div>
                              <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                  <label for="level-radio1" class="form-check-label ">
                                    <input type="radio" id="level-radio1" name="level-radios" class="form-check-input" value="Basic">Basic
                                  </label>
                                  <label for="level-radio2" class="form-check-label ">
                                    <input type="radio" id="level-radio2" name="level-radios" class="form-check-input" value="Intermediate"style="margin-left: 15px;">Intermediate
                                  </label>
                                  <label for="level-radio3" class="form-check-label ">
                                    <input type="radio" id="level-radio3" name="level-radios" class="form-check-input" value="Advance"style="margin-left: 15px;">Advance
                                  </label>
                                  <label for="level-radio4" class="form-check-label ">
                                    <input type="radio" id="level-radio4" name="level-radios" class="form-check-input" value="Others"style="margin-left: 15px;">Others
                                  </label>  
                                </div>
                              </div>
                            </div> 
                          <div class="row form-group hidden" id="input-other">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Others</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="cer_others" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Released Date*</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="cer_released" placeholder="{{ $datas[0]->released_date }}" value="{{ $datas[0]->released_date }}" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Outline Certification</label></div>
                            <div class="col-12 col-md-9"><textarea id="text-input" name="cer_outline" class="form-control" rows="7">{{ $datas[0]->outline }}</textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Telkom Main Program</label></div>
                            <div class="col-12 col-md-9">
                              <select name="main_program" id="select" class="form-control">
                                @foreach($mainprogram as $program)
                                  @if($program == $datas[0]->telkom_main)
                                    <option value="{{ $program }}" selected="">{{ $program }}</option>
                                  @else
                                    <option value="{{ $program }}">{{ $program }}</option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Job Family</label></div>
                            <div class="col-12 col-md-9">
                              <select name="job_family" id="select" class="form-control">
                                @foreach($jobfamily as $family)
                                  @if($family == $datas[0]->job_family)
                                    <option value="{{ $family }}" selected="">{{ $family }}</option>
                                  @else
                                    <option value="{{ $family }}">{{ $family }}</option>
                                  @endif
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Expired Date</label></div>
                              <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                  <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio" id="inline-radio1" name="inline-radios" class="form-check-input" value="date">Date
                                  </label>
                                  <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" id="inline-radio2" name="inline-radios" class="form-check-input" value="year"style="margin-left: 15px;">Year
                                  </label>
                                  <label for="inline-radio3" class="form-check-label ">
                                    <input type="radio" id="inline-radio3" name="inline-radios" class="form-check-input" value="all-time"style="margin-left: 15px;">All Time
                                  </label>
                                  
                                </div>
                              </div>
                            </div>
                            <div class="row form-group hidden" id="pickdate">
                              <div class="col col-md-3"><label for="text-input" class="form-control-label">Pick Date</label></div>
                              <div class="col-12 col-md-9"><input type="text" id="text-input" name="expired_date" class="form-control" ></div>
                            </div>
                            <div class="row form-group hidden" id="pickyear">
                              <div class="col col-md-3"><label for="select" class=" form-control-label">Pick Year</label></div>
                              <div class="col-12 col-md-9">
                                <select name="expired_years" id="select" class="form-control">
                                  <option value="1">1 years</option>
                                  <option value="2">2 years</option>
                                  <option value="3">3 years</option>
                                  <option value="4">4 years</option>
                                  <option value="5">5 years</option>
                                </select>
                              </div>
                            </div>
                            <input type="button" name="next" class="input_file action-button" value="Next" />
                          </fieldset>
                            <div class="content mt-3 step_2" id="step-2">
                                <div class="animated fadeIn">
                                    <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Data Table</strong>
                                            </div>
                                            <div class="card-body">
                                                
                                      <table id="bootstrap-data-table" class="table table-striped table-bordered ttotsave">
                                        <thead>

                                          <tr>
                                            <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class="form-control-label" style="margin-left: 10px;">Upload Multiple</label></div>
                                            <div class="col-12"><input type="file" id="text-input" name="multiple_certificate[]" class="form-control" multiple="multiple"></div>
                                          </div>
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Name</th>
                                            <th>Certificate</th>
                                            <th>Participant Status</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                             @php ($nomor = 0)
                                                @foreach($participant as $items)
                                                  
                                                    <tr>
                                                    <td>{{ ++$nomor }}</td>
                                                    <td>{{ $items->nik }}</a></td>
                                                    <td>{{ $items->nama }}</td>
                                                    @if($details[$nomor-1]->file_name)
                                                      <td>  
                                                      {{ $details[$nomor-1]->file_name }}
                                                      </td>
                                                    @else
                                                      <td>  
                                                      <input type="file" id="file-certificate{{ $items->nik }}" name="{{ $items->nik }}" class="form-control-file">
                                                      </td>
                                                    @endif
                                                    <td>
                                                      <select name="status_{{ $items->nik }}" class="form-control" style="font-size: 18px;">
                                                        <option value="Attendee">Attendee</option>
                                                        <option value="Certified">Certified</option>
                                                        <option value="Qualified">Qualified</option>
                                                      </select>
                                                    </td>
                                                   </tr>
                                               
                                            @endforeach
                                        </tbody>
                                      </table>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div><!-- .animated -->
                                <input type="submit" name="next" class="action-button" value="Next" />
                                
                                
                            </div>

                            {{ csrf_field() }}
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
    
    <script>
      $('#level-radio4').click(function() {
        if($('#level-radio4').is(':checked'))
          {
            document.getElementById('input-other').classList.remove('hidden');
          } 
        });

      $('#level-radio1').click(function() {
        if($('#level-radio1').is(':checked'))
          {
            document.getElementById('input-other').classList.add('hidden');
          } 
        });

      $('#level-radio2').click(function() {
        if($('#level-radio2').is(':checked'))
          {
            document.getElementById('input-other').classList.add('hidden');
          } 
        });

      $('#level-radio3').click(function() {
        if($('#level-radio3').is(':checked'))
          {
            document.getElementById('input-other').classList.add('hidden');
          } 
        });

      $('#inline-radio1').click(function() {
        if($('#inline-radio1').is(':checked'))
          {
            document.getElementById('pickyear').classList.add('hidden');
            document.getElementById('pickdate').classList.remove('hidden');
          } 
        });
      $('#inline-radio2').click(function() {
        if($('#inline-radio2').is(':checked')){
            document.getElementById('pickdate').classList.add('hidden');
            document.getElementById('pickyear').classList.remove('hidden');
          }
      });

      $('#inline-radio3').click(function() {
        if($('#inline-radio3').is(':checked')){
            document.getElementById('pickdate').classList.add('hidden');
            document.getElementById('pickyear').classList.add('hidden');
          }
      });

      var date_release = $('input[name="cer_released"]');
      var date_expire = $('input[name="expired_date"]');
      date_release.datepicker({
          format: 'yyyy-mm-dd',
          orientation: 'top right',
          todayHighlight: true,
          autoclose: true
      });

      date_expire.datepicker({
          format: 'yyyy-mm-dd',
          orientation: 'top right',
          todayHighlight: true,
          autoclose: true
      });

      


    </script>
    
@endpush

@endsection