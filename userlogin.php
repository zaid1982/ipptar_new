<?php require_once('Connections/coonect.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = addslashes($_GET['accesscheck']);
}

if (isset($_POST['kp'])) {
  $loginUsername            = addslashes($_POST['kp']);
  $password                 = $_POST['password'];
  $MM_fldUserAuthorization  = "";
  $MM_redirectLoginSuccess  = "usercp/kursusaktif.php?idcat=0";
  $MM_redirectLoginFailed   = "userlogin.php?pass=false";
  $MM_redirecttoReferrer    = false;
  mysql_select_db($database_coonect, $coonect);
  
  $LoginRS__query=sprintf("SELECT u_idnum, u_pwd FROM u_profile WHERE u_idnum='%s' AND u_pwd='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $coonect) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_User']  = $loginUsername;
    $_SESSION['MM_UserG'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = addslashes($_SESSION['PrevUrl']);	
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
 

 
<style type="text/css">
<!--
.style1 {color: #333333}
.style5 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head> 
 
<body>

<noscript><p>Looks like you have Javascript disabled, you must enable it to use this website properly.</p></noscript> 

<div id="standard-page">
  <h1>SILA Log MASUK  </h1>
		
		<div id="standard-wrapper">
          <form  id="standard-form" action="<?php echo $loginFormAction; ?>" method="POST">
            <? $value = addslashes($_GET['pass']);
			if ($value=="false"){
			?>
              <label for="site-address"><span class="style2 style1"><span class="style4 style5">No. Kad Pengenalan atau Kata Laluan salah. Sila cuba lagi.</span></span></label>
            <? }?>
<label for="username">No Kad Pengenalan </label>
            <input type="text" id="kp" name="kp" />
            <label for="password">Kata Laluan</label>
            <input type="password" id="password" name="password" />
            <button type="submit" id="submit_login" name="submit_login" value="Login">Masuk</button>
            <div class="clear"></div>
          </form>
  </div>
		<div id="standard-footer">
	<p><span class="clear style1"><a href="daftar/index.php">Belum mendaftar? Sila daftar di sini dahulu untuk mencipta akaun anda. </a></span></p>
  </div>
</div>


</body>
</html>
