<!DOCTYPE html>
<html class="login">
<head>
	<title>Login Page</title>
	<link rel="shortcut icon" type="image/png" href="images\favicon.ico"/>
 	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css\style.css">
</head>
<body class="loginbody">
		<a href="homepage.php"><i class="fa fa-home" style="font-size:40px;color: rgba(255, 195, 18, 0.7);margin: 20px 0 0 30px;"></i></a>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Student Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
                    <span onclick="javascript:location.href='https://www.facebook.com/profile.php?id=100006638052819'" ><i class="fab fa-facebook-square"></i></span>
					<span onclick="javascript:location.href='https://www.instagram.com/vishal_patel03/'"><i class="fab fa-instagram"></i></span>
					<span onclick="javascript:location.href='https://twitter.com/vishalpatel5197'"><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post">
				
				
				<?php
    $emailErr = "";
    $email = "";
    $passErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
        $email = $_POST["studentemail"];
        if (empty($_POST["studentemail"])) 
        {
            $emailErr = "Email is required";
        } 
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))  
        {
            $emailErr = "Invalid email format"; 
        }
        else if(empty($_POST["studentpassword"]))
        {
            $passErr = "Passsword is required";
        }
        else
        {
            if(isset($_POST['studentemail']) && $_POST['studentemail']!="")
            {
                $pwd = $_POST['studentpassword'];
                $con=mysqli_connect("localhost","root","","placement");
                // Check connection
                if (mysqli_connect_errno())
                {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                }
         
                $sql="SELECT * FROM student WHERE email='$email'";
                $result=mysqli_query($con,$sql);
         
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                $dbpwd = $row['password'];
         
                if($pwd==$dbpwd)
                {
                    //echo "Password match";
                    session_start();
                    $_SESSION['fname']=$row['fname']; $_SESSION['email']=$row['email']; $_SESSION['password']=$row['password']; $_SESSION['address']=$row['address']; $_SESSION['city']=$row['city']; $_SESSION['contact']=$row['contact'];
                    $_SESSION['lname']=$row['lname']; $_SESSION['qualification']=$row['qualification']; $_SESSION['stream']=$row['stream']; $_SESSION['skills']=$row['skills']; $_SESSION['about']=$row['about']; $_SESSION['state']=$row['state'];
                    header("Location: Student/studenthomepage.php");
                }
                else
                {
                    $message = "Email or Password is incorrect";
                    echo "<script type='text/javascript'> alert('$message'); </script>";	
                }
            }
        }
    }
?>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="Enter your Email" id="email" name="studentemail">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="Enter your Password" id="password" name="studentpassword"><i style="color: rgb(0,0,0,0.5);border-radius: 0px 5px 5px 0px;padding: 10px 5px 0 5px;background-color: white;" class="fa fa-eye" id="eye"></i>
					</div>
					<div style="color: white;font-size: 12px;">*Password should contain one number & special symbol</div><br>
					<div class="form-group">
						<button type="submit" class="btn float-right login_btn">Student Login</button>
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="register.php">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>

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