@include('shop_owner.header')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border border-dark h-100" style="border-radius: 10px;">
                <div class="card-body">
                    <h5 class="card-title mb-4" style="font-size: 1.5rem; font-weight: 700;">
                        <i class="fa fa-briefcase me-2 text-primary"></i> 
                    </h5>

                    <p class="card-text mb-3">
                        <i class="fa fa-building me-2 text-secondary"></i>
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
                        <i class="fa fa-inr text-success me-2"></i>&nbsp;
                        <strong>Salary Expectation:</strong> ₹{{ $user_data->salary_expect }}/month
                    </p>

                    <p class="card-text mb-3">
                        <i class="fa fa-briefcase text-info me-2"></i>
                        <strong>Work Experiance:</strong>{{ $user_data->work_experience }} 
                    </p>

                    <p class="card-text mb-4">
                        <i class="fa fa-phone me-2 text-success"></i>
                        <strong>Phone:</strong> <br>
                        <span class="ms-4">{{  $user_data->phone_number }}</span>
                    </p>
                    <hr>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('shop_owner.footer')