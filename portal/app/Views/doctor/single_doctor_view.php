<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Doctor Profile</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Doctor Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Page Title -->

    <!-- Card with an image on left -->
    <section class="section" id="viewsup1021">
        <div class="row ">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">Doctor Profile</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>"> Back </a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">
                            <form class="m-3">
                                <div class="row">
                                    <div class="col-lg-4 pb-2 pb-lg-0">
                                        <div class="d-flex justify-content-center align-items-center mb-2">
                                            <i class="bi bi-image-fill" aria-hidden="true"></i>
                                            <h5 class="mb-0 mx-2"><b>Doctor Image:</b></h5>
                                        </div>


                                        <div style="display: flex; justify-content: center;">

                                            <img src="<?= config('App')->baseURL2 ?>/public/images/<?= !empty($doctor['user']['profile']) ? $doctor['user']['profile'] : 'user-profile.jpg' ?>"
                                                height="250" width="250" class="rounded-circle"
                                                onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">
                                        </div>

                                    </div>

                                    <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-person-circle" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Doctor Name :</b>
                                                    <?php echo $doctor['user']['fullname']; ?></label>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Email:</b>
                                                    <?php echo $doctor['user']['email']; ?></label>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Address :</b>
                                                    <?php echo $doctor['user']['address']; ?></label>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-calendar3-fill" aria-hidden="true">
                                                    <label class="form-label" for=""><b>DOB :</b>
                                                        <?php echo $doctor['user']['date_of_birth']; ?></i></label>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Phone Number:</b>
                                                    <?php echo isset($doctor['user']['phone']) ? $doctor['user']['phone'] : 'Unknown'; ?></label>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-award-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Qualification :</b>
                                                    <?php echo $doctor['doctor']['qualification']; ?></label>

                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-file-medical-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Specialty In:</b>
                                                    <?php echo $doctor['doctor']['specialist_of']; ?></label>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <!-- <i class="bi bi-calendar-week-fill" aria-hidden="true"></i>
                                                <label class="form-label" for="inputName4"><b>Schedule:</b>
                                                    label> -->

                                                <li class="nav-item dropdown list-unstyled">
                                                    <i class="bi bi-calendar-week-fill" aria-hidden="true"></i>
                                                    <button class="btn dropdown-toggle fw-bold"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        Show Schedule :
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-right  dropdown-menu-light dropend border border-dark">
                                                        <li><a class="dropdown-item">Monday : <?php echo $doctor['schedule']['monday'] ?? 'Not set'; ?> </a></li>
                                                        <li><a class="dropdown-item">Tuesday : <?php echo $doctor['schedule']['tuesday'] ?? 'Not set'; ?> </a></li>
                                                        <li><a class="dropdown-item">Wednesday : <?php echo $doctor['schedule']['wednesday'] ?? 'Not set'; ?> </a></li>
                                                        <li><a class="dropdown-item">Thursday : <?php echo $doctor['schedule']['thursday'] ?? 'Not set'; ?> </a></li>
                                                        <li><a class="dropdown-item">Friday : <?php echo $doctor['schedule']['friday'] ?? 'Not set'; ?> </a></li>
                                                        <li><a class="dropdown-item">Satarday : <?php echo $doctor['schedule']['saturday'] ?? 'Not set'; ?> </a></li>
                                                        <li><a class="dropdown-item">Sunday : <?php echo $doctor['schedule']['sunday'] ?? 'Not set'; ?> </a></li>
                                                    </ul>
                                                </li>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <i class="bi bi-list-ul" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>About:</b>
                                                    <?php echo $doctor['doctor']['about']; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
        </div>
    </section>
    <!-- End Card with an image on left -->

</main><!-- End #main -->
<?= $this->endSection() ?>