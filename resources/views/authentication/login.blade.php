<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    

    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-auth.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
</head>

<body>

<div class="container">
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded p-3">
                <h3 class="text-center mb-4 text-dark">Login</h3>
                <!-- @if (Session::has('error'))
                    <div class="alert alert-danger text-center">
                        {{ Session::get('error') }}
                    </div>
                @endif -->
                <span id="success_msg" class="text-success"></span>
                <form  id="taskForm">
                    @csrf
                    <div class="form-group">
                        <label for="mobile" class="font-weight-bold">Mobile No.</label>
                        <input type="text" id="phone"   name="mobile" class="form-control" value="{{ old('mobile') }}">
                        <span id="error-mobile" class="text-danger"></span>

                        <div id="recaptcha_container"></div>
                        <button id="send_otp" type="button" onclick="sendOTP()" class="btn btn-dark btn-block mt-4">Send OTP</button>
                        <!---<a href="/login">Send OTP</a>--->
                    </div>
                    <div class="form-group mt-4">
                        <!-- <label for="otp" class="font-weight-bold">OTP:</label> -->
                        <input  type="text" id="otp" placeholder="Enter OTP" name="otp" class="form-control">
                        <span id="error_otp" class="text-danger"></span>
                    </div>
                    <!-- Google reCAPTCHA (optional) -->
                    <!-- 
                    <div class="form-group mt-3">
                        <div class="g-recaptcha" data-sitekey="your-site-key-here"></div>
                    </div> 
                    -->
                    <div class="form-group mt-4">
                        <input type="checkbox" id="privacyPolicy" name="privacyPolicy" onchange="toggleSubmitButton()">
                       
                        <label for="privacyPolicy">
                            I agree to the <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#privacyModal" style="padding-top: 4px;padding-left: 0px;">
                                Privacy Policy
                            </button>
                        </label><br><br>
                    </div>
                    <div class="form-group">
                        <button id="submitBtn" type="button" onclick="verifyOTP()" class="btn btn-dark btn-block" disabled>Log In</button>
                    </div>
                </form>

                <p class="text-center mt-4 text-muted small">
                    &copy; 2025 Developed by Virat Kohli
                </p>
            </div>
        </div>
    </div>
</div>

<div id="privacyModal" class="modal fade" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

        <div class="modal-header">
            <h5 class="modal-title" id="privacyModalLabel">Privacy Policy</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body" >
            @include('authentication.privacy_policy')
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

    </div>
  </div>
</div>

<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .card {
        background-color: #fff;
        border-radius: 10px;
    }
    .card-header, .card-body {
        padding: 1.5rem;
    }
    .card-title {
        font-size: 1.5rem;
        color: #007bff;
    }
    .btn {
        padding: 10px;
        font-size: 1rem;
    }
    .btn-block {
        width: 100%;
    }
    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da;
        box-shadow: none;
    }
    .form-control:focus {
        border-color: #007bff;
    }
    .alert-danger {
        margin-top: 20px;
        font-size: 0.9rem;
    }
    .text-info {
        font-size: 0.9rem;
    }
</style>

</div>
<script>
    function toggleSubmitButton() {
      var checkbox = document.getElementById("privacyPolicy");
      var submitBtn = document.getElementById("submitBtn");

      submitBtn.disabled = !checkbox.checked;
    }
  </script>
<!---6Lfno6gpAAAAAJE5hI6UPLo-5GcR0Q6vYnyG54Zn secret key



<?php
// Validate CAPTCHA
/*$recaptchaSecretKey = "YOUR_SECRET_KEY";
$recaptchaResponse = $_POST['g-recaptcha-response'];

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecretKey}&response={$recaptchaResponse}");
$responseKeys = json_decode($response, true);

if(intval($responseKeys["success"]) !== 1) {
    echo "CAPTCHA verification failed.";
} else {
    // Continue with your login process
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Your login validation code here...

    echo "Login successful.";
}*/
?> --->

<!---<style>
  footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
    position: fixed;
    bottom: 0;
    width: 100%;
    font-family: Arial, sans-serif;
}

.footer-content {
    max-width: 600px; /* Ensures content does not stretch too wide on large screens */
    margin: 0 auto;
}

.footer-content a {
    color: #FFD700; /* Gold color for the email link */
    text-decoration: none;
}

.footer-content a:hover {
    text-decoration: underline;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    footer {
        padding: 15px; /* Slightly reduced padding on smaller screens */
        position: relative;
    }

    .footer-content {
        padding: 10px;
        font-size: 14px; /* Slightly smaller font on smaller devices */
    }
}

</style>
<br>
<footer>
    <div class="footer-content">
        <p>Developed by <strong>Your Name</strong></p>
        <p>Contact: <a href="mailto:your-email@gmail.com">your-email@gmail.com</a></p>
    </div>
</footer>--->


</body>

<script>
    const firebaseConfig = {
        apiKey: "AIzaSyACJO0MoD3HAoR2yigQhqnvFxaPB3VYXRc",
        authDomain: "spj-otp.firebaseapp.com",
        projectId: "spj-otp",
        storageBucket: "spj-otp.appspot.com",
        messagingSenderId: "402552345502",
        appId: "1:402552345502:web:5acb55812506d9002f3c8f",
    };
    firebase.initializeApp(firebaseConfig);

    async function render() {
  if (!window.recaptchaVerifier) {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha_container', {
      size: 'invisible',
      callback: function(response) {
        console.log('reCAPTCHA solved:', response);
      }
    });

    // Wait for the widget to render and store its ID (optional)
    window.recaptchaWidgetId = await window.recaptchaVerifier.render();
    console.log('reCAPTCHA rendered, widget ID:', window.recaptchaWidgetId);
  }
}
   
    $(document).ready(async function() {
        await render(); // important: wait until reCAPTCHA is ready
    });
    function sendOTP() {
        $("#send_otp").prop("disabled" , true);
        const number = "+91" + $("#phone").val();
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier)
        .then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        console.log("OTP sent:", confirmationResult);
        alert("OTP sent successfully!");
        })
        .catch(function (error) {
        console.error("OTP error:", error);
        $('#error_otp').text(error.message);
        $("#error_otp").show();
        });
    }
        function verifyOTP() {
            var code = $("#otp").val();
            if(code.length){
                if (typeof  confirmationResult == 'undefined'){
                    $('#error_otp').html('The OTP has not been generated');
                    $("#error_otp").show();
                    return false;
                }
               confirmationResult.confirm(code).then(function(result){
                    //var user = result.user;
                    var formData = $('#taskForm').serialize();
                  
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type:'post',
                        url:"{{ url('/') }}",
                        data:formData,
                        success: function(response) {
                            //console.log(response.message);
                            $("#taskForm").css('display', 'none');
                            document.getElementById("success_msg").innerHTML = response.message;
                            setTimeout(function() {
                                window.location.href = response.redirect;
                            }, 3000);
                        },
                        error: function(error) {
                        console.log(error);
                            Object.keys(error.responseJSON.errors).forEach(field => {
                                console.log(field);
                                const errorMessage = error.responseJSON.errors[field][0];
                                console.log(errorMessage);
                                document.getElementById('error-' + field).innerHTML = errorMessage;
                        });
                        }
                    });
                }).catch(function(error){
                    $('#error_otp').text(error.message);
                    $("#error_otp").show();
                });
            }
        }
</script>


</html>