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
if(isset($_POST['update']))
{
    if($_POST['email'] == $_SESSION['email'])
    {
        if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$_POST['password']))
        {
            $fname = $_POST['fname']; $lname = $_POST['lname']; $password = $_POST['password']; $address = $_POST['address']; $city = $_POST['city']; $contact = $_POST['contact']; $qualification = $_POST['qualification']; $stream = $_POST['stream']; $skills = $_POST['skills']; $about = $_POST['about']; $state = $_POST['state']; $email = $_POST['email'];
            $con = mysqli_connect("localhost","root","","placement");
            $sql = "UPDATE student SET fname = '$fname', lname = '$lname', password = '$password', address = '$address', city = '$city', contact = '$contact', qualification = '$qualification', stream = '$stream', skills = '$skills', about = '$about', state = '$state' WHERE email = '$email'";
            if ($con->query($sql) == true)
            {
                $sql="SELECT * FROM student WHERE email='$email'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $_SESSION['fname']=$row['fname']; $_SESSION['email']=$row['email']; $_SESSION['password']=$row['password']; $_SESSION['address']=$row['address']; $_SESSION['city']=$row['city']; $_SESSION['contact']=$row['contact'];
                $_SESSION['lname']=$row['lname']; $_SESSION['qualification']=$row['qualification']; $_SESSION['stream']=$row['stream']; $_SESSION['skills']=$row['skills']; $_SESSION['about']=$row['about']; $_SESSION['state']=$row['state'];
                $message = "Updated Successfully";
                echo "<script type='text/javascript'> alert('$message'); window.location.href='studenthomepage.php'; </script>";
            }
            else
            {
                echo mysqli_error($con);
                // $message = "Error Updating Profile";
                // echo "<script type='text/javascript'> alert('$message'); window.location.href='studenthomepage.php'; </script>";
            }
        }else{ $message = "Enter valid password";
            echo "<script type='text/javascript'> alert('$message'); window.location.href='profile.php'; </script>";}
        
    }
    else
    {
        echo "Email not matched";
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
			<li class="active">
					<a href="profile.php"><i style="font-size:24px" class="fa fa-list"></i>&emsp;Profile</a>
			</li>
			<li>
				<a href="searchcompany.php"><i style="font-size:24px" class="fa fa-search"></i>&emsp;Search Job</a>
			</li>
			<li>
					<a href="applied-jobs.php"><i style="font-size:24px" class="fa fa-check-circle-o"></i>&emsp;Applied Jobs</a>
			</li>
        </ul>
        <form method="post"><button type="submit" name="logout" class="btn btn-info" style="margin: 10px 0 0 64px;">Logout</button></form>
	</div>


	<div class="mainpage">
        <div class="hd_title">My Profile</div>
        
        <div class="main">
            <i style="color: rgb(0,0,0,0.5);border-radius: 0px 5px 5px 0px;padding: 8px;position: absolute;margin: 233px 0 0 479px;z-index: 1;" class="fa fa-eye pull-right" id="eye"></i>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-6 latest-job ">

                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input type="text" class="form-control input-sm" name="fname" placeholder="First Name" value="<?php echo $_SESSION['fname']?>" required="">
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input type="text" class="form-control input-sm"  name="lname" placeholder="Last Name" value="<?php echo $_SESSION['lname']?>" required="">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control input-sm" name="email" placeholder="Email" value="<?php echo $_SESSION['email']?>" readonly>
                        </div>

                        <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password" value="<?php echo $_SESSION['password']?>">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control input-sm" rows="5" placeholder="Address"><?php echo $_SESSION['address']?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control input-sm" name="city" value="<?php echo $_SESSION['city']?>" placeholder="city">
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6 latest-job ">


                        <div class="form-group">
                            <label for="contactno">Contact Number</label>
                            <input type="text" class="form-control input-sm"  name="contact" placeholder="Contact Number" value="<?php echo $_SESSION['contact']?>">
                        </div>

                        <div class="form-group">
                            <label for="qualification">Highest Qualification</label>
                            <input type="text" class="form-control input-sm" name="qualification" placeholder="Highest Qualification" value="<?php echo $_SESSION['qualification']?>">
                        </div>

                        <div class="form-group">
                            <label for="stream">Stream</label>
                            <input type="text" class="form-control input-sm" name="stream" placeholder="Stream" value="<?php echo $_SESSION['stream']?>">
                        </div>
                      
                        <div class="form-group">
                            <label>Skills</label>
                            <textarea class="form-control input-sm" rows="2" name="skills" placeholder="Skills"><?php echo $_SESSION['skills']?></textarea>
                        </div>

                        <div class="form-group">
                            <label>About Me</label>
                            <textarea class="form-control input-sm" rows="4" name="about" placeholder="About me"><?php echo $_SESSION['about']?></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control input-sm" name="state" placeholder="state" value="<?php echo $_SESSION['state']?>">
                        </div>

                        <div class="form-group" style="float:right;">
                            <button type="submit" name="update" class="btn btn-flat btn-success">Update Profile</button>
                        </div>

                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
		
</section>
<script src="../js/jquery.js"></script>
<script src="../js/custom.js"></script>
<script>
    var password = document.getElementById('password');
    var eye = document.getElementById('eye');
    eye.addEventListener('click',togglePass);
    function togglePass()
    {
        eye.classList.toggle('active');
        (password.type == 'password') ? password.type = 'text' :
        password.type = 'password';
    }
</script>
</body>

</html>