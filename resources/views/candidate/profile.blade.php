@include('candidate.header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h4>Job Application Form</h4>
                </div>
                <div class="card-body">

                    <!-- Display Session Messages -->
                    @if(session('message'))
                        <div class="alert {{ str_contains(session('message'), 'successfully') ? 'alert-success' : 'alert-danger' }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form Starts Here -->
                    <form method="POST" action="{{ route('profilestore') }}">
                        @csrf

                        {{-- First Name --}}
                        <div class="mb-3">
                            <label for="first_name" class="form-label"><b>First Name *</b></label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Middle Name --}}
                        <div class="mb-3">
                            <div class="col-md-6" style="padding-left:0px;">
                                <label for="middle_name" class="form-label"><b>Middle Name</b></label>
                                <input type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name') }}">
                                @error('middle_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6" style="padding-right:0px;">
                                <label for="last_name" class="form-label"><b>Last Name *</b></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Mobile Number --}}
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label"><b>Mobile Number *</b></label>
                            <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{ old('mobile_no') }}" required>
                            @error('mobile_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Date of Birth --}}
                        
                        <div class="mb-5">
                            <div class="col-md-6"  style="padding-left:0px;">
                                <label for="dob" class="form-label"><b>Date of Birth *</b></label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>
                                @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                           
                            {{-- Gender --}}
                            <div class="col-md-6"  style="padding-right:0px;">
                                <label for="gender" class="form-label"><b>Gender *</b></label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender" required style="margin-bottom:20px; height:35px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                        </div>

                        {{-- Address --}}
                        <div class="mb-3">
                            <label for="address" class="form-label"><b>Address *</b></label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address') }}</textarea>
                            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>  

                        <div class="mb-3">
                            {{-- State --}}
                            <div class="col-md-6"  style="padding-left:0px;">
                                <label for="state" class="form-label"><b>State *</b></label>
                                <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required>
                                @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        

                            {{-- City --}}
                            <div class="col-md-6"  style="padding-right:0px;">
                                <label for="city" class="form-label"><b>City *</b></label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required>
                                @error('city') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Education --}}
                        <div class="mb-3">
                            <label for="education" class="form-label"><b>Education *</b></label>
                            <input type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required>
                            @error('education') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Work Experience --}}
                        <div class="mb-3">
                            <label for="work_experience" class="form-label"><b>Work Experience *</b></label>
                            <input type="text" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience" value="{{ old('work_experience') }}" required>
                            @error('work_experience') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Looking for Job --}}
                        <div class="mb-3">
                            <label for="looking_job" class="form-label"><b>Looking for Job *</b></label>
                            <select class="form-select @error('looking_job') is-invalid @enderror" name="looking_job" required>
                                <option value="">Select</option>
                                <option value="Yes" {{ old('looking_job') == 'Yes' ? 'selected' : '' }}>Yes</option>
                                <option value="No" {{ old('looking_job') == 'No' ? 'selected' : '' }}>No</option>
                            </select>
                            @error('looking_job') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Salary Expected --}}
                        <div class="mb-3">
                            <label for="salary_expected" class="form-label"><b>Salary Expected *</b></label>
                            <input type="number" class="form-control @error('salary_expected') is-invalid @enderror" name="salary_expected" value="{{ old('salary_expected') }}" required>
                            @error('salary_expected') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Optional Fields -->
                        <div class="form-check mb-3">
                            <input type="checkbox" name="got_job" class="form-check-input" value="1" {{ old('got_job') ? 'checked' : '' }}>
                            <label class="form-check-label"><b>Got the Job</b></label>
                        </div>

                      

                        <button type="submit" class="btn btn-dark w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('candidate.footer')

</body>
</html>
