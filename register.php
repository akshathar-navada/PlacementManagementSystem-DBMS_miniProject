<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="shortcut icon" type="image/png" href="images\favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="css\style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="..\images\favicon.ico" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'  type='text/css'>

</head>
<body class="loginbody">
        <a href="homepage.php"><i class="fa fa-home" style="font-size:48px;color: rgba(193, 255, 226, 0.856);margin: 20px 0 0 30px;"></i></a>
        <section class="preloader">
                <div class="spinner">
                    <span class="spinner-rotate"></span>		 
                </div>
        </section>


	<div class="mainpageregister">
            <div class="title">
                <h1>Register as a Student</h1>
            </div>
            <form action="" method="post" enctype="multipart/form-data" name="form" ">

            <?php
 $fnameErr = $lnameErr = $addressErr = $cityErr = $contactErr = $qualificationErr = $streamErr = $skillsErr = $aboutErr = $stateErr =  $emailErr = $passErr =  "";
 $fname = $lname = $address = $city = $contact = $qualification = $stream = $skills = $about = $state =  $email = $password = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
        $email = $_POST["email"];
        if (empty($_POST["email"])) 
        {
            $emailErr = "*Email is required";
        }else
        { 
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))  
            {
                $emailErr = "*Invalid email format"; 
            }
        }
        if(empty($_POST["fname"]))
        {
            $fnameErr = "*First name is required";
        }else
        {
            $fname = $_POST['fname'];
        }
        if(empty($_POST["lname"]))
        {
            $lnameErr = "*Last name is required";
        }else
        {
            $lname = $_POST['lname'];
        }
        if(empty($_POST["address"]))
        {
            $addressErr = "*Address is required";
        }else
        {
            $address = $_POST['address'];
        }
        if(empty($_POST["city"]))
        {
            $cityErr = "*City is required";
        }else
        {
            $city = $_POST['city'];
        }
        if(empty($_POST["contact"]))
        {
            $contactErr = "*Contact is required";
        }else
        {
            $contact = $_POST['contact'];
            if(preg_match("/^[0-9]$/", $_POST['contact']))
            {
                $contactErr = "*Contact number is not valid";
            }
        }
        if(empty($_POST["qualification"]))
        {
            $qualificationErr = "*Qualification is required";
        }else
        {
            $qualification = $_POST['qualification'];
        }
        if(empty($_POST["stream"]))
        {
            $streamErr = "*Stream is required";
        }else
        {
            $stream = $_POST['stream'];
        }
        if(empty($_POST["skills"]))
        {
            $skillsErr = "*Skills is required";
        }else
        {
            $skills = $_POST['skills'];
        }
        if(empty($_POST["about"]))
        {
            $aboutErr = "*About is required";
        }else
        {
            $about = $_POST['about'];
        }
        if(empty($_POST["state"]))
        {
            $stateErr = "*State is required";
        }else
        {
            $state = $_POST['state'];
        }
        if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $_POST['password']))
        {
            $passErr = "*Passsword is not valid";
        }
        else
        {
            if(isset($_POST['password']) && isset($_POST['email']) && $_POST['password']!="" && $_POST['email']!="" )
            {
                $password = $_POST['password'];
                $con=mysqli_connect("localhost","root","","placement");
                // Check connection
                if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
         
                $sql="INSERT INTO student (fname,lname,email,password,address,city,contact,qualification,stream,skills,about,state)" 
            . "VALUES ('$fname','$lname','$email','$password','$address','$city','$contact','$qualification','$stream','$skills','$about','$state')";
                if ($con->query($sql) == true)
                {
                    $message = "Registered Successfully";
                    echo "<script type='text/javascript'> alert('$message'); window.location.href='homepage.php';</script>";
                }
                else
                {
                    echo "Error description: " . mysqli_error($con);
                    $message = "Could not insert data in database";
                    echo "<script type='text/javascript'> alert('$message'); </script>";
                }
            }
        }
    }
?>
                <div class="row">

                    <div class="col-md-6 latest-job ">

                        <div class="form-group">
                            <label for="fname">First Name</label> <div style="color: red;float: right;"> <?php echo $fnameErr;?></div>
                            <input type="text" class="form-control input-sm" name="fname" placeholder="First Name" value="<?php echo isset($_POST["fname"]) ? $_POST["fname"] : ''; ?>">
                        </div>

                        <div class="form-group"> 
                            <label for="lname">Last Name</label> <span style="color: red;float: right;"> <?php echo $lnameErr;?></span>
                            <input type="text" class="form-control input-sm" id="lname" name="lname" placeholder="Last Name" value="<?php echo isset($_POST["lname"]) ? $_POST["lname"] : ''; ?>" >
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label> <span style="color: red;float: right;"> <?php echo $emailErr;?></span>
                            <input type="email" class="form-control input-sm" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" >
                        </div>

                        <div class="form-group">
                                <label for="password">Password</label> <span style="color: red;float: right;"> <?php echo $passErr;?></span>
                                <input type="password" class="form-control input-sm" id="password" name="password" placeholder="Password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label> <span style="color: red;float: right;"> <?php echo $addressErr;?></span>
                            <textarea id="address" name="address" class="form-control input-sm" rows="4" placeholder="Address"><?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label> <span style="color: red;float: right;"> <?php echo $cityErr;?></span>
                            <input type="text" class="form-control input-sm" id="city" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>" placeholder="city">
                        </div>

                        
                    </div>
                    
                    <div class="col-md-6 latest-job ">


                        <div class="form-group">
                            <label for="contactno">Contact Number</label> <span style="color: red;float: right;"> <?php echo $contactErr;?></span>
                            <input type="text" class="form-control input-sm" id="contactno" name="contact" placeholder="Contact Number" value="<?php echo isset($_POST["contact"]) ? $_POST["contact"] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="qualification">Highest Qualification</label> <span style="color: red;float: right;"> <?php echo $qualificationErr;?></span>
                            <input type="text" class="form-control input-sm" id="qualification" name="qualification" placeholder="Highest Qualification" value="<?php echo isset($_POST["qualification"]) ? $_POST["qualification"] : ''; ?>">
                        </div>

                        <div class="form-group">
                            <label for="stream">Stream</label> <span style="color: red;float: right;"> <?php echo $streamErr;?></span>
                            <input type="text" class="form-control input-sm" id="stream" name="stream" placeholder="Stream" value="<?php echo isset($_POST["stream"]) ? $_POST["stream"] : ''; ?>">
                        </div>
                      
                        <div class="form-group">
                            <label>Skills</label> <span style="color: red;float: right;"> <?php echo $skillsErr;?></span>
                            <textarea class="form-control input-sm" id="skills" rows="2" name="skills" placeholder="Skills" ><?php echo isset($_POST["skills"]) ? $_POST["skills"] : ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>About Me</label> <span style="color: red;float: right;"> <?php echo $aboutErr;?></span>
                            <textarea class="form-control input-sm" rows="3" id="aboutme" name="about" placeholder="About me"><?php echo isset($_POST["about"]) ? $_POST["about"] : ''; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="state">State</label> <span style="color: red;float: right;"> <?php echo $stateErr;?></span>
                            <input type="text" class="form-control input-sm" id="state" name="state" placeholder="state" value="<?php echo isset($_POST["state"]) ? $_POST["state"] : ''; ?>">
                        </div>

                    </div>
                </div>  
                <div class="form-group register">
                    <button type="submit" class="btn btn-flat btn-success" >Register</button>
                </div>
            </form>

            
    </div>
		
</section>

    
<script src="js/jquery.js"></script>
<script src="js/custom.js"></script>
</body>

</html>