<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Contact Us
<?= $this->endSection() ?>
<?= $this->section('content') ?>

  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Contct Details</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Contact Us</li>
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
                      <h5 class="card-title text-start">Contact</h5>
                  </div>
                 
                </div>
             </div>

          <div class="card-body all-view-subcription">
            <table class="table table-borderless datatable supplier-table">

                <thead>
                  <tr>
                    <th class="text-center">Sr.No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <!-- <th>Status</th> -->

                    <!-- <th data-type="date" data-format="YYYY/DD/MM">Start Date</th> -->
                    <th class="text-center">Action</th>
                  </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>
                        <div class="viewpai">
                          <a href="<?=base_url('viewContactus')?>">
                            <button type="button" class="btn btn-success btn-sm"><i class="ri-eye-line"></i></button>
                          </a>
                        </div>
                        </td>

                    </tr>
                    


                </tbody>

                
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>



  </main><!-- End #main -->

  
  

<?= $this->endSection() ?>