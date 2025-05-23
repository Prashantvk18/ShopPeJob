@include('candidate.header')
<div class="container mt-4">
  <form action="jobs" method="get">
    <div class="row">
      <div class="col-md-3">
        <label for="state" class="form-label"><b>State</b></label>
        <select class="form-select @error('state') is-invalid @enderror" name="state" style="margin-bottom:20px; height:35px;">
            <option value="">Select State</option>
            @foreach($states as $state)
            <option value="{{ $state->id }}" {{ old('state',$profile_data->state ?? '') == $state->id ? 'selected' : '' }}>
                {{ $state->name }}
            </option>
            @endforeach
        </select>
        @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-3">
        <label for="city" class="form-label"><b>City</b></label>
        <select class="form-select @error('city') is-invalid @enderror" name="city" style="margin-bottom:20px; height:35px;">
            <option value="">Select City</option>
            {{-- You’ll need to dynamically populate based on selected state --}}
            @foreach($cities as $city)
            <option value="{{ $city->name }}" {{ old('city',$profile_data->city ?? '') == $city->name ? 'selected' : '' }}>
                {{ $city->name }}
            </option>
            @endforeach
        </select>
        @error('city') 
        <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      <div class="col-md-3">
        <label for="looking_job" class="form-label"><b>Looking for Job *</b></label>
        <select class="form-select @error('looking_job') is-invalid @enderror" name="looking_job"  style="margin-bottom:20px; height:35px;">
              <option value="">Select Job Category</option>
            @foreach($jobCategories as $category)
            <option value="{{ $category->id }}" {{ old('looking_job', $profile_data->looking_job ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
            @endforeach
            
        </select>
        @error('looking_job') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>
      <div class="col-md-3" style="margin-top:2%">
         <button type="submit" class="btn btn-dark w-100">Filter</button>
      </div>
    </div>
  </form>
  <div class="row g-4">
    @foreach($job_data as $job)
      <div class="col-md-4">
      <a href="{{ route('job_details', $job->id) }}" class="text-decoration-none text-dark">
        <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
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
            <br>
            <!-- Apply Now Button -->
            <a class="btn btn-dark mt-auto w-100">
              Apply Now
            </a>
          </div>
        </div>
</a>
      </div>
    @endforeach
  </div>
</div>

@include('candidate.footer')