<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Payment
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Payments</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">All Payments</li>
          </ol>
        </nav>
      </div>
    </div>
    </div><!-- End Page Title -->
   
    <section class="section" id="allsubscri801">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Payments</h5>
                  </div>
                  <div class="col-lg-4">
                      <!-- <h5 class="card-title text-end addsup">
                          <a href="<?= base_url('add_patient') ?>"> Add New Patient</a></h5> -->
                  </div>
                </div>
             </div>

          <div class="card-body all-view-subcription">
            <table class="table table-borderless datatable supplier-table">

                <thead>
                  <tr>
                    <th>Dental practice Name</th>
                    <th>Plan Name</th>
                    <th>Amount</th>
                    <th>Transaction Id</th>
                    <th>Date & Time</th>

                    <th>Status</th>

                    
                  </tr>
                </thead>

                <tbody>
            <?php if (!empty($transactions) && is_array($transactions)) : ?>
            <?php foreach ($transactions as $transaction): ?>
            
                <tr>
                   
                    <td><?= $transaction['fullname'] ?></td>
                    <td><?= $transaction['package_name'] ?></td>
                    <td><?= $transaction['amount'] ?></td>
                    <td><?= $transaction['transaction_id'] ?></td>
                    <td class="text-center"><?= date('Y-m-d h:i A', strtotime($transaction['date'])) ?></td>


                    <td class="text-center">
                        <?php
                        $enquiry_status = $transaction['transaction_status'];
                        $badge_class = '';
                        $status_text = '';

                        switch ($enquiry_status) {
                          case 'success':
                              $badge_class = 'bg-success';
                              $status_text = 'Success';
                              break;
                          case 'failed':
                              $badge_class = 'bg-danger';
                              $status_text = 'Failed';
                              break;
                          default:
                              $badge_class = 'bg-secondary';
                              $status_text = 'N/A';
                              break;
                      }
                      ?>
                      <span class="badge <?= $badge_class; ?>" style="font-size: -1rem; padding: 0.4rem 1rem;"><?= $status_text; ?></span>
                    </td>

                    
                    
                </tr>
          
             <?php endforeach; ?>
                  <?php else : ?> 
                  <?php endif; ?>
        </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </section>


 



  </main><!-- End #main -->

 
  

<?= $this->endSection() ?>