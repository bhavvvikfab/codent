<footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-4">
            <div class="ftco-footer-widget mb-4">
              <a href="<?= base_url('/') ?>" class="ft-logo d-flex align-items-center mb-3">
                <img src="<?= base_url()?>public/images/logo.png" alt="">
                <span class="d-none d-lg-block pl-lg-2">CoDent</span>
            </a>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft ">
              <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
              <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
            </ul>
          </div>
          <div class="col-md-2">
            <div class="ftco-footer-widget mb-4 ">
              <h2 class="ftco-heading-2">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="<?= base_url('/') ?>" class="py-2 d-block">Home</a></li>
                <li><a href="<?= base_url('dentist_portal') ?>" class="py-2 d-block">Dentist portal</a></li>
                <li><a href="<?= base_url('refer') ?>" class="py-2 d-block">Refer A Patient</a></li>
                <li><a href="<?= base_url('dentist_login') ?>" class="py-2 d-block">Log Out</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Specialist</h2>
              <div class="block-23 mb-3">
                 <ul class="list-unstyled">
                    <li><a href="#" class="py-2 d-block">Teeth Whitening</a></li>
                    <li><a href="#" class="py-2 d-block">Orthodentist</a></li>
                    <li><a href="#" class="py-2 d-block">Endodontics</a></li>
                    <li><a href="#" class="py-2 d-block">Implatology</a></li>
                     
                  </ul>
                 
              </div>
            </div>
          </div>
          <div class="col-md-4 pr-md-4">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?= base_url()?>public/images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?= base_url()?>public/images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold" id="modalRequestLabel">Recover Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="changePasswordForm">
             
            <div class="form-group">
               <label for="appointment_email" class="text-black"> Current Password</label> 
              <input type="text" class="form-control" name="currentPassword"  id="appointment_email" >
            </div>
            <div class="form-group">
               <label for="appointment_email" class="text-black">New Password </label> 
              <input type="text" class="form-control" name="newPassword"  id="appointment_email" >
            </div>
            <div class="form-group">
               <label for="appointment_email" class="text-black">Confirm Password</label> 
              <input type="text" class="form-control" name="confirmPassword"  id="appointment_email" >
            </div>
             
            <div class="form-group pt-md-2">
              <button type="submit"  class="btn btn-primary py-2 px-5 w-50">Submit</button>
            </div>
          </form>
        </div>
        
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function () {

    $('#changePasswordForm').submit(function (e) {
        e.preventDefault();
        let formData = $(this).serialize();
        $.ajax({
          url: "<?= base_url('update_password') ?>",
          method: 'post',
          data: formData,
          success: function (data) {
            console.log(data);
            if (data.status == "success") {
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Password Chanaged successfully.'
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


  </script>


  