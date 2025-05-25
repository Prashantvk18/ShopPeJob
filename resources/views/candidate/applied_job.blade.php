@include('candidate.header')
<div class="container mt-4">
    @if(count($job_data) == 0)
        <p>Not applied any Job</p>
    @endif
    <div class="row g-4">
        @foreach($job_data as $job)
            <div class="col-md-4">
                <a href="{{ route('job_details', [$job->id , 1]) }}" class="text-decoration-none text-dark">
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
                        <i class="fa fa-clock-o text-warning me-2"></i>
                        <strong>Time:</strong> {{ $job->start_time }} - {{ $job->end_time }}
                        </p>
                        <p class="card-text">
                        <i class="fa fa-inr text-success me-2"></i>
                        <strong>Salary:</strong> ₹{{ $job->salary_min }} - ₹{{ $job->salary_max }}/month
                        </p>
                        <br>
                        <!-- Apply Now Button -->
                        <form action="{{ route('jobapply') }}" method='post'>
                            @csrf
                        <input type="text" style="display:none" value="1" name="job">
                        <p class="btn btn-dark mt-auto w-100" disabled>
                            Applied 
                        </p>
                        </form>
                    </div>
                    </div>
                </a>
            </div>
        @endforeach
  </div>
</div>
@include('candidate.footer')

