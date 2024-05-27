<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add-Enquiry
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <h1>Add Enquiry</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashoboard' ?>">Dashboard</a></li>
            <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
            <li class="breadcrumb-item active">Add Enquiry</li>
          </ol>
        </nav>
      </div>
      <!--<div class="col-xxl-6 col-lg-6 col-md-12 col-sm-12">-->
      <!--  <div class="d-flex justify-content-end align-items-center">-->
      <!--    <button type="button" class="btn btn-primary"> <a href="orders.php"> <i class="ri-arrow-left-line"></i> Back </a> </button>-->
      <!--  </div>-->
      <!--</div>-->
    </div>
  </div>
  <section class="section" id="editorder467">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">

          <div class="card-header">
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Add New Enquiry</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'enquiry' ?>"> Back </a>
                </h5>
              </div>
            </div>
          </div>

          <div class="card-body">

            <!-- No Labels Form -->
            <form class="row g-3" method="post" enctype="multipart/form-data"
              action="<?= base_url() . '' . session('prefix') . '/' . 'store_enquiry' ?>">
              <?php if (session('user_role') == 6): ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                  <label class="col-form-label">
                    <i class="bi bi-hospital-fill" style="font-size: 18px;"></i>
                    Select Hospital
                  </label>
                  <select class="form-control hospitals" name="hospital">
                    <option value="">--Select--Hospital--</option>
                    <?php if (!empty($hospitals)): ?>
                      <?php foreach ($hospitals as $hospital): ?>
                        <option value="<?= $hospital['id'] ?>">
                          <?= $hospital['fullname'] ?>
                        </option>
                      <?php endforeach; ?>
                      <option value="0">No Hospitals Available</option>
                    <?php endif; ?>
                  </select>
                  <?php if (session('errors.hospital')): ?>
                    <small class="text-danger"><?= esc(session('errors.hospital')) ?><i
                        class="bi bi-exclamation-circle"></i></small>
                  <?php endif; ?>
                </div>


              <?php endif; ?>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Patient
                  Name</label>
                <input type="text" class="form-control" name="name">
                <?php if (session('errors.name')): ?>
                  <small class="text-danger"><?= esc(session('errors.name')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">

                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i> Birth
                  Date</label>
                <div class="input-group">
                  <span class="input-group-text rounded-2 btn-cal"><i class="bi bi-calendar3"></i></span>
                  <input type="date" class="form-control rounded-2" name="dob">

                  <!-- <div class="input-group-prepend">
                  </div> -->
                </div>
                <?php if (session('errors.dob')): ?>
                  <small class="text-danger"><?= esc(session('errors.dob')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>

              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-calendar-week-fill" style="font-size: 18px;"></i>
                  Appointment
                  Date</label>
                <div class="input-group">
                  <span class="input-group-text rounded-2 btn-cal" id="bdate34"><i class="bi bi-calendar3"></i></span>
                  <input type="date" class="form-control rounded-2" name="app_date">
                </div>
                <?php if (session('errors.app_date')): ?>
                  <small class="text-danger"><?= esc(session('errors.app_date')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone
                  Number</label>
                <input type="phone" class="form-control" name="phone">
                <?php if (session('errors.phone')): ?>
                  <small class="text-danger"><?= esc(session('errors.phone')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
              </div>
              <div class="col-md-6">
                <label class="col-form-label"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i>
                  Specialty
                  required</label>
                <select class="form-select" name="required_specialist">
                  <option value="n/a">--Specialty--Required--</option>
                  <option value="orthodontics">Orthodontics</option>
                  <option value="endodontics">Endodontics</option>
                  <option value="periodontics">Periodontics</option>
                  <option value="prosthodontics">Prosthodontics</option>
                  <option value="implantology">Implantology</option>
                  <option value="radiology">Radiology</option>
                  <option value="sedation">Sedation</option>
                </select>
                <?php if (session('errors.required_specialist')): ?>
                  <small class="text-danger"><?= esc(session('errors.required_specialist')) ?><i
                      class="bi bi-exclamation-circle"></i></small>
                <?php endif; ?>
              </div>

              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i>
                  Referral</label>
                <select class="form-control doctors" name="referral_doctor">
                  <option value="">--Select--Doctor--</option>
                  <?php if (Session('user_role') == 2): ?>
                    <?php if (!empty($doctors)): ?>
                      <?php foreach ($doctors as $doc): ?>
                        <option value="<?= $doc['id'] ?>">
                          <?= $doc['fullname'] ?>
                        </option>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  <?php endif; ?>
                </select>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-file-earmark-medical-fill" style="font-size: 18px;"></i>
                  Note</label>
                <textarea name="note" rows="1" class="form-control"></textarea>

              </div>

              <!-- <div class="col-md-12">
                <div class="product-description-card-body">
                  <label class="col-form-label">Product Description</label>
                  <div class="quill-editor-default">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                  </div>
                </div>
              </div> -->
              <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label class="col-form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> Images</label>
                <input type="file" class="form-control" name="images[]" multiple>
              </div>
              <div class="d-flex justify-content-end align-items-center">
                <button type="submit" class="btn btn-dark">Add Enquiry</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
    </div>
  </section>


  <script>
    $(document).ready(function () {
      $('.hospitals').on('change', function () {
        var hospitalId = $(this).val();

        if (hospitalId) {
          $.ajax({
            url: "<?= base_url(session('prefix') . '/get_doctor_dropdown') ?>",
            type: "GET",
            data: { hospital_id: hospitalId },
            success: function (data) {
              var select = $('.doctors');
              select.empty();
              select.append('<option value="">--Select--Doctor--</option>');
              if (data.length > 0) {
                data.forEach(function (doctor) {
                  var option = '<option value="' + doctor.id + '">' + doctor.fullname + '</option>';
                  select.append(option);
                });
              }
            },
            error: function (error) {
              console.log(error.responseText);
            }
          });
        }
      });
    });
  </script>

</main><!-- End #main -->

<?= $this->endSection() ?>