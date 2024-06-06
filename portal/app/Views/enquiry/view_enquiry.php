<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Enquiry</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
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
                <h5 class="card-title text-start">Enquiry Info</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'enquiry' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>
          <pre>

            <?php
            // print_r($enquiry);
            // print_r($user);
            // die;
            $adminurl = config('App')->baseURL2;
            // $adminUrl = str_replace('portal', 'admin', $url);
            $enquiry['image'] = json_decode($enquiry['image'], true);
            ?>
          </pre>
          <div class="card-body">

            <div class="table-responsive">
              <form class="m-3">
                <div class="row">

                  <div class="col-lg-4 pb-2 pb-lg-0">

                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                    <label class="form-label" for="inputNanme4">
                      <h5><b>Patient profile: </b></h5>
                    </label><br>


                    <img src="<?= $adminurl ?>/public/images/<?= $enquiry['profile'] ?>" style="" width="250"
                      height="250"
                      onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">


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
                        <label class="form-label" for="inputNanme05"> <b> Patient Name:</b>
                          <?= isset($enquiry['patient_name']) ? $enquiry['patient_name'] : 'N/A'; ?></label>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-week-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for="inputdate"> <b> Birth Date:</b>
                          <?= isset($enquiry['date_of_birth']) ? $enquiry['date_of_birth'] : 'N/A'; ?>
                        </label>
                      </div>
                    </div>
                    <hr>
                    <div class="row">


                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>
                            Email: </b></label> <?= isset($enquiry['email']) ? $enquiry['email'] : 'N/A'; ?>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number: </b>
                          <?= isset($enquiry['phone']) ? $enquiry['phone'] : 'N/A'; ?>
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
                        <i class="bi bi-file-medical-fill" aria-hidden="true"></i> <label class="form-label" for="">
                          <b>Specialty required: </b></label>
                        <?= isset($enquiry['required_specialist']) ? $enquiry['required_specialist'] : 'N/A'; ?>
                      </div>

                
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill"></i>
                        <label class="form-label" for="inputNanme4"> <b> Appointment Date: </b>
                        </label> <?= isset($enquiry['appointment_date']) ? $enquiry['appointment_date'] : 'N/A'; ?>
                      </div>

                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0">
                      <i class="bi bi-geo-alt-fill"></i> <label class="form-label" for="">
                          <b>Address : </b></label>
                        <?= isset($enquiry['address']) ? $enquiry['address'] : 'N/A'; ?>
                      </div>

                     

                    </div>
                 <hr>
                    <div class="row">

                      <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Note : </b></label>
                        <?= isset($enquiry['note']) ? $enquiry['note'] : 'N/A'; ?>
                      </div>

            

                    </div>
                    <hr>

                    <div class="row">
                      <label class="form-label" for="images"><b><i class="bi bi-images"></i> Documents : </b></label>
                      <div class="col-12">
                        <div class="row">
                          <?php if (isset($enquiry['image']) && !empty($enquiry['image'])): ?>

                            <?php foreach ($enquiry['image'] as $index => $image): ?>
                              <div class="col-1 col-lg-1 col-sm-3">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal"
                                  data-image="<?= $adminurl ?>/public/images/<?= $image ?>">
                                  <img src="<?= $adminurl ?>/public/images/<?= $image ?>" style="" width="50" height="50"
                                    class="m-1">
                                </a>
                              </div>
                            <?php endforeach; ?>
                          <?php else: ?>
                            <div class="col-12 col-lg-12 col-sm-12">
                              No Image Uploaded.
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>


                  </div>


              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
    </div>
  </section>

  <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="imageModalLabel">Image Preview</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="modalImage" src="" class="img-fluid" alt="Image">
        </div>
      </div>
    </div>
  </div>
  <!-- End Card with an image on left -->
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