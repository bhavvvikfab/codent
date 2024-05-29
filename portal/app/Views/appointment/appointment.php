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
            <li class="breadcrumb-item"><a href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
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
                          <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_appointment' ?>"> Add New Appointment</a></h5>
                  </div>
                </div>
             </div>

            <div class="card-body view-supplier-table table-responsive">
                          <!-- Table with stripped rows -->
              <table class="table table-borderless datatable supplier-table">

                <thead>
                  <tr>
                    <th> Sr. No. </th>
                    <th>Name</th>
                    <th>Dr. Name</th>
                    <!-- <th>Phone No.</th> -->
                    <th data-type="date" data-format="DD/MM/YYYY">Schedule</th>
                    <!-- <th>Slot</th> -->
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                 
                  <tr>
                    <td>2</td>
                    <td>Theodore</td>
                    <td>Dr. John</td>
                    <!-- <td>9876541230</td> -->
                    
                    <td>11:00 a.m. - 2:00 p.m.</td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-success btn-sm">Approve</button>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editen p-1">
                          <a href="<?= base_url() . '' . session('prefix') . '/' . 'edit_appointment' ?>">
                            <button type="button" class="btn btn-secondary btn-sm"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="<?= base_url() . '' . session('prefix') . '/' . 'view_appointment' ?>">
                            <button type="button" class="btn btn-sm"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i></button>
                        </div>
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