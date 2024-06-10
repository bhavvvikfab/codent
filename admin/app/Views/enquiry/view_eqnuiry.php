<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Enquiry</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">View Enquiry</li>
          </ol>
        </nav>
      </div>
    </div>
    </div> 
    <!-- End Page Title -->

    <!-- Card with an image on left -->
     <section class="section" id="viewsup1021">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Enquiry</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('enquiries') ?>"> Back </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body">

              <div class="table-responsive">
            <form class="m-3">
            <?php if (!empty($enquiries) && is_array($enquiries)): ?>
            <?php foreach ($enquiries as $enquiry): ?>
              <div class="row">

                <div class="col-lg-4 pb-2 pb-lg-0 text-center">
                  
                  <i class="bi bi-image-fill" aria-hidden="true"></i>
                  <label class="form-label" for="inputNanme4"> <h5><b> Patient Image: </b></h5>
                  </label><br> 
        <img src="<?= base_url() ?>public/images/<?= session('profile') && !empty(session('profile')) ? session('profile') : 'user-profile.jpg' ?>" alt="Profile" class="rounded-circle img-thumbnail" width="100" height="100">

                  <!-- <img  src="<?= base_url('public/images/' ) ?>" alt="Profile Image" class="rounded-circle img-thumbnail" style="max-width: 100px;"> -->

                  <!-- 
                  <label class="form-label" for="inputNanme4"> <b> User Image: </b>
                  </label> 
                  <img src="assets/img/josh-d-avatar.jpg">
                     <div class="user-view-thumbnail">
                          <img src="assets/img/josh-d-avatar.jpg">
                    </div>               -->

                </div>

                <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">

                  <div class="row">

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-person-circle" aria-hidden="true"></i>
                      <label class="form-label" for="inputNanme05"> <b> Patient Name:</b> <?= $enquiry['patient_name'] ?></label> 
                     </div>
                       
                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-week-fill" aria-hidden="true"></i>
                      <label class="form-label" for="inputdate"> <b> Birth Date:</b> <?= $enquiry['date_of_birth'] ?>
                    </label> 
                     </div>
                  </div>
              <hr>
              <div class="row">
                                            
              <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>
                            Email: </b></label> <?= isset($enquiry['email']) ? $enquiry['email'] : 'N/A'; ?>
                      </div>
                  

                    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill" aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number: </b> <?= $enquiry['phone'] ?>
                        </label>
                     </div>
                 

                    
              </div>
              <hr>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-fill" aria-hidden="true"></i>
                        <label class="form-label" for="">
                          <b> Age: </b>
                        </label>
                        <?= $enquiry['phone'] ?>
                        <?= isset($enquiry['age']) ? $enquiry['age'] : 'N/A'; ?> Years
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-gender-ambiguous" aria-hidden="true"></i>
                        <label class="form-label" for="">
                          <b> Gender: </b>
                        </label>
                        <?= isset($enquiry['gender']) ? $enquiry['gender'] : 'N/A'; ?>
                      </div>
                    </div>

              <hr>
             
              <div class="row">
                              
              <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                    <i class="bi bi-file-medical-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>Specialty required: </b></label> <?= $enquiry['required_specialist'] ?>  
                   </div>

                   <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill"></i>
                        <label class="form-label" for="inputNanme4"> <b> Appointment Date: </b>
                        </label> <?= isset($enquiry['appointment_date']) ? $enquiry['appointment_date'] : 'N/A'; ?>
                      </div>
                  

                  
                 
              </div>
              
              <hr>

              <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
        <i class="bi bi-geo-alt-fill"></i> 
        <label class="form-label" for=""><b>Address:</b></label>
        <?= isset($enquiry['address']) ? $enquiry['address'] : 'N/A'; ?>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
        <i class="bi bi-chat-left-text-fill"></i> 
        <label class="form-label" for=""><b>Note:</b></label>
        <?= isset($enquiry['note']) ? $enquiry['note'] : 'N/A'; ?>
    </div>
    </div>
