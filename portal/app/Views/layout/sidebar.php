<?php
$userId = session()->get('user_id');
$userRole = session()->get('user_role');
$image = session()->get('profile');

?>


<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#hospital-nav" data-bs-toggle="collapse" href="111">
         <i class="bi bi-people"></i> <span>Users</span>


          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
       
      </li>End Enquiry Nav -->

  
    <li class="nav-item">
      <a href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>" class="nav-link collapsed">

      <i class="bi bi-heart-pulse"></i><span>Doctors</span>
      </a>
    </li>


    <li class="nav-item">
      <a href="<?= base_url() . '' . session('prefix') . '/' . 'reception' ?>" class="nav-link collapsed">
      <i class="bi bi-person-fill"></i>Receptionists</span>
      </a>
    </li>
    

    <li class="nav-item">
      <!-- <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="111">
          <i class="bi bi-question-circle"></i><span>Enquiry</span>

          <i class="bi bi-chevron-down ms-auto"></i>
        </a> -->
      <a href="<?= base_url() . '' . session('prefix') . '/' . 'enquiry' ?>" class="nav-link collapsed">
        <i class="bi bi-question-circle"></i><span>Enquiries</span>
      </a>
      <!-- <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url() . '' . session('prefix') . '/' . 'enquiry' ?>" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>All Enquiries</span>
            </a>
          </li>
          <li>
            <a href="addenquiry.php" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>Add New Enquiry</span>
            </a>
          </li> appointment
        </ul> -->
    </li><!-- End Enquiry Nav -->

    <li class="nav-item">

      <a href="<?= base_url() . '' . session('prefix') . '/' . 'leads' ?>" class="nav-link collapsed">
        <i class="bi bi-person-plus"></i><span>Leads</span>
      </a>

    </li>




    <li class="nav-item">
      <!-- <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="111">
          <i class="bi bi-question-circle"></i><span>Enquiry</span>

          <i class="bi bi-chevron-down ms-auto"></i>
        </a> -->
      <a href="<?= base_url() . '' . session('prefix') . '/' . 'appointment' ?>" class="nav-link collapsed">
        <i class="bi bi-calendar-week"></i><span>Appointment</span>
      </a>
      <!-- <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url() . '' . session('prefix') . '/' . 'appointment' ?>" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>All Enquiries</span>
            </a>
          </li>
          <li>
            <a href="addenquiry.php" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>Add New Enquiry</span>
            </a>
          </li> appointment
        </ul> -->
    </li>
    <!-- End appointment Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#doc-nav" data-bs-toggle="collapse" href="111">
          <i class="bi bi-people"></i><span>Doctor</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="doc-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a href="Alldoctor.php" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>All Doctors</span>
            </a>
          </li>
          <li>
            <a href="Adddoc.php" class="nav-link collapsed">
              <i class="bi bi-circle"></i><span>Add New Doctor</span>
            </a>
          </li>
        </ul>
      </li> -->
    <!-- Doctor -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Subcri-nav" data-bs-toggle="collapse" href="111">
          <i class="bi bi-people"></i><span>Patient</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Subcri-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="Allpatient.php">
              <i class="bi bi-circle"></i><span>All Patient</span>
            </a>
          </li>
          <li>
            <a href="addpatient.php">
              <i class="bi bi-circle"></i><span>Add New Patient</span>
            </a>
          </li>
        </ul>
      </li> -->
    <!-- Patient -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pay-nav" data-bs-toggle="collapse" href="111">
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
      </li> -->


    <li class="nav-item">
      <a class="nav-link collapsed" href="chatadmin.php">
        <i class="bi bi-chat-dots"></i>
        <span>Communication</span>
      </a>
    </li>




    <!-- End Subscription Nav -->

    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="chatadmin.php">
          <i class="bi bi-chat-dots"></i>
          <span>Chat Messages</span>
        </a>
      </li> -->


    <!-- End Chat Nav-->
    <!-- <li class="nav-item">
            <a class="nav-link collapsed" href="Admininvoice.php">
              <i class="bi bi-receipt"></i>
              <span>Invoice</span>
            </a>
          </li> -->

    <!-- End Invoice Nav-->


    <!-- <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Order</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="order-nav" class="nav-content collapse " data-bs-parent="#order-nav">
            <li>
              <a href="Allorder.php">
                <i class="bi bi-circle"></i><span>All Documents</span>
              </a>
            </li>
            <li>
              <a href="addneworder.php">
                <i class="bi bi-circle"></i><span>U</span>
              </a>
            </li>
          </ul>
      </li> -->
    <!--==========  End Order----------------->


    <li class="nav-item">
      <a class="nav-link collapsed" href="document.php">
        <i class="bi bi-receipt"></i>
        <span>Document</span>
      </a>
    </li>

    <!-- End Feedback Nav-->

    <!--  <li class="nav-item">
            <a class="nav-link collapsed" href="delivery.php">
              <i class="bi bi-receipt"></i>
              <span>All Delivery</span>
            </a>
          </li> -->

    <!-- End Invoice Nav-->



    <!-- <li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="users-profile.php">-->
    <!--    <i class="bi bi-person"></i>-->
    <!--    <span>Profile</span>-->
    <!--  </a>-->
    <!--</li>End Profile Page Nav

     

      <li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="register.php">-->
    <!--    <i class="bi bi-card-list"></i>-->
    <!--    <span>Register</span>-->
    <!--  </a>-->
    <!--</li>-->
    <!-- End Register Page Nav -->

    <!--<li class="nav-item">-->
    <!--  <a class="nav-link collapsed" href="login.php">-->
    <!--    <i class="bi bi-box-arrow-in-right"></i>-->
    <!--    <span>Login</span>-->
    <!--  </a>-->
    <!-- </li>End Login Page Nav -->



  </ul>

</aside>
<!-- ======= Sidebar end ======= -->