<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Hospital-Dashboard
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Dashboard</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->
    <pre>
    <?php
    // print_r($data);
    ?>
</pre>

    <section class="section dashboard" id="dash896">
        <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-3 col-lg-3 col-md-6">
                <div class="card info-card customers-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"> All Apponitments</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?= count($data['appointments']['all']) ?? '0' ?></h6>
                                <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                    class="text-muted small pt-2 ps-1">decrease</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Customers Card -->

            <div class="col-xxl-3 col-lg-3 col-md-6">
                <div class="card info-card enquiry-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">All Enuqiries</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: #D8BFD8;">
                                <i class="bi bi-question-lg"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                <h6><?= count($data['enquiries']['all']) ?? '0' ?></h6>
                                <!-- <span class="text-primary small pt-1 fw-bold">12%</span> -->
                                <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Order Card -->
            <div class="col-xxl-3 col-lg-3 col-md-6">
                <div class="card info-card sales-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">All Referrals</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-medical"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?= count($data['enquiries']['all']) ?? '0' ?></h6>
                                <!-- <span class="text-success small pt-1 fw-bold">8%</span> -->
                                <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Order Card -->

            <div class="col-xxl-3 col-lg-3 col-md-6">
                <div class="card info-card user-card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">All User</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                <h6><?= count($data['users']['all']) ?? '0' ?></h6>
                                <!-- <span class="text-primary small pt-1 fw-bold">15%</span> -->
                                <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- user card -->

        </div>
        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <?php
                            //Variable for appointments
                            $day_app = count($data['appointments']['today']);
                            $month_app = count($data['appointments']['this_month']);
                            $year_app = count($data['appointments']['this_year']);
                            $all_app = count($data['appointments']['all']);

                            // Variables for enquiries
                            $day_enq = count($data['enquiries']['today']);
                            $month_enq = count($data['enquiries']['this_month']);
                            $year_enq = count($data['enquiries']['this_year']);
                            $all_enq = count($data['enquiries']['all']);

                            // Variables for users
                            $day_users = count($data['users']['today']);
                            $month_users = count($data['users']['this_month']);
                            $year_users = count($data['users']['this_year']);
                            $all_users = count($data['users']['all']);
                            ?>
                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>
                                <!-- Line Chart -->
                                <div id="reportsChart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [
                                                {
                                                    name: 'All Appointments',
                                                    data: [<?= $day_app ?>, <?= $month_app ?>, <?= $year_app ?>, <?= $all_app ?>],
                                                },
                                                {
                                                    name: 'All Enquiries',
                                                    data: [<?= $day_enq ?>, <?= $month_enq ?>, <?= $year_enq ?>, <?= $all_enq ?>],
                                                },
                                                {
                                                    name: 'All Users',
                                                    data: [<?= $day_users ?>, <?= $month_users ?>, <?= $year_users ?>, <?= $all_users ?>],
                                                }
                                            ],
                                            chart: {
                                                height: 350,
                                                type: 'area',
                                                toolbar: {
                                                    show: false
                                                },
                                            },
                                            markers: {
                                                size: 4
                                            },
                                            colors: ['#ff771d', '#6120b5', '#2eca6a'],
                                            fill: {
                                                type: "gradient",
                                                gradient: {
                                                    shadeIntensity: 1,
                                                    opacityFrom: 0.3,
                                                    opacityTo: 0.4,
                                                    stops: [0, 90, 100]
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'smooth',
                                                width: 2
                                            },
                                            xaxis: {
                                                categories: ['Today', 'This Month', 'This Year', 'All']
                                            },
                                            tooltip: {
                                                x: {
                                                    format: 'dd/MM/yy HH:mm'
                                                },
                                            }
                                        }).render();
                                    });
                                </script><!-- End Line Chart -->
                            </div>
                        </div>
                    </div><!-- End Reports -->

                </div>
            </div><!-- End Left side columns -->

        </div> <!-- End Right side columns -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Latest En -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto dashbord-order-table ">
                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Appointment <span>| Today</span></h5>
                                <table class="table table-borderless datatable dash-order-table">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Name</th>
                                            <th>Dr. Name</th>
                                            <th>Phone</th>
                                            <!-- <th>Phone No.</th> -->
                                            <th data-type="date" data-format="DD/MM/YYYY">Date</th>
                                            <!-- <th>Slot</th> -->
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php if (isset($data['appointments']['all']) && !empty($data['appointments']['all'])): ?>
                                            <?php foreach ($data['appointments']['all'] as $index => $appointment): ?>
                                                <tr>
                                                    <td><?= $index + 1; ?></td>
                                                    <td><?= $appointment['enquiry']['patient_name'] ?? 'N/A'; ?></td>
                                                    <td><?= $appointment['doctor']['doctor_data']['fullname'] ?? 'N/A'; ?></td>
                                                    <td><?= $appointment['enquiry']['phone'] ?? 'N/A'; ?></td>
                                                    <td><?= $appointment['schedule'] ?? 'N/A'; ?></td>
                                                    <td>
                                                        <div class="d-flex justify-content-around align-items-center">
                                                            <button type="button"
                                                                class="btn btn-sm btn-<?= $appointment['status'] == 'pending' ? 'warning' : 'success'; ?>">
                                                                <?= ucfirst($appointment['status']); ?>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6">No appointments found.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div> <!-- End Latest Orders-->
                </div>
            </div><!-- End Left side columns -->
        </div>
        </div>
    </section>
</main><!-- End #main -->

<!-- <script>
    $(document).ready(function () {
        $.ajax({
            type: "get",
            url: "<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>",
            success: function (response) {
                console.log(response);
            },
            error:function(error){
                console.log(error);
            }
        });
    });
</script> -->
<?= $this->endSection() ?>