@include('candidate.header')
<style>
    .profile-pic-wrapper {
        position: relative;
        width: 130px;
        height: 130px;
        margin: 0 auto 20px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid #333;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .profile-pic-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        border-radius: 50%;
        background-color: #f0f0f0;
    }
    .profile-pic-wrapper input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    .edit-icon {
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 30px;
        background: rgba(0, 0, 0, 0.6);
        color: white;
        text-align: center;
        font-size: 14px;
        line-height: 30px;
        border-bottom-left-radius: 50%;
        border-bottom-right-radius: 50%;
        display: none;
    }

    .profile-pic-wrapper:hover .edit-icon {
        display: block;
    }
</style>


<?php 
    $exp_array =["lsix" => "Less than six month" , "msix" => "More than six month" , "year" => "1 Year" , "myear" => "More than one year"];

    $education = [
        'less_than_5th' => 'Less than 5th',
        'less_than_10th' => 'Less than 10th',
        '10th' => '10th',
        '12th' => '12th',
    ];
?>
@php
    $profilePhoto = isset($profile_data->img_path) && file_exists(public_path('storage/' . $profile_data->img_path)) 
        ? asset('storage/' . $profile_data->img_path) 
        : asset('default-user.png');
@endphp
<div class="container mt-5">
    
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white text-center">
                    <h4>User Profile</h4>
                </div>
                <div class="card-body">
                    <!-- Display Session Messages -->
                    @if(session('message'))
                        <div class="alert {{ str_contains(session('message'), 'successfully') ? 'alert-success' : 'alert-danger' }}">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form Starts Here -->
                    <form method="POST" action="{{ route('profilestore') }}"  enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center">
                            <div class="profile-pic-wrapper">
                                <img src="{{ $profilePhoto }}" alt="Profile Photo">
                                <input type="file" name="photo" accept="image/*" class="@error('photo') is-invalid @enderror">
                                <div class="edit-icon">Edit</div>
                            </div>
                        </div>
                @error('photo') <div class="text-danger text-center">{{ $message }}</div> @enderror

                        {{-- First Name --}}
                        <div class="mb-3">
                            <label for="first_name" class="form-label"><b>First Name *</b></label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name' , $profile_data->first_name ?? '')}}" required>
                            @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Middle Name --}}
                        <div class="mb-3">
                            <div class="col-md-6" style="padding-left:0px;">
                                <label for="middle_name" class="form-label"><b>Middle Name</b></label>
                                <input type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" value="{{ old('middle_name' ,$profile_data->middle_name ?? '') }}">
                                @error('middle_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-6" style="padding-right:0px;">
                                <label for="last_name" class="form-label"><b>Last Name *</b></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name' ,$profile_data->last_name ?? '')  }}" required>
                                @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Mobile Number --}}
                        <div class="mb-3">
                            <label for="mobile_no" class="form-label"><b>Mobile Number *</b></label>
                            <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" name="mobile_no" value="{{$mob_number}}" disabled>
                            @error('mobile_no') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Date of Birth --}}
                        
                        <div class="mb-5">
                            <div class="col-md-6"  style="padding-left:0px;">
                                <label for="dob" class="form-label"><b>Date of Birth *</b></label>
                                <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob',$profile_data->dob ?? '') }}" required>
                                @error('dob') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                           
                            {{-- Gender --}}
                            <div class="col-md-6"  style="padding-right:0px;">
                                <label for="gender" class="form-label"><b>Gender *</b></label>
                                <select class="form-select @error('gender') is-invalid @enderror" name="gender" required style="margin-bottom:20px; height:35px;">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{ old('gender', $profile_data->gender ?? '') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender' ,$profile_data->gender ?? '') == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ old('gender', $profile_data->gender ?? '') == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            
                        </div>

                        {{-- Address --}}
                        <div class="mb-3">
                            <label for="address" class="form-label"><b>Address *</b></label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" required>{{ old('address',$profile_data->address ?? '') }}</textarea>
                            @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>  

                        <div class="mb-3">
                            {{-- State --}}
                            <div class="col-md-6"  style="padding-left:0px;">
                                <label for="state" class="form-label"><b>State</b></label>
                                <select class="form-select @error('state') is-invalid @enderror" name="state" style="margin-bottom:20px; height:35px;">
                                    <option value="">Select State</option>
                                    @foreach($states as $state)
                                    <option value="{{ $state->id }}" {{ old('state', $profile_data->state ?? '') == $state->id ? 'selected' : '' }}>
                                        {{ $state->name }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('state') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            {{-- City --}}
                            <div class="col-md-6"  style="padding-right:0px;">
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
                        </div>

                        {{-- Education --}}
                        <div class="mb-3">
                            <label for="education" class="form-label"><b>Education *</b></label>
                            <select type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education',$profile_data->education ?? '') }}">
                            @foreach($education as $key=>$val)
                                <option value="{{$key}}" {{ old('education', $profile_data->education ?? '') == $key ? 'selected' : '' }}>{{$val}}</option>
                            @endforeach
                            </select>
                            @error('education') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Work Experience --}}
                        <div class="mb-3">
                            <label for="work_experience" class="form-label"><b>Work Experience *</b></label>
                            <select type="text" class="form-control @error('work_experience') is-invalid @enderror" name="work_experience">
                            @foreach($exp_array as $key=>$val)
                            <option value="{{$key}}" {{ old('work_experience', $profile_data->work_experience ?? '') == $key ? 'selected' : '' }}>{{$val}}</option>
                            @endforeach
                            </select>
                            @error('work_experience') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Looking for Job --}}
                        <div class="mb-3">
                            <label for="looking_job" class="form-label"><b>Looking for Job *</b></label>
                            <select class="form-select @error('looking_job') is-invalid @enderror" name="looking_job" required style="margin-bottom:20px; height:35px;">
                                 <option value="">Select Job Category</option>
                                @foreach($jobCategories as $category)
                                <option value="{{ $category->id }}" {{ old('looking_job', $profile_data->looking_job ?? '') == $category->id ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                                @endforeach
                               
                            </select>
                            @error('looking_job') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        {{-- Salary Expected --}}
                        <div class="mb-3">
                            <label for="salary_expected" class="form-label"><b>Salary Expected *</b></label>
                            <input type="number" class="form-control @error('salary_expected') is-invalid @enderror" name="salary_expected" value="{{ old('salary_expected', $profile_data->salary_expect ?? '') }}" required>
                            @error('salary_expected') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Optional Fields -->
                      
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
