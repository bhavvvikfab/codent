<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Enquiries</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
                      <h5 class="card-title text-start">Enquiries</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('add_enquiries') ?>"> Add New Enquiry </a></h5>
                  </div>
                </div>
             </div>

             <div class="card-body view-supplier-table table-responsive">
                          <!-- Table with stripped rows -->
              <table class="table table-borderless datatable supplier-table">
    <thead>
        <tr>
            <th class="text-center"> Sr. No. </th>
            <th>Patient Name</th>
            <th>Phone</th>
            <th>Required Specialist</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($enquiries) && is_array($enquiries)) : ?>
            <?php $serial = 1; ?>
            <?php foreach ($enquiries as $enquiry) : ?>
                <tr>
                    <td class="text-center"><?= $serial++ ?></td>
                    <td><?= $enquiry['patient_name'] ?></td>
                    <td><?= $enquiry['phone'] ?></td>
                    <td><?= $enquiry['required_specialist'] ?></td>
                    <td class="text-center">
                        <?php
                        $enquiry_status = $enquiry['status'];
                        $badge_class = '';
                        $status_text = '';

                        switch ($enquiry_status) {
                          case 'lead':
                              $badge_class = 'bg-success';
                              $status_text = 'Lead';
                              break;
                          case 'appointment':
                              $badge_class = 'bg-primary';
                              $status_text = 'Appointment';
                              break;
                          case 'cancel':
                              $badge_class = 'bg-danger';
                              $status_text = 'Cancelled';
                              break;
                          default:
                              $badge_class = 'bg-secondary';
                              $status_text = 'Enquiry';
                              break;
                      }
                      ?>
                      <span class="badge <?= $badge_class; ?>" style="font-size: -1rem; padding: 0.4rem 1rem;"><?= $status_text; ?></span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center">
                            <div class="editen p-1">
                                <a href="<?= base_url('edit_enquiry?id=' . $enquiry['id']) ?>">
                                    <button type="button" class="btn btn-secondary btn-sm"><i class='bx bx-edit'></i></button>
                                </a>
                            </div>
                            <div class="viewsenq p-1">
                                <a href="<?= base_url('viewEnquiry?id=' . $enquiry['id']) ?>">
                                    <button type="button" class="btn btn-sm"><i class="ri-eye-line"></i></button>
                                </a>
                            </div>
                            <div class="deleten p-1">
                                <a class="delete_btn" href="<?= base_url('deleteEnquiry?id=' . $enquiry['id']) ?>">
                                    <button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i></button>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="6" class="text-center">No enquiries found.</td>
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
             showToast('Enquiry added successfully.'); 
      </script>
<?php endif; ?>

<?php if (session()->has('update_status') && session('update_status') == 'success'): ?>
      <script>
             showToast('Enquiry updated successfully.'); 
      </script>
<?php endif; ?>


<?php if (session()->has('delete_status') && session('delete_status') == 'success'): ?>
      <script>
             showToast('Enquiry deleted successfully.'); 
      </script>
<?php endif; ?>
<?php if (session()->has('delete_status') && session('delete_status') == 'error'): ?>
      <script>
             showToast('Failed to delete the enquiry. Please try again.'); 
      </script>
<?php endif; ?>

<?php if (session()->has('update_status') && session('update_status') == 'error'): ?>
      <script>
             showToast('Something is wrong .....please try again later.'); 
      </script>
<?php endif; ?>


  </main><!-- End #main -->

  <script>
    
    $(document).ready(function() {
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
    });

      
  </script>

  
<?= $this->endSection() ?>

  