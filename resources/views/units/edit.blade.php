@extends('layouts.backend')

@section('content')

<div class="container mt-5 py-4 pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card uper">
                            <div class="card-header">
                                Edit Unit
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
                                <form method="post" action="{{ route('units.update', $units->id) }}">
                                    <div class="form-group">
                                        @csrf
                                        @method('PATCH')
                                        <label for="name">Unit Name:</label>
                                        <input type="text" class="form-control" name="name" value="{{$units->name}}"/>
                                        <br><br>

                                        <label for="division">Division Name </label>
                                        <select name="division" id="division"  class="form-control">
                                                <option selected disabled>--Select Division--</option>
                                            @foreach ($divisions as $division)
                                                <option value="{{$division->id }}">{{ $division->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
