<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Packages</title>
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
    <link href="<?= base_url() ?>public/vendor1/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="<?= base_url() ?>public/css/main.css" rel="stylesheet">


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!-- =======================================================
  * Template Name: Codent
  * Updated: Mar 10 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  ======================================================== -->

</head>

<body>
    <main>
        <div class="container">
            <section class="section register d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex justify-content-center py-4">
                                <a href="index.php" class="logo d-flex align-items-center w-auto">
                                    <img src="<?= base_url() ?>public/img/logo.png" alt="">
                                    <span class="d-lg-block">CoDent</span>
                                </a>
                            </div><!-- End Logo -->
                            <div class="card mb-2 col-lg-12 col-12">
                                <div class="card-body">
                                    <div class="pt-2 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Select Subscription Package</h5>
                                    </div>
                                    <div class="container d-flex align-items-center justify-content-center">
                                        <div class="form-outer">
                                            <div class="row mt-3 text-center">
                                                <?php if (!empty($data['packages'])): ?>
                                                    <?php foreach ($data['packages'] as $package): ?>

                                                        <div class="col-md-12 col-lg-6 col-sm-12">
                                                            <div class="card"
                                                                style="width: 15rem; border:1px solid rgb(2, 48, 80);">
                                                                <input type="hidden"
                                                                    value=" <?= !empty($package['id']) ? $package['id'] : 'N/A' ?>"
                                                                    class="package_id">
                                                                <div class="card-header"
                                                                    style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);">
                                                                    <h4 class="mt-3 fw-bold text-light">
                                                                        <?= !empty($package['plan_name']) ? $package['plan_name'] : 'N/A' ?>
                                                                    </h4>
                                                                </div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <label class="fw-bold"
                                                                            style="color: rgb(2, 48, 80);">Description
                                                                            :</label> <br>
                                                                        <?= !empty($package['details']) ? $package['details'] : 'N/A' ?>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <h6 class="card-text"><span>Validity : </span>
                                                                            <?= !empty($package['duration']) ? $package['duration'] : 'N/A' ?>
                                                                            Days
                                                                        </h6>
                                                                        <h5 class="card-text fw-bold"
                                                                            style="color: rgb(2, 48, 80);"><span>Price :
                                                                            </span>
                                                                            <?= !empty($package['price']) ? $package['price'] : 'N/A' ?>
                                                                        </h5>
                                                                    </li>
                                                                    <li class="list-group-item">
                                                                        <a href="" class="btn btn_subscribe"
                                                                            style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#exampleModal">Subscribe</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <p>No packages available.</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="copyright">
                                &copy; Copyright <strong><span>CoDent</span></strong>. All Rights Reserved
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- card modal=================== -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header text-light fw-bold"
                        style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);">
                        <h5 class="modal-title" id="exampleModalLabel">Payment your subscription</h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <form id="payment-form" method="POST" action="<?= base_url("subscription_payment") ?>">
                        <input type="hidden" name="package_id" class="plan_id">
                        <input type="hidden" name="hospital_id" value="<?= $hospitalId ?>">
                        <div class="modal-body">
                            <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>
                            <div id="card-errors" role="alert"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm paynow"
                                style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);" id="pay-btn">Pay
                                Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- card modal end=================== -->

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <?php if (session('package_message')): ?>
            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'Attention',
                    text: '<?= session('package_message') ?>',
                    confirmButtonColor: 'black', 
                    confirmButtonText: 'Okay',
                });
            </script>
        <?php endif; ?>
        <?php if (session('error')): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '<?= session('error') ?>',
                    timer: 1500,
                    showConfirmButton: false
                });
            </script>
        <?php endif; ?>
    </main>
    <!-- End #main -->

    <!-- vendor1 JS Files -->
    <script src="<?= base_url() ?>public/vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/tinymce/tinymce.min.js"></script>
    <script src="<?= base_url() ?>public/vendor1/php-email-form/validate.js"></script>


    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function () {

            $(document).on('click', '.btn_subscribe', function (e) {
                e.preventDefault();
                let package_id = $(this).closest('.card').find('.package_id').val();
                $('.plan_id').val(package_id);
            });

        });
        //stripe code start
        var stripe = Stripe('<?= config('App')->stripe_public ?>');

        var elements = stripe.elements();

        var card = elements.create('card');

        card.mount('#card-element');

        card.on('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            stripe.createToken(card).then(function (result) {
                if (result.error) {

                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {

                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the token to your server
        function stripeTokenHandler(token) {

            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }


    </script>


</body>

</html>