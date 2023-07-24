<?php require_once('../Connections/coonect.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['username'])) {
  $loginUsername=$_POST['username'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "adhome.php?value=true";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_coonect, $coonect);
  
  $LoginRS__query=sprintf("SELECT ad_idstaff, ad_pwd, ad_status FROM a_pro WHERE ad_idstaff='%s' AND ad_pwd='%s' AND ad_status='Aktif'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $coonect) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8" /> 

<title>Ekursus IPPTAR</title> 
 
<!-- Favicon --> 
<link rel="shortcut icon" href="favicon.ico" /> 
 
<!-- CSS -->

<link rel="stylesheet" href="public/style/reset.css" media="screen,projection" type="text/css" />
<link rel="stylesheet" href="public/style/style.css" media="screen,projection" type="text/css" />

<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
<!--[if lte IE 7]><script src="/public/js/browser_upgrade_notification.js"></script><![endif]-->
 

 
</head> 
 
<body>

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 

<div id="standard-page">
  <h1>Log MASUK PENTADBIR </h1>
		
		<div id="standard-wrapper">
		
		
		
				<form  id="standard-form" action="<?php echo $loginFormAction; ?>" method="POST">
            <label for="username">ID Pentadbir </label>
	        <input type="text" id="username" name="username" />
            <label for="password">Kata Laluan</label>
            <input type="password" id="password" name="password" />
            
           
	        <button type="submit" id="submit_login" name="submit_login" value="Login">Masuk</button>
    <div class="clear"></div>
	
</form>			
		</div>
			
	<div id="standard-footer">
	<p><a href="../index.php">IPPTAR EKURSUS &copy; 2011</a></p>
	</div>
</div>


</body>
</html>
