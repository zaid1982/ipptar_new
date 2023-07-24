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

    <!-- Header Start -->
    <div class="container-fluid bg-dark p-0 mb-5">
      <div class="row g-0 flex-column-reverse flex-lg-row">
        <div class="col-lg-6 p-0 wow fadeIn" data-wow-delay="0.1s">
          <div
            class="header-bg h-100 d-flex flex-column justify-content-center p-5"
          >

            <h1 class="display-4 text-light mb-5">
              Sistem Permohonan eKursus
            </h1>
            <div class="d-flex align-items-center pt-4 animated slideInDown">
              <a href="http://ekursus.ipptar.gov.my/v2/login.php" class="btn btn-primary py-sm-3 px-3 px-sm-5 me-5"
                >DAFTAR / LOG IN</a>
                              <a href="katalog.php" class="btn btn-primary py-sm-3 px-3 px-sm-5 me-5"
                >KATALOG KURSUS</a>
              <button
                type="button"
                class="btn-play"
                data-bs-toggle="modal"
                data-src="https://www.youtube.com/embed/Jl3xRhTh46s"
                data-bs-target="#videoModal"
              >
                <span></span>
              </button>
              <h6 class="text-white m-0 ms-4 d-none d-sm-block">Info IPPTAR</h6>
            </div>
          </div>
        </div>
        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
          <div class="owl-carousel header-carousel">
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/2022/12/08.jpg" alt="" />
            </div>
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/2022/12/09.jpg" alt="" />
            </div> 
            <div class="owl-carousel-item">
              <img class="img-fluid" src="img/2022/12/03.jpg" alt="" />
            </div>
	    <div class="owl-carousel-item">
              <img class="img-fluid" src="img/2022/12/05.jpg" alt="" />
            </div>
	    <div class="owl-carousel-item">
              <img class="img-fluid" src="img/2022/12/06.jpg" alt="" />
            </div>
	    <div class="owl-carousel-item">
              <img class="img-fluid" src="img/2022/12/07.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Header End -->

    <!-- Video Modal Start -->
    <div
      class="modal modal-video fade"
      id="videoModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content rounded-0">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Info IPPTAR</h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
          	<p>Video Korporat IPPTAR. Jom layari laman web rasmi IPPTAR di www.ipptar.gov.my untuk memperolehi maklumat dengan lebih lanjut</p>
            <!-- 16:9 aspect ratio -->
            <div class="ratio ratio-16x9">
              <iframe
                class="embed-responsive-item"
                src=""
                id="video"
                allowfullscreen
                allowscriptaccess="always"
                allow="autoplay"
              ></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Video Modal End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <p><span class="text-primary me-2">#</span>Selamat Datang ke eKursus IPPTAR</p>
            <h1 class="display-5 mb-4">
              6 Perkara Kenapa Anda Perlu Berkursus di 
              <span class="text-primary">IPPTAR? </span>
            </h1>
<!--             <p class="mb-4">
              bertujuan memudahkan peserta kursus memohon kursus secara atas talian.
            </p> -->
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>1. Satu-satunya pusat latihan kerajaan yang menawarkan kursus dalam bidang penyiaran dan penerangan
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>2. Tawaran kursus serta silibus yang disediakan menepati keperluan pasaran semasa kerja
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>3. Tenaga pengajar yang profesional dan berkemahiran tinggi
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>4. Suasana pembelajaran yang selesa dan kondusif dengan kemudahan fasiliti pembelajaran yang terbaik
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>5. Tawaran penginapan yang amat selesa khusus untuk peserta kursus luar lembah kelang
            </h5>
            <h5 class="mb-3">
              <i class="far fa-check-circle text-primary me-3"></i>6. Lokasi pusat latihan yang strategik di Angkasapuri, Kuala Lumpur
            </h5>

            <!-- <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a> -->
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="img-border">
              <img class="img-fluid" src="img/ipptar00.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->





    <!-- Animal Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div
          class="row g-5 mb-5 align-items-end wow fadeInUp"
          data-wow-delay="0.1s"
        >
          <div class="col-lg-6">
            <p><span class="text-primary me-2">#</span>Kemudahan Fasiliti</p>
            <h1 class="display-5 mb-0">
              Kemudahan Fasiliti Kursus <span class="text-primary">IPPTAR</span> 
            </h1>
          </div>
