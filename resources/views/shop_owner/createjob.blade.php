@include('shop_owner.header')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h4>Employer Form</h4>
                </div>
                <div class="card-body">

                    

                    @if(session('message'))
                    <div class="alert {{ str_contains(session('message'), 'successfully') ? 'alert-success' : 'alert-danger' }}">
                        {{ session('message') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('store.job') }}">
                        @csrf
                        @if($job_data)
                        <input type="text" id="dataid" name="dataid" style="display:none" value="{{$job_data->id}}">
                        @endif

                        {{-- Job Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label"><b>Job Title</b></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$job_data->title ?? '') }}">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Location Details --}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <h5 class="mb-3">Location Details</h5>

                                <div class="d-flex justify-content-between">
                                    {{-- State --}}
                                    <div class="flex-fill mb-3 me-2">
                                        <label for="state" class="form-label"><b>State</b></label>
                                        <select class="form-select @error('state') is-invalid @enderror" name="state">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{ $state->id }}" {{ old('state', $job_data->state ?? '') == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    {{-- City --}}
                                    <div class="flex-fill mb-3">
                                        <label for="city" class="form-label"><b>City</b></label>
                                        <select class="form-select @error('city') is-invalid @enderror" name="city">
                                            <option value="">Select City</option>
                                            {{-- You’ll need to dynamically populate based on selected state --}}
                                            @foreach($cities as $city)
                                            <option value="{{ $city->name }}" {{ old('city', $job_data->city ?? '') == $city->name ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="mb-3">
                                    <label for="address" class="form-label"><b>Address</b></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address',$job_data->address ?? '') }}</textarea>
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Job Type --}}
                        <div class="mb-3">
                            <label for="type" class="form-label"><b>Job Type</b></label>
                            <select class="form-select @error('type') is-invalid @enderror" name="type" id="job-type">
                                <option value="">Select Job Type</option>
                                <option value="Full Time" {{ old('type', $job_data->type ?? '') == 'Full Time' ? 'selected' : '' }}>Full Time</option>
                                <option value="Part Time" {{ old('type', $job_data->type ?? '') == 'Part Time' ? 'selected' : '' }}>Part Time</option>
                                <option value="Contract" {{ old('type' ,$job_data->type ?? '') == 'Contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                            @error('type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Contract Bond (conditionally shown) --}}
                        <div class="mb-3" id="employer-bond-field" style="display: none;">
                            <label for="employer_bond" class="form-label"><b>Employer Bond</b></label>
                            <select class="form-select @error('employer_bond') is-invalid @enderror" name="employer_bond">
                                <option value="">Select Bond</option>
                                @foreach($employers_bond as $bond)
                                <option value="{{ $bond->id }}" {{ old('employer_bond', $job_data->employer_bond ?? '') == $bond->id ? 'selected' : '' }}>
                                    {{ $bond->bond_duration }}
                                </option>
                                @endforeach
                            </select>
                            @error('employer_bond') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Salary Range - You may need to use JS range slider --}}
                        <div class="mb-3">
                            <label class="form-label"><b>Monthly Salary Range</b></label>
                            <input type="number" name="salary_min" placeholder="Min" class="form-control mb-2" value="{{ old('salary_min',    $job_data->salary_min ?? '') }}">
                            <input type="number" name="salary_max" placeholder="Max" class="form-control" value="{{ old('salary_max',    $job_data->salary_max ?? '') }}">
                            @error('salary_range') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>

                        {{-- Job Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label"><b>Job Description</b></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description',    $job_data->description ?? '') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Working Hours --}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <h5 class="mb-3">Working Hours</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="start_time" class="form-label"><b>Start Time</b></label>
                                        <input type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time', $job_data->start_time ?? '') }}">
                                        @error('start_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="end_time" class="form-label"><b>End Time</b></label>
                                        <input type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time', $job_data->end_time ?? '') }}">
                                        @error('end_time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Job Category --}}
                        <div class="mb-3">
                            <label for="job_category" class="form-label"><b>Job Category</b></label>
                            <select class="form-select @error('job_category') is-invalid @enderror" name="job_category">
                                <option value="">Select Job Category</option>
                                @foreach($jobCategories as $category)
                                <option value="{{ $category->id }}" {{ old('job_category', $job_data->job_category ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                            </select>
                            @error('job_category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        {{-- Gender --}}
                        <div class="mb-3">
                                <label for="gender" class="form-label"><b>Gender Required*</b></label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender" required style="margin-bottom:20px; height:35px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender', $job_data->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender' ,$job_data->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender', $job_data->gender ?? '') == 'both' ? 'selected' : '' }}>Both can apply</option>
                                </select>
                                @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        {{-- Company Information --}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <h5 class="mb-3">Shop Information</h5>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="company_name" class="form-label"><b>Shop Name</b></label>
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name',    $job_data->company_name ?? '') }}">
                                        @error('company_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label"><b>Owner Name</b></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',  $job_data->name ?? '') }}">
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_number" class="form-label"><b>Phone Number</b></label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number',    $job_data->phone_number ?? '') }}">
                                        @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Allowances --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="food_allowance" value="1" {{ old('food_allowance',    $job_data->food_allowance ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="food_allowance"><b>Food Allowance</b></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="travel_allowance" value="1" {{ old('travel_allowance', $job_data->travel_allowance ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="travel_allowance"><b>Travel Allowance</b></label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-dark w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Optional: use JavaScript for dynamic employer bond field --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const jobTypeSelect = document.getElementById('job-type');
        const bondField = document.getElementById('employer-bond-field');

        function toggleBond() {
            bondField.style.display = jobTypeSelect.value === 'Contract' ? 'block' : 'none';
        }

        jobTypeSelect.addEventListener('change', toggleBond);
        toggleBond(); // Initial call
    });
</script>


@include('shop_owner.footer')