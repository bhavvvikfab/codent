<?php

session_start();
if (!empty($_GET['updated']) && !empty($_GET['key'])) {
    $_SESSION['your_key'] = $_GET['key'];
    echo '<h4>Password Updated Successfully.</h4>';
    die;
}
if (empty($_GET['url']) || empty($_GET['userID']) || empty($_GET['key'])) {
    echo json_encode(array("status" => "fail", "message" => "Invalid Url!"));
    die;
}
// if(!empty($_GET['key']) && $_GET['key']===$_SESSION['your_key']){
//     echo json_encode(array("status"=>"fail","message"=>"Url Expired!"));
//     die;
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Reset-Password</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->
    <link href="public/img/favicon.png" rel="icon">
    <link href="public/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- vendor1 CSS Files -->
    <link href="public/vendor1/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/vendor1/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="public/vendor1/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="public/vendor1/quill/quill.snow.css" rel="stylesheet">
    <link href="public/vendor1/quill/quill.bubble.css" rel="stylesheet">
    <link href="public/vendor1/remixicon/remixicon.css" rel="stylesheet">
    <link href="public/vendor1/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">


    <!-- =======================================================
  * Template Name: Dry Clean
  * Updated: Mar 10 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  ======================================================== -->
</head>

<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="d-flex justify-content-center py-4">
                            <a href="index.php" class="logo d-flex align-items-center w-auto">
                                <img src="public/img/logo.png" alt="">
                                <span class="d-none d-lg-block">CoDent</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Reset Your Password</h5>
                                    <!-- <p class="text-center small">Enter your mail recover password</p> -->
                                </div>

                                <form class="row g-3 needs-validation"  id="reset_password_form">

                                    <input type="hidden" name="url" id="url" value="<?= $_GET['url'] ?>">
                                    <input type="hidden" name="user_id" id="user_id" value="<?= $_GET['userID'] ?>">
                                    <input type="hidden" name="key" id="key" value="<?= $_GET['key'] ?>">
                                    <div class="form-group">
                                        <label for="new_password">New password</label>
                                        <input type="password" class="form-control input-lg" name="new_password"
                                            id="new_password">
                                        <p id="new_password_err" style="color: red;"></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm new password</label>
                                        <input type="password" class="form-control input-lg"
                                            name="confirm_password" id="confirm_password">
                                        <p id="confirm_password_err" style="color: red;"></p>
                                    </div>
                                    <p id="msg"></p>
                                    <button type="button" class="btn w-100 btn-recover submit_btn btn-block" >Set new
                                            password</button>
                                    <div class="col-12">
                                        
                                    </div>



                                </form>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </section>

    </div>


</main><!-- End #main -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script src="public/vendor1/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="public/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        function showToast(message, position) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: message,
                timer: 1000,
                showConfirmButton: false
            });

        }

        $(".submit_btn").on("click", function (e) {

            var new_password = $("#new_password").val();
            var confirm_password = $("#confirm_password").val();
            var base_url = $("#base_url").val();
            flag = 0;

            if (new_password == "") {
                $('#new_password_err').text('New Password is required!').addClass("text-danger");
                flag = 1;
            } else if (new_password.length < 5) {
                $('#new_password_err').text('Password Must Be 5 Character long!').addClass("text-danger");
                flag = 1;
            } else if (new_password != "" && new_password.length >= 6) {
                $('#new_password_err').text('');
            }

            if (confirm_password == "") {
                $('#confirm_password_err').text('Confirm Password is required!').addClass("text-danger");
                flag = 1;
            }

            if (confirm_password != "") {
                $('#confirm_password_err').text('');
            }

            if (confirm_password != "" && confirm_password != new_password) {
                $("#confirm_password_err").html('Confirm password does not matched with new password.');
                flag = 1;
            }

            if (confirm_password != "" && confirm_password == new_password) {
                $('#confirm_password_err').text('');
            }

            if (flag == 1) {
                return false;
            } else {
                let reset_password_form = document.getElementById("reset_password_form");
                let fd = new FormData(reset_password_form);
                let url = $("#url").val();
                let key = $("#key").val();

                $.ajax({
                    url: url + 'resetPassword',
                    type: "post",
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        console.log('success');
                        if (data == 1) {
                            showToast('Password Reset Successfully.')
                            setTimeout(function () {
                                location.href = 'https://codent.londontechequity.co.uk/portal/';
                            }, 2000);

                        } else if (data == 2) {
                            showToastError('Password Reset Failed.')
                        }
                    }
                });
            }

        });
    });
</script>

</html>
