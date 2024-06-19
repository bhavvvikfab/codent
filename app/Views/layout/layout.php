<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $this->renderSection('title')?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?=base_url()?>admin/public/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>admin/public/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet"> -->

    <link rel="stylesheet" href="<?=base_url()?>public/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/animate.css">
    
    <link rel="stylesheet" href="<?=base_url()?>public/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/magnific-popup.css">

    <link rel="stylesheet" href="<?=base_url()?>public/css/aos.css">

    <link rel="stylesheet" href="<?=base_url()?>public/css/ionicons.min.css">

    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="<?=base_url()?>public/css/flaticon.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/icomoon.css">
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>

  <?= view('layout/header.php') ?>


  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>



  <script>

    function showToast(message, position) {
      // Swal.fire({
      //   text: message,
      //   icon: 'success',
      //   toast: true,
      //   position: position || 'center',
      //   showConfirmButton: false,
      //   timer: 1500,
      //   customClass: {
      //     container: 'custom-swal-container', 
      //   },
      //   customContainerClass: 'custom-swal-toast', 
      //   background: 'rgba(0, 0, 0, 0.9)',
      //   padding: '3rem', 
      //   grow: 'row' 
      // });
      Swal.fire({
        icon: 'success',
        title: 'Success',
        text: message,
        timer: 1000,
        showConfirmButton: false
      });
    }
    function showToastError(message, position) {
    Swal.fire({
      icon: 'error',
      title: 'Error',
      text: message,
      timer: 1000,
      showConfirmButton: false
    });
    }


  </script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



  <?= $this->renderSection('content') ?>

  <?= view('layout/footer.php') ?>




  <script src="<?=base_url()?>public/js/jquery.min.js"></script>
  <script src="<?=base_url()?>public/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="<?=base_url()?>public/js/popper.min.js"></script>
  <script src="<?=base_url()?>public/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>public/js/jquery.easing.1.3.js"></script>
  <script src="<?=base_url()?>public/js/jquery.waypoints.min.js"></script>
  <script src="<?=base_url()?>public/js/jquery.stellar.min.js"></script>
  <script src="<?=base_url()?>public/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>public/js/jquery.magnific-popup.min.js"></script>
  <script src="<?=base_url()?>public/js/aos.js"></script>
  <script src="<?=base_url()?>public/js/jquery.animateNumber.min.js"></script>
  <script src="<?=base_url()?>public/js/bootstrap-datepicker.js"></script>
  <script src="<?=base_url()?>public/js/jquery.timepicker.min.js"></script>
  <script src="<?=base_url()?>public/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=base_url()?>public/js/google-map.js"></script>
  <script src="<?=base_url()?>public/js/main.js"></script>
    
  <script src="<?=base_url()?>public/js/script.js"></script>
  </body>
</html>