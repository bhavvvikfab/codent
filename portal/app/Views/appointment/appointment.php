<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Appointment
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">All Appointment</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->


  <section class="section" id="sup001">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Appointment</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_appointment' ?>"> Add New
                    Appointment</a>
                </h5>
              </div>
            </div>
          </div>
          <!-- <pre> -->
          <?php
          // print_r($data);
          // die;
          ?>
          <!-- </pre> -->
          <div class="card-body view-supplier-table table-responsive">
            <!-- Table with stripped rows -->
            <table class="table table-borderless datatable supplier-table">

              <thead>
                <tr>
                  <th> Sr. No.</th>
                  <th>Patient Name</th>
                  <th class="text-center">Required Specialist</th>
                  <th data-type="date" data-format="DD/MM/YYYY" class="text-center">Date and Time</th>
                  <th>Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>

              <tbody>
                <?php if (!empty($data)): ?>
                  <?php foreach ($data as $index => $item): ?>
                    <tr>
                      <td><?= esc($index + 1); ?></td>
                      <td><?= esc($item['inquiry']['patient_name'] ?? 'N/A'); ?></td>
                      <td><?= esc($item['inquiry']['required_specialist'] ?? 'N/A'); ?></td>
                      <td><?= esc($item['appointment']['schedule']); ?></td>
                      <td>
                        <?php
                        $status = $item['appointment']['appointment_status'];
                        $badgeColor = '';
                        if ($status === 'Pending') {
                          $badgeColor = 'warning';
                        } elseif ($status === 'Confirmed') {
                          $badgeColor = 'success';
                        } elseif ($status === 'Cancelled') {
                          $badgeColor = 'danger';
                        } else {
                          $badgeColor = 'secondary';
                        }
                        ?>
                        <span class="badge <?= $badge_class; ?>" style="font-size: 1rem; padding: 0.5rem 1rem;">
                    <?= $status_text; ?>
                </span>
                        
                      </td>
                      <td>
                        <div class="d-flex justify-content-around align-items-center">
                          <div class="editen ">
                            <a
                              href="<?= base_url() . '/' . session('prefix') . '/edit_appointment/' . $item['appointment']['id'] ?>">
                              <button type="button" class="btn btn-danger btn-sm"><i class='bx bx-edit'></i></button>
                            </a>
                          </div>
                          <div class="viewsenq ">
                            <a
                              href="<?= base_url() . '/' . session('prefix') . '/view_appointment/' . $item['appointment']['id'] ?>">
                              <button type="button" class="btn btn-danger btn-sm"><i class="ri-eye-line"></i></button>
                            </a>
                          </div>
                          <div class="deleten">
                            <a href="<?= base_url() . '/' . session('prefix') . '/delete_appointment/' . $item['appointment']['id'] ?>"
                              class="delete_btn">
                              <button type="button" class="btn btn-danger btn-sm"><i
                                  class="ri-delete-bin-line"></i></button>
                            </a>
                          </div>
                          <div class="confirm">
                            <?php if ($status == 'Pending'): ?>
                              <button type="button" class="btn btn-primary btn-sm confirm_btn"
                                data-id="<?= $item['appointment']['id'] ?>" data-bs-toggle="modal"
                                data-bs-target="#confirmModal"><i class="bi bi-check-lg"></i>
                              </button>
                            <?php elseif(($status == 'Confirmed')): ?>
                              <button type="button" class="btn btn-danger btn-sm cancel_btn"
                                data-id="<?= $item['appointment']['id'] ?>"><i class="bi bi-x-lg"></i>
                              </button>
                            <?php elseif(($status == 'Cancelled')): ?>
                              <button type="button" class="btn btn-primary btn-sm confirm_btn"
                                data-id="<?= $item['appointment']['id'] ?>" data-bs-toggle="modal"
                                data-bs-target="#confirmModal"><i class="bi bi-arrow-repeat"></i>
                              </button>
                            <?php endif; ?>
                          </div>

                        </div>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5" class='text-center'>No appointments available.</td>
                  </tr>
                <?php endif; ?>
              </tbody>

            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- confirm model -->
  <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold" id="confirmModalLabel">Confirm Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="confirm_form">
            <div class="mb-3">
              <input type="hidden" name="appointmentId" id="appointment_id">
              <label for="price" class="form-label">
                <i class="bi bi-currency-dollar" style="font-size: 18px;"></i>
                <b>Treatment Price :</b>
              </label>
              <input type="number" class="form-control" id="price" name="treatment_price"  min="0" required>
            </div>
            <div class="mb-3">
              <label for="note" class="form-label">
                <i class="bi bi-chat-right-dots" style="font-size: 18px;"></i>
                <b>Note for Team :</b>
              </label>
              <textarea class="form-control" id="note" name="note_for_team"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <!-- confirm model -->

  <?php if (session()->has('status') && session('status') == 'success'): ?>
    <script>
      showToast('Appointment Added Successfully');  
    </script>
  <?php endif; ?>

  <?php if (session()->has('delete')): ?>
    <script>
      showToast('<?= session("delete") ?>');  
    </script>
  <?php endif; ?>

  <?php if (session()->has('edit_success')): ?>
    <script>
      showToast('<?= session("edit_success") ?>');  
    </script>
  <?php endif; ?>

</main><!-- End #main -->
<script>
  $(document).ready(function () {
    // Delete button event with SweetAlert confirmation
    $(document).on('click', '.delete_btn', function (e) {
      e.preventDefault();
      var url = $(this).attr('href');
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = url;
        }
      });
    });

    // Confirm button event
    $(document).on('click', '.confirm_btn', function () {
      let id = $(this).data('id');
      $('#appointment_id').val(id);

    });

     // Confirm form submit event
     $(document).on('submit', '#confirm_form', function (event) {
      event.preventDefault();
      Swal.fire({
        title: "Are you sure?",
        text: "Do you want to confirm this appointment?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, confirm it!"
      }).then((result) => {
        if (result.isConfirmed) {
          let formData = new FormData(this);
          $.ajax({
            url: "<?= base_url(session('prefix') . '/confirm_appointment') ?>",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              $('#confirmModal').modal('hide');
              $('#confirm_form')[0].reset(); // Reset the form after successful submission
              if (response.success) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: response.message,
                });
                $('.datatable').load("<?= base_url(session('prefix') . '/appointment') ?> .datatable");
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response.message,
                });
              }
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText);
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing your request.',
              });
            }
          });
        }
      });
    });

     // Cancel button event
     $(document).on('click', '.cancel_btn', function (event) {
      event.preventDefault();
      let id = $(this).data('id');
      Swal.fire({
        title: "Are you sure?",
        text: "Do you want to cancel this appointment?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, cancel it!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "<?= base_url(session('prefix') . '/cancel_appointment') ?>",
            type: "POST",
            data: { id: id },
            success: function (response) {
              $('#confirmModal').modal('hide');
              if (response.success) {
                Swal.fire({
                  icon: 'success',
                  title: 'Success',
                  text: response.message,
                });
                $('.datatable').load("<?= base_url(session('prefix') . '/appointment') ?> .datatable");
              } else {
                Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: response.message,
                });
              }
            },
            error: function (xhr, status, error) {
              console.error(xhr.responseText);
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while processing your request.',
              });
            }
          });
        }
      });
    });

  });
</script>


<?= $this->endSection() ?>