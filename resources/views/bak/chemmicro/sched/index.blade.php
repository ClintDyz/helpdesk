@extends('layouts.app')

@section('content')

{{--  <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">  --}}
            <div class="card uper">
                <div class="card-header">{{ __('Chem Micro Analysis Schedule') }}

                </div>

                <ul class="navbar-nav ml-auto">

                            <li class="nav-item">
                                <a href="{{ route('schedule.create') }}" class="btn btn-info" role="button">{{ __('Add Schedule') }}</a>

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
                                        <td>Accpted Sample</td>
                                        <td>Remarks</td>
                                        <td>Tel No. type</td>
                                        <td>Telefax</td>
                                        <td>Mobile No. test</td>
                                        <td>Email</td>
                                        <td>Updated At</td>
                                        <td colspan="2">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sched as $sch)
                                        <tr>
                                            <td>{{$sch->sample_accept}}</td>
                                            <td>{{$sch->remarks}}</td>
                                            <td>{{$sch->tel_no}}</td>
                                            <td>{{$sch->telefax}}</td>
                                            <td>{{$sch->mobile_no}}</td>
                                            <td>{{$sch->email}}</td>
                                            <td>{{$sch->updated_at}}</td>
                                            <td><a href="{{ route('schedule.edit',$sch->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('schedule.destroy', $sch->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>


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
