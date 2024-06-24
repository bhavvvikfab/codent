<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Dashboard
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
    // print_r($data);
    ?>
    <!-- </pre> -->

    <section class="section dashboard" id="dash896">
        <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-3 col-lg-3 col-md-6">
                <div class="card info-card customers-card">
                    <!-- <div class="filter">
                <a class="icon" href="#" id="filterDropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#" data-filter="today">Today</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="this-month">This Month</a></li>
                    <li><a class="dropdown-item" href="#" data-filter="this-year">This Year</a></li>
                </ul>
            </div> -->
                    <div class="card-body">
                        <h5 class="card-title"> All Appointments</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-calendar-week"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?= $countApp ?></h6>

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
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-question-lg"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                <h6><?= $countEn ?></h6>

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
                        <h5 class="card-title">All Referrals</h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-medical"></i>
                            </div>
                            <div class="ps-3">
                                <h6><?= $countEn ?></h6>


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
                                <h6><?= $countUsers ?></h6>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- user card -->

        </div>
        <div class="row">
            <!-- Reports and Table Side by Side -->
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Reports </h5>
                        <!-- Line Chart -->
                        <div id="reportsChart"></div>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [
                                        {
                                            name: 'All Appointments',
                                            data: [
                                                <?php
                                                foreach ($data['appointments']['by_month'] as $monthData) {
                                                    echo count($monthData) . ',';
                                                }
                                                ?>
                                            ],
                                        },
                                        {
                                            name: 'All Enquiries',
                                            data: [
                                                <?php
                                                foreach ($data['enquiries']['by_month'] as $monthData) {
                                                    echo count($monthData) . ',';
                                                }
                                                ?>
                                            ],
                                        },
                                        {
                                            name: 'All Users',
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
                        </script>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="col-lg-7">
                <div class="card">
                    <div class="datatable-bottom d-flex align-items-center">
                            <div class="col-9 offset-1"> <h5 class=" card-title">Enquiries</h5></div>
                            <div class="col-2"> <a href="<?= base_url('enquiries') ?>" class="btn btn-dark btn-sm text-s">View
                            All</a></div>
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
                                <?php if (!empty($enquiries) && is_array($enquiries)): ?>
                                    <!-- <?php $serial = 1; ?> -->
                                    <?php foreach ($enquiries as $index => $enquiry): ?>
                                        <?php if ($index >= 2)
                                            break; // Limit to first 3 entries ?>
                                        <tr style="font-size: small;">
                                            <!-- <td ><?= $serial++ ?></td> -->
                                            <td><?= esc($enquiry['patient_name']) ?></td>
                                            <td><?= esc($enquiry['phone']) ?></td>
                                            <td><?= esc($enquiry['required_specialist']) ?></td>
                                            <td class="text-center">
                                                <?php
                                                $enquiry_status = $enquiry['status'];
                                                $badge_class = 'bg-success';
                                                $status_text = 'Enquiry';
                                                ?>
                                                <span class="badge <?= $badge_class; ?>"
                                                    style="font-size: -1rem; padding: 0.4rem 1rem;"><?= $status_text; ?></span>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No enquiries found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                    <!-- Latest En -->
                    <div class="col-lg-12">
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
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <h5 class="card-title mb-0">Appointment</h5>
                                    </div>
                                    <table class="table table-borderless datatable dash-order-table">
                                        <thead>
                                            <tr>
                                                <!-- <th>Sr. No.</th> -->
                                                <th>Name</th>
                                                <th>Dr. Name</th>
                                                <th>Email</th>
                                                <th>Date And Time</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($appointments) && is_array($appointments)): ?>
                                                <!-- <?php $serial = 1; ?> -->
                                                <?php foreach ($appointments as $appointment): ?>
                                                    <?php if ($serial > 5)
                                                        break; // Limit to first 5 entries ?>
                                                    <tr>
                                                        <!-- <td class="text-center"><?= $serial++ ?></td> -->
                                                        <td><?= $appointment['patient_name'] ?? '' ?></td>
                                                        <td><?= $appointment['user_name'] ?? '' ?></td>
                                                        <td><?= $appointment['email'] ?? '' ?></td>
                                                        <td><?= $appointment['schedule'] ?? '' ?></td>

                                                        <td>
                                                            <?php
                                                            $enquiry_status = $appointment['appointment_status'];
                                                            $badge_class = '';
                                                            $status_text = '';

                                                            switch ($enquiry_status) {
                                                                case 'Confirmed':
                                                                    $badge_class = 'bg-success';
                                                                    $status_text = 'Confirmed';
                                                                    break;
                                                                case 'Pending':
                                                                    $badge_class = 'bg-warning';
                                                                    $status_text = 'Pending';
                                                                    break;
                                                                case 'Cancelled':
                                                                    $badge_class = 'bg-danger';
                                                                    $status_text = 'Cancelled';
                                                                    break;
                                                                case 'Completed':
                                                                    $badge_class = 'bg-info';
                                                                    $status_text = 'Completed';
                                                                    break;
                                                                default:
                                                                    $badge_class = 'bg-secondary';
                                                                    $status_text = 'Unknown';
                                                                    break;
                                                            }
                                                            ?>

                                                            <span class="badge <?= $badge_class; ?>"
                                                                style="font-size: -1rem; padding: 0.3rem 1rem;">
                                                                <?= $status_text; ?>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="6">No patients found.</td>
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

<script>
    $(document).ready(function () {
        $('#filterDropdown').on('click', function (e) {
            e.preventDefault();
            const filter = $(this).data('filter');
            fetchAppointmentCount(filter);
        });

        function fetchAppointmentCount(filter) {
            $.ajax({
                url: '<?= site_url('appointment/fetchAppointmentCount/') ?>' + filter,
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    $('#appointmentCount').text(response.count);
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    });
</script>
<?= $this->endSection() ?>