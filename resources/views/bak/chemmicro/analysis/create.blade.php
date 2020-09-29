@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="card uper">
  <div class="card-header">
    Create Chem-micro Analysis
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
      <form method="post" action="{{ route('analysis.store') }}">
          <div class="form-group">
              @csrf
              <label for="authorized">Authorized:</label>
              <input type="text" class="form-control" name="authorized" value="{{ old('authorized') }}"/>
              <br>
              <label for="analysis_type">Analysis Type:</label>
              <select name="analysis_type"  class="form-control">
                    <option selected disabled>--Select Analysis type--</option>
                    <option value="physico_chem">physico_chem</option>
                    <option value="micro_bio">micro_bio</option>
              </select>
              <br>
              <label for="sample">Sample Name:</label>
              <input type="text" class="form-control" name="sample"  value="{{ old('sample') }}"/>
              <br>
              <label for="param_test">Parameter Test name:</label>
              <input type="text" class="form-control" name="param_test"  value="{{ old('param_test') }}"/>
              <br>
              <label for="test_method">Test method:</label>
              <input type="text" class="form-control" name="test_method" value="{{ old('test_method') }}"/>
              <br>
              <label for="fee">Fee:</label>
              <input type="number" class="form-control" name="fee" value="{{ old('fee') }}"/>
              <br>
              <label for="info">Additional Info (Optional):</label>
              <textarea class="form-control" name="info" value="{{ old('info') }}"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Add Analysis</button>
      </form>
  </div>
</div>
@endsection
