<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">

    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>All Hospitals</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Hospitals</li>
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
                                <h5 class="card-title text-start">Hospitals</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= site_url('/add_hospital') ?>"> Add New Hospitals</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body view-supplier-table table-responsive">
                        <!-- Table with stripped rows -->
                        <table class="table table-borderless datatable supplier-table">

                            <thead>
                                <tr>
                                    <th> Sr. No. </th>
                                    <th>Profile</th>
                                    <th>Hospital Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php if (empty($hospitals)): ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Table is empty</td>
                                    </tr>
                                <?php else: ?>
                                    <?php $index = 1; ?>
                                    <?php foreach ($hospitals as $hospital): ?>
                                        <tr>
                                            <td><?= $index; ?></td>
                                            <td>
                                                <img src="<?= isset($hospital['profile']) && !empty($hospital['profile']) ? '../../../images/' . $hospital['profile'] : '../../../images/user-profile.jpg'; ?>"
                                                    alt="Profile" class="rounded-circle" height="50" width="50">
                                            </td>

                                            <td><?= $hospital['fullname']; ?></td>
                                            <td><?= $hospital['email']; ?></td>
                                            <td>
                                                <button
                                                    class="statusToggleBtn btn btn-sm <?php echo ($hospital['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>" data-id="<?=$hospital['id']?>" >
                                                    <?php echo ($hospital['status'] == 'active') ? 'Active' : 'Inactive'; ?>
                                                </button>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div class="editen p-1">
                                                        <a href="editdoc.php?id=<?= $hospital['id']; ?>">
                                                            <button type="button" class="btn btn-secondary"><i
                                                                    class='bx bx-edit'></i></button>
                                                        </a>
                                                    </div>
                                                    <div class="viewsenq p-1">
                                                        <a href="viewdoc.php?id=<?= $hospital['id']; ?>">
                                                            <button type="button" class="btn"><i
                                                                    class="ri-eye-line"></i></button>
                                                        </a>
                                                    </div>
                                                    <!-- Uncomment the delete section if needed -->
                                                    <!-- <div class="deleten p-1">
                                                        <button type="button" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                                                    </div> -->
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $index++ ?>
                                    <?php endforeach; ?>
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
            showToast('Hospital added successfully.');  
        </script>
    <?php endif; ?>
    <script>
        $(document).ready(function () {
            $('.statusToggleBtn').on('click', function () {
                var $this = $(this);
                var id = $this.data('id');
                // console.log(id);
                if ($this.hasClass('btn-success')) {
                    $this.removeClass('btn-success').addClass('btn-danger');
                    $this.text('Inactive');
                    $.ajax({
                        url:'<?= site_url('hospital_status')?>',
                        method:'get',
                        data:{id:id},
                        sucess:(data)=>{console.log(data);},
                        error:(err)=>{console.log(err);}

                    })
                } else {
                    $this.removeClass('btn-danger').addClass('btn-success');
                    $this.text('Active');
                    $.ajax({
                        url:'<?= site_url('hospital_status')?>',
                        method:'get',
                        data:{id:id},
                        sucess:(data)=>{console.log(data);},
                        error:(err)=>{console.log(err);}

                    })
                }
            });
        });
    </script>
</main><!-- End #main -->
<?= $this->endSection() ?>