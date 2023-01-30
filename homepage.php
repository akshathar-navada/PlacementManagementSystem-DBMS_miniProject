<!DOCTYPE html>
<html lang="en">
<head>

     <title>Job Portal</title>
     <link rel="shortcut icon" type="image/png" href="images\favicon.ico"/>

     <link rel="stylesheet" href="css/otherdesign/bootstrap.min.css">
     <link rel="stylesheet" href="css/otherdesign/owl.carousel.css">
     <link rel="stylesheet" href="css/otherdesign/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/otherdesign/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/style.css">

</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <!-- <img src="images\logo.png" width="200px" height="60px"> -->
                    <img src="images/bit-logo.png" width="500px" height="100px">
                    
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="#home" class="smoothScroll">Home</a></li>
                         <li><a href="#about" class="smoothScroll">Achievers</a></li>
                         <li><a href="register.php" class="smoothScroll">Register</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- Home -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                         <div class="home-info">
                              <h1>WE HELP YOU TO GET YOUR DREAM COME TRUE</h1>
                              <div>
                                        <button type="button" onclick="location.href='adminlogin.php';" class="btn btn-primary btn-lg">Admin Login</button>
                                        <button type="button" onclick="location.href='studentlogin.php';" class="btn btn-primary btn-lg">Student Login</button>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="testimonial-image"></div>
                    </div>

                    <div class="col-md-6 col-sm-12">
                         <div class="testimonial-info">

                              <div class="owl-carousel owl-theme">

                                   <div class="item">
                                        <div class="section-title">
                                             <h1>Vishal G</h1>
                                        </div>
                                        <h3>Pursuing B.Tech Engineering from Bangalore Institute Of Technology 6th Semester.<br>Job Offer: Rs.20,00,000/Year<br>Enrollment No: 1BI20CS90</h3>
                                   </div>

                                   <div class="item">
                                        <div class="section-title">
                                             <h1>Krithika Sharma</h1>
                                        </div>
                                        <h3>Pursuing B.Tech Engineering from Bangalore Institute Of Technology 6th Semester.<br>Job Offer: Rs.17,00,000/Year<br>Enrollment No: 1BI20CS010</h3>
                                   </div>

                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>



     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                    <div class="copyright-text col-md-12 col-sm-12">
                         <div class="col-md-6 col-sm-6">
                              <p>BANGALORE INSTITUTE OF TECHNOLOGY</p>
                         </div>
                    </div>

               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>