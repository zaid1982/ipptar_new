<?php 
#exit; 
header("Location: v2/index.php");
?>
<?php require_once('Connections/coonect.php'); ?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['kp'])) {
  $loginUsername=$_POST['kp'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "usercp/index.php";
  $MM_redirectLoginFailed = "index.php?pass=false";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_coonect, $coonect);
  
  $LoginRS__query=sprintf("SELECT u_idnum, u_pwd FROM u_profile WHERE u_idnum='%s' AND u_pwd='%s'",
    get_magic_quotes_gpc() ? $loginUsername : addslashes($loginUsername), get_magic_quotes_gpc() ? $password : addslashes($password)); 
   
  $LoginRS = mysql_query($LoginRS__query, $coonect) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_User'] = $loginUsername;
    $_SESSION['MM_UserG'] = $loginStrGroup;	      

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
<!--<meta HTTP-EQUIV="REFRESH" content="0; url=v2/index.php">-->
<meta charset="utf-8" />
<title>Sistem Permohonan Kursus IPPTAR</title>
<link href='http://fonts.googleapis.com/css?family=Economica:400,700|Open+Sans+Condensed:300,700|Oswald' rel='stylesheet' type='text/css'>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]--> 
<link rel="shortcut icon" href="favicon.ico" /> 
<link rel="stylesheet" href="css/style.css" media="screen,projection" type="text/css" />
<link rel="stylesheet" href="public/jquery.fancybox-1.3.1.css" media="screen,projection" type="text/css" />
<link rel="stylesheet" href="jquery/colorbox-v=1279188384.css" media="screen,projection"type="text/css" />


<script type="text/javascript" src="js/motionpack.js"></script>
<script type="text/javascript" src="jquery/jquery.js"></script> 
<script type="text/javascript" src="jquery/common.js"></script> 
<script type="text/javascript" src="jquery/js/txt.js"></script>
<script type="text/javascript" src="public/js/jquery-1.4.2.min.js"></script> 
<script type="text/javascript" src="public/fancybox/jquery.fancybox-1.3.1.pack.js"></script> 
<script type="text/javascript" src="jquery/jquery.colorbox-min.js"></script> 
<script type="text/javascript" src="public/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="public/js/jquery.hoverIntent.minified.js"></script> 
<script type="text/javascript" src="public/js/functions.js"></script> 
<script type="text/javascript" charset="utf-8">
	var scrollSpeed = 30;
	var step = 1;
	var current = 0;
	var imageWidth = 2247;
	var headerWidth = 800;		

	var restartPosition = -(imageWidth - headerWidth);

	function scrollBg(){
		current -= step;
		if (current == restartPosition){
			current = 0;
		}

		$('#after-header2').css("background-position",current+"px 0");
	}

	var init = setInterval("scrollBg()", scrollSpeed);
