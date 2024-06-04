<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Add New Enquiry</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
            <li class="breadcrumb-item active">Add New Enquiry</li>
          </ol>
        </nav>
      </div>
      <!--<div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">-->
      <!--  <div class="d-flex justify-content-end align-items-center">-->
      <!--    <button type="button" class="btn btn-primary"> <a href="orders.php"> <i class="ri-arrow-left-line"></i> Back </a> </button>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </div>
   <section class="section" id="editorder467">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
            
            <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Add New Enquiry</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end">
                          <a href="<?= base_url('enquiries') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>
            
          <div class="card-body">
       
            <!-- No Labels Form -->
            <form id="add_enquiry" class="row g-3" action="<?=base_url("add_Enquery")?>" method="post" enctype="multipart/form-data">

    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <label for="hospital"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Select Hospital</label>
        <select class="form-control single" id="hospital" name="hospital">
            <option value="">Select Hospital</option>
            <?php foreach ($hospitals as $hospital): ?>
                <option value="<?= $hospital['id'] ?>"><?= $hospital['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <div id="error_hopi"></div>

    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <label for="name"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient Name</label>
        <input type="text" class="form-control" id="name" name="name">
        
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <label for="dob"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Birth Date</label>
        <div class="input-group">
            <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span> <br>                      
            <input type="date" class="form-control rounded-2" id="dob" name="dob" placeholder="" aria-describedby="bdate34">
        </div>
        <div id="doberror"></div>

       
    </div>

    
    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label for="appointment_date"><i class="bi bi-calendar2-date-fill" style="font-size: 18px;"></i> Appointmen Date</label>
    <input class="form-control" type="date" id="appointment_date" name="appointment_date">
<div id="apperror"></div>
    
</div>


    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <label for="phone"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
        <input type="text" class="form-control" id="phone" name="phone">
        <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label for="note"><i class="bi bi-chat-left-text-fill" style="font-size: 18px;"></i> Add Note</label>
    <textarea class="form-control" id="note" name="note" rows="1"></textarea>
    <?php if (session('errors.note')): ?>
                                        <small class="text-danger"><?= esc(session('errors.note')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>

    <div class="col-md-6">
        <label for="specialty"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Specialty required</label>
        <select class="form-select" id="specialty" name="specialty">
        <option value="" selected>--Select--Specialist--</option>
            <option value="Orthodontics">Orthodontics</option>
            <option value="Endodontics">Endodontics</option>
            <option value="Periodontics">Periodontics</option>
            <option value="Prosthodontics">Prosthodontics</option>
            <option value="Implantology">Implantology</option>
            <option value="Radiology">Radiology</option>
            <option value="Sedation">Sedation</option>
        </select>
        <div id="specialtyerror"></div>
        <?php if (session('errors.specialty')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialty')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
    </div>

    

    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
        <label for="doctor"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i> Select Doctor</label>
        <select class="form-control single" id="doctor" name="doctor">
            <option value="">--Select--Doctor--</option>
        </select>
        <div id="doctorerror"></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
    <label for="images"><i class="bi bi-image-fill" style="font-size: 18px;"></i> Upload Images</label>
    <input class="form-control" type="file" id="images" name="images[]" multiple>
    <div id="image-preview" class="mt-3"></div>
    <?php if (session('errors.image')): ?>
                                        <small class="text-danger"><?= esc(session('errors.image')) ?><i class="bi bi-exclamation-circle"></i></small>
                      <?php endif; ?>
</div>
    <div class="d-flex justify-content-end align-items-center col-12">
        <button type="submit" class="btn btn-dark">Add Enquiry</button>
    </div>

</form>

          </div>
        </div>
      </div>
    </div>
  </section>

  
  <?php if (session()->has('status') && session('status') == 'error'): ?>
      <script>
             showToast('Something is wrong .....please try again later.'); 
      </script>
<?php endif; ?>
<?php if (session()->has('errors') && session('errors') == 'errors'): ?>
      <script>
             showToast('hhhh  Something is wrong .....please try again later.'); 
      </script>
<?php endif; ?>
</main><!-- End #main -->


<script>
    $(document).ready(function() {
  $('.single').select2({
    // theme: 'bootstrap5', // Apply Bootstrap 4 theme
    // dropdownCssClass: 'bordered' // Add form-control class to the dropdown
  });
});

    $(document).ready(function() {
        $('#hospital').change(function() {
            var hospitalId = $(this).val();
            if (hospitalId) {
                $.ajax({
                    url: '<?= base_url('get_doctors/') ?>' + hospitalId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
    $('#doctor').empty();
    $('#doctor').append('<option value="">Select Doctor</option>');
    $.each(data, function(key, value)
    {
        $('#doctor').append('<option value="' + value.id + '">' + value.fullname + '</option>');
        console.log(value.id );
    });
}

                });
            } else {
                $('#doctor').empty();
                $('#doctor').append('<option value="">Select Doctor</option>');
            }
        });

        $('#add_enquiry').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Clear previous error messages
            $('.error-msg').remove();

            // Perform validation
            var hospital = $('#hospital').val();
            var name = $('#name').val();
            var dob = $('#dob').val();
            var appointment_date = $('#appointment_date').val();
            var phone = $('#phone').val();
            var specialty = $('#specialty').val();
            var doctor = $('#doctor').val();

            // var email = $('#email').val();
            // var password = $('#password').val();
            // var address = $('#address').val();
            // var qualification = $('#qualification').val();
            // var schedule = $('#schedule').val();
            // var about = $('#about').val();
            // var image = $('#image').val();
            // var specialistOrPractice = $('#specialistOrPractice').val();

            if (hospital === '') {
                $('#error_hopi').after('<small class="error-msg text-danger">Please select hospital.</small>');
                return false;
            }
            
            if (name === '') {
                $('#name').after('<small class="error-msg text-danger">Please enter a name.</small>');
                return false;
            }

            if (dob === '') {
                $('#doberror').html('<small class="error-msg text-danger">Please enter a date of birth.</small>');
                return false; 
            }

            if (appointment_date == '') {
                $('#apperror').html('<small class="error-msg text-danger">Please enter a appointment date.</small>');
                return false;
            }
            if (phone === '') {
    $('#phone').after('<small class="error-msg text-danger">Please enter a phone number.</small>');
    return false; 
} else if (!(/^\d{10}$/.test(phone))) {
    $('#phone').after('<small class="error-msg text-danger">Please enter a 10-digit phone number.</small>');
    return false;
}
            if (specialty === 'n/a') {
                $('#specialtyerror').html('<small class="error-msg text-danger">Please select a specialist.</small>');
                return false; 
            
              }
              if (doctor === '') {
                $('#doctorerror').after('<small class="error-msg text-danger">Please select doctor.</small>');
                return false;
            }


            // if (email == '') {
            //     $('#emailError').html('<small class="error-msg text-danger">Please enter an email.</small>');
            //     return false; 
            // }

            // if (password === '') {
            //     $('#password').after('<small class="error-msg text-danger">Please enter a password.</small>');
            //     return false; 
            // }

            // if (address === '') {
            //     $('#address').after('<small class="error-msg text-danger">Please enter an address.</small>');
            //     return false; 
            // }

            

            

            
            
              

            // if (qualification === '') {
            //     $('#qualification').after('<small class="error-msg text-danger">Please enter a qualification.</small>');
            //     return false; 
            // }
            // if (schedule === '') {
            //     $('#schedule').after('<small class="error-msg text-danger">Please enter a schedule.</small>');
            //     return false; 
            // }

            // if (about === '') {
            //     $('#about').after('<small class="error-msg text-danger">Please enter about information.</small>');
            //     return false;
            // }

            // if (image === '') {
            //     $('#image').after('<small class="error-msg text-danger">Please select an image.</small>');
            //     return false; 
            // }

            // if (specialistOrPractice === '') {
            //     $('#specialistOrPractice').after('<small class="error-msg text-danger">Please select a preference.</small>');
            //     return false; 
            // }

            // If all validations pass, submit the form
            this.submit();
        });


        
    });
</script>
<?= $this->endSection() ?>
