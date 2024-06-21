<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Profile
<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </nav>

      </div>
    </div>
  </div>
  <pre>
    <?php
     
    // print_r($allPackages);
    // die;
    ?>
  </pre>
  <section class="section profile" id="profile_section">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img
              src="<?= config('App')->baseURL2 ?>/public/images/<?= !empty($user['profile']) ? $user['profile'] : 'default.jpg' ?>"
              alt="Profile" class="rounded-circle" height="100" width="100"
              onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">


            <h2><?= isset($user['fullname']) ? $user['fullname'] : 'User Name'; ?></h2>
            <h3><?= ucfirst(session('prefix')) ?></h3>
            <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
          </div>
          <div class="card-body pb-3 d-flex flex-column align-items-center">

            <?php
            if (isset($package)):
              $starting_date = new DateTime($package['starting_date']);
              $ending_date = new DateTime($package['ending_date']);
              $interval = $starting_date->diff($ending_date);
              $days_left = $interval->days;
              ?>
              <span class="">Active Package :
                <?= isset($package['package']['plan_name']) ? $package['package']['plan_name'] : 'Package Name'; ?></span>
              <small class="">Validity :
                <?= isset($package['package']['duration']) ? $package['package']['duration'] : 'Validity'; ?> Days</small>
              <small class="">Day left : <?= isset($days_left) ? $days_left : 'Remaning day'; ?> Days</small>
              <button class="btn btn-sm btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#package_model">Update
                Package</button>
            <?php endif; ?>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab"
                  data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <!--<li class="nav-item">-->
              <!--  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>-->
              <!--</li>-->

              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                  Password</button>
              </li>



            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= isset($user['fullname']) ? $user['fullname'] : 'User Name'; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Date of Birth</div>
                  <div class="col-lg-9 col-md-8">
                    <?= isset($user['date_of_birth']) ? $user['date_of_birth'] : 'User dob'; ?>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= isset($user['email']) ? $user['email'] : 'User Email'; ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Contact Number</div>
                  <div class="col-lg-9 col-md-8"><?= isset($user['phone']) ? $user['phone'] : 'User Phone'; ?></div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div> -->

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Role</div>
                  <div class="col-lg-9 col-md-8"><?= ucfirst(session('prefix')) ?></div>
                </div>

                <!--  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Country</div>
                    <div class="col-lg-9 col-md-8">USA</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                  </div> -->

              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="editprofile_form" class="editprofile_form" method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img
                        src="<?= config('App')->baseURL2 ?>/public/images/<?= !empty($user['profile']) ? $user['profile'] : 'default.jpg' ?>"
                        alt="Profile" class="rounded-circle" height="100" width="100"
                        onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">



                      <!-- <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div> -->
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="profile" class="col-md-4 col-lg-3 col-form-label">Change Profile</label>
                    <div class="col-md-8 col-lg-9 mt-2">
                      <div id="alert">

                      </div>
                      <input name="profile" type="file" class="form-control" id="profile" value="">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Full name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="fullname" type="text" class="form-control" id="fullname"
                        value="<?= isset($user['fullname']) ? $user['fullname'] : 'User name'; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="dob" class="col-md-4 col-lg-3 col-form-label">Date of Birth</label>
                    <div class="col-md-8 col-lg-9">


                      <input name="dob" type="date" class="form-control" id="dob"
                        value="<?= isset($user['date_of_birth']) ? $user['date_of_birth'] : 'User DOB'; ?>">
                    </div>
                  </div>

                  <!-- <div class="row mb-3">
                      <label for="lastName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="lastName" type="text" class="form-control" id="lastName" value="Anderson">
                      </div>
                    </div> -->

                  <!-- <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                      <div class="col-md-8 col-lg-9">
                        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
                      </div>
                    </div> -->

                  <!-- <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                      </div>
                    </div> -->

                  <!-- <div class="row mb-3">
                      <label for="Qua" class="col-md-4 col-lg-3 col-form-label">Role</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="Qua" type="text" class="form-control" id="Qua" value="">
                      </div>
                    </div> -->


                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="phone" type="text" class="form-control" id="Phone"
                        value="<?= isset($user['phone']) ? $user['phone'] : 'User phone'; ?>">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="email" type="email" class="form-control" id="Email"
                        value="<?= isset($user['email']) ? $user['email'] : 'User email'; ?>">
                    </div>
                  </div>


                  <div class="text-center">
                    <button type="submit" class="user-btn btn" id="edit_profile" class="edit_profile">Save
                      Changes</button>
                  </div>
                </form>

                <!-- End Profile Edit Form -->

              </div>

             

              <!--</div>-->

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->

                <form id="changePasswordForm">

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-9">
                      <!-- <input name="currentPassword" type="password" class="form-control" id="currentPassword"> -->
                      <div id="password_alert"></div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>


                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <!-- <input name="newpassword" type="password" class="form-control" id="newPassword"> -->
                      <div class="input-group">
                        <input name="newPassword" type="password" class="form-control" id="newPassword">
                        <button type="button" class="btn btn-outline-secondary" id="showpass">
                          <i class="bi bi-eye-slash"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="confirm_Password" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confirmPassword" type="password" class="form-control" id="confirmPassword">
                    </div>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="user-btn btn">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->

              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- ========================package modal star======================= -->
  <div class="modal fade" id="package_model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);">
          <h5 class="modal-title" id="exampleModalLabel">Available Packages </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex text-center align-items-center flex-wrap">
          <?php if ($allPackages): ?>
            <?php foreach ($allPackages as $package): ?>
              <div class="col-md-12 col-lg-6 col-sm-12">
                <div class="card m-1" style="border:1px solid rgb(2, 48, 80);">
                  <input type="hidden" value="<?= !empty($package['id']) ? $package['id'] : 'N/A' ?>" class="package_id">
                  <div class="card-header" style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);">
                    <h4 class="mt-3 fw-bold text-light"><?= !empty($package['plan_name']) ? $package['plan_name'] : 'N/A' ?>
                    </h4>
                  </div>
                  <ul class="list-group list-group-flush d-flex justify-content-between">
                    <li class="list-group-item" style="display: inline-block;">
                      <label class="fw-bold" style="color: rgb(2, 48, 80);">Description:</label><br>
                      <?= !empty($package['details']) ? $package['details'] : 'N/A' ?>
                    </li>
                    <li class="list-group-item" style="display: inline-block;">
                      <h6 class="card-text"><span>Validity:</span>
                        <?= !empty($package['duration']) ? $package['duration'] : 'N/A' ?> Days
                      </h6>
                    </li>
                    <li class="list-group-item" style="display: inline-block;">
                      <h5 class="card-text fw-bold" style="color: rgb(2, 48, 80);"><span>Price:</span>
                        <?= !empty($package['price']) ? $package['price'] : 'N/A' ?> $
                      </h5>
                    </li>
                    <li class="list-group-item" style="display: inline-block;">
                      <a href="" class="btn btn_subscribe"
                        style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);" data-bs-toggle="modal"
                        data-bs-target="#buyModel">Subscribe</a>
                    </li>
                  </ul>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p class="text-center">No packages available.</p>
          <?php endif; ?>
          
        </div>
        <div class="fw-bold m-1">Note:
            <small class="text-danger">If you buy a new package, the old package will discontinue.</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- =================================package modal star=============== -->

  <!-- ============================card modal=================== -->
  <div class="modal fade" id="buyModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header text-light fw-bold"
          style="background-color: rgb(2, 48, 80); color: rgb(255, 255, 255);">
          <h5 class="modal-title" id="exampleModalLabel">Payment your subscription</h5>
          <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
        </div>
        <form id="payment-form" method="POST" action="<?= base_url(session('prefix') . '/update_subscription')?>" >
          <input type="hidden" name="package_id" class="plan_id">
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
  <!--================================ card modal end=================== -->
  <?php if (session('success')): ?>
      <script>
          showToast('<?= session('success') ?>')
      </script>
 <?php endif; ?>
 <?php if (session('error')): ?>
      <script>
          showToastError('<?= session('error') ?>')
      </script>
 <?php endif; ?>


