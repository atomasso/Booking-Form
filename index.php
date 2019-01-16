<!doctype html>
<!-- Bootstrap booking form that sends an email with on successful submission -->
<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Booking Form</title>
  <meta name="description" content=">Bootstrap Booking Form">
  <meta name="author" content="Ante Tomas">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
  <link rel="stylesheet" href="lib/tel/css/intlTelInput.css">  <!-- International Tel CSS -->  
  <link rel="stylesheet" href="lib/datepicker/datepicker.min.css">  <!-- Datepicker CSS -->  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> <!-- Select2 CSS -->   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">  <!-- Timepicker CSS -->
  <link rel="stylesheet" href="css/styles.css?v=1.0">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- jQuery -->
  <script src="lib/tel/js/intlTelInput.js"></script>  <!-- International Tel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script> <!-- Bootstrap Form Validation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>  <!-- Timepicker JS -->   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> <!-- Select2 JS -->
  <script src="lib/datepicker/datepicker.min.js"></script>  <!-- Datepicker JS -->   
      
</head>

<body>

  <div class="container">
    <!-- Content here -->
	
	<?php include "includes/form2email.php" ?>
	
	
    <form class="form-horizontal" method="post" action="" novalidate>  <!-- Form start -->
	   <div class="row">
   	     <h1>Booking Form</h1> 
      </div>
	  <div class="form-group row required">  <!-- Name section start-->
        <label for="name" class="col-sm-4 col-form-label">Full Name:</label>
        <div class="col-sm-4 parents">
          <input type="text" class="form-control is-invalid" id="firstname" name="firstname" aria-describedby="firstNameHelpBlock" value="<?php if(isset($_POST['firstname'])) echo $_POST['firstname']; ?>" required>
          <small id="firstNameHelpBlock" class="form-text text-muted">
            First Name
          </small>		  
        </div>
		<div class="col-sm-4 parents">
          <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="lastNameHelpBlock" value="<?php if(isset($_POST['lastname'])) echo $_POST['lastname']; ?>" required>
		  <small id="firstNameHelpBlock" class="form-text text-muted">
            Last Name
          </small>			   
        </div>
      </div>  <!-- Name section end -->
      <div class="form-group row required">  <!-- Email section start -->
        <label for="email" class="col-sm-4 col-form-label">E-mail:</label>
        <div class="col-sm-8 parents">
          <input type="email" class="form-control" id="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> 
        </div>
      </div> <!-- Email section end -->
      <div class="form-group row required">  <!-- Phone section start -->
        <label for="phone" class="col-sm-4">Phone Number:</label>
        <div class="col-sm-8 parents">
          <input type="tel" class="form-control" id="phone" name="phone">		 
        </div>
      </div>   <!-- Phone section end -->
	  <div class="form-group row required">  <!-- Guest number section start -->
        <label for="guests" class="col-sm-4 col-form-label">Number of Guests:</label>
        <div class="col-sm-8 parents">
          <input type="number" class="form-control" id="guests" name="guests" min="0" value="<?php if(isset($_POST['guests'])) echo $_POST['guests']; ?>">
        </div>
      </div> <!-- Guest number section end -->	    
	  <div class="form-group row required"> <!-- Date/time section start -->
        <label for="name" class="col-sm-4 col-form-label">Date / Time:</label>
        <div class="col-sm-6 parents">
          <input type="text" class="form-control is-invalid" id="date" name="date" data-toggle="datepicker" aria-describedby="dateHelpBlock" required>
          <small id="dateHelpBlock" class="form-text text-muted">
            Date
          </small>		  
        </div>
		<div class="col-sm-2 parents">
          <input type="" class="form-control timepicker" id="time" name="time" aria-describedby="timeHelpBlock" required>
		  <small id="timeHelpBlock" class="form-text text-muted">
            Time
          </small>	
        </div>
      </div> <!-- Date/time section end -->
	  <div class="form-group row required" id="reservation-section"> <!-- Reservation section start -->
        <label for="reservation" class="col-sm-4 col-form-label">Reservation Type:</label>
        <div class="col-sm-8">
		  <select class="form-control" id="reservation" name="reservation">
		    <option value=",Dinner">Dinner</option>
		    <option value="fa-birthday-cake,Birthday">Birthday / Anniversary</option>
		    <option value="fa-moon,Nightlife">Nightlife</option>
		    <option value="fa-user-secret,Private">Private</option>
		    <option value="fa-heart,Wedding">Wedding</option>
		    <option value="fa-suitcase,Corporate">Corporate</option>
		    <option value="fa-star,Other">Other</option>			
		  </select>		  
        </div>		
      </div>  <!-- Reservation section end -->
	  <div class="form-group row"> <!-- Special request section start -->
       <label for="special" class="col-sm-4 col-form-label">Any Special Request?</label>
       <div class="col-sm-8">
         <textarea class="form-control" id="special" name="special"></textarea>
       </div>
      </div> <!-- Special request section end -->
      <div class="form-group row"> <!-- Submit section end -->
        <div class="col-sm-12">
          <button type="submit" class="btn btn-success center-block" name="submit">Submit <i class="fas fa-arrow-right"></i></button>
        </div>
      </div> <!-- Submit section end -->    
    </form> <!-- Form end -->
	  
  </div>
  
 <script src="js/main.js"></script>  <!-- Include email sending logic -->   

</body>

</html>