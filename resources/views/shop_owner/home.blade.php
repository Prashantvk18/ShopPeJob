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
 .counter-section {
  background-color: #f8f9fa;
}

.counter-box {
  padding: 20px;
}

.counter {
  font-size: 48px;
  font-weight: bold;
  color:rgb(0, 0, 0);
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
   @if(session('message'))
    <div class="alert {{ str_contains(session('message'), 'successfully') ? 'alert-success' : 'alert-danger' }}">
        {{ session('message') }}
    </div>
  @endif
  <div class="row g-4">
    @foreach($job_data as $job)
      <div class="col-md-4">
        <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px; @if($job->is_delete) background-color:#f2f2f2 @endif">
        <!-- Edit Button (top-right corner) -->
          @if($job->is_publish)
          <a href="/applieduser/{{$job->id}}" class="btn btn-sm btn-outline-secondary position-absolute" 
             style="top: 10px; right: 70px; z-index: 10;">
            <i class="fa fa-user"></i> User
          </a>
          @if(!$job->is_delete)
          <button class="btn btn-sm btn-outline-secondary position-absolute" 
              style="top: 10px; right: 0px; z-index: 10;" onclick='close_job({{$job->id}})'>
              <i class="fa fa-times-circle"></i> Close
          </button>
          @else
           <label class="btn btn-sm  position-absolute" 
              style="top: 10px; right: 0px; z-index: 10; color:red" disabled>
              <i class="fa fa-times-circle"></i> Closed
          </label>
          @endif
          @else
            <a href="/createjob/{{$job->id}}" class="btn btn-sm btn-outline-secondary position-absolute" 
              style="top: 10px; right: 10px; z-index: 10;">
              <i class="fa fa-pencil"></i> Edit
            </a>
          @endif
          
          
          <div class="card-body">
            <h5 class="card-title mb-3" style="font-size: 1.25rem; font-weight: 600;">
              <i class="fa fa-briefcase me-2 text-primary"></i> {{ $job->title }}
            </h5>
            <p class="card-text mb-2">
              <i class="fa fa-map-marker text-danger me-2"></i>
              <strong>Venue:</strong> 
              @foreach($states as $state)
              @if($state->id == $job->state)
                {{ $state->name}}
              @endif
              @endforeach  , {{ $job->city }}
            </p>
            <p class="card-text mb-2">
              <i class="fa fa-clock-o text-warning me-2"></i>
              <strong>Time:</strong> {{ $job->start_time }} - {{ $job->end_time }}
            </p>
            <p class="card-text">
              <i class="fa fa-inr text-success me-2"></i>
              <strong>Salary:</strong> ₹{{ $job->salary_min }} - ₹{{ $job->salary_max }}/
              @if(isset($job->employer_bond))
              @foreach($employers_bond as $bond)
                @if($bond->id == $job->employer_bond)
                  {{$bond->salary_type}}
                @endif
              @endforeach
              @else
                Month
              @endif
            </p>
            <div class="d-flex align-items-center justify-content-between mt-3">
              @if($job->is_publish)
                <span class="text-success fw-bold">
                    <i class="fa fa-check-circle me-1"></i> Published
                  </span>
              @else
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="verifiedSwitch{{ $job->id }}" onchange="updateJobStatus({{ $job->id }}, this.checked)">
                <label class="form-check-label" for="verifiedSwitch{{ $job->id }}">Publish</label>
              </div>
              @endif
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
<section class="counter-section text-center py-5 bg-light"  style="margin-top:10px">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="counter-box">
          <h2 class="counter" data-target="1500">0</h2>
          <p>Jobs Posted</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="counter-box">
          <h2 class="counter" data-target="850">0</h2>
          <p>Employees Hired</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="counter-box">
          <h2 class="counter" data-target="2300">0</h2>
          <p>Users Registered</p>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  function updateJobStatus(id , status){
    let result = confirm("Once you publish then you can not edit it");
    console.log(result);
    if(result){
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
            location.reload(true);
        },
        error : function (response) {
            console.log(response);
        }
    });
    }
    else{
      location.reload(true);
    }
  }

  function close_job(id){
    let result = confirm("Are you sure you want to close this job");
    if(result){
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
        },
        type: 'POST',
        url : "{{url('job_delete')}}",
        data : {
          'id':id
        },
        success: function (response) {
            location.reload(true);
        },
        error : function (response) {
            console.log(response);
        }
    });
    }
    else{
      location.reload(true);
    }
  }

const counters = document.querySelectorAll('.counter');

counters.forEach(counter => {
  const updateCount = () => {
    const target = +counter.getAttribute('data-target');
    const count = +counter.innerText;

    const increment = target / 200; // speed of animation

    if (count < target) {
      counter.innerText = Math.ceil(count + increment);
      setTimeout(updateCount, 10);
    } else {
      counter.innerText = target;
    }
  };

  updateCount();
});
</script>
@include('shop_owner.footer')