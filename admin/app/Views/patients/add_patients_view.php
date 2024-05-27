<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Patients
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Add New Patient</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add New Patient</li>
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
                      <h5 class="card-title text-start">Add Patient</h5>
                  </div>
                   <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('patient') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>
            <div class="card-body">
         

              <!-- General Form Elements -->
              <form class="register_form" >
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
                      <input type="text" class="form-control" id="name" name="name" >
                      
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="email" class="form-label"> <i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email Address</label>
                    <input type="email" class="form-control"  id="email" name="email">
                  </div>
                </div>
                <div class="row">
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"><i class="bi bi-lock-fill" style="font-size: 18px;"></i> Password</label>
                      <input type="password" class="form-control"  id="password" name="password">
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                    <input type="number" class="form-control"  id="phone" name="phone">
                  </div>
                  
                </div>

                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputAddress" class="form-label"> <i class="bi bi-house-door-fill" style="font-size: 18px;"></i> Address</label>
                    <textarea class="form-control" id="address" name="address" rows="1"></textarea>

                  </div>
                  
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                     <label for="inputDOB" class="form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Date of Birth</label>
                     <input class="form-control" type="date" id="date_of_birth"   name="date_of_birth">
                  </div>

                  
                </div>
               
               <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputImage" class="form-label"> <i class="bi bi-image-fill" style="font-size: 18px;"></i> Schedule</label>
                      <input class="form-control" type="file" id="image" name="image" accept="image/*">

                    </div>
                  
                </div>
                <br>
               
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                    <button  class="btn addsup-btn"  type="submit">Save</button>
                  </div>
                </div>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function () 
  {
    $(".register_form").submit(function (e) 
    {
      e.preventDefault();
      alert("dgdfgdf");

      var formData = new FormData(this);
      // console.log(formData);

      $.ajax({
        url:"<?=base_url('register_patient_form') ?>",
        method:'post',
        processData:false,
        contentType:false,
        data:formData,
        success:function(response)
        {
          console.log(response);

        }

      });

      
    });
  });
</script>
<?= $this->endSection() ?>
