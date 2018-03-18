@extends('layout.dashboard'.session('roleUserAktif'))

@push('styles')
<link rel="stylesheet" href="{{ asset('css/lib/datatable/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/form_style.css') }}">

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
                            <li>Input Participant</li>
                            <li>Preview</li>
                          </ul>
                          <fieldset>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Name*</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="text" id="text-input" name="cer_name" placeholder="{{ $datas[1] }}" value="{{ $datas[1] }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Start Date*</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="date" id="text-input" name="start_date" placeholder="{{ $datas[2] }}" value="{{ $datas[2] }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Finish Date*</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="date" id="text-input" name="finish_date" placeholder="{{ $datas[3] }}" value="{{ $datas[3] }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Certificate Location*</label></div>
                            <div class="col-12 col-md-9"><input readonly="" type="text" id="text-input" name="cer_location" placeholder="{{ $datas[4] }}" value="{{ $datas[4] }}" class="form-control"></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Academy*</label></div>
                            <div class="col-12 col-md-9">
                              <input readonly="" type="text" id="text-input" name="cer_academy" placeholder="{{ $datas[5] }}" value="{{ $datas[5] }}" class="form-control" >
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Released Date*</label></div>
                            <div class="col-12 col-md-9"><input type="date" id="text-input" name="cer_released" class="form-control" ></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class="form-control-label">Outline Certification*</label></div>
                            <div class="col-12 col-md-9"><textarea id="text-input" name="cer_outline" class="form-control" rows="7"></textarea></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Telkom Main Program*</label></div>
                            <div class="col-12 col-md-9">
                              <select name="main_program" id="select" class="form-control">
                                @foreach($mainprogram as $program)
                                <option value="{{ $program }}">{{ $program }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Job Family*</label></div>
                            <div class="col-12 col-md-9">
                              <select name="job_family" id="select" class="form-control">
                                @foreach($jobfamily as $family)
                                <option value="{{ $family }}">{{ $family }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Expired Date*</label></div>
                              <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                  <label for="inline-radio1" class="form-check-label ">
                                    <input type="radio" id="inline-radio1" name="inline-radios" class="form-check-input" value="date">Date
                                  </label>
                                  <label for="inline-radio2" class="form-check-label ">
                                    <input type="radio" id="inline-radio2" name="inline-radios" class="form-check-input" value="year"style="margin-left: 10px;">Year
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="row form-group hidden" id="pickdate">
                              <div class="col col-md-3"><label for="text-input" class="form-control-label">Pick Date</label></div>
                              <div class="col-12 col-md-9"><input type="date" id="text-input" name="expired_date" class="form-control" ></div>
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
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Name</th>
                                            <th>Certificate</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                             @php ($nomor = 0)
                                                @foreach($participant as $items)
                                                  
                                                    <tr>
                                                    <td>{{ ++$nomor }}</td>
                                                    <td>{{ $items->nik }}</a></td>
                                                    <td>{{ $items->nama }}</td>
                                                    <td>
                                                    <input type="file" id="file-certificate{{ $items->nik }}" name="{{ $items->nik }}" class="form-control-file">
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
                                <input type="button" name="previous" class="previous action-button" value="Previous" />
                                
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
    <script src="{{ asset('js/form_script.js') }}"></script>
    
    <script>
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
    </script>
@endpush

@endsection