</main>
<!-- End #main -->
<script src="https://js.stripe.com/v3/"></script>
<script>

    $(document).ready(function () {

      $('#showpass').on('click', function () {

        var passwordInput = $('#newPassword');
        var toggleBtn = $('#showpass');

        if (passwordInput.attr('type') === 'password') {
          passwordInput.attr('type', 'text');
          toggleBtn.html('<i class="bi bi-eye"></i>');
        } else {
          passwordInput.attr('type', 'password');
          toggleBtn.html('<i class="bi bi-eye-slash"></i>');
        }

      })

      $('#password-toggle').click(function () {
        togglePasswordVisibility();
      });

      $(document).on('click', '#edit_profile', function (e) {
        e.preventDefault();
        var formData = new FormData($('#editprofile_form')[0]);
        $.ajax({
          url: "<?= base_url(session('prefix') . '/profile_update') ?>",
          method: 'post',
          data: formData,
          processData: false,
          contentType: false,
          success: function (data) {
            if (data.status === "success") {
              $('#profile_section').load('<?= base_url(session('prefix') . '/users_profile') ?> #profile_section', function () {
                // Reattach event handler after the section is reloaded
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: 'Profile updated successfully.',
                  confirmButtonColor: 'black',
                  confirmButtonText: 'Okay',
                });
                $('#alert').empty();
              });
            } else {
              $('#alert').empty();
              let errors = data.errors;
              if (errors) {
                Object.keys(errors).forEach(field => {
                  let errorMessage = errors[field];
                  $('#alert').append(`<li class="text-danger"><small>${errorMessage}</small></li>`);
                });
              } else {
                $('#alert').append(`<li class="text-danger"><small>Unknown error occurred.</small></li>`);
              }
            }
          },
          error: function (xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
      $('#changePasswordForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
          url: "<?= base_url(session('prefix') . '/update_password') ?>",
          method: 'post',
          data: formData,
          success: function (data) {
            console.log(data);
            if (data.status == "success") {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Password Chanaged successfully.',
                confirmButtonColor: 'black',
                confirmButtonText: 'Okay',
              });
              $('#password_alert').empty();
            } else {
              // Display errors
              $('#password_alert').empty();
              let errors = data.errors;

              $('#password_alert').empty();
              Object.keys(errors).forEach(field => {
                let errorMessage = errors[field];
                $('#password_alert').append(`<li class="text-danger"><small>${errorMessage}</small></li>`);
              });
            }
          }
        });
      });

    });

    $(document).on('click', '.btn_subscribe', function (e) {
      e.preventDefault();
      let package_id = $(this).closest('.card').find('.package_id').val();
      $('.plan_id').val(package_id);
    });

    //==========================stripe code start============================
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
 //==========================stripe code end============================
  </script>
<?= $this->endSection() ?>
