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
                <h6><?= $countApp?></h6>

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
                <h6><?= $countEn?></h6>

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
                                         <h6><?= $countEn?></h6>

                                
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
                        <h5 class="card-title">All User</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                  <h6><?= $countUsers?></h6>

                               
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
                                <h5 class="card-title">Reports <span>/Today</span></h5>
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
            <th>Email</th>
            <th>Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($appointments) && is_array($appointments)) : ?>
            <?php $serial = 1; ?>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
                    <td class="text-center"><?= $serial++ ?></td>
                    <td><?= $appointment['patient_name'] ?? '' ?></td>
                    <td><?= $appointment['user_name'] ?? '' ?></td>
                    <td><?= $appointment['email'] ?? '' ?></td>
                    <td><?= $appointment['schedule'] ?? '' ?></td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center">
                            <button type="button" class="btn btn-warning"><?= $appointment['status'] ?? '' ?></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
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