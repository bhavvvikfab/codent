<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Doctors
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Doctor</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Users</a></li>
            <li class="breadcrumb-item active">All Doctors</li>
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
                <h5 class="card-title text-start">Doctors</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_doctor' ?>"> Add New Doctor</a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body view-supplier-table table-responsive">
            <!-- Table with stripped rows -->
            <table class="table table-borderless datatable supplier-table">

              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <!-- <th>Qualification</th> -->
                  <th>Specialist Of</th>
                  <th>Status</th>
                  <th>Action</th>
                  <!-- <th>Status</th> -->
                </tr>
              </thead>

              <tbody>
                <?php
                $adminurl = config('App')->baseURL2;
                $index = 1;

                if (isset($doctors) && is_array($doctors) && count($doctors) > 0):
                  foreach ($doctors as $doctor):
                    if ($doctor !== null): // Check if $doctor is not null
                      $userId = $doctor['user']['id'] ?? 'N/A';
                      $doctorId = $doctor['doctor']['id'] ?? 'N/A';
                      $profileImage = !empty($doctor['user']['profile']) ? $doctor['user']['profile'] : 'user-profile.jpg';
                      $status = isset($doctor['user']['status']) ? $doctor['user']['status'] : 'N/A';
                      $fullname = isset($doctor['user']['fullname']) ? 'Dr. ' . esc($doctor['user']['fullname']) : 'N/A';
                      $phone = isset($doctor['user']['phone']) ? esc($doctor['user']['phone']) : 'N/A';
                      $specialist = isset($doctor['doctor']['specialist_of']) ? esc($doctor['doctor']['specialist_of']) : 'N/A';
                      ?>
                      <tr>
                        <td><?= $index ?></td>
                        <td>
                          <img src="<?= $adminurl ?>/public/images/<?= $profileImage ?>" height="50" width="50"
                            class="rounded-circle"
                            onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">
                        </td>
                        <td><?= $fullname ?></td>
                        <td><?= $phone ?></td>
                        <td><?= $specialist ?></td>
                        <td>
                          <button
                            class="statusToggleBtn btn btn-sm <?= ($status == 'active') ? 'btn-success' : 'btn-danger'; ?>"
                            data-id="<?= $userId ?>">
                            <?= ($status == 'active') ? 'Active' : 'Inactive'; ?>
                          </button>
                        </td>
                        <td>
                          <div class="d-flex justify-content-between align-items-center">
                            <div class="editen p-1">
                              <a href="<?= base_url() . session('prefix') . '/doctor_details/' . $doctorId ?>">
                                <button type="button" class="btn btn-secondary btn-sm"><i class="bi bi-eye"></i></button>
                              </a>
                            </div>
                            <div class="viewsenq p-1">
                              <a href="<?= base_url() . session('prefix') . '/doctor_edit/' . $doctorId ?>">
                                <button type="button" class="btn btn-sm"><i class="bi bi-pencil-square"></i></button>
                              </a>
                            </div>
                            <div class="deleten p-1">
                              <a href="<?= base_url() . session('prefix') . '/doctor_delete/' . $doctorId ?>"
                                class="delete_btn">
                                <button type="button" class="btn btn-sm"><i class="bi bi-trash"></i></button>
                              </a>
                            </div>
                          </div>
                        </td>
                      </tr>
                      <?php
                      $index++;
                    endif;
                  endforeach;
                else:
                  ?>
                  <tr>
                    <td colspan="7" class="text-center">No doctors available.</td>
                  </tr>
                  <?php
                endif;
                ?>
              </tbody>


            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
  <?php if (session()->has('added_dr')): ?>
    <script>
      showToast('Doctor Registered successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('edit_dr')): ?>
    <script>
      showToast('Doctor Info Updated successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('delete_dr')): ?>
    <script>
      showToast('Doctor Delete successfully.');  
    </script>
  <?php endif; ?>
  <script>
    $(document).ready(function () {

      $('.delete_btn').on('click', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "black",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = url;
          }
        });
      });


      $('.statusToggleBtn').on('click', function () {
        var $this = $(this);
        var id = $this.data('id');

        if ($this.hasClass('btn-success')) {
          $this.removeClass('btn-success').addClass('btn-danger');
          $this.text('Inactive');
          $.ajax({
            url: "<?= base_url() . '' . session('prefix') . '/' . 'doctor_status' ?>",
            method: 'get',
            data: { id: id },
            success: function (data) {

              if (data.status == 'success') {
                showToast(data.msg);
              } else {
                console.log(data.msg);
              }

            },
            error: function (err) {
              console.log(err);
            }
          });
        } else {
          $this.removeClass('btn-danger').addClass('btn-success');
          $this.text('Active');
          $.ajax({
            url: "<?= base_url() . '' . session('prefix') . '/' . 'doctor_status' ?>",
            method: 'get',
            data: { id: id },
            success: function (data) {

              if (data.status == 'success') {
                showToast(data.msg);
              } else {
                console.log(data.msg);
              }
            },
            error: function (err) {
              console.log(err);
            }
          });
        }
      });

    });
  </script>

</main><!-- End #main -->
<?= $this->endSection() ?>