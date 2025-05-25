@include('shop_owner.header')
<div class="container mt-4">
  <div class="row g-4">
    @foreach($applied_user_data as $user)
      <div class="col-md-4">
      <a href="{{ route('job_details',[ $user->id , 0]) }}" class="text-decoration-none text-dark">
        <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
          <div class="card-body">
            <h5 class="card-title mb-3" style="font-size: 1.25rem; font-weight: 600;">
              <i class="fa fa-briefcase me-2 text-primary"></i> {{ $user->first_name }} {{ $user->last_name }}
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
              <i class="fa fa-study text-warning me-2"></i>
              <strong>Time:</strong> {{ $user->education }} 
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