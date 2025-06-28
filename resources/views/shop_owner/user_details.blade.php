@include('shop_owner.header')
<style>
    .profile-pic-wrapper img {
        width: 220px;     /* Set a fixed width */
        height: 230px;    /* Set a fixed height */
       /* object-fit: cover;*/ /* Ensures the image covers the box without distortion */
        border-radius: 5%; /* Makes it circular */
        border: 2px solid #ddd;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }

    .profile-pic-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }
</style>


<?php 
    $exp_array =["fresher" => "Fresher" ,"lsix" => "Less than six month" , "msix" => "More than six month" , "year" => "1 Year" , "myear" => "More than one year"];

    $education = ['uneducate' => 'Uneducate', 'less_than_5th' => 'Less than 5th' ,'less_than_10th' => 'Less than 10th','10th' => '10th','12th' => '12th',
    ];
?>
@php
    $profilePhoto = isset($user_data->img_path) && file_exists(public_path('storage/' . $user_data->img_path)) 
        ? asset('storage/' . $user_data->img_path) 
        : asset('default-user.png');
@endphp
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
                <div class="card-body">
                    <div class="col-md-6 ">
                        @if($apply_job_id->status == 'S')
                            <div style="position: absolute; top: 10px; right: 10px; transform: rotate(-10deg);">
                                <span class="badge bg-success text-white p-2" style="font-size: 1rem; border: 2px solid #28a745;">
                                    ✅ Accepted
                                </span>
                            </div>
                        @endif
                        @if($apply_job_id->status == 'R')
                            <div style="position: absolute; top: 10px; right: 10px; transform: rotate(-10deg);">
                                <span class="badge bg-danger text-white p-2" style="font-size: 1rem; border: 2px solid #dc3545;">
                                ❌ Rejected
                                </span>
                            </div>
                        @endif
                        @if($apply_job_id->status == null || $apply_job_id->status == 'P')
                            <div style="position: absolute; top: 10px; right: 10px; transform: rotate(-10deg);">
                                <span class="badge bg-warning text-dark p-2" style="font-size: 1rem; border: 2px solid #ffc107;">
                                    ⏳ Pending
                                </span>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center mb-2">
                            <div class="profile-pic-wrapper">
                                <img src="{{ $profilePhoto }}" alt="Profile Photo">
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6 ">
                        <p class="card-text mb-3">
                            <i class="fa fa-user me-2 text-secondary"></i>
                            <strong>Name:</strong> {{ $user_data->first_name }} {{ $user_data->middle_name }} {{ $user_data->last_name }}
                        </p>
                        <p class="card-text mb-3">
                            <i class="fa fa-map-marker text-danger me-2"></i>
                            &nbsp;<strong>Location:</strong>
                            @foreach($states as $state)
                                @if($state->id == $user_data->state)
                                    {{ $state->name}}
                                @endif
                            @endforeach  , {{ $user_data->city }}
                            <br>
                            &nbsp; &nbsp; &nbsp;{{$user_data->address}}
                        </p>
                        <p class="card-text mb-3">
                            <i class="fa fa-briefcase text-info me-2"></i>
                            <strong>Education:</strong> <span class="ms-2">{{ $education[$user_data->education] }} </span>
                        </p>
                        <p class="card-text mb-3">
                            <i class="fa fa-inr text-success me-2"></i>&nbsp;
                            <strong>Salary Expectation:</strong> ₹{{ $user_data->salary_expect }}/month
                        </p>
                        <p class="card-text mb-3">
                            <i class="fa fa-briefcase text-info me-2"></i>
                            <strong>Work Experiance:</strong> <span class="ms-2">{{ $exp_array[$user_data->work_experience] }} </span>
                        </p>
                        <p class="card-text mb-4">
                            <i class="fa fa-phone me-2 text-success"></i>
                            <strong>Phone:</strong>
                            <span class="ms-2">{{$user_data->mobile_no }}</span>
                        </p>
                        <div class="mb-3">
                            <form id="job_status">
                                @csrf
                                <div class="col-md-6 mb-2">
                                    <input type="text" style="display:none" value="{{$apply_job_id->id}}" id="jobid"> 
                                    <button type="submit" class="btn btn-success w-100" name="status"  onclick="update_status('S');" >Accept</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-danger w-100" name="status" onclick="update_status('R');" >Reject</button>
                                </div>
                            </form>
                        </div>
                        <hr>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function update_status(status) {
        var jobid = $("#jobid").val();
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
            },
            type: 'POST',
            url : "{{url('user_jobstatus')}}",
            data :{
                'jobid':jobid,
                'status': status
            },

            success: function (response) {
               location.reload();
            },
            error : function (response) {
               location.reload();
            }
        });
    }
</script>
@include('shop_owner.footer')