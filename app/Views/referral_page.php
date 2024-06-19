<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Referral 
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
  <div class="container">
    <div class="myoverlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 ftco-animate">
          <h1 class="h1hedaing text-center"> Referral List</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section pb-0">
  <div class="container">
    <div class="row justify-content-center"> <!-- Center the form within the row -->
      <div class="col-lg-11"> <!-- Adjust the width as needed -->
        <div class="card" id="referaal-list2">
          <div class="card-body p-4">
            <form action="<?= base_url('search_enquiry') ?>" method="get">
              <div class="row px-3 mb-4">
                <div class="col-lg-6 col-md-6 px-2">
                  <label class="text-dark font-weight-bold">What you are looking for?</label>
                  <div class="input-group" id="searchbar-ref">
                    <div class="input-group-prepend icon-search-btn">
                      <span class="input-group-text" id="basic-search"><i class="fa fa-search"></i></span>
                    </div>

                    <input type="text" class="form-control" placeholder="Search By Keyword" aria-label="Search" aria-describedby="basic-search" name="search_keyword">
                  </div>
                </div>
                <div class="col-lg-6 px-2"> <!-- Adjust the width as needed -->
                  <div class="d-flex justify-content-end align-items-end h-100"> <!-- Center the button vertically -->
                    <div class="filter" id="btn-filter">
                      <button type="submit" class="btn btn-primary ref-filter w-100 px-4"><i class="fa fa-filter text-white mr-3"></i>Find Now</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<br>
<?php if (!empty($user)): ?>
  <div class="row" id="userList">
    <?php $count = 0; ?>
    <?php foreach ($user as $users): ?>
      <?php if ($count % 3 === 0): ?>
        </div>
        <!-- <div class="col flex-row justify-content-between"> -->
        <div class="row ref-center">
      <?php endif; ?>
      
      <div class="col-lg-3 col-md-3 list23">
        <div class="card" id="referaal-list2">
          <div class="card-title refeal-title">
            <h4 class="ml-3 text-white pt-2"></h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                  <p>
                   <i class="fa fa-calendar text-dark"></i>
                    <?= esc(isset($users['appointment_date']) ? date('Y-m-d h:i A', strtotime($users['appointment_date'])) : 'N/A') ?>
                  </p>
                  </div>
                  <div class="col-lg-6">
                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b><?= esc(isset($users['referral_doctor']) ? $users['referral_doctor'] : 'N/A') ?></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6">
                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b><?= esc(isset($users['patient_name']) ? $users['patient_name'] : 'N/A') ?></p>
                  </div>
                  <div class="col-lg-6">
                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b><?= esc(isset($users['referral_for']) ? $users['referral_for'] : 'N/A') ?></p>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-12 d-flex justify-content-center">
                    <button class="btn btn-success myref-btn-status"><?= esc(isset($users['status']) ? $users['status'] : 'N/A') ?></button>
                    <a href="<?= base_url('user_view_details/' .$users['id'])?>" class="btn btn-primary" style="margin-left: 20px;">View Details</a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php $count++; ?>
    <?php endforeach; ?>
  </div>
  <!-- Pagination Links -->
  <div class="row justify-content-end mt-3">
  <div class="col-lg-12">
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center ">
        <?= $pager->links() ?>
      </ul>
    </nav>
  </div>
</div>

<?php else: ?>
  <div class="row justify-content-center">
    <div class="col-lg-12 text-center">
    <img _ngcontent-xtk-c5="" alt="" src="<?= base_url() ?>public/images/no-result.png">
    <h4 _ngcontent-xtk-c5="" class="font-weight-bold text-center mb-2">Sorry! No results found :</h4>
    <span _ngcontent-xtk-c5="">Please try to search for something else.</span>
                  </div>
                  <!-- <div _ngcontent-xtk-c5="" class="load-more-button d-inline font-14">Back to Home</div> -->
                </div>
    </div>
  </div>
  </div>
<?php endif; ?>
<br>

<style>
  /* Pagination container */
.pagination {
  display: flex;
  padding-left: 0;
  list-style: none;
  border-radius: 0.25rem;
}
.ref-center {
    justify-content: center;
}

/* Pagination links */
.pagination li a {
  position: relative;
  display: block;
  padding: 0.5rem 0.75rem;
  margin-left: -1px;
  line-height: 1.25;
  color: #007bff;
  background-color: #fff;
  border: 1px solid #dee2e6;
  transition: all 0.3s;
}

/* Hover effect */
.pagination li a:hover {
  color: #0056b3;
  text-decoration: none;
  background-color: #e9ecef;
  border-color: #dee2e6;
}

/* Active link */
.pagination li.active a {
  color: #fff;
  background-color: #007bff;
  border-color: #007bff;
}

/* Disabled link */
.pagination li.disabled a {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
}

/* Rounded corners */
.pagination li:first-child a {
  border-top-left-radius: 0.25rem;
  border-bottom-left-radius: 0.25rem;
}

.pagination li:last-child a {
  border-top-right-radius: 0.25rem;
  border-bottom-right-radius: 0.25rem;
}

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 





<?= $this->endSection() ?>

