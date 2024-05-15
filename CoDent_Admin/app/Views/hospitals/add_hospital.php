<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Add New Hospital</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href='<?= site_url('/dashboard') ?>'>Dashboard</a></li>
                        <li class="breadcrumb-item active">Add New Hospital</li>
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
                                <h5 class="card-title text-start">Add New Hospital</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= site_url('/dashboard') ?>"> Back </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- hospital Form Elements -->
                        <form method="post" action="<?= site_url('/add_hospital') ?>" enctype="multipart/form-data">


                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle"
                                            style="font-size: 18px;"></i> Hospital Name</label>
                                    <input type="text" class="form-control" name="hospital_name">
                                    <?php if (session('errors.hospital_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.hospital_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputNumber" class="form-label"> <i class="bi bi-telephone-fill"
                                            style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="phone" class="form-control" name="phone">
                                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputEmail" class="form-label"><i class="bi bi-envelope-fill"
                                            style="font-size: 18px;"></i> Email</label>
                                    <input type="email" class="form-control" name="email">
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= esc(session('errors.email')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputPassword" class="form-label"><i class="bi bi-eye-slash-fill"
                                            style="font-size: 18px;"></i> Password</label>
                                    <input type="password" class="form-control" name="password">
                                    <?php if (session('errors.password')): ?>
                                        <small class="text-danger"><?= esc(session('errors.password')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="packageSelect" class="form-label">
                                        <i class="bi bi-credit-card-fill" style="font-size: 18px;"></i> Select Plan
                                    </label>
                                    <select class="form-control" id="packageSelect" name="plan_name">
                                        <option value="">--Select--Plan--</option>
                                        <?php if (!empty($data)): ?>
                                            <?php foreach ($data as $plan): ?>
                                                <option value="<?php echo $plan['id']; ?>"><?php echo $plan['plan_name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No plan available</option>
                                        <?php endif; ?>
                                    </select>
                                    <?php if (session('errors.plan_name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.plan_name')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="profile" class="form-label"><i class="bi bi-image-fill"
                                            style="font-size: 18px;"></i> User Image</label>
                                    <input class="form-control" type="file" name="profile">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputPassword" class="form-label"> <i class="bi bi-geo-alt-fill"
                                            style="font-size: 18px;"></i>Address</label>
                                    <textarea class="form-control" style="height: 100px" name="address"></textarea>
                                    <?php if (session('errors.address')): ?>
                                        <small class="text-danger"><?= esc(session('errors.address')) ?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                                    <label for="inputPassword" class="form-label"> <i style="font-size: 18px;"
                                            class="bi bi-file-earmark-person"></i> About </label>
                                    <textarea class="form-control" style="height: 100px" name="about"></textarea>
                                    <?php if (session('errors.about')): ?>
                                        <small class="text-danger"><?= esc(session('errors.about'))?><i class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                                <div class="col-sm-12">
                                    <button class="btn editsup-btn" type="submit">Add Hospital</button>
                                </div>
                            </div>

                        </form>
                        <!-- End hospital Form Elements -->

                    </div>
                </div>

            </div>

            <!--  --><!-- End General Form Elements -->

        </div>
        </div>

        </div>
        </div>
    </section>
</main>
<script>

</script>
<?= $this->endSection() ?>