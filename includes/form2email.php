<?php

/**
 * Extracts web form fields' values and sends it as HMTL email.
 *
 * @author Ante Tomas
 */

// initialize email parameters 
$to = "marijan.boljar@infobip.com";
$subject = "Booking Form Submission";
$headers = "From: tomas.ante@gmail.com\r\n";
$headers .= "BCC: ante.tomas@infobip.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

// parse reservation value from comma separated reservation string
$reservation_string = strip_tags($_POST['reservation']);
$reservation_array = explode(',', $reservation_string);
$reservation = $reservation_array[1]; 

// create HTML structure and fill it with form fields' values
$message = "<html><body>";
$message .= "<table rules='all' style='border-color: #666;' cellpadding='10'>";
$message .= "<tr><td><strong>First Name:</strong> </td><td>" . strip_tags($_POST['firstname']) . "</td></tr>";
$message .= "<tr><td><strong>Last Name:</strong> </td><td>" . strip_tags($_POST['lastname']) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
$message .= "<tr><td><strong>Phone Number:</strong> </td><td>" . strip_tags($_POST['phone']) . "</td></tr>";
$message .= "<tr><td><strong>Number of Guests:</strong> </td><td>" . $_POST['guests'] . "</td></tr>";
$message .= "<tr><td><strong>Date / Time:</strong> </td><td>" . strip_tags($_POST['date']) . " " . strip_tags($_POST['time']) . "</td></tr>";
$message .= "<tr><td><strong>Reservation:</strong> </td><td>" . $reservation . "</td></tr>";

// if additional reservation comment is received, include it, as well
if ($reservation === 'Other') {
   $message .= "<tr><td><strong>Additional comment:</strong> </td><td>" . strip_tags($_POST['other-reservation-comment']) . "</td></tr>";
}

$message .= "<tr><td><strong>Special Request:</strong> </td><td>" . $_POST['special'] . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

// on submit, send email
if (isset($_POST['submit'])) {
  mail($to, $subject, $message, $headers);
  echo "<div class='alert alert-success' role='alert'>Form Submitted Successfully</div>";
}
  
?>
	
	
