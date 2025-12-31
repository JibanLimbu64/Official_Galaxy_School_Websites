<?php
function get_navbar($activePage = '') {
    function isActive($page, $activePage) {
        return $page === $activePage ? ' active' : '';
    }

    echo '
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-galaxy fixed-top">
      <div class="container">
        <a class="navbar-brand w-100% h-100%" href="#">
          <img src="images/logo.png" alt="Galaxy Academy" class="school-logo">
          <span>Galaxy Academy</span> 
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse w-100" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link'.isActive('home', $activePage).'" href="Index.php"><i class="fa-solid fa-house"></i> Home</a></li>
            <li class="nav-item"><a class="nav-link'.isActive('about', $activePage).'" href="About.php"><i class="fa-solid fa-address-card"></i> About</a></li>
            <li class="nav-item"><a class="nav-link'.isActive('news', $activePage).'" href="News.php"><i class="fa-solid fa-newspaper"></i> News</a></li>
            <li class="nav-item"><a class="nav-link'.isActive('admission', $activePage).'" href="admission.php"><i class="fa-solid fa-newspaper"></i> Admission</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle'.isActive('class', $activePage).'" href="#" id="programsDropdown" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-circle-info"></i> More</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="music.php"><i class="fa-solid fa-music"></i> Music Class</a></li>
                <li><a class="dropdown-item" href="Teachers.php"><i class="fa-solid fa-chalkboard-user"></i> Teachers</a></li>
                <li><a class="dropdown-item" href="video.php"><i class="fa-solid fa-video"></i> Videos</a></li>
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link'.isActive('gallery', $activePage).'" href="Image.php"><i class="fa-regular fa-image"></i> Gallery</a></li>
            <li class="nav-item"><a class="nav-link'.isActive('contact', $activePage).'" href="Contact.php"><i class="fa-solid fa-envelope"></i> Contact</a></li>
             <li class="nav-item"><a class="nav-link'.isActive('contact', $activePage).'" href="neuro/neuro.php"><i class="fa-solid fa-arrow-up-right-from-square"></i> Try NeuroNexus</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle'.isActive('join', $activePage).'" href="#" id="joinDropdown" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user"></i> Join Us</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="authentication/Login.php"><i class="fa-solid fa-right-to-bracket"></i> Log In</a></li>
                <li><a class="dropdown-item" href="authentication/Singup.php"><i class="fa-solid fa-user-plus"></i> Create an account</a></li>
               
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    ';
}
function get_footer() {

  ?>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4 mb-4">
          <h5>Galaxy Academy</h5>
          <p>
            <strong>Galaxy Academy</strong> is a private school located in Letang Municipality, Morang district, within
            Koshi province.
            The school provides education from Early Childhood Development (ECD) to Grade 10.
            As per the 2081 IEMIS report published by the Center for Education and Human Resource Development, Galaxy
            Academy has 213 enrolled students.
          </p>
          <div class="social-icons">
            <a href="https://www.facebook.com/galaxy2053"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.facebook.com/galaxy2053"><i class="fab fa-twitter"></i></a>
            <a href="https://www.facebook.com/galaxy2053"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/@piyushkanchha6621"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-md-2 mb-4">
          <div class="footer-links">
            <h5>Quick Links</h5>
            <a href="Index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="#">Programs</a>
            <a href="admission/admission.php">Admissions</a>
            <a href="Gallery.php">Gallery</a>
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="footer-links">
            <h5>Programs</h5>
            <a href="#">Nursery</a>
            <a href="#">Primary (1-5)</a>
            <a href="#">Secondary (6-10)</a>
            <a href="#">Music Program</a>
            <!-- <a href="#">Extracurricular</a> -->
          </div>
        </div>
        <div class="col-md-3 mb-4">
          <div class="footer-links">
            <h5>Contact</h5>
            <a href="#">Location</a>
            <a href="#">Phone</a>
            <a href="#">Email</a>
            <!-- <a href="#">School Hours</a> -->
            <!-- <a href="#">Staff Directory</a> -->
          </div>
        </div>
      </div>
      <hr style="background: #555;">
      <div class="row">
        <div class="col-md-12 text-center">
          <p class="mb-0">&copy; 2025 Galaxy Academy. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>
  <?php
}
?>