<hr>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
        <i class="bi bi-chat-left-text-fill"></i> 
        <label class="form-label" for=""><b>Enquiry Status :</b></label>
        <?= isset($enquiry['status']) ? $enquiry['status'] : 'N/A'; ?>
    </div>
</div>
<hr>
                      
                   <div class="row">
    <h4><b>Follow Up Details</b></h4>
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
        <i class="bi bi-calendar-check-fill"></i>
        <label class="form-label"><b>Date and Time: </b>
            <?= isset($leadInstructions['date_time']) ? 
                DateTime::createFromFormat('Y-m-d\TH:i', $leadInstructions['date_time'])
                ->format('F j, Y \a\t h:i A') 
                : 'N/A'; 
            ?>
        </label>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
        <i class="bi bi-chat-left-text-fill"></i>
        <label class="form-label" for=""><b> Response: </b></label>
        <?= isset($leadInstructions['response']) ? $leadInstructions['response'] : 'N/A'; ?>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
    <i class="bi bi-envelope-fill"></i> 
        <label class="form-label"><b>Contacted Via: </b></label>
        <?= isset($leadInstructions['contacted_via']) ? $leadInstructions['contacted_via'] : 'N/A'; ?>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
        <i class="bi bi-chat-left-text-fill"></i>
        <label class="form-label" for=""><b> Note: </b></label>
        <?= isset($leadInstructions['note_for_team']) ? $leadInstructions['note_for_team'] : 'N/A'; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
    <i class="bi bi-alarm-fill"></i>
        <label class="form-label"><b>Remind Me: </b></label>
        <?= isset($leadInstructions['remind_me']) ? $leadInstructions['remind_me'] : 'N/A'; ?>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
    <i class="bi bi-calendar-check-fill"></i>
        <label class="form-label" for=""><b> Appointment With: </b></label>
        <?= isset($leadInstructions['appointment_with']) ? $leadInstructions['appointment_with'] : 'N/A'; ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
    <i class="bi bi-wrench"></i> 
        <label class="form-label"><b>Method: </b></label>
        <?= isset($leadInstructions['method']) ? $leadInstructions['method'] : 'N/A'; ?>

    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
    <i class="bi bi-person-plus-fill"></i>
    <!-- <i class="bi bi-person-plus-circle"></i> -->
        <label class="form-label" for=""><b> Assign Next Task To: </b></label>
        <?= isset($leadInstructions['assigne_next_task']) ? $leadInstructions['assigne_next_task'] : 'N/A'; ?>
    </div>
</div>

             


              <hr>
    <div class="row">
    <label class="form-label" for="images"><b><i class="bi bi-images"></i> Images : </b></label>
        <?php
        // Decode the JSON string to an array
        $imagePaths = json_decode($enquiry['image'], true);

        // Check if $imagePaths is an array and not empty
        if (is_array($imagePaths) && !empty($imagePaths)) {
            foreach ($imagePaths as $index => $imagePath) {
                ?>
                <div class="col-3 col-lg-1 col-sm-3"> <!-- Adjust the column sizes as needed -->
                    <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal<?= $index ?>">
                        <img src="<?= base_url('public/images/' . $imagePath) ?>" class="img-fluid m-1" alt="Image">
                    </a>
                </div>

                <!-- Modal for each image -->
                <div class="modal fade" id="imageModal<?= $index ?>" tabindex="-1" aria-labelledby="imageModalLabel<?= $index ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="imageModalLabel<?= $index ?>">Image Preview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="<?= base_url('public/images/' . $imagePath) ?>" class="img-fluid" alt="Image Preview">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No images found."; // Handle case where no images are available
        }
        ?>
    </div>
</div>
              <?php endforeach; ?>   
                  <?php else: ?>
        <p>No enquiries found.</p>
    <?php endif; ?>    
            </form>            
          </div>
        </div>
      </div>

              </div>
            </div>
        </div>
      </div>
    </section>

    

  </main><!-- End #main -->
  <script>
    $(document).ready(function () {
      $('#imageModal').on('show.bs.modal', function (event) {
        var image = $(event.relatedTarget).data('image');
        $('#modalImage').attr('src', image);
      });
    });
  </script>
</main><!-- End #main -->

<?= $this->endSection() ?>
