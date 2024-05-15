<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?= $this->renderSection('title') ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../../img/favicon.png" rel="icon">
  <link href="../../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../../vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Template Main CSS File -->
  <link href="../../../css/main.css" rel="stylesheet">
</head>
<style>
  .custom-toast {
    border: 2px solid #ADD8E6;
    background: linear-gradient(to right, #ADD8E6, #FFFFFF);
    color: #000000;
  }
</style>

<body>

  <!-- ======= Header ======= -->
  <?= view('layout/header.php') ?>
  <!-- ======= Header end ======= -->

  <!-- ======= sidebar ======= -->
  <?= view('layout/sidebar.php') ?>
  <!-- ======= sdiebar end ======= -->

  <!-- =========required cdn=========== -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script> 

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
     function showToast(message, position) {
        Toastify({
          text: message,
          duration: 2500,
          gravity: 'top',
          position: 'center',
          className: 'custom-toast'
        }).showToast();
      }
  </script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --> 

  <!-- =========required cdn=========== -->


  <!-- ======= content ======= -->
  <?= $this->renderSection('content') ?>
  <!-- ======= content end ======= -->

  <!-- ======= footer ======= -->
  <?= view('layout/footer.php') ?>
  <!-- ======= footer end ======= -->


  <!-- Vendor JS Files -->
  <script src="../../../vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../vendor/chart.js/chart.umd.js"></script>
  <script src="../../../vendor/echarts/echarts.min.js"></script>
  <script src="../../../vendor/quill/quill.min.js"></script>
  <script src="../../../vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../../vendor/tinymce/tinymce.min.js"></script>
  <script src="../../../vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../../js/main.js"></script>
 
</body>

</html>