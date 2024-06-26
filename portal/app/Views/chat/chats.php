<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Chat-list
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Chat Messages</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a
                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Chat Messages</li>
          </ol>
        </nav>
      </div>
    </div>
  </div><!-- End Page Title -->

  <section class="section" id="chatpage421">
    <div class="row ">
      <div class="col-lg-12">

        <div class="card">

          <div class="card-header">
            <div class="row align-items-center">
              <div class="col-lg-9">
                <h5 class="card-title text-start">Chat Messages</h5>
              </div>
             
              <div class="col-lg-3 text-end">
              <a href="<?= base_url(session('prefix') . '/view_chat/' . 1) ?>" class="text-dark fw-bold h-3 btn btn-info position-relative">
                  Contact Admin
                    <!-- <i class="bi bi-bell-fill"></i> -->
                    <?php if ($adminUnreadMessagesCount > 0): ?>
                      <span class="badge bg-dark badge-number">
                    <?php echo $adminUnreadMessagesCount; ?>
                  </span>
                <?php endif; ?>               
              </a>
              </div>
            </div>
          </div>


          <!-- <div class="card-body view-chat-admin m-0"> -->
            <!-- Table with stripped rows -->
            <table class="table datatable chat-table-admin chat-admin-table">
              <thead>
                <tr>
                  <th>Sr.No.</th>
                  <th>Profile</th>
                  <th>Specialist Name</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($doctors)): ?>
                  <?php foreach ($doctors as $index => $doctor): ?>
                    <tr>
                      <td><?php echo $index + 1; ?></td>

                      <td>
                        <img
                          src="<?= config('App')->baseURL2 ?>/public/images/<?= !empty($doctor['details']['profile']) ? $doctor['details']['profile'] : 'user-profile.jpg' ?>"
                          height="50" width="50" class="rounded rounded-circle"
                          onerror="this.onerror=null; this.src='<?= config('App')->baseURL2 ?>/public/images/default.jpg';">
                      </td>
                      <td>
                        <?php echo $doctor['details']['fullname']; ?>
                        <?php if ($doctor['unread_messages'] > 0): ?>
                          <span class="badge bg-primary"><?php echo $doctor['unread_messages']; ?> New
                            Message<?php echo $doctor['unread_messages'] > 1 ? 's' : ''; ?></span>
                        <?php endif; ?>
                      </td>
                      <td><?php echo $doctor['details']['phone']; ?></td>
                      <td>
                        <?php
                        $status = $doctor['details']['status'];
                        $badgeClass = $status == 'active' ? 'badge bg-success' : 'badge bg-danger';
                        ?>
                        <span class="<?php echo $badgeClass; ?>"><?php echo ucfirst($status); ?></span>
                      </td>
                      <td>
                        <a href="<?= base_url(session('prefix') . '/view_chat/' . $doctor['details']['id']) ?>"
                          class="btn btn-chat btn-sm">
                          <i class="bi bi-chat-dots-fill"></i> Chat
                        </a>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center">No doctors found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>

            <!-- End Table with stripped rows -->

          <!-- </div> -->
        </div>

      </div>
    </div>
  </section>


</main><!-- End #main -->
<script>
$(document).ready(function() {
  get_top();
 
  function get_top(){

    var rows = $('table.chat-table-admin tbody tr').get();

    rows.sort(function(a, b) {
        var unreadA = parseInt($(a).find('.badge.bg-primary').text()) || 0;
        var unreadB = parseInt($(b).find('.badge.bg-primary').text()) || 0;

        return unreadB - unreadA;
    });
    
    $.each(rows, function(index, row) {
        $('table.chat-table-admin').children('tbody').append(row);
    });
  }
});
</script>


<?= $this->endSection() ?>