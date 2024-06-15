<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Home 
<?= $this->endSection() ?>
<?= $this->section('content') ?>

   

    <section class="my-mainbnner-sec ftco-section d-portal-bg d-flex flex-column justify-content-center">
        <div class="container">
          <div class="myoverlay"></div>
          <div class="container">
            <div class="row">
              <div class="col-md-7 col-sm-12 ftco-animate">
                 <h1 class="mb-4" >Co - Dent</h1>
              <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              <p><a href="<?= base_url('refer') ?>" class="btn btn-primary px-4 py-2">Refer a Patient</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      
    <section class="ftco-section ftco-services">
      <div class="container">
      	<div class="row justify-content-center pb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <h2 class="mb-2">Our Services</h2>
            <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 d-flex align-self-stretch ftco-animate mb-4 mb-md-0">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-tooth-1"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Teeth Whitening</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate mb-4 mb-md-0">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-dental-care"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Teeth Cleaning</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-4 d-flex align-self-stretch ftco-animate mb-4 mb-md-0">
            <div class="media block-6 services d-block text-center">
              <div class="icon d-flex justify-content-center align-items-center">
            		<span class="flaticon-tooth-with-braces"></span>
              </div>
              <div class="media-body p-2 mt-3">
                <h3 class="heading">Quality Brackets</h3>
                <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.</p>
              </div>
            </div>      
          </div>
           
        </div>
      </div>
       
    </section>


    <section class="ftco-section">
      <div class="container">
      	 <div class="row">

            <div class="col-md-6 col-12">
                <img class="img-fluid mb-5 mb-md-0" src="<?= base_url()?>public/images/bg_4.jpg" width="520" alt="">
            </div>

            <div class="col-md-6 col-12 d-flex flex-column justify-content-center hsec-col">
              
                <h2 class="h2heading"> Leading healthcare<br> providers </h2>
                <hr class="my-3">
                <p class="mt-lg-2 mb-lg-4"> Co-Dent provides progressive, and affordable healthcare, using mordern technology. To us, it’s not just work. We take pride in the solutions we deliver.</p>
                <!-- <button class="btn btn-outline-primary py-2 px-4"><a href="refer.php"> Refer A Patient </a></button> -->
                <a href="<?= base_url('refer') ?>" class="btn btn-primary px-4 py-2 myreferbtn">Refer a Patient</a>

            </div>

         </div>
    	</div>
    </section>

     
    <?= $this->endSection() ?>

    