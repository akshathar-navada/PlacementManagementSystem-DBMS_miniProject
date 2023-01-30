<!DOCTYPE html>
<html>
<head>
    <title>Create Job</title>
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
$_SESSION['message'] = '';
$con = mysqli_connect("localhost","root","","placement");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $cname = $_POST['cname'];
    $csalary = $_POST['csalary'];
    $cdesc = $_POST['cdesc'];
    $cexperience = $_POST['cexperience'];
    $ccity = $_POST['ccity'];
    $clogo_path = $con->real_escape_string('../upload/'.$_FILES['clogo']['name']);

    if(preg_match("!image!", $_FILES['clogo']['type']))
    {
        if (copy($_FILES['clogo']['tmp_name'], $clogo_path))
        {
            $_SESSION['cname'] = $cname;
            $_SESSION['csalary'] = $csalary; 
            $_SESSION['cdesc'] = $cdesc; 
            $_SESSION['cexperience'] = $cexperience; 
            $_SESSION['ccity'] = $ccity;  
            $_SESSION['clogo'] = $clogo_path;

            $sql="INSERT INTO company (cname,csalary,cdesc,cexperience,ccity,clogo)" 
            . "VALUES ('$cname','$csalary','$cdesc','$cexperience','$ccity','$clogo_path')";

            if ($con->query($sql) == true)
            {
                $message = "Job Posted Successfully";
                echo "<script type='text/javascript'> alert('$message'); window.location.href='adminhomepage.php'; </script>";
            }
            else
            {
                $_SESSION['message'] = "Job could not be added to database";
            }
        }
        else
        {
            $_SESSION['message'] = "File upload failed";
        }
    }
    else
    {
        $_SESSION['message'] = "Please only upload logo/image";
    }
}

if(!isset($_SESSION['name']))
{
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
                <li>
                    <a href="adminhomepage.php"><i style="font-size:24px" class="fa fa-home"></i>&emsp;Dashboard</a></i>
                </li>
                <li>
                    <a href="searchcompany.php"><i style="font-size:24px" class="fa fa-search"></i>&emsp;Search Job</a>
                </li>
                <li class="active">
                        <a href="createjobs.php"><i style="font-size:24px" class="fa fa-check-circle-o"></i>&emsp;Create Jobs</a>
                </li>
                <li>
                    <a href="applied-jobs.php"><i style="font-size:24px" class="fa fa-envelope-o"></i>&emsp;Job Application</a>
                </li>
                <form method="post"><button type="submit" name="logout" class="btn btn-info" style="margin: 10px 0 0 64px;">Logout</button></form>
		</ul>
	</div>


	<div class="mainpage">
        <div class="hd_title">New Job Post</div>
        
        <div class="main">
            <div class="createjobset">
            <form action="createjobs.php" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6 latest-job ">

                        <div class="form-group">
                            <label for="fname">Company Name</label>
                            <input type="text" class="form-control input-sm" name="cname" placeholder="Company Name" value="" required="">
                        </div>

                        <div class="form-group">
                            <label for="lname">City</label>
                            <input type="text" class="form-control input-sm"  name="ccity" placeholder="City" value="" required="">
                        </div>

                        <div class="form-group">
                            <label for="lname">Description</label>
                            <textarea type="text" class="form-control input-sm"  rows="4" name="cdesc" placeholder="Description" value="" required=""></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-flat btn-success">Create Job</button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 latest-job ">


                        <div class="form-group">
                            <label for="contactno">Salary</label>
                            <input type="text" class="form-control input-sm" name="csalary" placeholder="Salary in terms of yearly package" value="">
                        </div>

                        <div class="form-group">
                            <label for="qualification">Experience</label>
                            <input type="text" class="form-control input-sm" name="cexperience" placeholder="Experience" value="">
                        </div>                     

                        <div class="form-group">
                            <label>Upload Logo</label>
                            <input type="file" name="clogo" class="btn btn-default">
                        </div>

                    </div>
                </div>  
            </form>
        </div>
        </div>
    </div>
</div>
		
</section>
<script src="../js/jquery.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>