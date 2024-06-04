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
                  <th data-type="date" data-format="DD/MM/YYYY" class="text-center">Schedule</th>
                  <th class="text-center">Action</th>

                </tr>
              </thead>

              <tbody>
                <?php if (!empty($data)): ?>
                  <?php foreach ($data as $index => $item): ?>
                    <tr>
                      <td><?= esc($index + 1); ?></td>
                      <td><?= esc($item['inquiry']['patient_name']?? 'N/A'); ?></td>
                      <td><?= esc($item['inquiry']['required_specialist']?? 'N/A'); ?></td>
                      <td><?= esc($item['appointment']['schedule']); ?></td>
                      <td>
                        <div class="d-flex justify-content-around align-items-center">
                          <div class="editen p-1">
                            <a
                              href="<?= base_url() . '/' . session('prefix') . '/edit_appointment/' . $item['appointment']['id'] ?>">
                              <button type="button" class="btn btn-danger btn-sm"><i class='bx bx-edit'></i></button>
                            </a>
                          </div>
                          <div class="viewsenq p-1">
                            <a
                              href="<?= base_url() . '/' . session('prefix') . '/view_appointment/' . $item['appointment']['id'] ?>">
                              <button type="button" class="btn btn-danger btn-sm"><i class="ri-eye-line"></i></button>
                            </a>
                          </div>
                          <div class="deleten p-1">
                            <a
                              href="<?= base_url() . '/' . session('prefix') . '/delete_appointment/' . $item['appointment']['id'] ?>" class="delete_btn" >
                              <button type="button" class="btn btn-danger btn-sm"><i
                                  class="ri-delete-bin-line"></i></button>
                            </a>
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
    $('.delete_btn').on('click', function (e) {
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
  });
</script>

<?= $this->endSection() ?>