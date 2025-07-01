@include('shop_owner.header')
<div class="container mt-5">
    <div class="d-flex justify-content-end mb-3">
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="languageToggle">
            <label class="form-check-label" for="languageToggle" id="languageLabel">English</label>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h4>Employer Form</h4>
                </div>
                <div class="card-body">
                    
                    <div class="d-flex justify-content-end mb-3">
        <form method="GET" action="{{ route('change.language') }}">
            <?php app()->setLocale(session('locale')); ?>
            <select name="lang" onchange="this.form.submit()" class="form-select w-auto">
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
                <option value="hi" {{ app()->getLocale() == 'hi' ? 'selected' : '' }}>हिंदी</option>
                <option value="mr" {{ app()->getLocale() == 'mr' ? 'selected' : '' }}>मराठी</option>
            </select>
        </form>
    </div>
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
                            <label for="title" class="form-label" data-en="Job Title" data-hi="नौकरी का शीर्षक"><b>{{ __('form.job_title') }}</b></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$job_data->title ?? '') }}">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Location Details --}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <label class="mb-3" class="form-label"  data-en="Location Details" data-hi="स्थान विवरण"><b>{{ __('form.location_details') }}</b></label>

                                <div class="d-flex justify-content-between">
                                    {{-- State --}}
                                    <div class="flex-fill mb-3 me-2">
                                        <label for="state" class="form-label"><b>{{ __('form.state') }}</b></label>
                                        <select class="form-select @error('state') is-invalid @enderror" name="state">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            @if($state->id == 3)
                                            <option value="{{ $state->id }}" {{ old('state', $job_data->state ?? '') == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    {{-- City --}}
                                    <div class="flex-fill mb-3">
                                        <label for="city" class="form-label"><b>{{ __('form.city') }}</b></label>
                                        <select class="form-select @error('city') is-invalid @enderror" name="city">
                                            <option value="">Select City</option>
                                            {{-- You’ll need to dynamically populate based on selected state --}}
                                            @foreach($cities as $city)
                                             @if($city->id == 16 || $city->id == 21 || $city->id == 26)
                                            <option value="{{ $city->name }}" {{ old('city', $job_data->city ?? '') == $city->name ? 'selected' : '' }}>
                                                {{ $city->name }}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                {{-- Address --}}
                                <div class="mb-3">
                                    <label for="address" class="form-label"><b>{{ __('form.address') }}</b></label>
                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address',$job_data->address ?? '') }}</textarea>
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Job Type --}}
                        <div class="mb-3">
                            <label for="type" class="form-label"><b>{{ __('form.job_type') }}</b></label>
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
                            <label for="employer_bond" class="form-label"><b>{{ __('form.employer_contract_type')}}</b></label>
                            <select class="form-select @error('employer_bond') is-invalid @enderror" name="employer_bond">
                                <option value="">Select Type</option>
                                @foreach($employers_bond as $bond)
                                <option value="{{ $bond->id }}" {{ old('employer_bond', $job_data->employer_bond ?? '') == $bond->id ? 'selected' : '' }}>
                                    {{ $bond->bond_duration }}
                                </option>
                                @endforeach
                            </select>
                            @error('employer_bond') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        
                        {{--To enter numbers of days , month ,year --}}
                        <div class="mb-3" id="contract-number" style="display: none;">
                            <label id="contract-numberLabel"for="contract_period" class="form-label"><b>Enter Contract Period</b></label>
                            <input placeholder="eg for 10 days/months/year" type="number" class="form-control @error('contract_period') is-invalid @enderror" name="contract_period" value="{{ old('contract_period',$job_data->contract_period ?? '') }}">
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <!--Select date range for contract job type --->
                        <div class="mb-3" id="date_range" style="display: none;"    >
                            <div class="p-3 border rounded-3 shadow-sm">
                                <label class="mb-3" class="form-label" ><b>Select Date Range</b></label>
                                <div class="d-flex justify-content-between">
                                    <div class="col-md-6"  style="padding-left:0px; ">
                                        <label for="from_date" class="form-label"><b>From date*</b></label>
                                        <input type="date" class="form-control @error('from_date') is-invalid @enderror" name="from_date" value="{{ old('from_date',$job_data->from_date ?? '') }}" >
                                        @error('from_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6"  style="padding-left:0px;">
                                        <label for="to_date" class="form-label"><b>To date</b></label>
                                        <input type="date" class="form-control @error('to_date') is-invalid @enderror" name="to_date" value="{{ old('to_date',$job_data->to_date ?? '') }}" >
                                        @error('to_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---select date range end-->
                        {{-- Salary Range - You may need to use JS range slider --}}
                        <div class="mb-3">
                            <label id="salary-range-label" class="form-label"><b>{{ __('form.salary_range')}}</b></label>
                            <input type="number" name="salary_min" placeholder="Min" class="form-control mb-2" value="{{ old('salary_min',    $job_data->salary_min ?? '') }}">
                            <input type="number" name="salary_max" placeholder="Max" class="form-control" value="{{ old('salary_max',    $job_data->salary_max ?? '') }}">
                            @error('salary_range') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                        </div>
                        
                        {{-- Job Description --}}
                        <div class="mb-3">
                            <label for="description" class="form-label"><b>{{ __('form.job_description')}}</b></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description',    $job_data->description ?? '') }}</textarea>
                            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Working Hours --}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <h5 class="mb-3">{{ __('form.working_hours')}}</h5>
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
                            <label for="job_category" class="form-label"><b>{{ __('form.job_category')}}</b></label>
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
                                <label for="gender" class="form-label"><b>{{ __('form.gender')}}</b></label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender" required style="margin-bottom:20px; height:35px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender', $job_data->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender' ,$job_data->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender', $job_data->gender ?? '') == 'both' ? 'selected' : '' }}>Both can apply</option>
                                </select>
                                @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>

                        {{--Facilities provide--}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <h5 class="mb-3">{{ __('form.facilities')}}</h5>
                                <div class="row">
                                    <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="food_allowance" value="1" {{ old('food_allowance',    $job_data->food_allowance ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="food_allowance"><b>Lunch</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="dinner" value="1" {{ old('dinner',   $job_data->dinner ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dinner"><b>Dinner</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="stay" value="1" {{ old('stay',    $job_data->stay ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="stay"><b>Stay</b></label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="travel_allowance" value="1" {{ old('travel_allowance', $job_data->travel_allowance ?? '') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="travel_allowance"><b>Travel Allowance</b></label>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                        {{-- Company Information --}}
                        <div class="mb-3">
                            <div class="p-3 border rounded-3 shadow-sm">
                                <h5 class="mb-3">{{ __('form.company_info')}}</h5>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="company_name" class="form-label"><b>{{ __('form.shop_name')}}</b></label>
                                        <input type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name',    $job_data->company_name ?? '') }}">
                                        @error('company_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label"><b>{{ __('form.owner_name')}}</b></label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name',  $job_data->name ?? '') }}">
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone_number" class="form-label"><b>{{ __('form.phone_number')}}</b></label>
                                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number',    $job_data->phone_number ?? '') }}">
                                        @error('phone_number') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                       @if(isset($job_data->is_verified) && $job_data->is_verified == 1)
                       
                        @else
                         <button type="submit" class="btn btn-dark w-100">Submit</button>
                        @endif
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
        const contractField = document.getElementById('contract-number');
        const daterangeField = document.getElementById('date_range');
       
         const langToggle = document.getElementById('languageToggle');
         const langLabel = document.getElementById('languageLabel');
        const bondSelect = document.querySelector('select[name="employer_bond"]');
        const salaryRangeLabel = document.getElementById('salary-range-label');
        const contractFieldLabel = document.getElementById('contract-numberLabel');
        

        function toggleBond() {
            bondField.style.display = jobTypeSelect.value === 'Contract' ? 'block' : 'none';
            contractField.style.display = jobTypeSelect.value === 'Contract' ? 'block' : 'none';
        }

        // function switchLanguage(isHindi) {
        //     document.querySelectorAll('[data-en]').forEach(el => {
        //         el.textContent = isHindi ? el.getAttribute('data-hi') : el.getAttribute('data-en');
        //     });
        //     langLabel.textContent = isHindi ? 'हिंदी' : 'English';
        // }

         function updateSalaryLabel() {
            const selectedText = bondSelect.options[bondSelect.selectedIndex]?.text.toLowerCase();
            if (selectedText.includes('day')) {
                salaryRangeLabel.innerHTML = "<b>{{ __('form.days_salary') }}</b>";
                contractFieldLabel.innerHTML = "<b>{{ __('form.for_days') }}</b>";
            } else if (selectedText.includes('month')) {
                salaryRangeLabel.innerHTML = "<b>{{ __('form.months_salary') }}</b>";
                contractFieldLabel.innerHTML = "<b>{{ __('form.for_months') }}</b>";
            }else {
                salaryRangeLabel.innerHTML = "<b>{{ __('form.salary_range') }}</b>"; 
                contractFieldLabel.innerHTML = "<b>{{ __('form.for_months') }}</b>";// default
            }
        }

        jobTypeSelect.addEventListener('change', toggleBond);
         bondSelect.addEventListener('change', updateSalaryLabel);

        toggleBond();
        updateSalaryLabel()

        langToggle.addEventListener('change', (e) => {
            switchLanguage(e.target.checked);
        });
    });
</script>


@include('shop_owner.footer')