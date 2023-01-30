<!DOCTYPE html>
<html>
<head>
    <title>Applied Jobs</title>
    <link rel="shortcut icon" type="image/png" href="..\images\favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css\adminstyle.css">
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

if(isset($_POST['reject']))
{
	$id = $_GET['id']; 
	$con = mysqli_connect("localhost","root","","placement");
	$sql = "UPDATE appliedjob SET status = 'Rejected' WHERE id = '$id'";
	$result = mysqli_query($con,$sql);
	if($result == true)
	{
		$message = "Rejected Successfully";
		echo "<script>alert('$message'); window.location.href='adminhomepage.php';</script>";
	}
	else
	{
		echo(mysqli_error());
	}
}

if(isset($_POST['accept']))
{
	$id = $_GET['id']; 
	$con = mysqli_connect("localhost","root","","placement");
	$sql = "UPDATE appliedjob SET status = 'Accepted' WHERE id = '$id'";
	$result = mysqli_query($con,$sql);
	if($result == true)
	{
		$message = "Accepted Successfully";
		echo "<script>alert('$message'); window.location.href='adminhomepage.php';</script>";
	}
	else
	{
		echo(mysqli_error());
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
                <li>
                    <a href="adminhomepage.php"><i style="font-size:24px" class="fa fa-home"></i>&emsp;Dashboard</a></i>
                </li>
                <li>
                    <a href="searchcompany.php"><i style="font-size:24px" class="fa fa-search"></i>&emsp;Search Job</a>
                </li>
                <li>
                       <a href="createjobs.php"><i style="font-size:24px" class="fa fa-check-circle-o"></i>&emsp;Create Jobs</a>
                </li>
                <li class="active">
                    <a href="applied-jobs.php"><i style="font-size:24px" class="fa fa-envelope-o"></i>&emsp;Job Application</a>
                </li>	
        </ul>
        <form method="post"><button type="submit" name="logout" class="btn btn-info" style="margin: 10px 0 0 64px;">Logout</button></form>
	</div>
	
	


	<div class="mainpage">
        <div class="hd_title">Applied Jobs</div>
            <div class="main" style="padding-bottom: 520px">
                            <?php
								$con = mysqli_connect("localhost","root","","placement");
								$email = $_SESSION['email'];
								$sql = "SELECT * FROM appliedjob ORDER BY FIELD(status,'Pending',status)";
								$result = $con->query($sql);
								if($result->num_rows > 0)
								{
									while($row = $result->fetch_assoc()) 
									{
							?>
									<div class="col-xs-6 col-sm-6 col-lg-6">
									<div class="thumbnail" style="width: auto;">
                
               	 					<div class="caption">
					
										<h3><strong>Company Name:</strong> <?php echo $row['cname']; ?></h3>
                    					<p class="flex-text text-muted"><strong>Reqirements: </strong> <?php echo $row['cdesc']; ?>
														<br><strong>Student Name:</strong> <?php echo $row['studentfname']. " " .$row['studentlname']; ?>
														<br><strong>Email:</strong> <?php echo $row['studentemail']; ?> 
										</p>
                                        <h4><strong>Status: </strong><?php echo $row['status'];	?>
                                        <form method="post" action="applied-jobs.php?id=<?php echo $row['id'] ?>">
                                            <button class="btn btn-success" type="submit" name="accept">Accept Job</button>
                                            <button class="btn btn-danger pull-right" type="submit" name="reject">Reject Job</button>
                                        </form>
									</div>
									</div>
									</div>

							<?php
									}
								}
								else
								{
									
								}
							?>

            </div>
        
    </div>
</div>
		
</section>
<script src="../js/jquery.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>