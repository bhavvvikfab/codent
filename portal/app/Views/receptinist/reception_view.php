<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Receptionist-Profile
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Receptionist Profile</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Receptionist Profile</li>
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
                                <h5 class="card-title text-start">Receptionist Profile</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url() . '' . session('prefix') . '/' . 'reception' ?>"> Back</a>
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
                                            <h5 class="mb-0 mx-2"><b>Receptionist Image:</b></h5>
                                        </div>


                                        <div style="display: flex; justify-content: center;">

                                            <img src="<?= config('App')->baseURL2 ?>/public/images/<?= isset($rep['profile']) && !empty($rep['profile']) ? $rep['profile'] : 'user-profile.jpg' ?>"
                                                height="250" width="250">
                                        </div>

                                    </div>

                                    <div class="col-lg-8 d-lg-flex flex-lg-column justify-content-lg-center">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-person-circle" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Receptionist Name :</b>
                                                    <?= isset($rep['fullname']) ? $rep['fullname'] : 'N/A'; ?></label>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-envelope-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Email:</b>
                                                    <?= isset($rep['email']) ? $rep['email'] : 'N/A'; ?></label>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-telephone-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Phone Number:</b>
                                                    <?= isset($rep['phone']) ? $rep['phone'] : 'N/A'; ?></label>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-calendar3-fill" aria-hidden="true">
                                                    <label class="form-label" for=""><b>DOB :</b>
                                                        <?= isset($rep['date_of_birth']) ? $rep['date_of_birth'] : 'N/A'; ?></i></label>
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 pb-2 pb-lg-0">
                                                <i class="bi bi-geo-alt-fill" aria-hidden="true"></i>
                                                <label class="form-label" for=""><b>Address :</b>
                                                    <?= isset($rep['address']) ? $rep['address'] : 'N/A'; ?></label>

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