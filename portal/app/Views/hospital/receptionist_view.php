<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Doctor-Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Receptionist</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Users</a></li>
            <li class="breadcrumb-item active">All Receptionist</li>
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
                      <h5 class="card-title text-start">Reception</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url().''.session('prefix').'/'.'add_receptionist'?>"> Add New Receptionist</a></h5>
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
                    <th>Qualification</th>
                    <th>Specialist In</th>
                    
                    <th>Action</th>
                    <!-- <th>Status</th> -->
                  </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Dr. Krishna</td>
                    <td>B.D.S</td>
                    <td>Orthodontics</td>
                    <!-- <td>kr123@gmail.com</td> -->
                    
                    <td>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="editen p-1">
                          <a href="editdoc.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="viewdoc.php">
                            <button type="button" class="btn"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <!-- <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-warning">Pending</button>
                      </div>
                    </td> -->
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>Dr. Theodore</td>
                    <td>B.D.S</td>
                    <td>Orthodontics</td>
                    <!-- <td>th123@gmail.com</td> -->
                    <td>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="editen p-1">
                          <a href="editdoc.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="viewdoc.php">
                            <button type="button" class="btn"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <!-- <td>
                        <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-success">Approve</button>
                      </div>
                    </td> -->
                  </tr>

                  <tr>
                    <td>3</td>
                    <td>Dr. Kristan</td>
                    <td>B.D.S</td>
                    <td>Orthodontics</td>
                    <!-- <td>krt123@gmail.com</td> -->
                    <td>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="editen p-1">
                          <a href="editdoc.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="viewdoc.php">
                            <button type="button" class="btn"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                   
                  </tr>

                  <tr>
                    <td>4</td>
                    <td>Dr. John</td>
                    <td>B.D.S</td>
                    <td>Orthodontics</td>
                    <!-- <td>yug123@gmail.com</td> -->
                    <td>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="editen p-1">
                          <a href="editdoc.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="viewdoc.php">
                            <button type="button" class="btn"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <!-- <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-success">Approve</button>
                      </div>
                    </td> -->
                  </tr>

                  <tr>
                    <td>5</td>
                    <td>Dr. Disoza</td>
                    <td>B.D.S</td>
                    <td>Orthodontics</td>
                    <!-- <td>rm123@gmail.com</td> -->
                    <td>
                      <div class="d-flex justify-content-between align-items-center">
                        <div class="editen p-1">
                          <a href="editdoc.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="viewdoc.php">
                            <button type="button" class="btn"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                    <!-- <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-warning">Pending</button>
                      </div>
                    </td> -->
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