<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Appointment-Details
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>View Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">View Appointment</li>
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
                <h5 class="card-title text-start">Appointment Details</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'appointment' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>
          <?php
          // print_r($data);
          // die;
          $adminurl = config('App')->baseURL2;
          // $adminUrl = str_replace('portal', 'admin', $url);
          $data['enquiry']['image'] = json_decode($data['enquiry']['image'], true);
          ?>
          <div class="card-body">

            <div class="table-responsive">
              <form class="m-3">
                <div class="row">

                  <div class="col-lg-4 pb-2 pb-lg-0">

                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                    <label class="form-label" for="inputNanme4">
                      <h5><b>Profile Image: </b></h5>
                    </label><br>


                    <img src="<?= $adminurl ?>/public/images/<?= $data['patient']['profile'] ?>" style="" width="auto">


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
                          <?= isset($data['enquiry']['patient_name']) ? $data['enquiry']['patient_name'] : 'N/A'; ?></label>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-week-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for="inputdate"> <b> Birth Date:</b>
                          <?= isset($data['enquiry']['date_of_birth']) ? $data['enquiry']['date_of_birth'] : 'N/A'; ?>
                        </label>
                      </div>
                    </div>
                    <hr>
                    <div class="row">


                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-envelope-fill" aria-hidden="true"></i> <label class="form-label" for=""> <b>
                            Email: </b></label>
                        <?= isset($data['patient']['email']) ? $data['patient']['email'] : 'N/A'; ?>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number: </b>
                          <?= isset($data['patient']['phone']) ? $data['patient']['phone'] : 'N/A'; ?>
                        </label>
                      </div>

                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-file-medical-fill" aria-hidden="true"></i> <label class="form-label" for="">
                          <b>Specialty required: </b></label>
                        <?= isset($data['enquiry']['required_specialist']) ? $data['enquiry']['required_specialist'] : 'N/A'; ?>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-bounding-box-circles"></i>
                        <label class="form-label" for="inputNanme4"> <b> Referral: </b>
                        </label> <?= isset($ref['fullname']) ? $ref['fullname'] : 'N/A'; ?>
                      </div>

                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Enquiry About : </b></label>
                        <?= isset($data['enquiry']['note']) ? $data['enquiry']['note'] : 'N/A'; ?>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill"></i>
                        <label class="form-label" for="inputNanme4"> <b> Appointment Date: </b>
                        </label>
                        <?= isset($data['enquiry']['appointment_date']) ? $data['enquiry']['appointment_date'] : 'N/A'; ?>
                      </div>

                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Appointment About : </b></label>
                        <?= isset($data['appointment']['note']) ? $data['appointment']['note'] : 'N/A'; ?>
                      </div>

                    </div>
                    <hr>

                    <div class="row">
                      <label class="form-label" for="images"><b><i class="bi bi-images"></i> Images : </b></label>
                      <div class="col-12">
                        <div class="row">
                          <?php if (isset($data['enquiry']['image']) && !empty($data['enquiry']['image'])): ?>

                            <?php foreach ($data['enquiry']['image'] as $index => $image): ?>
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
  <!-- End Card with an image on left -->
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
</main><!-- End #main -->
<script>
  $(document).ready(function () {
    $('#imageModal').on('show.bs.modal', function (event) {
      var image = $(event.relatedTarget).data('image');
      $('#modalImage').attr('src', image);
    });
  });
</script>
<?= $this->endSection() ?>