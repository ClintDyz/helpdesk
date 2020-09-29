@extends('layouts.app')

@section('content')




    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">


  <body>

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




<!-- Modal -->
<div class="modal fade" id="imgMdl" tabindex="-1" role="dialog" aria-labelledby="imgMdlTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="max-width: 950px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="pdf/External/PDF/1-Setup.pdf" width="900" height="900"></iframe>
      </div>
    </div>
  </div>
</div>

@endsection

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(".g-item a").click(function(){
        var imgPath = $(this).find(".img-fluid").attr("src");
        //alert(imgPath);
        $("#pg-img").attr("src", imgPath);
      });
    </script>
  </body>

