<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Doctors
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Doctor</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Users</a></li>
            <li class="breadcrumb-item active">All Doctor</li>
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
                <h5 class="card-title text-start">Doctor</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_doctor' ?>"> Add New Doctor</a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body view-supplier-table table-responsive">
            <!-- Table with stripped rows -->
            <table class="table table-borderless datatable supplier-table">

              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Qualification</th>
                  <th>Specialist In</th>

                  <th>Action</th>
                  <!-- <th>Status</th> -->
                </tr>
              </thead>

              <tbody>
                <?php
                $index = 1;
                foreach ($doctors as $doctor):
                  if ($doctor !== null): // Check if $doctor is not null
                    ?>
                    <tr>
                      <td><?= $index ?></td>
                      <td>
                        <img
                          src="<?= base_url() ?>public/images/<?= isset($doctor['user']['profile']) && !empty($doctor['user']['profile']) ? $doctor['user']['profile'] : 'user-profile.jpg' ?>"
                          height="50" width="50">
                      </td>
                      <td>Dr. <?= esc($doctor['user']['fullname']) ?></td>
                      <td><?= esc($doctor['user']['phone']) ?></td>
                      <td><?= esc($doctor['doctor']['qualification']) ?></td>
                      <td><?= esc($doctor['doctor']['specialist_of']) ?></td>

                      <td>
                        <div class="d-flex justify-content-between align-items-center">
                          <div class="editen p-1">
                            <a href="<?= base_url() . session('prefix') . '/doctor_details/' . esc($doctor['doctor']['id']) ?>">
                              <button type="button" class="btn btn-secondary  btn-sm"><i class="bi bi-eye"></i></button>
                            </a>
                          </div>
                          <div class="viewsenq p-1">
                            <a href="<?= base_url() . session('prefix') . '/doctor_edit/' . esc($doctor['doctor']['id']) ?>">
                              <button type="button" class="btn btn-sm"><i class="bi bi-pencil-square"></i></button>
                            </a>
                          </div>

                          <div class="deleten p-1">
                          <a href="<?= base_url() . session('prefix') . '/doctor_delete/' . esc($doctor['doctor']['id']) ?>">
                              <button type="button" class="btn btn-sm"><i class="bi bi-trash"></i></button>
                            </a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <?php
                    $index++;
                  endif;
                endforeach; ?>

              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
  <?php if (session()->has('added_dr')): ?>
    <script>
      showToast('Doctor Registered successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('edit_dr')): ?>
    <script>
      showToast('Doctor Info Updated successfully.');  
    </script>
  <?php endif; ?>
  <?php if (session()->has('delete_dr')): ?>
    <script>
      showToast('Doctor Delete successfully.');  
    </script>
  <?php endif; ?>

</main><!-- End #main -->
<?= $this->endSection() ?>