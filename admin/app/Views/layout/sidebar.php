<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= site_url('/dashboard') ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->
    <!--  hospitals Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed"  data-bs-target="#hospital-nav" data-bs-toggle="collapse"  href="123">
      <i class="bi bi-building-fill-add"></i><span>Hospitals</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="hospital-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('/hospitals') ?>" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>All Hospitals</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('/add_hospital') ?>" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>Add New Hospitals</span>
          </a>
        </li>
      </ul>
    </li>
    <!--  hospitals Nav end -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#doc-nav" data-bs-toggle="collapse" href="123">
        <i class="bi bi-people"></i><span>Doctors</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="doc-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('doctors') ?>" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>All Doctors</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('add_doctor') ?>" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>Add New Doctor</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- Doctor -->
    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Pai-nav" data-bs-toggle="collapse" href="123">
        <i class="bi bi-people"></i><span>Patient</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Pai-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="<?= base_url('patient') ?>">
            <i class="bi bi-circle"></i><span>All Patient</span>
          </a>
        </li>
        <li>
          <a href="<?= base_url('add_patient') ?>">
            <i class="bi bi-circle"></i><span>Add New Patient</span>
          </a>
        </li>
      </ul>
    </li>
    <!-- Patient -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="123">
        <i class="bi bi-question-circle"></i><span>Enquiry</span>

        <i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="enquiry.php" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>All Enquiries</span>
          </a>
        </li>
        <li>
          <a href="addenquiry.php" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>Add New Enquiry</span>
          </a>
        </li>
      </ul>
    </li><!-- End Enquiry Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Supl-nav" data-bs-toggle="collapse" href="123">
        <i class="bi bi-calendar-week"></i><span>Appointment</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Supl-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="allappoint.php" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>All Appointments</span>
          </a>
        </li>
        <li>
          <a href="addappoint.php" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>Add New Appointment</span>
          </a>
        </li>
      </ul>
    </li><!-- End appointment Nav -->


    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#pay-nav" data-bs-toggle="collapse" href="123">
        <i class="bi bi-coin"></i><span>Payment</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="pay-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

        <li>
          <a href="payment.php" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>All Payments</span>
          </a>
        </li>
        <li>
          <a href="Admininvoice.php" class="nav-link collapsed">
            <i class="bi bi-circle"></i><span>All Invoice</span>
          </a>
        </li>
      </ul>
    </li>


    <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="Admininvoice.php">
              <i class="bi bi-receipt"></i>
              <span>Invoice</span>
            </a>
          </li> -->

    <!-- End Invoice Nav-->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="chatadmin.php">
          <i class="bi bi-chat-dots"></i>
          <span>Chat Messages</span>
        </a>
      </li>
 -->

    <!-- <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#Subcri-nav" data-bs-toggle="collapse" href="123">
        <i class="bi bi-person"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="Subcri-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="appuser.php">
            <i class="bi bi-circle"></i><span>All User</span>
          </a>
        </li>
        <li>
          <a href="adduser.php">
            <i class="bi bi-circle"></i><span>Add New User</span>
          </a>
        </li>
      </ul>
    </li> -->

    <!-- user  -->


    <li class="nav-item">
      <a class="nav-link collapsed"   href="<?=base_url("subscription")?>">
        <i class="bi bi-cash"></i><span>Subscription</span>
      </a>
    </li>
    <!--==========  End Subscription----------------->


    <!--  <li class="nav-item">
            <a class="nav-link collapsed" href="feedback.php">
              <i class="bi bi-receipt"></i>
              <span>Feedback/Reviews</span>
            </a>
          </li> -->

    <!-- End Feedback Nav-->

    <!--  <li class="nav-item">
            <a class="nav-link collapsed" href="delivery.php">
              <i class="bi bi-receipt"></i>
              <span>All Delivery</span>
            </a>
          </li> -->

    <!-- End Invoice Nav-->



    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('/profile') ?>">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li> -->
    <!-- End Profile Page Nav -->



    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="register.php">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li> --><!-- End Register Page Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url('/logout') ?>">
        <i class="bi bi-box-arrow-in-right"></i>
        <span>Logout</span>
      </a>
    </li><!-- End Login Page Nav -->



  </ul>

</aside>

<!-- End Sidebar-->