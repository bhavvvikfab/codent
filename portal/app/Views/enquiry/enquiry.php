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
                  <th>Convert to Lead</th>
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
                          <button type="button" class="btn btn-success btn-sm convert-lead-btn"
                            data-id="<?= $enquiry['id'] ?>" <?= $enquiry['status'] == 'lead' ? 'disabled' : '' ?>>
                            <?= $enquiry['status'] == 'lead' ? 'Lead' : 'Convert to Lead' ?>
                          </button>
                        </div>
                      </td>

                      <td>
                        <div class="d-flex justify-content-around align-items-center">
                          <div class="editen m-1">
                            <a type="button"
                              href="<?= base_url() . session('prefix') . '/edit_enquiry/' . esc($enquiry['id']) ?>"
                              class="btn btn-dark btn-sm"><i class='bx bx-edit'></i></a>
                          </div>
                          <div class="viewsenq m-1">
                            <a type="button"
                              href="<?= base_url() . session('prefix') . '/view_enquiry/' . esc($enquiry['id']) ?>"
                              class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                          </div>
                          <div class="deleten m-1">
                            <a type="button"
                              href="<?= base_url() . session('prefix') . '/delete_enquiry/' . esc($enquiry['id']) ?>"
                              class="btn btn-dark btn-sm delete_btn"><i class="ri-delete-bin-line"></i></a>
                          </div>
                        </div>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center">No Enquiries.</td>
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


  <?php if (session()->has('success')): ?>
    <script>
      showToast('<?= session('success') ?>');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('error')): ?>
    <script>
      showToast('<?= session('error') ?>');  
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


    $('.convert-lead-btn').on('click', function () {
    var enquiryId = $(this).data('id');
    var button = $(this);

    Swal.fire({
        title: "Do you want to convert this enquiry into lead ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "<?= base_url(session('prefix') . '/convert_into_lead') ?>",
                type: 'POST',
                data: { id: enquiryId },
                success: function (response) {
                    // console.log(response);
                    if (response.success == true) {
                        showToast('Enquiry Converted Into lead.');
                        button.text('Lead');
                        button.prop('disabled', true);
                    } else {
                        showToast('Enquiry Not Converted Into lead.');
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    });
});


  });
</script>

<?= $this->endSection() ?>