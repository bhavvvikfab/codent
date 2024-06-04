<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Enquiries</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">All Enquiries</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="userapp01">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">All Enquiries</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_enquiry' ?>"> Add New Enquiry </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body allappuser-table table-responsive">
            <!-- Table with stripped rows -->
            <table class="table table-borderless datatable appuser-table">
              <!-- <table class="table datatable table-bordered supplier-table"> -->
              <thead>
                <tr>
                  <th> Sr. No. </th>
                  <th>Patient Name</th>
                  <th>Phone No.</th>
                  <th>Required Specialist</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php if (!empty($enquiries)): ?>
                  <?php foreach ($enquiries as $index => $enquiry): ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= esc($enquiry['patient_name']) ?></td>
                      <td><?= esc($enquiry['phone']) ?></td>
                      <td><?= esc($enquiry['required_specialist']) ?></td>
                      <td>
                        <div class="d-flex justify-content-around align-items-center">
                          <button type="button" class="btn btn-success btn-sm">Approve</button>
                        </div>
                      </td>
                      <td>
                        <div class="d-flex justify-content-around align-items-center">
                          <!-- <div class="editen m-1">

                            <a type="button"
                              href="<?= base_url() . session('prefix') . '/edit_enquiry/' . esc($enquiry['enquiry_id']) ?>"
                              class="btn btn-dark btn-sm"><i class='bx bx-edit'></i></a>
                          </div> -->
                          <div class="viewsenq m-1">
                            <a type="button"
                              href="<?= base_url() . session('prefix') . '/view_enquiry/' . esc($enquiry['enquiry_id']) ?>"
                              class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                          </div>
                          <div class="deleten m-1">
                            <a type="button"
                              href="<?= base_url() . session('prefix') . '/delete_enquiry/' . esc($enquiry['enquiry_id']) ?>"
                              class="btn btn-dark btn-sm delete_btn"><i class="ri-delete-bin-line"></i></a>
                          </div>
                        </div>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td>No Enquiries.</td>
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


  <?php if (session()->has('enquiry_add')): ?>
    <script>
      showToast('Enquiry Registered successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('delete_error')): ?>
    <script>
      showToast('<?= session('delete_error') ?>');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('delete_success')): ?>
    <script>
      showToast('<?= session('delete_success') ?>');  
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