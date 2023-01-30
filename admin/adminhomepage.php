<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="shortcut icon" type="image/png" href="..\images\favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="..\images\favicon.ico" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'  type='text/css'>

</head>
<body>

<?php
session_start();

if(!isset($_SESSION['name'])){
    header("Location: ../homepage.php");
}


if(isset($_POST['logout'])){
    session_destroy();
    header("Location: ../homepage.php");
}


?>


	<section class="preloader">
		<div class="spinner">
			<span class="spinner-rotate"></span>		 
		</div>
	</section>
	<header>
			<div class="logo">
					<img src="..\images\bit-logo.png" alt="#HOME" >
			</div>
			<div class="title">Welcome to Admin Dashboard</div>
			<nav>
					<ul class="main-nav">
                    <li><span style="color: #949695;"><?php echo "Welcome ".$_SESSION['name']. "&emsp;&emsp;";?></span></li>
					</ul>
			</nav>
	</header>
<section>

<div style="width: 100%; height: auto;">

	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li class="active">
				<a href="adminhomepage.php"><i style="font-size:24px" class="fa fa-home"></i>&emsp;Dashboard</a></i>
			</li>
			<li>
				<a href="searchcompany.php"><i style="font-size:24px" class="fa fa-search"></i>&emsp;Search Job</a>
			</li>
			<li>
					<a href="createjobs.php"><i style="font-size:24px" class="fa fa-check-circle-o"></i>&emsp;Create Jobs</a>
			</li>
			<li>
				<a href="applied-jobs.php"><i style="font-size:24px" class="fa fa-envelope-o"></i>&emsp;Job Application</a>
			</li>		
        </ul>
        <form method="post"><button type="submit" name="logout" class="btn btn-info" style="margin: 10px 0 0 64px;">Logout</button></form>
	</div>
	<div class="mainpage">

			<div class="hd_title">Latest Jobs</div>
	<div class="container">
		<div class="adminset">
	<div class="flex-row row">
        
        <?php 
          $con = mysqli_connect("localhost","root","","placement");
          $sql = "SELECT * FROM company Order By cname ASC";
          $result = $con->query($sql);
          if($result->num_rows > 0) 
          {
            while($row = $result->fetch_assoc()) 
            {
			 ?>
			 <div class="col-xs-6 col-sm-6 col-lg-3">
			<div class="thumbnail ">
			<img src="<?php echo $row['clogo']; ?>" alt="companylogo">
                
                <div class="caption">
                    <h3><?php echo $row['cname']; ?></h3>
                    <p class="flex-text text-muted"><br>Salary: Rs.<?php echo $row['csalary']; ?>/Year
                                                    <br>Requirements: <?php echo $row['cdesc']; ?> 
                                                    <br>City: <?php echo $row['ccity']; ?> 
                                                    <br>Experience: <?php echo $row['cexperience']; ?> Years
                    </p>
                    
				</div>
				<!-- /.caption -->
			</div>
			<!-- /.thumbnail -->
		</div>
           
          <?php
              }
            }
          ?>


	</div>
	</div>
	</div>
	</div>

	
</div>

		
</section>

	<script src="../js/jquery.js"></script>
     <script src="../js/custom.js"></script>
</body>

</html>