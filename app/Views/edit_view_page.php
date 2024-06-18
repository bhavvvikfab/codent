<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Edit Profile
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div id="loader" class="loader-overlay" style="display: none;">
    <div class="loader"></div>
</div>


<section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
    <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ftco-animate">
                    <h1 class="h1hedaing text-center">Edit Profile</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row flex-row justify-content-between profile-page">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <img src="<?php echo base_url() . 'public/images/' . (isset($user['profile']) && !empty($user['profile']) ? $user['profile'] : '1718184797.jpeg'); ?>"
                                     onerror="this.onerror=null; this.src='<?php echo base_url(); ?>public/images/1718184797.jpeg';"
                                     class="rounded-circle img-thumbnail"
                                     style="max-width: 100px;">
                                <h3 class="font-weight-bold"> <?= esc($user['fullname']) ?> </h3>
                                <h6> Hospital </h6>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No user data found.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8 profile-detail">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mb-lg-4" style="color: #4154f1; font-weight: 600;"> Edit Profile </h4>
                            </div>
                            <div class="col-lg-4 text-end">
    <a href="<?= base_url('profile') ?>" class="btn btn-primary py-2 px-5 w-70">Back</a>
</div>
                        </div>
                        <!-- Form for editing profile details -->
    <div class="col">
    
                        <form id="editprofile_form" class="editprofile_form" method="post" enctype="multipart/form-data">  
    <!-- Add your form fields here -->

    <div class="input-group mb-3 field">
        <span class="input-group-text" id="basic-addon3"><i class="fa fa-user-circle-o"></i></span>
        <input type="hidden" id="id" name="id" value="<?= esc($user['id'] ?? '') ?>">
        <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?= esc($user['fullname'] ?? '') ?>" aria-label="name" aria-describedby="basic-addon3">
    </div>
    <div id="fullnameError" class="text-danger text-start"></div>

    <div class="input-group mb-3 field">
    <span class="input-group-text" id="basic-addon3"><i class="fa fa-envelope"></i></span>
    <input type="email" class="form-control" name="email" placeholder="Email Address" value="<?= esc($user['email'] ?? '') ?>" aria-label="email" aria-describedby="basic-addon3" readonly>
</div>
<div id="emailError" class="text-danger text-start"></div>

    <div class="input-group mb-3 field">
        <span class="input-group-text" id="basic-addon4"><i class="fa fa-phone"></i></span>
        <input type="tel" class="form-control" name="phone" placeholder="Phone Number" value="<?= esc($user['phone'] ?? '') ?>" aria-label="phone" aria-describedby="basic-addon4">
    </div>
    <div id="phoneError" class="text-danger text-start"></div>

    <div class="input-group mb-3 field">
        <span class="input-group-text" id="basic-addon5"><i class="fa fa-calendar"></i></span>
        <input type="date" class="form-control" name="dob" placeholder="Date Of Birth" value="<?= esc($user['date_of_birth'] ?? '') ?>" aria-label="Date-Of-Birth" aria-describedby="basic-addon5">
    </div>
    <div id="dobError" class="text-danger text-start"></div>

    <div class="input-group mb-3 field">
        <span class="input-group-text" id="basic-addon6"><i class="fa fa-map-marker"></i></span>
        <textarea class="form-control" name="address" placeholder="Address" style="resize: none; height: 40px;" aria-label="address" aria-describedby="basic-addon3"><?= esc($user['address'] ?? '') ?></textarea>
    </div>
    <div id="addressError" class="text-danger text-start"></div>

    <div class="input-group mb-3 field">
        <span class="input-group-text" id="basic-addon7"><i class="fa fa-image"></i></span>
        <input type="file" name="image" class="form-control" aria-label="profile_image" aria-describedby="basic-addon7">
    </div>
    <div id="imageError" class="text-danger text-start"></div>

    
    <button style="margin-right: 50px !important;" type="submit" id="edit_profile" class="btn btn-primary py-2 px-5 w-70">Update Profile</button>

    <ul id="alert"></ul>
    </div>

</form>                     



                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $(document).on('click', '#edit_profile', function (e) {
            e.preventDefault();
            $('#loader').show();
            // Get form data
            var formData = new FormData($('#editprofile_form')[0]);
            $.ajax({
                url: "<?= base_url('profile_update')?>",
                method: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) 
                {
                    $('#loader').hide();
                    if (data.status === "success") {
                        
                            // Reattach event handler after the section is reloaded
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: 'Profile updated successfully.'
                            });
                            setTimeout(function() {
                            window.location.href = "<?= base_url('profile') ?>";
                        }, 1000); // 2 seconds delay
                            
                        
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
                error: function (xhr, status, error) 
                {
                    $('#loader').hide();
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>