</script>
<style type="text/css">
<!--
.style1 {color: #FF0000}
-->
</style>
</head>

<body id="home">

<div id="wrapper">
<header>
	<h1><a href="#">eKursus</a></h1>
		<nav>
		<ul>
		<li><a href="daftar/index.php" class="buy" title="Daftar">Daftar</a></li> 
		<li><a href="#" title="Log Masuk" id="login-btn">Log Masuk</a></li>
		</ul>
		</nav>

</header>

<section id="after-header">
<div id="after-header2">
<div id="after-header-in">
<h4> SELAMAT DATANG KE </h4>
<h3> LAMAN E-KURSUS IPPTAR. </h3>
<p>Laman e-Kursus ini membolehkan anda mengetahui senarai kursus yang dianjurkan oleh IPPTAR dan sekali gus membolehkan anda memohon kursus yang anda minati secara dalam talian.<br /><br /></p>
<a href="senaraikursus.php" title="Lihat senarai kursus dan mohon secara dalam talian!" class="buy" id="plans-pricing-btn">Lihat senarai kursus dan mohon secara dalam talian!</a>

<p class="center"><a href="http://www.ipptar.gov.my" class="center" title="Kembali ke laman utama IPPTAR">Kembali ke laman utama IPPTAR</a></p>

</div>
</div>
</section>



<section id="content-mid">
<div id="content-mid-head"></div>
	<div id="content-in">
	<div class="hrx"></div>
	<div class="featured">
<div class="ft-in">
<h2 class="t1">RANCANG KURSUS <strong>DENGAN MUDAH</strong></h2>
Dengan maklumat kursus di dalam sistem e-Kursus ini, ia memudahkan anda untuk merancang permohonan kursus anda untuk sepanjang tahun.
</div>
	</div>
	<div class="featured">
<div class="ft-in">
<h2 class="t2">BUAT PERMOHONAN & PERIKSA STATUS <strong>SECARA DALAM TALIAN!</strong></h2>
Lupakan cara permohonan yang lama. Dengan sistem e-Kursus anda boleh memohon kursus di IPPTAR dengan mudah secara dalam talian. Juga ketahui status permohonan anda dengan mudah.
</div>
	</div>
	<div class="featured">
<div class="ft-in">
<h2 class="t3">DENGAN SISTEM URUS <strong>& REKOD KURSUS</strong></h2>
Dengan peggunaan sistem e-Kursus ini anda tidak perlu risau lagi jika terlupa atau tidak merekod kursus-kursus yang pernah anda jalani di IPPTAR. Hanya log masuk, dan kesemua rekod kursus anda ada dipaparkan. Memudahkan anda untuk mengisi buku rekod kursus anda.
</div>
	</div>
	<div class="featured">
<div class="ft-in">
<h2 class="t4">KEMAS KINI <strong>PROFIL</strong></h2>
Kemas kini profil anda dan maklumat permohonan kursus akan di isi dengan maklumat diri anda yang terkini.
</div>
	</div>
	<div class="clear"></div>
	</div>
</section>
	<div class="clear"></div>
<section id="bottom">

<h3>MASIH BELUM MENDAFTAR?</h3>
<a href="#">Jika sudah, log masuk akaun anda untuk memohon kursus dan memeriksa status.</a>

<a href="daftar/index.php" title="Cipta akaun" class="buy cboxElement" id="launchin-btn">Cipta akaun</a>
</section>

<footer>
	<div class="fleft">
&copy; 2011 | <a href="#">Institut Penyiaran Dan Penerangan Tun Abdul Razak</a> | <a href="http://www.ipptar.gov.my/bahasa/index.php?option=com_content&view=article&id=118&Itemid=28">Polisi</a> | <a href="http://www.ipptar.gov.my/bahasa/index.php?option=com_content&view=article&id=119&Itemid=29">Terma</a> | <a href="http://www.ipptar.gov.my/bahasa/index.php?option=com_content&view=article&id=68&Itemid=54">Hubungi</a>	</div>
	<div class="fright">
	 <i>Sistem oleh : iZZAT NETWORK</i><a href="http://wwww.maximajuta.com.my"></a> 
	</div>
<div class="clear"></div>
</footer>









<!-- login box -->
<div id="login" style="display: none;">

	<div id="login-inner">
			<h2>Log Masuk Ke Sistem e-Kursus</h2>
	
		<div class="content left">
			<p>Sila masukkan No. Kad Pengenalan (contoh : <font color="red">780906145241</font>) dan kata laluan untuk mengakses akaun anda. Setelah selesai anda akan dibawakan ke ruangan profil dan anda boleh membuat permohonan kursus, kemas kini dan periksa status permohonan.</p>
			
			<p>Jika anda terlupa kata laluan, sila hubungi bahagian pentadbir e-Kursus di nombor seperti tertera.</p>
			
			<h3>Pentadbir e-Kursus:  <strong>03-2295 7408 / 03-22957422</h3>
			<p>Atau e-mel kepada webipptar[@]kpkk.gov.my.</p>
		</div>
	
	
		<div class="content right">
	
			<form ACTION="<?php echo $loginFormAction; ?>" id="form1" method="POST">
			<? $value=$_GET['pass'];
			if ($value=="false"){
			?>
			    <label for="site-address"><span class="style2 style1">No. Kad Pengenalan atau Kata Laluan salah. Sila cuba lagi.</span></label>
				
				<? }?>
				<label for="site-address">Masukkan No. Kad Pengenalan Anda<br/>(contoh : <font color="red">780906145241</font>)</label>
				<input type="text" id="kp" name="kp" />
                <label for="site-address">Kata Laluan</label>
				<input type="password" id="password" name="password" />
				
				<button type="submit">Log Masuk</button>
		  </form>
		</div>
	
		<a href="#" title="Close" id="close">Tutup</a>	</div>
</div>
<!-- login box -->

</div>
</body>

</html>