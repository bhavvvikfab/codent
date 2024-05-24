<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Edit_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Edit Doctor Profile</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Edit Doctor Profile</li>
          </ol>
        </nav>
      </div>
    </div>
    </div>

<section class="section" id="adduserform123">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Edit Doctor Profile</h5>
                  </div>
                   <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('doctors') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>
            <div class="card-body">   
         

              <!-- General Form Elements -->
              <form id="updateForm" enctype="multipart/form-data">
              <?php if(isset($doctors)): ?>
                <div class="row ">
                    <div class="col-lg-6 mb-3">
                      <label for="name" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor Name</label>
                      
                      <input type="text" class="form-control" id="name" name="name" value="<?= esc($doctors['full_name']) ?>">
                      <div id="nameError" class="text-danger"></div>
                      <input type="hidden" class="form-control" id="id" name="id" value="<?= esc($doctors['user_id']) ?>">
                    </div>
                    <div class="col-lg-6 mb-3">
                      <label for="email" class="form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email</label>
                      <input type="email" class="form-control" id="email" name="email"  value="<?= esc($doctors['email']) ?>" >
                      <div id="emailError" class="text-danger"></div> 
                    
 
                </div>
                <div class="row">
                            
                                <div class="col-lg-6 mb-3">
                                    <label for="address" class="form-label"><i class="bi bi-geo-alt-fill" style="font-size: 18px;"></i> Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="1"><?= esc($doctors['address']) ?>" </textarea>
                                    <div id="addressError" class="text-danger"></div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                   <label for="dob" class="form-label"><i class="bi bi-calendar-fill" style="font-size: 18px;"></i> Date of Birth</label>
                                   <input type="date" class="form-control" id="dob" name="dob" value="<?= esc($doctors['date_of_birth']) ?>" >
                                   <div id="dobError" class="text-danger"></div>
                                </div>

                            </div>
                            <div class="row">
                            
                                
                                <div class="col-lg-6 mb-3">
                                    <label for="phone" class="form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="<?= esc($doctors['phone']) ?>" >
                                    <div id="phoneError" class="text-danger"></div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="schedule" class="form-label"><i class="bi bi-calendar-event-fill" style="font-size: 18px;"></i> Schedule</label>
                                    <input type="date" class="form-control" id="schedule" name="schedule" placeholder="e.g., Mon-Fri, 9am-5pm" value="<?= esc($doctors['schedule']) ?>">
                                    <div id="scheduleError" class="text-danger" ></div>
                                </div>
                                
                            </div>

                            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="specialist_of" class="form-label"> <i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Specialist Of</label>
                    <input type="text" class="form-control" id="specialist" name="specialist"  value="<?= esc($doctors['specialist_of']) ?>">
                    <div id="specialistError" class="text-danger"></div>
                  
                  </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="qualification" class="form-label"> <i class="bi bi-award-fill" style="font-size: 18px;"></i> Qualification</label>
                    <input type="text" class="form-control" id="qualification" name="qualification"  value="<?= esc($doctors['qualification']) ?>">
                    <div id="qualificationError" class="text-danger"></div>

                  </div>
                  
                  
                </div>
                            <div class="row">
                            

                                <div class="col-lg-6 mb-3">
                                    <label for="about" class="form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> About</label>
                                    <input type="text" class="form-control" id="about" name="about" value="<?= esc($doctors['about']) ?>">
                                    <div id="aboutError" class="text-danger" ></div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="hospital_id" class="form-label"><i class="bi bi-hospital" style="font-size: 18px;"></i> Hospital</label>
                    <select class="form-control" id="hospital_id" name="hospital_id">
                        <option value="">Select Hospital</option>
                        <?php foreach($hospitals as $hospital): ?>
                            <option value="<?= esc($hospital['id']) ?>" <?= $doctors['hospital_id'] == $hospital['id'] ? 'selected' : '' ?>><?= esc($hospital['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div id="hospital_idError" class="text-danger"></div>

                            </div>
                            <div class="row">

                            


                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 mb-3">
    <label for="image" class="form-label">Doctor Image</label>
    <div class="input-group">
        <input class="form-control" type="file" id="image" name="image" accept="image/*">
        <div class="input-group-append">
            <?php if (!empty($doctors['profile'])): ?>
                <img id="imagePreview" src="<?= base_url('public/images/' . $doctors['profile']) ?>" alt="Doctor Image" style="width: 50px; height: auto;">
            <?php else: ?>
                <span class="input-group-text">No Image</span>
            <?php endif; ?>
        </div>
    </div>
    <div id="imageError" class="text-danger"></div>
</div>
</div>

                

               
               
               
                
               
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                  <button class="btn addsup-btn" type="submit">Save Changes</button>
                  </div>
                </div>
                <?php else: ?>
                   <p>Doctor not found.</p>
                <?php endif; ?>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

        <!--  --><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
<script>
    $(document).ready(function() {
      $('#updateForm').submit(function(e) 
      {
        e.preventDefault(); // Prevent the form from submitting normally
        var fileInput = $('#image');
            var filePath = fileInput.val();
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            // Validate file extension
            if (!allowedExtensions.exec(filePath)) {
                alert('Please upload files with extensions .jpeg/.jpg/.png/.gif only.');
                fileInput.val('');
                return false; // Abort form submission if invalid file type
            }

            // Show image preview
            if (fileInput[0].files && fileInput[0].files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                };
                reader.readAsDataURL(fileInput[0].files[0]);
            }


        var isValid = true;
            var id = $("#id").val();
            var name = $("#name").val();
            var email = $("#email").val();
            // console.log(password,email);
            var address = $("#address").val();
            var dob = $("#dob").val();
            var phone = $("#phone").val();
            var specialist = $("#specialist").val();
            var qualification = $("#qualification").val();
            var schedule = $("#schedule").val();
            var about = $("#about").val();
            var hospital_id = $("#hospital_id").val();
            var image = $("#image").val();
            var specialistOrPractice = $("#specialistOrPractice").val();
            // console.log(id);

$('.text-danger').text('');

if (name === '') {
                $('#nameError').text('Please enter a Name.');
                isValid = false;
            }
            if (email === '') {
                $('#emailError').text('Please enter an Email.');
                isValid = false;
            }
            
            if (address === '') {
                $('#addressError').text('Please enter a Name.');
                isValid = false;
            }
            if (dob === '') {
                $('#dobError').text('Please enter a Name.');
                isValid = false;
            }
            if (phone === '') {
                $('#phoneError').text('Please enter a Phone Number.');
                isValid = false;
            }
            if (specialist === '') {
                $('#specialistError').text('Please enter a Specialist.');
                isValid = false;
            }
            if (qualification === '') {
                $('#qualificationError').text('Please enter a Qualification.');
                isValid = false;
            }
            if (schedule === '') {
                $('#scheduleError').text('Please enter a Qualification.');
                isValid = false;
            }
            if (about === '') {
                $('#aboutError').text('Please enter a Qualification.');
                isValid = false;
            }
            if (hospital_id === '') {
                $('#hospital_idError').text('Please select a Hospital.');
                isValid = false;
            }
            if (image === '') {
                $('#imageError').text('Please upload a valid Image.');
                isValid = false;
            }

if (isValid)

if (isValid) {
        // Get form data
        var formData = new FormData(this);

        // Send AJAX request
        $.ajax({
            url: '<?php echo base_url('doctor/updateDoctor'); ?>', // URL to your controller method
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response)
            {
                  showToast(response.message);
                  setTimeout(function() 
                  {
                    window.location.href = '<?= base_url("doctors")?>'; 
                  }, 2000);
                
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText); // Log the error response (optional)
                alert('Error updating doctor information. Please try again.');
            }
        });
      }
    });
    });
</script>


<?= $this->endSection() ?>
