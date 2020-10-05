@extends('layouts.backend')

@section('content')

<div class="mt-5 py-4 pt-5">
    <div class="container wow animated fadeIn">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Update User') }}</div>

                    <div class="card-body">
                        @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br>
                        @endif

                        @if(session()->get('failed'))
                        <div class="alert alert-danger">
                            {{ session()->get('failed') }}
                        </div><br>
                        @endif

                        <form method="POST" action="{{ route('accounts.update', $id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="middlename" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                                <div class="col-md-6">
                                    <input id="middlename" type="text" class="form-control @error('middlename') is-invalid @enderror"
                                           name="middlename" value="{{ $user->middlename }}"  autofocus>

                                    @error('middlename')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                                           name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="position" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                                <div class="col-md-6">
                                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror"
                                           name="position" value="{{ $user->position }}" required autocomplete="position" autofocus>

                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Division') }}</label>

                                <div class="col-md-6">
                                    <select name="division_id" id="division_id"  class="form-control @error('division_id') is-invalid @enderror">
                                        <option selected disabled>--Select Division--</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{$division->id }}" {{ $division->id == $user->division ? 'selected' : '' }}>
                                            {{ $division->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="division_id" class="col-md-4 col-form-label text-md-right">{{ __('Unit') }}</label>

                                <div class="col-md-6">
                                    <select name="unit" id="unit" class="form-control @error('unit') is-invalid @enderror">
                                        <option selected disabled>--Select Unit--</option>
                                    @foreach ($units as $unit)
                                        <option value="{{$unit->id }}" {{ $unit->id == $user->unit ? 'selected' : '' }}>
                                            {{ $unit->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile_no" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile_no" type="text" class="form-control @error('mobile_no') is-invalid @enderror"
                                           name="mobile_no" value="{{ $user->mobile_no }}"  autofocus>

                                    @error('mobile_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                                          name="username" value="{{ $user->username }}"  autofocus>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select name="role" id="role"  class="form-control @error('role') is-invalid @enderror">
                                        <option selected disabled>--Select Role--</option>

                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                            Admin
                                        </option>
                                        <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>
                                            Employee
                                        </option>

                                    </select>

                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_active" class="col-md-4 col-form-label text-md-right">{{ __('Is Active?') }}</label>

                                <div class="col-md-6">
                                    <select name="is_active" id="is_active"  class="form-control @error('is_active') is-invalid @enderror">
                                        <option selected disabled>--Select Yes/No--</option>

                                        <option value="y" {{ $user->is_active == 'y' ? 'selected' : '' }}>
                                            Yes
                                        </option>
                                        <option value="n" {{ $user->is_active == 'n' ? 'selected' : '' }}>
                                            No
                                        </option>
                                    </select>
                                    @error('is_active')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-block btn-md">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ Route('dashboard') }}" class="btn btn-light btn-block btn-md">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-js')

<script type="text/javascript">
	$(document).ready(function(){
        $('#division_id').on('change',function() {
            const divisionID = $(this).val();
                  urlGetUnits = `${baseURL}/get-units/${divisionID}`;


            $.get(urlGetUnits, function(data){
                let optSelect = '<option value="" disabled> Select Unit</option>';
                $('#unit').html('');

				$.each(data, function(ctr, dat) {
                    $('#unit').append('<option value='+dat.id+'>'+dat.name+'</option>');
			    });
			});
		});
	});
</script>

@endsection
