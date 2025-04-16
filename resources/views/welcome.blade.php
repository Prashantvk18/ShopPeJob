<!DOCTYPE html>
<html lang="hi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
    <style>
        /* Reset and base styles */
/* Reset and base styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Arial', sans-serif;
  background-color: #fff;  /* White background */
  color: #000;             /* Black text */
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

/* Main layout */
.page {
  text-align: center;
}

.main {
  padding: 40px;
}

/* Buttons (CTAs) */
.ctas {
  display: flex;             /* Use flexbox */
  justify-content: center;   /* Center buttons horizontally */
  gap: 20px;                 /* Space between buttons */
}

.primary {
  text-decoration: none;
  color: #fff;                /* White text */
  background-color: #000;     /* Black background */
  padding: 15px 30px;
  border: none;
  font-size: 1.5rem;
  border-radius: 48px;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.primary:hover {
  background-color: #333;     /* Slightly lighter black for hover */
  color: #fff;                /* White text on hover */
}

/* Footer (optional) */
.footer {
  margin-top: 40px;
}


    </style>
</head>
<body>
  <div class="page">
    <main class="main">
      <div class="ctas">
        <!-- candidate -->
        <a href="/candidate/home" class="primary" rel="noopener noreferrer">
          <b>कारीगर</b>
        </a>
        <!-- employee -->
        <a href="/Auth/SignIn" class="primary" rel="noopener noreferrer">
          <b>दुकानदार</b>
        </a>
      </div>
    </main>
    <footer class="footer">
      <!-- Optional Footer Content -->
    </footer>
  </div>
</body>
</html>
