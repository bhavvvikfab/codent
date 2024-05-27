<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View-Patient
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Patients</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">All Patients</li>
          </ol>
        </nav>
      </div>
    </div>
    </div><!-- End Page Title -->
   
    <section class="section" id="allsubscri801">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Patient</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?= base_url().''.session('prefix').'/'.'add_patient'?>"> Add New Patient</a></h5>
                  </div>
                </div>
             </div>

          <div class="card-body all-view-subcription">
            <table class="table table-borderless datatable supplier-table">

                <thead>
                  <tr>
                    <th> Sr. No. </th>
                    <th>
                      Patient Name
                    </th>
                    <th>Dr. Name</th>
                    <th>Diseases</th>
                    <!-- <th>Phone No.</th> -->
                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                  <tr>
                   <td>1</td>
                    <td>
                      John
                    </td>
                    <td>Dr. Unity Pugh</td>
                    <td>Tooth Pain</td>
                    <!-- <td>1596324870</td> -->
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editpai">
                          <a href="editpait.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewpai">
                          <a href="viewpait.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletpai">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>2</td>
                    <td>
                      John
                    </td>
                    <td>Dr. Theodore Duran</td>
                    <td>Tooth Pain</td>
                    <!-- <td>1596389870</td> -->
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editpai">
                          <a href="editpait.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewpai">
                          <a href="viewpait.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletpai">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>3</td>
                    
                    <td>
                      John
                    </td>
                    <td> Dr. Kylie Bishop</td>
                    <td>Tooth Pain</td>
                    <!-- <td>9876543210</td> -->
                   <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editpai">
                          <a href="editpait.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewpai">
                          <a href="viewpait.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletpai">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>4</td>
                    
                    <td>John</td>
                    <td>Dr. Willow Gilliam</td>
                    <td>Tooth Pain</td>
                    <!-- <td>163247890</td> -->
                     <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editpai">
                          <a href="editpait.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewpai">
                          <a href="viewpait.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletpai">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                        </div>
                      </div>
                    </td>
                  </tr>

                  <tr>
                    <td>4</td>
                    
                    <td>John</td>
                    <td>Dr. Willow Gilliam</td>
                    <td>Tooth Pain</td>
                    <!-- <td>163247890</td> -->
                     <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editpai">
                          <a href="editpait.php">
                            <button type="button" class="btn btn-secondary"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewpai">
                          <a href="viewpait.php">
                            <button type="button" class="btn btn-success"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deletpai">
                          <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
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