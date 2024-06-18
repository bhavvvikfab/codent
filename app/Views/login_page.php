<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Login 
<?= $this->endSection() ?>
<?= $this->section('content') ?>


<style>
  .page {
  height: 547px; /* Set a fixed height for the pages */
  /* overflow-y: auto; Add scroll if content overflows */
}
</style>

<div class="loader-overlay" id="loader">
        <div class="sk-circle">
            <div class="sk-circle1 sk-child"></div>
            <div class="sk-circle2 sk-child"></div>
            <div class="sk-circle3 sk-child"></div>
            <div class="sk-circle4 sk-child"></div>
            <div class="sk-circle5 sk-child"></div>
            <div class="sk-circle6 sk-child"></div>
            <div class="sk-circle7 sk-child"></div>
            <div class="sk-circle8 sk-child"></div>
            <div class="sk-circle9 sk-child"></div>
            <div class="sk-circle10 sk-child"></div>
            <div class="sk-circle11 sk-child"></div>
            <div class="sk-circle12 sk-child"></div>
        </div>
    </div>

    <section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
      <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 ftco-animate  ">
              <h1 class="h1hedaing text-center">Dentist Portal Login</h1>
               
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
        <div class="container">
          <div class="row flex-row justify-content-between">

            <div class="col-lg-6 col-12 pr-0 side-img-bg" style="height: 500px; overflow: auto;">
              <div class="myoverlay"></div>
              <h2 class = "pr-2 text-center">Well Experienced Doctors and team of experts find here.</h2>
               
            </div>

            <div class="col-lg-6 col-12 login-form bg-dt-portal" style="height: 500px; overflow: auto;">
              <div class="row  py-3 px-4">
                <div class="col-lg-12 px-5">
                  <h3 class="mb-3 text-center text-white">Dentist Login</h3>
                  
                  
                  <form id="validation" class="row g-3 needs-validation" action="<?= base_url('login_data') ?>" method="post" >
                  <?php if (session()->getFlashdata('error')): ?>
                      <small class="m-auto text-center text-danger"><?= session()->getFlashdata('error') ?></small>
                    <?php endif; ?>
                    <br>

                        <div class="row">

                          <div class="col-md-12">
                            <div class="form-group">

                              <div class="input-group mb-3">
                                <span class="input-group-text"  id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" aria-label="email" aria-describedby="basic-addon1" >
                              </div>
                              <div id="email_error" class="text-danger"></div>

                              
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="form-group">

                                <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock" style="font-size: 20px;"></i></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon2">
                          </div>
                        <div id="password_error" class="text-danger"></div>

                               
                            </div>
                          </div>
                          <div class="col-12 pt-2 pb-2">
                            <div class="row">
                              
                              <!-- <div class="col-lg-12 text-center">
                                <a data-toggle="modal" data-target="#modalRequest" class=" text-white forgo"> Forgot Password? </a>
                              </div> -->

                            </div>

                            
                          </div>
                          
                          <div class="col-md-12 mt-2 text-center pt-2 ">
                            <div class="form-group">
                              <button type="submit"  class="btn btn-primary py-2 px-5 w-50">Login</button>
                            </div>
                          </div>

                          <div class="col-md-12 mt-2 text-center pt-2 ">
                            <div class="form-group">
                              <p class="text-white">Don't have an Account? <a href="<?=base_url('register')?>" class="text-right text-white forgo"> Create an Account </a>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
                 
            </div>
          
        
        </div>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
         
            function showToast(message, position) {
                  Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: message,
                      showConfirmButton: true,
                      timer: null
                  });
              }
            
        </script>
      </section>
      <?php if (session('have_package')): ?>
        <script>
          showToast("<?= session('have_package') ?> ");  
        </script>
      <?php endif; ?>

      <?php if (session('password_changed')): ?>
        <script>
          showToast("<?= session('password_changed') ?> ");  
        </script>
      <?php endif; ?>
    </div>
    </section>
    <script>
    $(document).ready(function() 
    {
      
    $('#validation').submit(function(event) 
    {
        event.preventDefault(); // Prevent the default form submission

        // Clear previous error messages
        $('.error-msg').remove();

        // Perform validation
        var isValid = true; // Flag to track if the form is valid

        var email = $('#email').val();
        var password = $('#password').val();
        
        if (email === '') {
            $('#email_error').html('Please enter an email.');
            isValid = false;
        }

        if (password === '') {
            $('#password_error').html('Please enter a password.');
            isValid = false;
        }

        if (isValid) {
            // If all validations pass, submit the form
            this.submit();
        }
    });

    // Clear error messages when user starts typing
    $('#email').on('input', function() {
        $('#email_error').html('');
    });

    $('#password').on('input', function() {
        $('#password_error').html('');
    });
});


</script>

<?= $this->endSection() ?>
