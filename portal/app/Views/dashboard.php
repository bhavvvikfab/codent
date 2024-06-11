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
    <!-- <pre> -->
    <?php
    // print_r($appointments);
    // die;
    ?>
<!-- </pre> -->

    <section class="section dashboard" id="dash896">
        <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-3 col-lg-3 col-md-6">
                <div class="card info-card customers-card">
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->
                    <div class="card-body">
                        <h5 class="card-title"> All Apponitments</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?= $countApp ?? '0' ?></h6>
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
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->
                    <div class="card-body">
                        <h5 class="card-title">All Enquiries</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                style="background-color: #D8BFD8;">
                                <i class="bi bi-question-lg"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                <h6><?= $countEn ?? '0' ?></h6>
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
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->
                    <div class="card-body">
                        <h5 class="card-title">All leads</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-medical"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?=  $leadsCount ?? '0' ?></h6>
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
                    <!-- <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>
                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div> -->
                    <div class="card-body">
                        <h5 class="card-title">All Users</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                <h6><?= $countUsers ?? '0' ?></h6>
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
            <div class="col-lg-6">
                <div class="row">
                    <!-- Reports -->
                    <div class="col-12">
                        <div class="card">
                            <!-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div> -->
                            <?php
                            //Variable for appointments
                            // $day_app = count($data['appointments']['today']);
                            // $month_app = count($data['appointments']['this_month']);
                            // $year_app = count($data['appointments']['this_year']);
                            // $all_app = count($data['appointments']['all']);

                            // // Variables for enquiries
                            // $day_enq = count($data['enquiries']['today']);
                            // $month_enq = count($data['enquiries']['this_month']);
                            // $year_enq = count($data['enquiries']['this_year']);
                            // $all_enq = count($data['enquiries']['all']);

                            // // Variables for users
                            // $day_users = count($data['users']['today']);
                            // $month_users = count($data['users']['this_month']);
                            // $year_users = count($data['users']['this_year']);
                            // $all_users = count($data['users']['all']);
                            ?>
                            <div class="card-body">
                                <h5 class="card-title">Reports</h5>
                                <!-- Line Chart -->
                                <div id="reportsChart"></div>
                                <script>
                                  document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [
                                                {
                                                    name: 'Appointments',
                                                    data: [
                                                        <?php
                                                        foreach ($data['appointments']['by_month'] as $monthData) {
                                                            echo count($monthData) . ',';
                                                        }
                                                        ?>
                                                    ],
                                                },
                                                {
                                                    name: 'Enquiries',
                                                    data: [
                                                        <?php
                                                        foreach ($data['enquiries']['by_month'] as $monthData) {
                                                            echo count($monthData) . ',';
                                                        }
                                                        ?>
                                                    ],
                                                },
                                                {
                                                    name: 'Users',
                                                    data: [
                                                        <?php
                                                        foreach ($data['users']['by_month'] as $monthData) {
                                                            echo count($monthData) . ',';
                                                        }
                                                        ?>
                                                    ],
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
                                                categories: [
                                                    'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
                                                ]
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

            <div class="col-lg-6">
    <div class="card">
        <div class="datatable-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title">Enquiries</h5>
            <a href="<?= base_url() . '' . session('prefix') . '/' . 'enquiry' ?>" style="margin-left:320px;" class = " float-end btn btn-dark btn-sm">View All</a>
            </div>
        <div class="card-body">
            <table class="table table-sm table-borderless datatable dash-order-table">
                <thead>
                    <tr>
                        <!-- <th style="font-size: small;">Sr. No.</th> -->
                        <th style="font-size: small;">Patient Name</th>
                        <th style="font-size: small;">Phone</th>
                        <th style="font-size: small;">Required Specialist</th>
                        <th style="font-size: small;">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php if (!empty($appointments) && is_array($appointments)) : ?>
                    <!-- <?php $serial = 1; ?> -->
                    <?php foreach ($appointments as $index => $enquiry) : ?>
                        <?php if ($index >= 2) break; // Limit to first 3 entries ?>
                        <tr style="font-size: small;">
                            <!-- <td ><?= $serial++ ?></td> -->
                            <td><?= esc($enquiry['patient_name']) ?></td>
                            <td><?= esc($enquiry['phone']) ?></td>
                            <td><?= esc($enquiry['required_specialist']) ?></td>
                            <td class="text-center">
                        <?php
                        $enquiry_status = $enquiry['status'];
                        $badge_class = '';
                        $status_text = '';

                        switch ($enquiry_status) {
                          case 'lead':
                              $badge_class = 'bg-success';
                              $status_text = 'Lead';
                              break;
                          case 'appointment':
                              $badge_class = 'bg-primary';
                              $status_text = 'Appointment';
                              break;
                          case 'cancel':
                              $badge_class = 'bg-danger';
                              $status_text = 'Cancelled';
                              break;
                          default:
                              $badge_class = 'bg-secondary';
                              $status_text = 'Enquiry';
                              break;
                      }
                      ?>
                      <span class="badge <?= $badge_class; ?>" style="font-size: -1rem; padding: 0.4rem 1rem;"><?= $status_text; ?></span>
                    </td>
                           
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5" class="text-center">No enquiries found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>     
        </div>
    </div>
</div>

        </div> <!-- End Right side columns -->

        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Latest En -->
                    <div class="col-12">
                        <div class="card recent-sales overflow-auto dashbord-order-table ">
                            <!-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div> -->


                            <div class="card-body">
                                <h5 class="card-title">Appointments</h5>
                                <table class="table table-borderless datatable dash-order-table">
                                    <thead>
                                        <tr>
                                            <th>Sr. No.</th>
                                            <th>Patient Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <!-- <th>Phone No.</th> -->
                                            <th data-type="date" data-format="DD/MM/YYYY">Date and Time</th>
                                            <!-- <th>Slot</th> -->
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <?php if (isset($appointments) && !empty($appointments)): ?>
                                            <?php foreach ($appointments as $index => $appointment): ?>
                                                <tr>
                                                    <td><?= $index + 1; ?></td>
                                                    <td><?= $appointment['patient_name']?? 'N/A'; ?></td>
                                                    <td><?= $appointment['email'] ?? 'N/A'; ?></td>
                                                    <td><?= $appointment['phone'] ?? 'N/A'; ?></td>
                                                    <td><?= $appointment['schedule'] ?? 'N/A'; ?></td>
                                                <?php
                                                    $status = $appointment['appointment_status'] ?? '';
                                                    $badgeClass = '';

                                                    if ($status === 'Pending') {
                                                        $badgeClass = 'warning';
                                                    } elseif ($status === 'Confirmed') {
                                                        $badgeClass = 'success';
                                                    } elseif ($status === 'Cancelled') {
                                                        $badgeClass = 'danger';
                                                    } else {
                                                        $badgeClass = 'secondary';
                                                    }
                                                ?>

                                                    <td>
                                                        <span class="bg-<?= $badgeClass ?> badge badge-sm">
                                                            <?= ucfirst($status) ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="6" class="text-center" >No appointments found.</td>
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