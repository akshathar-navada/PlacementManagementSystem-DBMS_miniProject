var ck_fname = /^[A-Za-z0-9]{3,20}$/;
    var ck_lname = /^[A-Za-z0-9 ]{3,20}$/;
    var ck_mob = /^\d{10}$/;
    var ck_high = /^[A-Za-z0-9 ]{1,10}$/;
    var ck_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
    var ck_stream = /^[A-Za-z ]{1,10}$/;
    var ck_password =  /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
    var ck_skills = /^[A-Za-z ]{3,20}$/;
    var ck_address = /^[A-Za-z0-9 ]{3,20}$/;
    var ck_about = /^[A-Za-z0-9 ]{3,20}$/;
    var ck_city = /^[A-Za-z ]{3,20}$/;
    var ck_state = /^[A-Za-z ]{3,20}$/;
    
    function validate(form){

    var fname = form.fname.value;
    var lname = form.lname.value;
     var email = form.email.value;
     var password = form.password.value;
     var address = form.address.value;
     var city = form.city.value;
     var address = form.address.value;
     var contactno = form.contactno.value;
     var qualification = form.qualification.value;
     var stream = form.stream.value;
     var skills = form.skills.value;
     var aboutme = form.aboutme.value;
     var state = form.state.value;
      
      
     var errors = [];

     if (!ck_fname.test(fname)) {
      errors[errors.length] = "Enter Your valid First Name .";
     }

     if (!ck_lname.test(lname)) {
      errors[errors.length] = "Enter Your valid Last Name .";
     }
      
     if (!ck_email.test(email)) {
      errors[errors.length] = "You must enter a valid email address.";
     }

     if (!ck_mob.test(contactno)) {
      errors[errors.length] = "You must enter a valid Contact number";
     }

     if (!ck_high.test(qualification)) {
      errors[errors.length] = "You must enter a valid Qualification";
     }
     
     if (!ck_stream.test(stream)) {
      errors[errors.length] = "You valid Stream";
     }
    
     if (!ck_password.test(password)) {
      errors[errors.length] = "You must enter a valid Password min 6 char.";
     }

     if (!ck_skills.test(skills)) {
      errors[errors.length] = "You must enter skills.";
     }

     if (!ck_address.test(address)) {
      errors[errors.length] = "You must enter address";
     }

     if (!ck_about.test(aboutme)) {
      errors[errors.length] = "You must enter about you";
     }

     if (!ck_state.test(state)) {
      errors[errors.length] = "You must enter state";
     }

     if (!ck_city.test(city)) {
      errors[errors.length] = "You must enter city";
     }
     
     
     if (errors.length > 0) {
      reportErrors(errors);
      return false;
     }
    }
    
    function reportErrors(errors){
     var msg = "Please Enter Valide Data...\n";
     for (var i = 0; i<errors.length; i++) {
      var numError = i + 1;
      msg += "\n" + numError + ". " + errors[i];
     }
     alert(msg);
    }