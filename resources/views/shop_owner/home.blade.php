@include('shop_owner.header')
<div id="mainCarousel" class="carousel slide mt-0" data-bs-ride="carousel" data-bs-interval="3000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('images/job_bg1.png') }}" class="d-block w-100" alt="Slide 1">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/job_bg2.jpg') }}" class="d-block w-100" alt="Slide 2">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('images/job_bg3.png') }}" class="d-block w-100" alt="Slide 3">
    </div>
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@include('shop_owner.footer')