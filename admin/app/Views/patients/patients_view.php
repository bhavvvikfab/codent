<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Patients
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
                          <a href="<?= base_url('add_patient') ?>"> Add New Patient</a></h5>
                  </div>
                </div>
             </div>

          <div class="card-body all-view-subcription">
            <table class="table table-borderless datatable supplier-table">

                <thead>
                  <tr>
                    <th class="text-center">Sr.No.</th>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Phone No.</th>
                    <th>Status</th>

                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                    <th class="text-center">Action</th>
                  </tr>
                </thead>

                <tbody>
                <?php if (!empty($patients) && is_array($patients)) : ?>
                  <?php $serial = 1;?> 
                  <?php foreach ($patients as $patient) : ?>
                  <tr>

                   <td class="text-center"><?= $serial++ ?></td>
                   <!-- <td class="text-center"><?= $patient['id']  ?></td> -->

                    <td><?= $patient['fullname'] ?></td>
                    <td><?= $patient['email'] ?></td>
                    <td><?= $patient['phone'] ?></td>
                    <td class="text-center">
                        <button
                              class="statusToggleBtn btn btn-sm <?=  ($patient['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>" data-id="<?=$patient['id']?>" >
                              <?=  ($patient['status'] == 'active') ? 'Active' : 'Inactive'; ?>
                        </button>
                    </td>
                  
                    <td>
                      <div class="d-flex justify-content-around align-items-center">
                        <div class="editpai">
                          <a href="<?= base_url('editpait?id=' . $patient['id']) ?>">
                            <button type="button" class="btn btn-secondary btn-sm"><i class='bx bx-edit'></i></button>
                          </a>
                        </div>
                        <div class="viewpai">
                          <a href="<?= base_url('viewpait?id=' . $patient['id']) ?>">
                            <button type="button" class="btn btn-success btn-sm"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        <div  class="deletpai">
                          <a class="delete_btn" href="<?= base_url('deletepait?id=' . $patient['id']) ?>">
                            <button type="button" class="btn btn-danger btn-sm"><i class="ri-delete-bin-line"></i></button>
                          </a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  <?php else : ?> 
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
             showToast('Patinet added successfully.'); 
      </script>
<?php endif; ?>
<?php if (session()->has('update_status') && session('update_status') == 'success'): ?>
      <script>
             showToast('Patient data successfully updated.'); 
      </script>
<?php endif; ?>
<?php if (session()->has('delete_status')): ?>
    <?php if (session('delete_status') == 'success'): ?>
        <script>
            showToast('Patient data successfully deleted.');
        </script>
    <?php elseif (session('delete_status') == 'error'): ?>
        <script>
            showToast('Error deleting patient data. Please try again.');
        </script>
    <?php endif; ?>
<?php endif; ?>



  </main><!-- End #main -->

  <script>
    $(document).ready(function() {
    $('.statusToggleBtn').on('click', function () {
            var $this = $(this);
            var id = $this.data('id');
            
            if ($this.hasClass('btn-success')) {
                $this.removeClass('btn-success').addClass('btn-danger');
                $this.text('Inactive');
                $.ajax({
                    url: '<?= base_url('patient_status')?>',
                    method: 'get',
                    data: {id: id},
                    success: function (data) {
                        showToast('Patient Status Changed.');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $this.removeClass('btn-danger').addClass('btn-success');
                $this.text('Active');
                $.ajax({
                    url: '<?= base_url('patient_status')?>',
                    method: 'get',
                    data: {id: id},
                    success: function (data) {
                        showToast('Patient Status Changed.');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });


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