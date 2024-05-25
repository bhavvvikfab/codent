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
  <section class="section profile" id="profile_section" >
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img
              src="<?= base_url() ?>public/images/<?= isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : 'user-profile.jpg' ?>"
              alt="Profile" class="rounded-circle">


            <h2><?= isset($user['fullname']) ? $user['fullname'] : 'User Name'; ?></h2>
            <h3>Admin</h3>
            <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
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
                  <div class="col-lg-9 col-md-8"><?= isset($user['dob']) ? $user['dob'] : 'User dob'; ?></div>
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
                  <div class="col-lg-9 col-md-8">Admin</div>
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
                <form id="editprofile_form" method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?= base_url() ?>public/images/<?= isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : 'user-profile.jpg' ?>"
                        alt="Profile" class="rounded-circle" height="150" width="150">


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
                        value="<?= isset($user['dob']) ? $user['dob'] : 'User DOB'; ?>">
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
                    <button type="submit" class="user-btn btn" id="edit_profile">Save Changes</button>
                  </div>
                </form>

                <!-- End Profile Edit Form -->

              </div>

              <!--<div class="tab-pane fade pt-3" id="profile-settings">-->

              <!-- Settings Form -->
              <!--  <form>-->

              <!--    <div class="row mb-3">-->
              <!--      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>-->
              <!--      <div class="col-md-8 col-lg-9">-->
              <!--        <div class="form-check">-->
              <!--          <input class="form-check-input" type="checkbox" id="changesMade" checked>-->
              <!--          <label class="form-check-label" for="changesMade">-->
              <!--            Changes made to your account-->
              <!--          </label>-->
              <!--        </div>-->
              <!--        <div class="form-check">-->
              <!--          <input class="form-check-input" type="checkbox" id="newProducts" checked>-->
              <!--          <label class="form-check-label" for="newProducts">-->
              <!--            Information on new products and services-->
              <!--          </label>-->
              <!--        </div>-->
              <!--        <div class="form-check">-->
              <!--          <input class="form-check-input" type="checkbox" id="proOffers">-->
              <!--          <label class="form-check-label" for="proOffers">-->
              <!--            Marketing and promo offers-->
              <!--          </label>-->
              <!--        </div>-->
              <!--        <div class="form-check">-->
              <!--          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>-->
              <!--          <label class="form-check-label" for="securityNotify">-->
              <!--            Security alerts-->
              <!--          </label>-->
              <!--        </div>-->
              <!--      </div>-->
              <!--    </div>-->

              <!--    <div class="text-center">-->
              <!--      <button type="submit" class="user-btn btn">Save Changes</button>-->
              <!--    </div>-->
              <!--  </form> End settings Form -->

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
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                        <button type="button" class="btn btn-outline-secondary" id="showpass">
                          <i class="bi bi-eye-slash"></i>
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="confirm_Password" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="confirm_Password" type="password" class="form-control" id="confirm_Password">
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

      // Event listener for the toggle button click
      $('#password-toggle').click(function () {
        togglePasswordVisibility();
      });

      $('#edit_profile').on('click', function (e) {
        e.preventDefault();
        // Get form data
        var formData = new FormData($('#editprofile_form')[0]);
        $.ajax({
          url: '<?= base_url('edit_profile') ?>',
          method: 'post',
          data: formData,
          processData: false,
          contentType: false,
          success: function (data) {

            if (data.status == "success") {
                
                 $('#profile_section').load('<?= base_url('profile')?>  #profile_section');
            //   window.location.href = '';
              showToast('Profile updated successfully.');
              $('#alert').empty();
            } else {
              $('#alert').empty();
              let errors = data.errors;
              // console.log(errors);
              Object.keys(errors).forEach(field => {
                let errorMessage = errors[field];
                $('#alert').append(`<li class="text-danger"><small>${errorMessage}</small></li>`);
              });
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
          url: '<?= base_url('change_password') ?>',
          method: 'post',
          data: formData,
          success: function (data) {
            console.log(data);
            if (data.status == "success") {
              showToast('Password Chanaged successfully.');
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

  </script>
</main>
<!-- End #main -->

<?= $this->endSection() ?>