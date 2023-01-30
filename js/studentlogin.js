function myFunction() 
		{
				var em = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    			var pass  = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/;
	
				if (em.test(email.value) == false) 
				{
					alert('Invalid Email Address or password');
					return false;
				}

    			if(pass.test(password.value) == false)
				{
					alert("Invalid Password");
        			return false;
    			}
				else{
					window.location.href = "student/studenthomepage.html";
					return true;
				}		
		}