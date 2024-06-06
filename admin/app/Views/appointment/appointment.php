<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Appointments
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Appointment</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
                          <a href="<?= base_url('add_appointment') ?>"> Add New Appointment</a></h5>
                  </div>
                </div>
             </div>

            <div class="card-body view-supplier-table table-responsive">
                          <!-- Table with stripped rows -->
              <table class="table table-borderless datatable supplier-table">

                <thead>
                  <tr>
                    <th> Sr. No. </th>
                    <th>Patient Name</th>
                    <th class="text-center">Dr. Name</th>
                    <!-- <th>Phone No.</th> -->
                    <th data-type="date" data-format="DD/MM/YYYY" class="text-center">Schedule</th>
                    <!-- <th>Slot</th> -->
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>

                  </tr>
                </thead>

                <tbody>
            
                <?php if (!empty($appointments) && is_array($appointments)) : ?>
                  <?php $serial = 1;?>                  
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                   <td class="text-center"><?= $serial++ ?></td>

                        <!-- <td><?= esc($appointment['id']); ?></td> -->
                        <td><?= esc($appointment['patient_name']); ?></td>
                        <td><?= esc($appointment['fullname']); ?></td>
                        <td><?= esc($appointment['schedule']); ?></td>
                        <td class="text-center">confirm</td>


                    <!-- <td>13/05/2023</td> -->
                    <!-- <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <button type="button" class="btn btn-warning btn-sm">Pending</button>
                      </div>
                    </td> -->
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editen p-1">
                        <a href="<?= base_url('editappoint/'.$appointment['id']) ?>">
                            <button type="button" class="btn btn-secondary btn-sm"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewsenq p-1">
                          <a href="<?=base_url('viewappoint/'.$appointment['id'])?>">
                            <button type="button" class="btn btn-sm"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div class="deleten p-1">
                        <a class="delete_btn" href="<?=base_url('deleteappoint/'.$appointment['id'])?>">
                          <button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i></button>
                          </a>
                      
                        </div>
                      </div>
                    </td>
                    
                  </tr>

                  <?php endforeach; ?>
                  <?php else : ?>
                  <p>No patients found.</p>
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
<?php if (session()->has('delete_status') && session('delete_status') == 'success'): ?>
      <script>
            showToast('Appointment Delete Successfully');  
        </script>
<?php endif; ?>

<?php if (session()->has('delete_status') && session('delete_status') == 'error'): ?>
      <script>
            showToast('Something Is Wrong ..... Please Try Again Later');  
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
