<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>All Doctors</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Doctors</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section" id="sup001">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">Doctors</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url('add_doctor') ?>">Add New Doctor</a>
                                </h5>
                            </div>
                        </div>
                    </div>

                    <div class="card-body view-supplier-table table-responsive">
                        <!-- Table with stripped rows -->
                        <table id="example" class="table table-borderless datatable supplier-table">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Qualification</th>
                                    <th>Specialist In</th>
                                    <th>About</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($doctors as $doctor): ?>
                                    <tr>
                                        <td><?= $doctor['id'] ?></td>
                                        <td><?= $doctor['name'] ?></td>
                                        <td><?= $doctor['qualification'] ?></td>
                                        <td><?= $doctor['specialist_of'] ?></td>
                                        <td><?= $doctor['about'] ?></td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="editen p-1">
                                                    <a href="editdoc.php?id=<?= $doctor['id'] ?>">
                                                        <button type="button" class="btn btn-secondary">
                                                            <i class='bx bx-edit'></i>
                                                        </button>
                                                    </a>
                                                </div>
                                                <div class="viewsenq p-1">
                                                    <a href="viewdoc.php?id=<?= $doctor['id'] ?>">
                                                        <button type="button" class="btn">
                                                            <i class="ri-eye-line"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Qualification</th>
                                    <th>Specialist In</th>
                                    <th>About</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;

                    // Create select element
                    var select = $('<select><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    // Add list of options
                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>');
                    });
                });
            }
        });
    });
</script>

<?= $this->endSection() ?>
