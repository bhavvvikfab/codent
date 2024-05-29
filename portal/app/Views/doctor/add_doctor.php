<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add-Doctor
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Add New Doctor</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>">All
                                Doctor</a></li>
                        <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
                        <li class="breadcrumb-item active">Add New Doctor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section" id="adduserform123">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">Add New Doctor</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>"> Back </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- General Form Elements -->
                        <form id="doctor_form" enctype="multipart/form-data"
                            action="<?= base_url() . '' . session('prefix') . '/' . 'doctor_register' ?>" method="post">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="name" class="form-label"><i class="bi bi-person-circle"
                                            style="font-size: 18px;"></i> Doctor Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-fill"
                                            style="font-size: 18px;"></i> Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= esc(session('errors.email')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="password" class="form-label"><i class="bi bi-lock-fill"
                                            style="font-size: 18px;"></i> Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <?php if (session('errors.password')): ?>
                                        <small class="text-danger"><?= esc(session('errors.password')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="address" class="form-label"><i class="bi bi-geo-alt-fill"
                                            style="font-size: 18px;"></i> Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="1"></textarea>
                                    <?php if (session('errors.address')): ?>
                                        <small class="text-danger"><?= esc(session('errors.address')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="dob" class="form-label"><i class="bi bi-calendar-fill"
                                            style="font-size: 18px;"></i> Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob">
                                    <?php if (session('errors.dob')): ?>
                                        <small class="text-danger"><?= esc(session('errors.dob')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="phone" class="form-label"><i class="bi bi-telephone-fill"
                                            style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone">
                                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="specialist" class="form-label"><i class="bi bi-file-medical-fill"
                                            style="font-size: 18px;"></i> Specialist In</label>
                                    <!-- <input type="text" class="form-control" id="specialist" name="specialist"> -->
                                    <select class="form-select" name="specialist">
                                        <option value="n/a">--Select--Specialty--</option>
                                        <option value="orthodontics">Orthodontics</option>
                                        <option value="endodontics">Endodontics</option>
                                        <option value="periodontics">Periodontics</option>
                                        <option value="prosthodontics">Prosthodontics</option>
                                        <option value="implantology">Implantology</option>
                                        <option value="radiology">Radiology</option>
                                        <option value="sedation">Sedation</option>
                                    </select>
                                    <?php if (session('errors.specialist')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialist')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="qualification" class="form-label"><i class="bi bi-award-fill"
                                            style="font-size: 18px;"></i> Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification">
                                    <?php if (session('errors.qualification')): ?>
                                        <small class="text-danger"><?= esc(session('errors.qualification')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="schedule" class="form-label"><i class="bi bi-calendar-event-fill"
                                            style="font-size: 18px;"></i> Schedule</label>
                                    <input type="text" class="form-control" id="schedule" name="schedule"
                                        placeholder="e.g., Mon-Fri, 9am-5pm">
                                    <?php if (session('errors.schedule')): ?>
                                        <small class="text-danger"><?= esc(session('errors.schedule')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="about" class="form-label"><i class="bi bi-person-fill"
                                            style="font-size: 18px;"></i> About</label>
                                    <textarea class="form-control" id="about" name="about" rows="1"></textarea>
                                    <?php if (session('errors.about')): ?>
                                        <small class="text-danger"><?= esc(session('errors.about')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row mb-3">

                                <div class="col-lg-6 mb-3">
                                    <label for="image" class="form-label"><i class="bi bi-image-fill"
                                            style="font-size: 18px;"></i> Doctor Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <?php if (session('errors.image')): ?>
                                        <small class="text-danger"><?= esc(session('errors.image')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="selectSpecialistOrPractice" class="form-label"><i
                                            class="bi bi-check-square-fill" style="font-size: 18px;"></i></i> Which is
                                        Your Preference?</label>
                                    <select class="form-select" id="specialistOrPractice" name="specialistOrPractice">
                                        <option>Select Preference</option>
                                        <option value="3">Specialist</option>
                                        <option value="4">Practice</option>
                                    </select>
                                    <?php if (session('errors.specialistOrPractice')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialistOrPractice')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <button class="btn addsup-btn" type="submit">Add Doctor</button>
                                </div>
                            </div>
                        </form>
                        <!-- End General Form Elements -->
                    </div>
                </div>

            </div>
            <!--  --><!-- End General Form Elements -->
        </div>
        </div>

        </div>
        </div>
    </section>

    <?php if (session()->has('error')): ?>
        <script>
            showToast('Something went wrong..!!');  
        </script>
    <?php endif; ?>
</main>

<?= $this->endSection() ?>