<!--           <div class="col-lg-6 text-lg-end">
            <a class="btn btn-primary py-3 px-5" href=""
              >Explore More Animals</a
            >
          </div> -->
        </div>
        <div class="row g-4">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="bilik-item"
                  href="img/fasiliti/bilik_kuliah/B01.jpg"
                  data-lightbox="bilik"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/f1.jpg" alt="" />
		    <!--<img class="img-fluid" src="img/f1.jpg" alt="" />-->

                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Bilik</p>
                      <h5 class="text-white mb-0">Kuliah</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-1.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/f2.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Bilik</p>
                      <h5 class="text-white mb-0">Penginapan</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-2.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/f3.jpg" alt="" />
                    <div class="animal-text p-4">
                      <!-- <p class="text-white small text-uppercase mb-0">Dewan</p> -->
                      <h5 class="text-white mb-0">Dewan</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-2.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/f4.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Studio</p>
                      <h5 class="text-white mb-0">TV</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
            <div class="row g-4">
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-md-3.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/f5.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Studio</p>
                      <h5 class="text-white mb-0">Radio</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col-12">
                <a
                  class="animal-item"
                  href="img/animal-lg-3.jpg"
                  data-lightbox="animal"
                >
                  <div class="position-relative">
                    <img class="img-fluid" src="img/f6.jpg" alt="" />
                    <div class="animal-text p-4">
                      <p class="text-white small text-uppercase mb-0">Studio</p>
                      <h5 class="text-white mb-0">Rakaman</h5>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Animal End -->

       <!-- Service Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div class="row g-5 mb-5 wow fadeInUp" data-wow-delay="0.1s">
          <div class="col-lg-6">
            <p><span class="text-primary me-2">#</span>Kemudahan Lain</p>
            <h1 class="display-5 mb-0">
              Kemudahan lain yang terdapat di
              <span class="text-primary">IPPTAR</span>
            </h1>
          </div>
<!--           <div class="col-lg-6">
            <div
              class="bg-primary h-100 d-flex align-items-center py-4 px-4 px-sm-5"
            >
              <i class="fa fa-3x fa-mobile-alt text-white"></i>
              <div class="ms-4">
                <p class="text-white mb-0">Call for more info</p>
                <h2 class="text-white mb-0">+012 345 6789</h2>
              </div>
            </div>
          </div> -->
        </div>
        <div class="row gy-5 gx-4">
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-2.png" alt="Icon" />
            <h5 class="mb-3">Parkir Kenderaan</h5>
            <span
              >Parkir Kenderaan yang selesa dan mencukupi untuk peserta</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-3.png" alt="Icon" />
            <h5 class="mb-3">Penginapan</h5>
            <span
              >Penginapan selesa bagi peserta yang ingin menginap di dalam kampus</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-4.png" alt="Icon" />
            <h5 class="mb-3">Makmal Komputer</h5>
            <span
              >Makmal komputer dilengkapi peralatan ICT terkini</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.7s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-5.png" alt="Icon" />
            <h5 class="mb-3">Kafeteria</h5>
            <span
              >Kafeteria yang luas dan selesa</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.1s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-6.png" alt="Icon" />
            <h5 class="mb-3">Surau</h5>
            <span
              >Surau yang berhampiran</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.3s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-7.png" alt="Icon" />
            <h5 class="mb-3">Wi-Fi percuma</h5>
            <span
              >WiFi percuma di sekitar kampus </span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.5s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-8.png" alt="Icon" />
            <h5 class="mb-3">Bilik Latihan</h5>
            <span
              >Bilik Latihan Eksekutif dengan ruang yang fleksibel untuk pelbagai tujuan</span
            >
          </div>
          <div
            class="col-lg-3 col-md-4 col-sm-6 wow fadeInUp"
            data-wow-delay="0.7s"
          >
            <img class="img-fluid mb-3" src="img/icon/icon-9.png" alt="Icon" />
            <h5 class="mb-3">Kemudahan Mengajar</h5>
            <span
              >Dilengkapi dengan kemudahan mengajar dan penggunaan aplikasi terkini untuk semua makmal komputer</span
            >
          </div>
        </div>
      </div>
    </div>
    <!-- Service End -->

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
  </body>
</html>
