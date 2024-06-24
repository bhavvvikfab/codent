<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
  <div class="d-flex align-items-center justify-content-between">
    <a href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>" class="logo d-flex align-items-center">
      <img src="<?= base_url() ?>public/img/logo.png" height="30" width="30">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">CoDent</span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <!-- <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div>End Search Bar -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item d-block d-lg-none">
        <a class="nav-link nav-icon search-bar-toggle " href="#">
          <i class="bi bi-search"></i>
        </a>
      </li><!-- End Search Icon-->

     
      <li class="nav-item dropdown">

        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
          <i class="bi bi-bell"></i>
          <span class="badge bg-primary badge-number total_noti"></span>
        </a><!-- End Notification Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
          <li class="dropdown-header">
            You have <span class="total_noti">0</span> new notifications
            <!-- <a href="#" id="viewAllNotifications"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                all</span></a> -->
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <div id="notificationListContainer" style="max-height: 400px; overflow-y: auto; min-width:400px;">
            <!-- Notification items will be appended here by jQuery -->
          </div>
          <!-- <li class="dropdown-footer" style="display: none;">
            <a href="" class="text-primary" id="showLessNotifications">Show less</a>
          </li> -->
        </ul>

        <!-- End Notification Dropdown Items -->

      </li><!-- End Notification Nav -->

      <!-- <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul> --><!-- End Messages Dropdown Items -->

      <!-- </li> --> <!-- End Messages Nav -->

      <li class="nav-item dropdown pe-3">

        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img
            src="<?= config('App')->baseURL2 ?>/public/images/<?= session('profile') && !empty(session('profile')) ? session('profile') : 'default.jpg' ?>"
            alt="Profile" class="rounded-circle" width="40" height="40"
            onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">
          <span
            class="d-none d-md-block dropdown-toggle ps-2"><?= session('fullname') ? session('fullname') : 'User Name' ?></span>

        </a><!-- End Profile Iamge Icon -->
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?= session('fullname') ? session('fullname') : 'User Name' ?></h6>
            <span><?= ucfirst(session('prefix')) ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center"
              href="<?= base_url() . '' . session('prefix') . '/' . 'users_profile' ?>">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li> -->
          <!-- <li>
              <hr class="dropdown-divider">
            </li> -->

          <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="faq.php">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> -->

          <li>
            <a class="dropdown-item d-flex align-items-center" href="<?= site_url('/logout') ?>">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->


</header>

<!-- ======= Header end ======= -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 $(document).ready(function () {
    $.ajax({
      url: "<?= base_url() . '' . session('prefix') . '/' . 'notification' ?>",
      type: "GET",
      success: function (data) {
        // console.log(data);
        const notifications = data.notifications;
        const notificationListContainer = $('#notificationListContainer');
        const totalNoti = $('.total_noti');
        const base_url = '<?= base_url() ?>';
        const sessionPrefix = '<?= session("prefix") ?>';

        // Clear existing notifications
        notificationListContainer.empty();
        if (notifications.length == 0) {
          totalNoti.hide();
        } else {
          totalNoti.text(notifications.length);
        }

        // Loop through notifications and append to the list
        notifications.forEach((notification, index) => {
          let iconClass = '';
          let iconColor = '';
          let noti = JSON.parse(notification.notification);

          switch (noti.status.toLowerCase()) {
            case 'completed':
              iconClass = 'bi bi-check-circle';
              iconColor = 'text-success';
              break;
            case 'cancelled':
              iconClass = 'bi bi-x-circle';
              iconColor = 'text-danger';
              break;
            default:
              iconClass = 'bi bi-exclamation-circle';
              iconColor = 'text-warning';
          }

          const notificationItem = `
            <a class='appointment' data-id=${notification.id} href='${base_url}/${sessionPrefix}/view_appointment/${notification.appointment_details.id}'>
              <li class="notification-item">
                <i class="${iconClass} ${iconColor}"></i>
                <div>
                  <h4>Dr.${notification.dr_name}</h4>
                  <p>Appointment with ${notification.patient_name} - ${noti.status}</p>
                  <p>${formatTimeAgo(notification.created_at)}</p>
                </div>
              </li>
            </a>
            <li>
              <hr class="dropdown-divider">
            </li>
          `;

          notificationListContainer.append(notificationItem);
        });
      },
      error: function (error) {
        console.log(error);
      }
    });
  });

  // Helper function to format time ago
  function formatTimeAgo(datetime) {
    const now = new Date();
    const then = new Date(datetime);
    const diff = Math.floor((now - then) / 60000); // Difference in minutes

    if (diff < 1) return 'Just now';
    if (diff < 60) return `${diff} min. ago`;
    if (diff < 1440) return `${Math.floor(diff / 60)} hrs. ago`;
    return `${Math.floor(diff / 1440)} days ago`;
  }

  $(document).on('click', '.appointment', function () {
    const id = $(this).data('id');
    $.ajax({
      url: "<?= base_url() . '' . session('prefix') . '/' . 'notification_status' ?>",
      type: "POST",
      data: {
        noti_id: id,
      },
      success: function (response) {
        console.log(response);
      },
      error: function (error) {
        console.log(error);
      }
    });
  });

</script>