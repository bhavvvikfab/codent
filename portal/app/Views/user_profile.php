<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
User-Profile
<?= $this->endSection() ?>
<?= $this->section('content') ?>


<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <?php if ($user['profile']): ?>
              <img
                src="<?= base_url() ?>public/images/<?= isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : 'user-profile.jpg' ?>"
              >
            <?php else: ?>
              <p>No image available</p>
            <?php endif; ?>
            <h2><?= esc($user['fullname']) ?></h2>
            <h3><?= ucfirst(session('prefix')) ?></h3>
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



              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                  Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <!-- <h5 class="card-title">About</h5>
                <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus.
                  Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet
                  perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?= esc($user['fullname']) ?></div>
                </div>



                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?= esc($user['email']) ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Date of Birth</div>
                  <div class="col-lg-9 col-md-8"><?= esc($user['date_of_birth']) ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Contact Number</div>
                  <div class="col-lg-9 col-md-8"><?= esc($user['phone']) ?></div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Address</div>
                  <div class="col-lg-9 col-md-8"><?= esc($user['address']) ?></div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                  </div> -->




              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form id="profile_upadate">
                 
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="<?= base_url() ?>public/images/<?= isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : 'user-profile.jpg' ?>"
                        alt="Profile" class="rounded-circle">


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
                      <input name="new_image" type="file" class="form-control" id="new_image" value="">
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="id" type="hidden" class="form-control" id="id" value="<?= esc($user['id']) ?>">
                      <input name="fullname" type="text" class="form-control" id="fullname"
                        value="<?= esc($user['fullname']) ?>">
                    </div>
                  </div>



                  <div class="row mb-3">
                    <label for="address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                      <textarea name="address" class="form-control" rows="1"
                        id="address"><?= esc($user['address']) ?></textarea>
                    </div>
                  </div>


                  <!-- <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="company" type="text" class="form-control" id="company" value="Lueilwitz, Wisoky and Leuschke">
                      </div>
                    </div> -->

                  <div class="row mb-3">
                    <label for="Qua" class="col-md-4 col-lg-3 col-form-label">Date-Of-Birth</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="date_of_birth" type="date" class="form-control" id="date_of_birth"
                        value="<?= esc($user['date_of_birth']) ?>">
                    </div>


                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Contact Number</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="phone" type="text" class="form-control" id="Phone" value="<?= esc($user['phone']) ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?= esc($user['email']) ?>">
                      </div>
                    </div>

                   

                    <div class="text-center">
                      <button type="submit" class="user-btn btn">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                  <div id="profile_update_message"></div>

                </div>

              
                <div class="tab-pane fade pt-3" id="profile-change-password">

                  <!-- Change Password Form -->

                  <form id="change_password_form" >  
                    
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
                      <input name="ids" type="hidden" class="form-control" id="ids" value="<?= esc($user['id']) ?>">
                        <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>
                 

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="id" type="hidden" class="form-control" id="id" value="<?= esc($user['id']) ?>">
                      <input name="currentPassword" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="newpassword" type="password" class="form-control" id="newPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="renewpassword" type="password" class="form-control" id="renewPassword">
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
    </section>
    
    </main><!-- End #main -->

    <script>
      $(document).ready(function() 
{
    $("#profile_upadate").submit(function(e) {
        e.preventDefault(); 
    console.log("hh");
        
        var formdata = new FormData(this); 
        
        $.ajax({
            url: "<?= base_url() . '' . session('prefix') . '/' . 'profile_update' ?>",
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function(response) 
            {
                console.log(response);
                // var successAlert = '<div class="alert alert-success" role="alert">' + response.message + '</div>';
                if (response.message) 
                  {
              showToast(response.message);

                  
                } else 
                {
                  
                console.log(response);
                  
                }

              //  $("#profile_update_message").html(successAlert);
               setTimeout(function() {
                location.reload(); 
            }, 3000);
            },
            error: function(xhr, status, error) 
            {
                console.log(xhr.responseText);
            }
        });
    });


    $('#change_password_form').submit(function (e) {
        e.preventDefault();
        console.log("dddd");
        let formData = $(this).serialize();
        console.log(formData);

        $.ajax({
          url: "<?= base_url() . '' . session('prefix') . '/' . 'update_password' ?>",
          method: 'post',
          data: formData,
          success: function (data) {
            console.log(data);
            if (data.status == "success") {
              showToast('Password Chanaged successfully.');
              $('#password_alert').empty();
              $("#change_password_form")[0].reset();
            } 
            else 
            {
              // Display errors
              $('#password_alert').empty();
              let errors = data.errors;

              $('#password_alert').empty();
              Object.keys(errors).forEach(field => {
                let errorMessage = errors[field];
                $('#password_alert').append(`<li class="text-danger"><small>${errorMessage}</small></li>`);
              $("#change_password_form")[0].reset();

              });
            }
          }
        });
      });

  
// $('#change_password_form').submit(function(e) {
//     e.preventDefault(); // Prevent default form submission

//     console.log('gggg');

//     var formdata = new FormData(this);

    

//     $.ajax({
//         url: 'update_password',
//         method: 'POST',
//         data: formdata,
//         processData: false, // Important for FormData
//         contentType: false, // Important for FormData
//         success: function(response) {
//             console.log(response);
//             // Handle success response here
//         },
//         error: function(xhr, status, error) {
//             console.error(xhr.responseText);
//             $('#change_password_message').html('<p style="color: red;">Failed to update password.</p>');
//         }
//     });
// });



});
    </script>

    
    <?= $this->endSection() ?>
