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
      <form method="post" action="{{ route('analysis.update', $analysis->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="authorized">Authorized:</label>
              <input type="text" class="form-control" name="authorized" value="{{$analysis->authorized}}"/>
              <br><br>
              <label for="analysis_type">Analysis Type:</label>
              <select name="analysis_type"  class="form-control">
                    <option value="{{$analysis->analysis_type}}"</option>
                    <option value="physico_chem">physico_chem</option>
                    <option value="micro_bio">micro_bio</option>
              </select>
              <br>
              <label for="sample">Sample Name:</label>
              <input type="text" class="form-control" name="sample" value="{{$analysis->sample}}"/>
              <br>
              <label for="param_test">Parameter Test name:</label>
              <input type="text" class="form-control" name="param_test" value="{{$analysis->param_test}}"/>
              <br>
              <label for="test_method">Test method:</label>
              <input type="text" class="form-control" name="test_method" value="{{$analysis->test_method}}"/>
              <br>
              <label for="fee">Fee:</label>
              <input type="text" class="form-control" name="fee" value="{{$analysis->fee}}"/>
              <br>
              <label for="info">Additional Info (Optional):</label>
              <textarea type="text" class="form-control" name="info" value="{{$analysis->info}}"></textarea>

          </div>

          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
