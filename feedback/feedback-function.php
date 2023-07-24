<?php
#feedback
function usrFeedback()
{
	$uname = $_POST['uname'];
	$emel = $_POST['emel'];
	$fon = $_POST['fon'];
	$comments = $_POST['comments'];
		
	#emel start
	ini_set("include_path", ".:/");
	require("class.phpmailer.php");
	
	$mail = new phpmailer();
	
	$mail->Mailer = "smtp";
	$mail->Host = "ssl://smtp.gmail.com";
	$mail->Port = 465;
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->Username = "encikbakar@gmail.com"; // SMTP username
	$mail->Password = "8akAr4b2"; // SMTP password
				
	$mail->From = "encikabou@gmail.com";
	$mail->FromName = "Administrator";
	$mail->AddAddress($emel, "");
	
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	
	$mail->IsHTML(true);                                  // set email format to HTML
	
	$mail->Subject = "Subject : IPPTAR Feedback";
	
	$mail_bod .="Name<br>".$uname."<br><br>";
	$mail_bod .="Email<br>".$emel."<br><br>";
	$mail_bod .="Phone No<br>".$fon."<br><br>";
	$mail_bod .="Comments<br>".$comments."<br>";
	
	$mail->Body    = $mail_bod;
	
	if(!$mail->Send())
	{
		   
	print "
	<script language='JavaScript'>
	alert ('Error! Message could not be sent. Please try again.');
	</script>
	";

	} else {
		
	print "
	<script language='JavaScript'>
	alert ('Success! We will respond within 3 working days upon submission of your feedback. Thank you.');
	</script>
	";
			
	print "<META HTTP-EQUIV = 'Refresh' Content = '0; URL =feedback.php'>";
		
	}
	#emel end	
}
?>