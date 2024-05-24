<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?= $this->renderSection('title') ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="<?=base_url()?>public/img/favicon.png" rel="icon">
  <link href="<?=base_url()?>public/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?=base_url()?>public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url()?>public/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?=base_url()?>public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?=base_url()?>public/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?=base_url()?>public/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?=base_url()?>public/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?=base_url()?>public/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?=base_url()?>public/css/main.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <?= view('layout/header.php') ?>
  <!-- ======= Header end ======= -->

  <!-- ======= sidebar ======= -->
  <?= view('layout/sidebar.php') ?>
  <!-- ======= sdiebar end ======= -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- ======= content ======= -->
  <?= $this->renderSection('content') ?>
<!-- ======= content end ======= -->

  <!-- ======= footer ======= -->
  <?= view('layout/footer.php') ?>
  <!-- ======= footer end ======= -->

 
  
  <!-- Vendor JS Files -->
  <script src="<?=base_url()?>public/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url()?>public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url()?>public/vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url()?>public/vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url()?>public/vendor/quill/quill.min.js"></script>
  <script src="<?=base_url()?>public/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url()?>public/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url()?>public/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url()?>public/js/main.js"></script>
  <script src="<?=base_url()?>public/js/profile/update.js"></script>
  

</body>

</html>