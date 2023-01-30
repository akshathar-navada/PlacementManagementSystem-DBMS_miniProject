<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="shortcut icon" type="image/png" href="..\images\favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="..\images\favicon.ico" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'  type='text/css'>

</head>
<body>

<?php
session_start();

if(!isset($_SESSION['fname'])){
    header("Location: ../homepage.php");
}


if(isset($_POST['logout'])){
    session_destroy();
    header("Location: ../homepage.php");
}

if(isset($_POST['apply']))
{
	$con = mysqli_connect("localhost","root","","placement");
	$cid = $_GET['id'];
	$semail = $_SESSION['email'];
	$query = "SELECT * FROM appliedjob WHERE cid = '". $cid ."' AND studentemail = '". $semail ."'";
	$result = $con->query($query);
	if ($result->num_rows > 0)
	{
    	$message = "Already applied to that job";
		echo "<script type='text/javascript'> alert('$message'); window.location.href='applied-jobs.php'; </script>";
	}
	else
	{
		$sql1 = "SELECT * FROM company WHERE id = '$cid'";
		$result = $con->query($sql1);
		if($result->num_rows > 0)
		{
			while($row = $result->fetch_assoc()) 
			{
				$cname = $row['cname']; $cdesc = $row['cdesc']; 
			}
			$studentfname = $_SESSION['fname']; $studentlname = $_SESSION['lname']; $studentemail = $_SESSION['email']; 
			$sql="INSERT INTO appliedjob (cname,studentfname,studentlname,studentemail,status,cdesc,cid)" 
				. "VALUES ('$cname','$studentfname','$studentlname','$studentemail','Pending','$cdesc','$cid')";
			if ($con->query($sql) == true)
			{
				$message = "Applied Successfully";
				echo "<script type='text/javascript'> alert('$message'); window.location.href='studenthomepage.php'; </script>";
			}
			else
			{
				$_SESSION['message'] = "Not applied";
			}
		}
		else
		{
			echo(mysqli_error($con));
		}
	}	
	
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
			<div class="title">Welcome to Student Dashboard</div>
			<nav>
					<ul class="main-nav">
                    <li><span style="color: #949695;"><?php echo "Welcome ".$_SESSION['fname']. " " .$_SESSION['lname']. "&emsp;&emsp;";?></span></li>
					</ul>
			</nav>
	</header>
<section>

<div style="width: 100%; height: auto;">

	<div id="sidebar-wrapper">
		<ul class="sidebar-nav">
			<li>
				<a href="studenthomepage.php"><i style="font-size:24px" class="fa fa-home"></i>&emsp;Dashboard</a></i>
			</li>
			<li>
					<a href="profile.php"><i style="font-size:24px" class="fa fa-list"></i>&emsp;Profile</a>
			</li>
			<li class="active">
				<a href="searchcompany.php"><i style="font-size:24px" class="fa fa-search"></i>&emsp;Search Job</a>
			</li>
			<li>
					<a href="applied-jobs.php"><i style="font-size:24px" class="fa fa-check-circle-o"></i>&emsp;Applied Jobs</a>
			</li>	
        </ul>
        <form method="post"><button type="submit" name="logout" class="btn btn-info" style="margin: 10px 0 0 64px;">Logout</button></form>
	</div>


	<div class="mainpage">
        <div class="hd_title">Search Job</div>
        
        <div class="main">
            <div class="searchset">
            <form action="searchcompany.php" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6">

                        <div class="form-group search-area">
                            <label for="fname" style="display: block; text-align: center;">Search Company </label>
                            <input type="text" class="form-control input-sm" id="fname" name="search" placeholder="Enter Company Name " required="">
                        </div> 
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group search-btn">
                            <button type="submit" name="submit" class="btn btn-flat btn-success">Search</button>
                        </div>
                    </div>
                </div> 
            </form>
            </div>
        </div>

        <div class="container">
            <div class="flex-row row">

            <?php 
            $message = NULL;
            if(empty($_POST['search']))
            {
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
                    <form method="post" action="studenthomepage.php?id=<?php echo $row["id"]; ?>">
					<button type="submit" name="apply" class="btn btn-primary" >Apply Job</button>
				</form>
				</div>
				<!-- /.caption -->
			</div>
			<!-- /.thumbnail -->
		</div>
           
          <?php
              }
            }
            }
            else if(isset($_POST['submit']))
            {
                $con = mysqli_connect("localhost","root","","placement");
                $search = $con->real_escape_string($_POST['search']);

                $sql = "SELECT * FROM company WHERE cname LIKE '%$search%'";
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
                            <form method="post" action="studenthomepage.php?id=<?php echo $row["id"]; ?>">
					            <button type="submit" name="apply" class="btn btn-primary" >Apply Job</button>
				            </form>
				        </div>
			        </div>
		            </div>
           
          <?php
              }
            }
            else
            {
                echo "No Match";
            }
        }
          ?>                  
                    

            </div>
        </div>



    </div>
</div>
		
</section>
<script src="../js/jquery.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>