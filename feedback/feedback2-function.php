<?php
#feedback
function usrFeedback()
{
	
	if($_POST['uname'] == "" || $_POST['emel'] == "" || $_POST['fon'] == "" || $_POST['comments'] == "" ){
 		print "<script language=\"Javascript\">";
		print "alert('Please fill in the required fields.');";
		print "history.go(-1);";
		print "</script>";
		exit;
	}

	$key = $_POST['kodrawak']; 
	$number = $_POST['vercode']; 
	
	# captcha start
	if(($number!=$key)||($number=="")){
		print "<script language=\"Javascript\">";
		print "alert('Verification code not valid. Please try again.');";
		print "history.go(-1);";
		print "</script>";
		exit;
	} else {
			
		$uname = $_POST['uname'];
		$emel = $_POST['emel'];
		$fon = $_POST['fon'];
		$comments = $_POST['comments'];
			
		#emel start
		ini_set("include_path", ".:/");
		require("class.phpmailer.php");
	
		$mail = new phpmailer();
		
		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = "mail.bernama.com";  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "project@bernama.com";  // SMTP username
		$mail->Password = "pR0ject2012"; // SMTP password
		
		$mail->From = $emel;
		$mail->FromName = $uname;
		$mail->AddAddress("abubakar@bernama.com", "Saya");
		
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
}
?>