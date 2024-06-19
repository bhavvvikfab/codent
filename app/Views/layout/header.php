
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-light ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	        <a href="<?= base_url('/') ?>" class="logo d-flex align-items-center">
                <img src="<?= base_url()?>public/images/logo.png" alt="">
                <span class="d-none d-lg-block pl-lg-2">CoDent</span>
            </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span>  
	      </button>

    	    <div class="collapse navbar-collapse" id="ftco-nav">
             <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="<?= base_url('/') ?>" class="nav-link">Home</a></li>
             <!--  <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
              <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li> -->
              




              <?php
        $id = session()->get('user_id');

        if ($id != '') 
        {
          ?>
             <li class="nav-item"><a href="<?= base_url('referral') ?>" class="nav-link">Referral</a></li>

<?php
        }
        else {
          ?>
          <li class="nav-item"><a href="<?= base_url('dentist_login') ?>" class="nav-link">Referral</a></li>
          <?php
        }
        ?>

        

             <li class="nav-item"><a href="<?= base_url('contact') ?>" class="nav-link">Contact Us</a></li>


             <!-- <li class="nav-item"><a href="<?= base_url('lead') ?>" class="nav-link">Lead</a></li> -->



        <?php
        $id = session()->get('user_id');

        if ($id != '') 
        {
          ?>
              <li class="nav-item cta"><a href="<?= base_url('refer') ?>" class="nav-link"><span>Make a Referral</span></a></li>
              <!-- <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
              <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
        <?php
            } else 
            {
              ?>
              <li class="nav-item cta"><a href="<?= base_url('dentist_login') ?>" class="nav-link"><span>Make a Referral</span></a></li>
              <?php
            }
            ?>


          <?php
        $id = session()->get('user_id');

        if ($id == '') 
        {
          ?>
              <li class="nav-item"><a href="dentist_login" class="nav-link" style="margin-right: -33px;">Login</a></li>
        <?php
        }
        ?>
        
          <li class="nav-item dropdown pe-3">
            

                  <a class="nav-link nav-profile d-flex align-items-center pe-0" href="<?= base_url('dentist_login') ?>" data-bs-toggle="dropdown" aria-expanded="true"> <i class="fa fa-user-circle-o profile-icon"></i></a> 
                  
                  <?php
        $id = session()->get('user_id');

        if ($id != '') 
        {
          ?>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" data-popper-placement="bottom-end" style="position: absolute; inset: 0px 0px auto auto; margin: 0px; transform: translate(-16.6667px, 37.7778px);">
                 
                 
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="<?= base_url('profile') ?>">
                            <i class="bi bi-person"></i>
                            <span>My Profile</span>
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>

                        

                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="<?= base_url('logout') ?>">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Sign Out</span>
                          </a>
                        </li>
                  </ul><!-- End Profile Dropdown Items -->
          
              <?php
        } 
        ?> 



</li>


              
          </ul>
            
          </div>
	    </div>
	  </nav>
    <!-- END nav -->