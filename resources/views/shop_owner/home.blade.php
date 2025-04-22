@include('shop_owner.header')
<style>
  #mainCarousel {
  height: 70vh; /* 40% of the viewport height */
}

#mainCarousel .carousel-item img {
  height: 70vh;
  object-fit: cover;
  width: 100%;
}

.card {
  transition: transform 0.2s ease;
}

.card:hover {
  transform: scale(1.02);
}

</style>
<div id="mainCarousel" class="carousel slide mt-0" data-bs-ride="carousel"
data-bs-interval="3000">
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
<br>
<div class="container mt-4">
  <div class="row g-4">
    @foreach($job_data as $job)
      <div class="col-md-4">
        <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
        <!-- Edit Button (top-right corner) -->
        <a href="" class="btn btn-sm btn-outline-secondary position-absolute" 
             style="top: 10px; right: 10px; z-index: 10;">
            <i class="fa fa-pencil"></i> Edit
          </a>
          <div class="card-body">
            <h5 class="card-title mb-3" style="font-size: 1.25rem; font-weight: 600;">
              <i class="fa fa-briefcase me-2 text-primary"></i> {{ $job->title }}
            </h5>
            <p class="card-text mb-2">
              <i class="fa fa-map-marker text-danger me-2"></i>
              <strong>Venue:</strong> {{ $job->state }} , {{ $job->city }}
            </p>
            <p class="card-text mb-2">
              <i class="fa fa-clock-o text-warning me-2"></i>
              <strong>Time:</strong> {{ $job->start_time }} - {{ $job->end_time }}
            </p>
            <p class="card-text">
              <i class="fa fa-inr text-success me-2"></i>
              <strong>Salary:</strong> ₹{{ $job->salary_min }} - ₹{{ $job->salary_max }}/month
            </p>
            <div class="d-flex align-items-center justify-content-between mt-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="verifiedSwitch{{ $job->id }}" onchange="updateJobStatus({{ $job->id }}, this.checked)" @if($job->is_publish == 1) checked @endif>
                <label class="form-check-label" for="verifiedSwitch{{ $job->id }}">Publish</label>
              </div>
              <div class="form-check form-switch">
                <label class="form-check-label">
                @if($job->is_verified)
                  <span class="text-success fw-bold">
                    <i class="fa fa-check-circle me-1"></i> Verified
                  </span>
                @else
                  <span class="text-danger fw-bold">
                    <i class="fa fa-times-circle me-1"></i> Not Verified
                  </span>
                @endif
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

<script>
  function updateJobStatus(id , status){
    console.log(id);
    console.log(status);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
        type: 'POST',
        url : "{{url('job_status')}}",
        data : {
          'id':id,
          'status':status
        },
        success: function (response) {
            location.reload();
        },
        error : function (response) {
            console.log(response);
        }
    });
  }
</script>
@include('shop_owner.footer')