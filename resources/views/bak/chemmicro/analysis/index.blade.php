@extends('layouts.app')

@section('content')

{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  --}}
            <div class="card uper">
                <div class="card-header">{{ __('Chem Micro Analysis') }}

                </div>

                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('analysis.create') }}" class="btn btn-info" role="button">{{ __('Add Analysis') }}</a>
                                <!-- <a class="nav-link" href="analysis/create">{{ __('Add Analysis') }}</a> -->
                                <!-- <button type="button" class="btn btn-success" href="analysis/create">Add Division</button> -->
                            </li>

                </ul>

                <div class="card-body">

                                <style>
                                .uper {
                                    margin-top: 40px;
                                }
                                </style>
                                <div class="uper">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div><br/>
                                @endif

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <td>ID</td>
                                        <td>Authorized</td>
                                        <td>Analysis type</td>
                                        <td>Sample</td>
                                        <td>Parameter test</td>
                                        <td>Test method</td>
                                        <td>Fee</td>
                                        {{--  <td>Updated At</td>  --}}
                                        <td>More info</td>
                                        <td colspan="2">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($analysis as $anal)
                                        <tr>
                                            <td>{{$anal->id}}</td>
                                            <td>{{$anal->authorized}}</td>
                                            <td>{{$anal->analysis_type}}</td>
                                            <td>{{$anal->sample}}</td>
                                            <td>{{$anal->param_test}}</td>
                                            <td>{{$anal->test_method}}</td>
                                            <td>P {{$anal->fee}}</td>
                                            {{--  <td>{{$anal->updated_at}}</td>  --}}
                                            <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                                View
                                              </button></td>
                                            <td><a href="{{ route('analysis.edit',$anal->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('analysis.destroy', $anal->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                        @foreach($analysis as $anal)
                                        <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">

                                                        <h5 class="modal-title" id="exampleModalLongTitle">Analysis ID:{{$anal->id}}
                                                                                                            <br>Sample: {{$anal->sample}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{$anal->info}}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            </div>
                                                            </div>

                                                </div>
                                                </div>
                                         @endforeach
                                    </tbody>
                                </table>
                            </div>
                </div>
            </div>
        {{--  </div>
    </div>
</div>  --}}






<!-- Button trigger modal -->




@endsection
