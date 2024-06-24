<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard - CoDent Bootstrap</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="<?= base_url() ?>public/img/favicon.png" rel="icon">
    <link href="<?= base_url() ?>public/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- vendor1 CSS Files -->
    <link href="<?= base_url() ?>public/vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/vendor1/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/vendor1/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/vendor1/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/vendor1/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/vendor1/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/vendor1/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>public/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/css/main.css" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Dry Clean
  * Updated: Mar 10 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  ======================================================== -->
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url() ?>/public/img/logo.png" alt="">
                                    <span class="d-none d-lg-block">CoDent</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Recover Your Password</h5>
                                        <p class="text-center small">Enter your mail recover password</p>
                                    </div>

                                    <form class="row g-3 needs-validation" novalidate
                                        action="<?= base_url('forgotPassword') ?>" method="post">

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" id="youremail"
                                                required>
                                            <div class="invalid-feedback">Please enter your email!</div>
                                        </div>


                                        <div class="col-12">
                                            <button class="btn w-100 btn-recover" type="submit">Submit</button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0 text-center"><a href="<?= base_url('/') ?>">Back to
                                                    Login</a></p>
                                        </div>
                                        <!-- <div class="col-12">
                                            <a href="login.php">
                                                <button class="btn w-100 btn-login">Back</button>
                                            </a>
                                            </div> -->

                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>

            </section>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php if (session('email')): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '<?= session('email') ?>',
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        <?php endif; ?>
        <?php if (session('error')):?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session('error') ?>',
                    timer: 2000,
                    showConfirmButton: false
                });
            </script>
        <?php endif; ?>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>



    <!-- vendor1 JS Files -->
    <script src="<?= base_url() ?>public/vendor1/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/chart.js/chart.umd.js"></script>
    <script src="<?= base_url() ?>public/vendor1/echarts/echarts.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/quill/quill.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/simple-datatables/simple-datatables.js"></script>
    <script src="<?= base_url() ?>public/vendor1/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="<?= base_url() ?>public/js/main.js"></script>


</body>

</html>