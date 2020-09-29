@extends('layouts.app')

@section('content')

















<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Services Offered') }}</div>

                <div class="card-body">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                  Add Services
                                </button>

                                <!-- Modal -->
                                <div  class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Services</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                   
                                      <div class="modal-body">
                                        <span id="form_result"></span>
                                        <form method="POST" id="sample_form" enctype="multipart/form-data" action="{{ action('ServicesController@store') }}">
                                          @csrf            
                                                    <div class="form-group row">
                                                        <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                                                        <div class="col-md-6">
                                                            <select name="division_id" id="division_id"  class="form-control @error('division_id') is-invalid @enderror">
                                                                <option selected disabled>--Select Division--</option>
                                                              @foreach ($divisions as $division)
                                                                <option value="{{$division->id }}">{{ $division->name}}</option>
                                                              @endforeach

                                                            </select>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label for="unit_owner" class="col-md-4 col-form-label text-md-right">{{ __('Unit') }}</label>

                                                        <div class="col-md-6">
                                                            <select name="unit_owner" id="unit_owner" class="form-control @error('unit_owner') is-invalid @enderror">
                                                                <option selected disabled>--Select Unit--</option>
                                                               
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="authorized" class="col-md-4 col-form-label text-md-right">{{ __('Authorized Personnel') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text" id="authorized" class="form-control" name="authorized" value="{{ old('authorized') }}">

                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Service Title') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text"  id="title" class="form-control" name="title" value="{{ old('title') }}">
                                                             
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Service Description') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text" id="description" class="form-control" name="description" value="{{ old('description') }}">
                                                             
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="office_division" class="col-md-4 col-form-label text-md-right">{{ __('Office (RO/PSTC)') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text" id="office_division" class="form-control" name="office_division" value="{{ old('office_division') }}">
                                                             
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="classification" class="col-md-4 col-form-label text-md-right">{{ __('Service Classification') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text" id="classification"  class="form-control" name="classification" value="{{ old('classification') }}">
                                                            
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="transaction_type" class="col-md-4 col-form-label text-md-right">{{ __('Type of Transaction') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text" id="transaction_type" class="form-control" name="transaction_type" value="{{ old('transaction_type') }}">
                                                            
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="who_avail" class="col-md-4 col-form-label text-md-right">{{ __('Who can avail?') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="text" id="who_avail" class="form-control" name="who_avail" value="{{ old('who_avail') }}">
                                                            
                                                            </div>
                                                    </div>

                                                    <div class="form-group row">
                                                      <label for="disp_picture" class="col-md-4 col-form-label text-md-right">{{ __('Upload picture (Optional)') }}</label>
                                                            <div class="col-md-6">
                                                              <input type="file" id="disp_picture" class="form-control" name="disp_picture" value="{{ old('disp_picture') }}">
                                                            
                                                            </div>
                                                    </div>
     
                                      </div>
                                     
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Add Service</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      </div>

                                      </form>
                                    </div>
                                  </div>
                                </div>
                                <!-- end modal -->


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	const baseURL = "{{ url('/') }}/";
	
	$(document).ready(function(){
        $('#division_id').on('change',function() {
            const divisionID = $(this).val();
                  urlGetUnits = `${baseURL}/get-units/${divisionID}`;
                  
               
            $.get(urlGetUnits, function(data){
                $('#unit_owner').html('');
                let optSelect = '<option value="" disabled> Select Unit</option>';
                // $('#unit').html('');
			    	$.each(data, function(ctr, dat) {
                    $('#unit_owner').append('<option value='+dat.id+'>'+dat.name+'</option>');
                    // const jsonData = $.parseJSON(dat);
                    // const unitID = jsonData .id,
                    // unitName = jsonData .name;
                    
                    // console.log(dat);
                    // const unitID = dat.id;
                    // const unitName = dat.name;
                    
			    // optSelect += '<option value="${unitID}"> ${unitName}</option>';
			 });
                // $('#unit').html(optSelect);
                

               

			});
		});
	});
</script>
