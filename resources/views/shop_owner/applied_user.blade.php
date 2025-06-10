@include('shop_owner.header')
<div class="container mt-4">
<h3><b>{{$job_data->title}}</b></h3>
  @if(count($applied_user_data) == 0)
        <p>User Not Applied</p>
  @endif
  <div class="row g-4">
    @foreach($applied_user_data as $user)
      <div class="col-md-4">
      <a href="{{ route('user_details', [$user->user_id , $job_data->id] ) }}" class="text-decoration-none text-dark">
        <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
          <div class="card-body">
            @if($applied_user_status[$user->user_id] == 'S')
                <div style="position: absolute; top: 10px; right: 10px; transform: rotate(-10deg);">
                    <span class="badge bg-success text-white p-2" style="font-size: 1rem; border: 2px solid #28a745;">
                        ✅ Accepted
                    </span>
                </div>
            @endif
            @if($applied_user_status[$user->user_id] == 'R')
                <div style="position: absolute; top: 10px; right: 10px; transform: rotate(-10deg);">
                <span class="badge bg-danger text-white p-2" style="font-size: 1rem; border: 2px solid #dc3545;">
                ❌ Rejected
                </span>
                </div>
            @endif
            @if($applied_user_status[$user->user_id] == null || $applied_user_status[$user->user_id] == 'P')
                <div style="position: absolute; top: 10px; right: 10px; transform: rotate(-10deg);">
                    <span class="badge bg-warning text-dark p-2" style="font-size: 1rem; border: 2px solid #ffc107;">
                        ⏳ Pending
                    </span>
                </div>
            @endif
            <h5 class="card-title mb-3" style="font-size: 1.25rem; font-weight: 600;">
              <i class="fa fa-user me-2 text-primary"></i> {{ $user->first_name }} {{ $user->last_name }}
            </h5>
            <p class="card-text mb-2">
              <i class="fa fa-map-marker text-danger me-2"></i>
              <strong>Address:</strong>
              @foreach($states as $state)
                @if($state->id == $user->state)
                  {{ $state->name}}
                @endif
              @endforeach  , {{ $user->city }}
            </p>
            <p class="card-text mb-2">
              <i class="fa fa-briefcase text-warning me-2"></i>
              <strong>Education:</strong> {{ $user->education }} 
            </p>
            <p class="card-text">
              <i class="fa fa-inr text-success me-2"></i>
              <strong>Salary Expection:</strong> ₹{{ $user->salary_expect }}/month
            </p>
            <br>
            <!-- Apply Now Button -->
            <!-- <form action="{{ route('jobapply') }}" method='post'>
                  @csrf
              <input type="text" style="display:none" value="1" name="job"> -->
              <button class="btn btn-dark mt-auto w-100" type="submit" name="jobid" value="{{$user->id}}">
                Contact
              </button>
            <!-- </form> -->
          </div>
        </div>
      </a>
      </div>
    @endforeach
  </div>
</div>


@include('shop_owner.footer')