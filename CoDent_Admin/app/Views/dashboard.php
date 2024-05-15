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
                                <h6>124</h6>
                                <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                    class="text-muted small pt-2 ps-1">decrease</span>
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
                        <h5 class="card-title">All Enquiries</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-question-lg"></i>
                                <!-- <i class="bi bi-person"></i> -->
                            </div>
                            <div class="ps-3">
                                <h6>30</h6>
                                <span class="text-primary small pt-1 fw-bold">12%</span>
                                <span class="text-muted small pt-2 ps-1">increase</span>
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
                                <h6>100</h6>
                                <span class="text-success small pt-1 fw-bold">8%</span>
                                <span class="text-muted small pt-2 ps-1">increase</span>
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
                                <h6>120</h6>
                                <span class="text-primary small pt-1 fw-bold">15%</span>
                                <span class="text-muted small pt-2 ps-1">increase</span>
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
                            <div class="card-body">
                                <h5 class="card-title">Reports <span>/Today</span></h5>
                                <!-- Line Chart -->
                                <div id="reportsChart"></div>
                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#reportsChart"), {
                                            series: [{
                                                name: 'All Apponitments',
                                                data: [15, 11, 32, 18, 9, 24, 11]
                                            }, {
                                                name: 'All Enquiries',
                                                data: [41, 25, 35, 22, 30, 57, 45]
                                            }, {
                                                name: 'All Referrals',
                                                data: [31, 40, 28, 51, 42, 51, 39],
                                            }, {
                                                name: 'All Users',
                                                data: [21, 50, 25, 30, 38, 44, 60],
                                            }],
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
                                            colors: ['#ff771d', '#6120b5', '#2eca6a', '#4154f1', 'blue'],
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
                                                type: 'datetime',
                                                categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
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
                                            <th> Sr. No. </th>
                                            <th>Name</th>
                                            <th>Dr. Name</th>
                                            <th>Email</th>
                                            <!-- <th>Phone No.</th> -->
                                            <!--<th data-type="date" data-format="DD/MM/YYYY">Date</th>-->
                                            <th>Slot</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Krishna</td>
                                            <td>Dr. John</td>
                                            <td>th123@gmail.com</td>
                                            <!-- <td>9876541230</td> -->
                                            <!--<td>13/05/2023</td>-->
                                            <td>11:00 a.m. - 2:00 p.m.</td>
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <button type="button" class="btn btn-warning">Pending</button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Theodore</td>
                                            <td>Dr. John</td>
                                            <td>th123@gmail.com</td>
                                            <!-- <td>9876541230</td> -->
                                            <!--<td>13/05/2023</td>-->
                                            <td>11:00 a.m. - 2:00 p.m.</td>
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <button type="button" class="btn btn-success">Approve</button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Kristan</td>
                                            <td>Dr. John</td>
                                            <td>krt123@gmail.com</td>
                                            <!-- <td>9876541230</td> -->
                                            <!--<td>13/05/2023</td>-->
                                            <td>11:00 a.m. - 2:00 p.m.</td>
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <button type="button" class="btn btn-warning">Pending</button>

                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>4</td>
                                            <td>Yug</td>
                                            <td>Dr. John</td>
                                            <td>yug123@gmail.com</td>
                                            <!-- <td>9876541230</td> -->
                                            <!--<td>13/05/2023</td>-->
                                            <td>11:00 a.m. - 2:00 p.m.</td>
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <button type="button" class="btn btn-success">Approve</button>
                                                </div>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>5</td>
                                            <td>Riddhi</td>
                                            <td>Dr. John</td>
                                            <td>rm123@gmail.com</td>
                                            <!-- <td>9876541230</td> -->
                                            <!--<td>13/05/2023</td>-->
                                            <td>11:00 a.m. - 2:00 p.m.</td>
                                            <td>
                                                <div class="d-flex justify-content-around align-items-center">
                                                    <button type="button" class="btn btn-warning">Pending</button>
                                                </div>
                                            </td>
                                        </tr>

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
<?= $this->endSection() ?>