<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}">
    </script><script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <!---https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css   below--->
    <!-- In <head> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Just before </body> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('Extra/bootstrap.min.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <!---<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  below--->
   <script src="{{ asset('Extra/bootstrap.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!---<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">--->
    <!---<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--->
    <!---<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>--->

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="{{ asset('Extra/select2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('Extra/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Home</title>
    <style>
        .hidden {
            display: none;
        }
        @media (max-width: 768px) {
        .table th, .table td {
            padding: 8px;
        }
    }
    </style>
   
</head>
<body> 
<div class="content">

<nav class="navbar navbar-expand-lg navbar-dark  shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fs-3 fw-bold" href="#">SpJ</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="background-color: #30536a;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item {{ request()->is('shome') ? 'active' : '' }}">
                    <a class="nav-link " aria-current="page" href="/shome">Home</a>
                </li>
                <li class="nav-item {{ request()->is('createjob*') ? 'active' : '' }}">
                    <a class="nav-link" href="/createjob/0">Create Job</a>
                </li>
                <!-- <li class="nav-item {{ request()->is('applieduser') ? 'active' : '' }}">
                    <a class="nav-link" href="/applieduser">Applied User</a>
                </li> -->
                <!-- Dropdown Menu -->
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Module
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="/csv_view">Create CSV</a></li>
                        <li><a class="dropdown-item" href="/vapt_index">VAPT</a></li>
                        <li><a class="dropdown-item" href="/expanse">Expanse</a></li>
                        <li><a class="dropdown-item" href="/trip_roadmap">Road Map</a></li>
                    </ul>
                </li>  -->
                <li class="nav-item {{ request()->is('sabout_us') ? 'active' : '' }}">
                    <a class="nav-link" href="/sabout_us">About Us</a>
                </li>
                @if(Auth::user()->is_admin == 1)
                    <li class="nav-item {{ request()->is('sverify_shop') ? 'active' : '' }}">
                        <a class="nav-link" href="/sverify_shop">Verify Shop</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<button id="backBtn" onclick="history.back()">← Back</button>
<!-- Additional Styles -->
<style>
    /* Back button styles */
       
#backBtn {
  display: none; /* Hidden by default */
  position: fixed;
  bottom: 20px;
  right: 20px;
  padding: 10px 16px;
  font-size: 16px;
  background-color: #0e0e0eff;
  color: white;
  border: none;
  border-radius: 50px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  z-index: 9999;
  cursor: pointer;
  margin-bottom: 20px;
  
}
#backBtn:hover {
  background-color: #444546ff;
}

/* Show on mobile devices (max width 768px) */
@media (max-width: 768px) {
  #backBtn {
    display: block;
  }
}
    /* Navbar improvements */

   
    .navbar {
        background-color: black !important;
        padding: 10px 0;
        margin-bottom:0px;
    }

    .navbar-brand {
        font-family: 'Arial', sans-serif;
        color: #fff !important;
        font-weight: 800;
    }

    .navbar-nav .nav-link {
        font-size: 1.3rem;
        color: #f8f9fa !important;
        padding: 8px 16px;
    }

    .navbar-nav .nav-link:hover {
        color: #ffcc00 !important;
        background-color: transparent;
        transition: all 0.3s ease;
    }

    .navbar-nav .nav-item.active .nav-link {
        color: #ffcc00 !important;
        font-weight: bold;
    }

    .dropdown-menu {
        background-color: #0056b3;
        border: none;
    }

    .dropdown-item {
        color: #f8f9fa !important;
    }

    .dropdown-item:hover {
        background-color: #004085;
        color: #ffcc00 !important;
    }

    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        background-color: #fff;
    }

    /* Custom styles for larger screens */
    @media (min-width: 992px) {
        .navbar-nav {
            align-items: center;
        }
    }
</style>

<script>
const navItems = document.querySelectorAll('.nav-item');

navItems.forEach(item => {
  item.addEventListener('click', function () {
    navItems.forEach(el => el.classList.remove('active'));
    this.classList.add('active');
  });
});
</script>

