<style>
/* Ensure html and body take full height of the viewport */
html, body {
    height: 100%;
    margin: 0;
}

/* Flexbox layout for the body */
body {
    display: flex;
    flex-direction: column;
    justify-content: space-between;  /* Ensures footer is pushed to the bottom */
}

/* Content area, so it expands and pushes footer down */
.content {
    flex-grow: 1;
}

/* Footer styling */
footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 20px;
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
<br><br>
</div>
<footer>
<footer class="bg-dark text-white pt-4 pb-3">
  <div class="container">
    <div class="row gy-4">

      <!-- Column 1: Logo / Description -->
      <div class="col-12 col-md-3">
        <h5>YourBrand</h5>
        <p class="small">Helping you grow through smarter design and technology.</p>
      </div>

      <!-- Column 2: Quick Links -->
      <div class="col-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="list-unstyled">
          <li><a href="/sabout_us" class="text-white text-decoration-none">About Us</a></li>
          <li><a href="/sservices" class="text-white text-decoration-none">Services</a></li>
          <!-- <li><a href="/scontact" class="text-white text-decoration-none">Contact</a></li> -->
        </ul>
      </div>

      <!-- Column 3: Legal -->
      <div class="col-6 col-md-3">
        <h6>Legal</h6>
        <ul class="list-unstyled">
          <li><a href="/sprivacy_policy" class="text-white text-decoration-none">Privacy Policy</a></li>
          <li><a href="/sterms_ofservice" class="text-white text-decoration-none">Terms of Service</a></li>
        </ul>
      </div>

      <!-- Column 4: Newsletter + Social -->
      <div class="col-12 col-md-3">
        <h6>Subscribe</h6>
        <form class="d-flex flex-column flex-sm-row gap-2">
          <input type="email" class="form-control" placeholder="Email">
          <button type="submit" class="btn btn-primary btn-sm">Go</button>
        </form>
        <div class="mt-3">
          <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
          <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>

    </div>

    <hr class="mt-4 border-light">
    <p class="text-center small mb-0">&copy; 2025 YourBrand. All rights reserved.</p>
  </div>
</footer>
   
</footer>

</body>
</html>
