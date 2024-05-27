<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Enquiries
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Enquiries</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
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
                          <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_enquiry' ?>"> Add New Enquiry </a></h5>
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
                    <!-- <th>Birth Date</th>
                    <th>Email Address</th> -->
                    <th>Phone No.</th>
                    <th>Specialist</th>
                    
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Krishna</td>
                    <td>9876541230</td>
                    <td>Orthodontics</td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editen p-1">
                          <a href="editenquiry.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="viewenquiry.php">
                            <button type="button" class="btn"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-success">Approve</button>
                      </div>
                    </td>
                  </tr>

                
                  
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>


  </main><!-- End #main -->

  <?= $this->endSection() ?>