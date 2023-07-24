<?php
  require_once('include/db_connect.php');
  $dateToday=date('Y-m-d');
  $yToday=date('Y');

if (isset($_GET['id_cat'])) {
    $id_cat= $_GET['id_cat'];  
}

  
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);    

    $query1 = "SELECT * FROM kursus WHERE k_id = $id_cat ";
    $data1 = mysqli_query($dbc, $query1);
 
    if (mysqli_num_rows($data1) >= 1) {
     while ($row1 = mysqli_fetch_array($data1)) {
        $k_id = $row1["k_id"];
        $k_name = $row1["k_name"];
        $k_obj = $row1["k_obj"];
        $k_loc = $row1["k_loc"];
        $k_duration = $row1["k_duration"];
        $k_time = $row1["k_time"];
        $k_fee = $row1["k_fee"];
        $k_aid = $row1["k_aid"];
        $k_bid = $row1["k_bid"];
        $k_sdate = $row1["k_sdate"];
        $k_sdate = date('d/m/Y', strtotime($k_sdate)); 
        $k_edate = $row1["k_edate"];
        $k_edate = date('d/m/Y', strtotime($k_edate));         
        $k_status = $row1["k_status"];

}}  
  

    $query1 = "SELECT * FROM status WHERE s_id = $k_status ";
    $data1 = mysqli_query($dbc, $query1);
 
    if (mysqli_num_rows($data1) >= 1) {
     while ($row1 = mysqli_fetch_array($data1)) {
        $s_name = $row1["s_name"];

}}  
    $query1 = "SELECT * FROM admin WHERE a_id = $k_aid ";
    $data1 = mysqli_query($dbc, $query1);
 
    if (mysqli_num_rows($data1) >= 1) {
     while ($row1 = mysqli_fetch_array($data1)) {
        $a_nama = $row1["a_nama"];
        $a_emel = $row1["a_emel"];
        $a_tel = $row1["a_tel"];

}} 



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>eKursus</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Quicksand:wght@600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />
<!--- start --->
<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel = "stylesheet" href = "https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">

<!-- end --->
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        style="width: 3rem; height: 3rem"
        role="status"
      >
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
<?php require_once("include/topbar.php"); ?>    
    <!-- Topbar End -->

    <!-- Navbar Start -->
 <?php require_once("include/navbar.php"); ?> 
    <!-- Navbar End -->

    <!-- Page Header Start -->
    <div
      class="container-fluid header-bg py-5 mb-5 wow fadeIn"
      data-wow-delay="0.1s"
    >
      <div class="container py-5">
        <h1 class="display-4 text-white mb-3 animated slideInDown">
          Katalog Kursus
        </h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.php">Utama</a>
            </li>
<!--             <li class="breadcrumb-item">
              <a class="text-white" href="#">Pages</a>
            </li> -->
            <li class="breadcrumb-item text-primary active" aria-current="page">
              Katalog Kursus
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- Page Header End -->

    <!-- Visiting Hours Start -->
		<div class="container">
			<div class="row">
        <!-- Static Table Start -->
<!-- table start  --> 

                
                <div class="box-body">
                  <div class="col-xs-12 table-responsive">
                          <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>MAKLUMAT KURSUS</p>
            <h1 class="display-5 mb-4"><?php echo $k_name; ?></h1>
            <p><span class="text-primary me-2">#</span>OBJEKTIF</p>
            <p class="mb-4">
             <?php echo $k_obj; ?>
            </p>
            <p><span class="text-primary me-2">#</span>PENYELARAS BERTUGAS</p>
            <p class="mb-4">
             <?php 
             echo $a_nama;
             echo "<br>";
             echo $a_emel;
             echo "<br>";
             echo $a_tel;

       
              ?>
            </p>
                              
            <form>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating">
                    
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating">
                    
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-floating">
                    
                  </div>
                </div>
                <div class="col-12">

<input type="button" class="btn btn-warning w-100 py-3"  name="buy" value="Mohon" onclick="window.open('http://ekursus.ipptar.gov.my/v2/login.php')">
                </div>
                <div class="col-12">
            
                <input type=button class="btn btn-primary w-100 py-3" onClick="parent.location='katalog.php'" value='Kembali'>

                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="h-100" style="min-height: 400px">
             
                <div class="col-md-12">
                  <p><span class="text-primary me-2">#</span>LOKASI : 
<textarea  class="form-control bg-light border-0"><?php echo $k_loc; ?></textarea>


                  </p>
                  <p><span class="text-primary me-2">#</span>JANGKAMASA : <input
                      type="text"
                      class="form-control bg-light border-0"
                      id="name"
                      placeholder="Your Name" value="<?php echo $k_duration; ?> HARI" readonly
                    /></p> 
                  <p><span class="text-primary me-2">#</span>TARIKH KURSUS : <input
                      type="text"
                      class="form-control bg-light border-0"
                      value="<?php echo $k_sdate . '  HINGGA  ' . $k_edate; ?>" readonly
                    /></p>    
                  <p><span class="text-primary me-2">#</span>MASA : <input
                      type="text"
                      class="form-control bg-light border-0"
                      value="<?php echo $k_time ;?>" readonly
                    /></p> 
                  <p><span class="text-primary me-2">#</span>BAYARAN : <input
                      type="text"
                      class="form-control bg-light border-0"
                      value="RM <?php echo $k_fee; ?>" readonly
                    /></p>   
                  <p><span class="text-primary me-2">#</span>STATUS : <input
                      type="text"
                      class="form-control bg-light border-0"
                      value="<?php echo $s_name; ?>" readonly
                    /></p>




                </div>







            </div>
          </div>
        </div>
                  </div>
         
           

<!-- table end  -->
        <!-- Static Table End -->
			</div>
		</div>
	
    <!-- Visiting Hours End -->
    <!-- Footer Start -->    
 <?php require_once("include/footer.php"); ?> 

 
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

   
    <!-- DataTables -->
   
 	<script>
      $(function () {
       
        $('#myTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
      });
    </script> 

  </body>
</html>
