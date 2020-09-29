@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Attachments') }}</div>


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
                                    </div><br />
                                @endif


                                <section class="img-gallery py-4">
                                    <div class="container">
                                      <div class="row">
                                        <div class="col-md-3 g-item">
                                          <a href="#" data-toggle="modal" data-target="#imgMdl">
                                            <img src="gallery/img1.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img2.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img3.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img4.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img5.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img6.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img7.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                        <div class="col-md-3 g-item" data-toggle="modal" data-target="#imgMdl">
                                          <a href="#">
                                            <img src="gallery/img8.jpg" class="img-fluid" alt="">
                                          </a>
                                          <h6>Lorem ipsum dolor sit</h6>
                                        </div>
                                      </div>
                                    </div>
                                  </section>


                                {{--  <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <td>S1</td>
                                        <td>ID</td>
                                        <td>PARENT ID</td>
                                        <td>MODULE TYPE</td>
                                        <td>DIRECTORY</td>
                                        <td>VIEW</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($attachments as $key=>$data)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->parent_id}}</td>
                                            <td>{{$data->module_type}}</td>
                                            <td>{{$data->directory}}</td>
                                            {{--  <td><a href="/ccharter.dev/public/attachments/{{ $data->id }} ">view</a></td>
                                            <td><a href="#" class="btn btn-success viewcc" onclick="$(this).showPDF('{{ $data->id }}');">view</a></td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>  --}}
                                <div>
                </div>
            </div>
        </div>
    </div>



    {{--  <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Launch demo modal
    </button>  --}}

    <!-- Modal -->
    <div class="modal fade" id="viewCCModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-full-height modal-right" role="document" style="max-width: 950px;">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Citizens Charter</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="viewModalID">
                <div class="modal-body">
                    <div class="card-body">
                        {{--  @foreach($attachments as $key=>$data)  --}}
{{--
                        <h2>{{ $data->id }}  --}}

                        <p>
                            {{--  <object class="border border-primary z-depth-1-half"  src="{{ url('/'.$data->directory) }}" id="directory" type="application/pdf"
                                    width="100%" height="650">

                            </object>  --}}
                            {{--  <iframe src="{{ url('/'.$data->directory) }}"  width="900" height="900"></iframe>  --}}
                        </p>
                    </div>
                    {{--  @endforeach  --}}
                </div>
        </form>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</div>
@endsection

  <script  src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script> src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <script>
            $(document).ready(function(){

                $('.viewcc').on('click', function(){
                    $('#viewCCModal').modal('show');

                });

            });


    </script>
