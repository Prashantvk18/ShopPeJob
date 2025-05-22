@include('candidate.header')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="card shadow-sm border border-dark" style="border-radius: 10px;">
                <div class="card-body">
                    <h2 class="text-center mb-4">
                        <i class="fa fa-info-circle text-dark me-2"></i> About Us
                    </h2>

                    <p class="mb-4" style="font-size: 1.1rem;">
                        <strong>Welcome to our Job Portal!</strong> We are dedicated to connecting employers with talented individuals looking for the right opportunities. Whether you're a business seeking trustworthy staff or a candidate seeking your next job, we make the process simple and efficient.
                    </p>

                    <p class="mb-4" style="font-size: 1.1rem;">
                        Our platform is designed to be clean, fast, and user-friendly. We believe that hiring and applying for jobs shouldn't be complicated. That's why we keep everything clear and straightforward — with real-time job listings, detailed job descriptions, and easy application options.
                    </p>

                    <p class="mb-4" style="font-size: 1.1rem;">
                        <i class="fa fa-check-circle text-success me-2"></i> <strong>Verified Jobs</strong><br>
                        <i class="fa fa-check-circle text-success me-2"></i> <strong>Easy-to-use Interface</strong><br>
                        <i class="fa fa-check-circle text-success me-2"></i> <strong>Responsive Support Team</strong><br>
                        <i class="fa fa-check-circle text-success me-2"></i> <strong>Free for Job Seekers</strong>
                    </p>

                    <hr>

                    <div class="text-center mt-4">
                        <p class="mb-2">
                            <i class="fa fa-envelope text-primary me-2"></i> <strong>Email:</strong> support@yourjobportal.com
                        </p>
                        <p>
                            <i class="fa fa-phone text-success me-2"></i> <strong>Phone:</strong> +91 98765 43210
                        </p>
                        <a href="{{ route('home') }}" class="btn btn-dark mt-3">
                            <i class="fa fa-arrow-left me-2"></i> Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('candidate.footer')
