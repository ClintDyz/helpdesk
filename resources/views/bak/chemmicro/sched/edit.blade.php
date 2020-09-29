@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Division
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('analysis.update', $sched->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="sample_accept">Name of Accepted Sample:</label>
              <input type="text" class="form-control" name="sample_accept" value="{{ $sched->sample_accept }}"/>
              <br>
              <label for="remarks">Remarks:</label>
              <textarea type="text" class="form-control" name="remarks" value="{{ $sched->remarks }}"></textarea>
              <br>
              <label for="tel_no">Tel No.:</label>
              <input type="text" class="form-control" name="tel_no" value="{{ $sched->tel_no }}"/>
              <br>
              <label for="telefax">Telefax:</label>
              <input type="text" class="form-control" name="telefax" value="{{ $sched->telefax }}"/>
              <br>
              <label for="mobile_no">Mobile No.:</label>
              <input type="number" class="form-control" name="mobile_no" value="{{ $sched->mobile_no }}"/>
              <br>
              <label for="email">Email(Optional):</label>
              <input type="email" class="form-control" name="info" value="{{ $sched->email }}" />

          </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
