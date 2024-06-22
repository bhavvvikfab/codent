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
            <li class="breadcrumb-item"><a href="<?= base_url() . 'dashboard' ?>">Dashboard</a></li>
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
            <div class="row">
              <div class="col-lg-8">
                <h5 class="card-title text-start">Chat Messages</h5>
              </div>
              <!-- <div class="col-lg-4">
                 <h5 class="card-title text-end addsup">
                     <a href="">Contact Admin</a></h5>
              </div> -->
            </div>
          </div>

          <div class="card-body view-chat-admin m-0">
            <!-- Table with stripped rows -->
            <table class="table datatable chat-table-admin chat-admin-table">
              <thead>
                <tr>
                  <th class="text-center">Sr.No.</th>
                  <th class="text-center">Profile</th>
                  <th>Dental practice Name</th>
                  <th class="text-center">Phone</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($hospitals)): ?>
                  <?php foreach ($hospitals as $index => $hospital): ?>
                    <tr>
                      <td class="text-center"><?php echo $index + 1; ?></td>
                      <td class="text-center">
                        <img
                          src="<?= base_url() ?>/public/images/<?= !empty($hospital['profile']) ? $hospital['profile'] : 'user-profile.jpg' ?>"
                          height="50" width="50" class="rounded rounded-circle"
                          onerror="this.onerror=null; this.src='<?= base_url() ?>/public/images/default.jpg';"> 
                      </td>
                      <td>
                          <?php echo $hospital['fullname']; ?>
                          <?php if ($hospital['unread_messages'] > 0): ?>
                              <span class="badge bg-primary"><?php echo $hospital['unread_messages']; ?> New Message<?php echo $hospital['unread_messages'] > 1 ? 's' : ''; ?></span>
                          <?php endif; ?>
                      </td>
                      <td><?php echo $hospital['phone']; ?></td>
                      <td class="text-center">
                          <?php
                          $status = $hospital['status'];
                          $badgeClass = $status == 'active' ? 'badge bg-success' : 'badge bg-danger';
                          ?>
                          <span class="<?php echo $badgeClass; ?>"><?php echo ucfirst($status); ?></span>
                      </td>
                      <td class="text-center">
                          <a href="<?= base_url('view_chat/' . $hospital['id']) ?>" class="btn btn-chat btn-sm">
                              <i class="bi bi-chat-dots-fill"></i> Chat
                          </a>
                      </td>

                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="6" class="text-center" >No hospitals found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>

            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>


</main><!-- End #main -->
<script>
  
</script>


<?= $this->endSection() ?>