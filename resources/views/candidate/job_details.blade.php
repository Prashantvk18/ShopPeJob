@include('candidate.header')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="font-size: 1.5rem; font-weight: 700;">
                        <i class="fa fa-briefcase me-2 text-primary"></i> {{ $job->title }}
                    </h5>

                    <p class="card-text mb-3">
                        <i class="fa fa-building me-2 text-secondary"></i>
                        <strong>Shop:</strong> {{ $job->company_name }}
                    </p>
                    <p class="card-text mb-3">
                        <i class="fa fa-map-marker text-danger me-2"></i>
                        &nbsp;<strong>Location:</strong>{{ $job->city }}, {{ $state[$job->state-1]['name'] }}
                        <br>
                        &nbsp; &nbsp; &nbsp;{{$job->address}}
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
                    <p class="card-text mb-3">
                        <i class="fa fa-clock-o text-warning me-2"></i>
                        <strong>Working Hours:</strong> 
                        {{ \Carbon\Carbon::parse($job->start_time)->format('h:i A') }} - 
                        {{ \Carbon\Carbon::parse($job->end_time)->format('h:i A') }}
                    </p>
                    <p class="card-text mb-3">
                        <i class="fa fa-briefcase text-info me-2"></i>
                        <strong>Job Type:</strong>{{ $job->type }} @if($job->type == 'Contract') &nbsp;&nbsp; <strong>Contract:</strong> Required for {{$job->contract_period}} {{ $employer_bond[$job->employer_bond-1]['salary_type'] }} only  @endif
                    </p>
                    @if($job->type == 'Contract')
                    <p class="card-text mb-3">
                        <i class="fa fa-calendar-o text-primary me-2"></i>
                        <strong>Date Range: </strong> {{ $job->from_date }} - {{ $job->to_date }} 
                    </p>
                    @endif
                    <p class="card-text mb-3">
                        <i class="fa fa-inr text-success me-2"></i>&nbsp;
                        <strong>Salary:</strong> ₹{{ $job->salary_min }} - ₹{{ $job->salary_max }} / @if($job->type == 'Contract'){{ $employer_bond[$job->employer_bond-1]['salary_type'] }} @else Month @endif
                    </p>
                    <p class="card-text mb-4">
                        <i class="fa fa-align-left text-muted me-2"></i>
                        <strong>Description:</strong> <br>
                        <span class="ms-4">{{ $job->description }}</span>
                    </p>

                    <hr>
                    <p class="card-text mb-4">
                        <strong>Facility:</strong>
                        @if($job->food_allowance)Food Allowance,@endif
                        @if($job->travel_allowance)Travelling Allowance, @endif
                        @if($job->dinner)Dinner Allowance, @endif
                        @if($job->stay)Stay Allowance
                        @endif
                    </p>
                    <div class="border rounded-3 p-3 bg-light">
                        <h6 class="mb-3">
                            <i class="fa fa-user me-2 text-dark"></i> 
                            <strong>Shop Owner Info</strong>
                        </h6>
                        <p class="mb-2">
                            <i class="fa fa-user-circle me-2 text-secondary"></i> 
                            <strong>Name:</strong> {{ $job->name }}
                        </p>
                        <p class="mb-0">
                            <i class="fa fa-phone me-2 text-success"></i> 
                            <strong>Phone:</strong> {{ $job->phone_number }}
                        </p>
                    </div>
                    @if($apl == 0)
                        <form action="{{ route('jobapply') }}" method='post'>
                            @csrf     
                        <input type="text" style="display:none" value="2" name="job">
                        <button class="btn btn-dark mt-auto w-100" type="submit" name="jobid" value="{{$job->id}}">
                            Apply Job
                        </a>
                    @elseif($apl == 1)
                        <p class="btn btn-dark mt-auto w-100" disabled>
                            Applied 
                        </p>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('candidate.footer')

