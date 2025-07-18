@include('candidate.header')
<style>
  #mainCarousel {
  height: 70vh; /* 40% of the viewport height */
}

#mainCarousel .carousel-item img {
  height: 70vh;
  object-fit: cover;
  width: 100%;
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
          <a href="{{ route('job_details', [ $job->id , 0]) }}" class="text-decoration-none text-dark">
            <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
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
                  @if($job->gender == 'Male')
                    <i class="fa fa-male text-info me-2"></i>
                  @elseif($job->gender == 'Female')
                    <i class="fa fa-female text-info me-2"></i>
                  @else
                    <i class="fa fa-male text-info"></i><i class="fa fa-female text-info"></i>
                  @endif
                  <strong>Required:</strong> {{ $job->gender }}
                </p>
                <p class="card-text mb-2">
                  <i class="fa fa-clock-o text-warning me-2"></i>
                  <strong>Time:</strong> {{ $job->start_time }} - {{ $job->end_time }}
                </p>
                <p class="card-text ">
                  <i class="fa fa-inr text-success me-2"></i>
                  <strong>Salary:</strong> ₹{{ $job->salary_min }} - ₹{{ $job->salary_max }}/month
                </p>
                <br>
                <!-- Apply Now Button -->
                <form action="{{ route('jobapply') }}" method='post'>
                  @csrf
                  <button class="btn btn-dark mt-auto w-100" type="submit" name="jobid" value="{{$job->id}}">
                    Apply Now
                  </button>
                </form>
              </div>
            </div>
          </a>
        </div>
      
    @endforeach
  </div>
</div>

<section class="counter-section text-center py-5 bg-light" style="margin-top:10px">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="counter-box">
          <h2 class="counter" data-target="1238">0</h2>
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
@include('candidate.footer')