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
                      <h5 class="card-title text-start">Enquiry</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('add_enquiries') ?>"> Add New Enquiry </a></h5>
                  </div>
                </div>
             </div>

            <div class="card-body allappuser-table table-responsive">
                          <!-- Table with stripped rows -->
              <table class="table table-borderless datatable appuser-table">
              <!-- <table class="table datatable table-bordered supplier-table"> -->
                <thead>
                <?php if (!empty($enquiries) && is_array($enquiries)): ?>
                  <tr>
                    <th> Sr. No. </th>
                    <th>Patient Name</th>
                    <!-- <th>Birth Date</th>
                    <th>Email Address</th> -->
                    <th>Phone No.</th>
                    <th>Specialist</th>
                    <th>Status</th>                  
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                <?php $serial = 1;?> 

            <?php foreach ($enquiries as $enquiry): ?>

                  <tr>
                   <td class="text-center"><?= $serial++ ?></td>

                    <!-- <td class="text-center"><?= $enquiry['id']?></td> -->
                    <td><?= $enquiry['patient_name']?></td>
                    <td><?= $enquiry['phone']?></td>
                    <td><?= $enquiry['required_specialist']?></td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-success btn-sm">Approve</button>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editen p-1">
                          <a href="<?=base_url('editEnquiry?id='. $enquiry['id'])?>">
                            <button type="button" class="btn btn-secondary btn-sm"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="<?=base_url('viewEnquiry?id='. $enquiry['id'])?>">
                            <button type="button" class="btn btn-sm"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                        <a href="<?=base_url('deleteEnquiry?id='. $enquiry['id'])?>">
                          
                          <button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i></button>
                         </a>

                        </div>
                      </div>
                    </td>
                    
                  </tr>
                  <?php endforeach; ?>   
                  <?php else: ?>
        <p>No enquiries found.</p>
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
<?= $this->endSection() ?>

  