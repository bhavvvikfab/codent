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
          <!-- <pre> -->
          <?php

          // print_r($data['doctor']);
          // die;
          $adminurl = config('App')->baseURL2;
          $data['enquiry']['image'] = json_decode($data['enquiry']['image'], true);
          ?>
          <div class="card-body">

            <div class="table-responsive">
              <form class="m-3">
                <div class="row">

                  <div class="col-lg-3 pb-2 pb-lg-0">

                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                    <label class="form-label" for="inputNanme4">
                      <h5><b>Patient Profile: </b></h5>
                    </label><br>

                    <img src="<?= $adminurl ?>/public/images/<?= $data['enquiry']['profile'] ?>" style="" width="200"
                      height="200"
                      onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">

                  </div>

                  <div class="col-lg-9 d-lg-flex flex-lg-column justify-content-lg-center">

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
                        <?= isset($data['enquiry']['email']) ? $data['enquiry']['email'] : 'N/A'; ?>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-telephone-fill"
                          aria-hidden="true"></i>
                        <label class="form-label" for=""> <b> Phone Number: </b>
                        </label>
                        <?= isset($data['enquiry']['phone']) ? $data['enquiry']['phone'] : 'N/A'; ?>
                      </div>

                    </div>
                    <hr>

                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-fill" aria-hidden="true"></i>
                        <label class="form-label" for="">
                          <b> Age: </b>
                        </label>
                        <?= isset($data['enquiry']['age']) ? $data['enquiry']['age'] : 'N/A'; ?> Years
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-gender-ambiguous" aria-hidden="true"></i>
                        <label class="form-label" for="">
                          <b> Gender: </b>
                        </label>
                        <?= isset($data['enquiry']['gender']) ? $data['enquiry']['gender'] : 'N/A'; ?>
                      </div>
                    </div>


                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-file-medical-fill" aria-hidden="true"></i> <label class="form-label" for="">
                          <b>Specialty required: </b></label>
                        <?= isset($data['enquiry']['required_specialist']) ? $data['enquiry']['required_specialist'] : 'N/A'; ?>
                      </div>


                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0"><i class="bi bi-calendar-check-fill"></i>
                        <label class="form-label" for="inputNanme4"> <b> Appointment Date: </b>
                        </label>
                        <?= isset($data['enquiry']['appointment_date']) ? $data['enquiry']['appointment_date'] : 'N/A'; ?>
                      </div>


                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0 ">
                        <i class="bi bi-check-square-fill"></i>
                        <label class="form-label m-0"><b> Instruction:</b></label>
                        <span
                          class="ms-2"><?= isset($data['enquiry']['lead_instruction']) ? $data['enquiry']['lead_instruction'] : 'N/A'; ?></span>
                      </div>

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0 ">
                        <i class="bi bi-chat-left-text-fill me-2"></i>
                        <label class="form-label m-0"><b>Comment:</b></label>
                        <span
                          class="ms-2"><?= isset($data['enquiry']['lead_comment']) ? $data['enquiry']['lead_comment'] : 'N/A'; ?></span>
                      </div>
                    </div>
                    <hr>
                    <div class="row">

                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Enquiry note : </b></label>
                        <?= isset($data['enquiry']['note']) ? $data['enquiry']['note'] : 'N/A'; ?>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-chat-left-text-fill"></i> <label class="form-label" for="">
                          <b>Appointment note : </b></label>
                        <?= isset($data['appointment']['note']) ? $data['appointment']['note'] : 'N/A'; ?>
                      </div>

                    </div>
                    <hr>

                    <div class="row">
                      <label class="form-label" for="images"><b><i class="bi bi-images"></i> Documents : </b></label>
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
                                Documents not Uploaded.
                              </div>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                   <hr>

                   <div class="row">
                        <h5 class="fw-bold"><u>Appointment Details :</u></h5>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-clipboard2-fill"></i>
                            <label class="form-label" for=""><b>Status :</b></label>
                            <?php
                            $status = isset($data['appointment']['appointment_status']) ? $data['appointment']['appointment_status'] : '';
                            $textColor = '';
                            
                            if ($status === 'Confirmed') {
                                $textColor = 'text-success';
                            } elseif ($status === 'Pending') {
                                $textColor = 'text-warning';
                            } elseif ($status === 'Cancelled') {
                                $textColor = 'text-danger';
                            }elseif ($status === 'Completed') {
                              $textColor = 'text-info';
                            }
                            ?>
                            <span class="<?= $textColor ?> fw-bold"><?= isset($data['appointment']['appointment_status']) ? $data['appointment']['appointment_status'] : 'N/A'; ?></span>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                        <i class="bi bi-person-circle"></i>
                            <label class="form-label" for=""><b>Dr. Name :</b></label>
                            <?= isset($data['doctor']['data']['fullname']) ? $data['doctor']['data']['fullname'] : 'N/A'; ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                            <i class="bi bi-clock-fill" aria-hidden="true"></i>
                            <label class="form-label" for=""><b>Appointment Slot:</b></label>
                            <?= isset($data['appointment']['schedule']) ? $data['appointment']['schedule'] : 'N/A'; ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                            <i class="bi bi-info-circle-fill" aria-hidden="true"></i>
                            <label class="form-label" for=""><b>Appointment About:</b></label>
                            <?= isset($data['appointment']['instruction_for_lead']) ? $data['appointment']['instruction_for_lead'] : 'N/A'; ?>
                        </div>

                     
                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                            <i class="bi bi-currency-dollar" aria-hidden="true"></i>
                            <label class="form-label" for=""><b>Method:</b></label>
                            <?= isset($data['appointment']['method']) ? $data['appointment']['method'] : 'N/A'; ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                            <i class="bi bi-bookmark-fill" aria-hidden="true"></i>
                            <label class="form-label" for=""><b>Instruction for Lead:</b></label>
                            <?= isset($data['appointment']['instruction_for_lead']) ? $data['appointment']['instruction_for_lead'] : 'N/A'; ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                            <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                            <label class="form-label" for=""><b>Contacted Via:</b></label>
                            <?= isset($data['appointment']['contacted_via']) ? $data['appointment']['contacted_via'] : 'N/A'; ?>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                            <i class="bi bi-person-fill" aria-hidden="true"></i>
                            <label class="form-label" for=""><b>Next Task Assign To:</b></label>
                            <?= isset($data['appointment']['next_task_assign_to']) ? $data['appointment']['next_task_assign_to'] : 'N/A'; ?>
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