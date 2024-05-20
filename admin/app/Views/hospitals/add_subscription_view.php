<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <main id="main" class="main">
    <div class="pagetitle">
      <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>Add Subscription</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Subscription</li>
          </ol>
        </nav>
      </div>
    </div>
    </div><!-- End Page Title -->
   
    <section class="section" id="sup001">
      <div class="row ">
        <div class="col-lg-12">

          <div class="card">
            
             <div class="card-header">
               <div class="row">
                  <div class="col-lg-8">
                      <h5 class="card-title text-start">Add Subscription</h5>
                  </div>
                  <div class="col-lg-4">
                      <h5 class="card-title text-end addsup">
                          <a href="<?=base_url("subscription")?>"> Back</a></h5>
                  </div>
                </div>
             </div>

            <div class="card-body">
         

              <!-- General Form Elements -->
              <form>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-cash" style="font-size: 18px;"></i> Plan Name</label>
                      <input type="text" class="form-control" id="inputNanme4" value="">
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputNumber" class="form-label"> <i class="bi bi-coin" style="font-size: 18px;"></i> Price</label>
                    <input type="number" class="form-control" value="">
                  </div>
                    
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> User Name</label>
                      <input type="text" class="form-control" id="inputNanme4" value="">
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme05" class="form-label"><i class="bi bi-coin" style="font-size: 18px;"></i> Paid By</label>
                      <input type="text" class="form-control" id="inputNanme05" value="">
                    </div>
                  
                </div>
                
                
                <!--<div class="row">-->
                  
                <!--  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">-->
                <!--     <label for="inputNumber" class="form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> User Image</label>-->
                <!--     <input class="form-control" type="file" id="formFile">-->
                <!--  </div>-->
                <!--</div>-->
               
               <div class="row">
                   
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-calendar-week-fill"style="font-size: 18px;"></i> Duration</label>
                      <textarea class="form-control"> 15 days</textarea>
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-list-ul" style="font-size: 18px;"></i> Detail </label>
                      <textarea class="form-control"> Lorem</textarea>
                    </div>
                </div>
               

                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                    <!-- <a href="allsupplier.php">
                    <button type="submit" class="btn editsup-btn">Save Changes</button>
                    </a> -->
                    <a class="btn editsup-btn" href="#" role="submit">Save Changes</a>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>

        </div>
      </div>
    </section>
  </main><!-- End #main -->

<?= $this->endSection() ?>