<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Lead 
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    <section class="my-dent-section ftco-section d-portal-bg d-flex flex-column justify-content-center">
      <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 ftco-animate  ">
              
              <h1 class="h1hedaing text-center">Dentist Portal Lead</h1>
               
            </div>
          </div>
        </div>
      </div>
    </section>

      <section class="ftco-section pb-0">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="card" id="referaal-list2">
                <div class="card-body p-4">
                    <div class="row px-3 mb-4">
                      <div class="col-lg-6 col-md-6 px-2">
                        <label class="text-dark font-weight-bold">What you are looking for ?</label>
                          <div class="input-group " id="searchbar-ref">

                            <div class="input-group-prepend icon-search-btn">
                              
                              <span class="input-group-text" id="basic-search"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Search By Keyword" aria-label="Search" aria-describedby="basic-search">
                          </div>
                      </div>
                      
                      <div class="col-lg-2 col-md-6 px-2">
                          <div class="st-filter" id="status-ref"> 
                            <label class="text-dark font-weight-bold">Status</label>
                              <select class="form-select" aria-label="Default select example">
                                <option selected>All</option>
                                <option value="1">Success</option>
                                <option value="2">Pending</option>
                                <option value="3">Rejected</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-2 px-2 col-md-6">
                          <div class="st-filter" id="status-ref"> 
                            <label class="text-dark font-weight-bold">Dr. Name</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Dr. John</option>
                                <option value="1">Dr. Peter</option>
                                <option value="2">Dr. Sez</option>
                                <option value="3">Dr. Hello</option>
                              </select>
                              
                          </div>
                      </div>
                       
                      <div class="col-lg-2 px-2 d-flex justify-content-between col-md-6 mt-3 mt-md-0" style="align-items: end;">
                         
                          <div class="filer" id="btn-filter"> 
                              <button class="btn btn-primary ref-filter w-100 px-4"><i class="fa fa-filter text-white mr-3"></i>Find Now</button>
                          </div>
                      </div>
                      </div>
                   

                    <div class="row px-3">
                      <div class="col-lg-6 col-md-6 px-2">

                          <div class="row">
                              <div class="col-lg-6 col-md-6 pr-2">

                                  <label class="text-dark font-weight-bold">Start Date </label>
                                  <div class="input-group " id="date-ref">

                                    <div class="input-group-prepend icon-cal-btn">
                                      
                                      <span class="input-group-text" id="basic-cal"><i class="fa fa-calendar text-white"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-cal">
                                  </div>
                              </div>

                              <div class="col-lg-6 col-md-6 pl-2">
                                  <label class="text-dark font-weight-bold">End Date </label>
                                  <div class="input-group " id="date-ref">

                                    <div class="input-group-prepend icon-cal-btn">
                                      
                                      <span class="input-group-text" id="basic-cal"><i class="fa fa-calendar text-white"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-cal">
                                  </div>
                              </div>
                          </div>

                      </div>

                      <div class="col-lg-6 col-md-6 px-2">
                          <div class="st-filter" id="status-ref"> 
                            <label class="text-dark font-weight-bold">Referral For</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>All</option>
                                <option value="1">Teeth Whiteing</option>
                                <option value="2">Teeth Brackets</option>
                                <option value="3">Teeth Cleaning</option>
                              </select>
                               
                          </div>
                      </div>

                    </div>
                </div>
            </div>
          </div>
        </div>
      </section>

    <section class="ftco-section">
        <div class="container">
          <div class="row flex-row justify-content-between list24">
 
             <div class="col-lg-4 col-md-6 list23">
               <div class="card" id="referaal-list2">
                 <div class="card-title refeal-title">
                  <h4 class="ml-3 text-white pt-2">101 Referral for Teeth Whiteing</h4>
                 </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><i class="fa fa-calendar text-dark"></i> 14th May, 2024</p> 
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b> Dr. John </p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b> Peter Taylor</p>
                                </div> 
                                <div class="col-lg-6">
                                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b> Teeth Whiteing </p>
                                </div>
                                  
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-success myref-btn-status"> Success</button>
                                </div> 
                            </div>
                          </div>
                        </div>
                         
                 </div>
               </div>
             </div>



             <div class="col-lg-4 col-md-6 list23">
               <div class="card" id="referaal-list2">
                 <div class="card-title refeal-title">
                  <h4 class="ml-3 text-white pt-2">101 Referral for Teeth Whiteing</h4>
                 </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><i class="fa fa-calendar text-dark"></i> 14th May, 2024</p> 
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b> Dr. John </p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b> Peter Taylor</p>
                                </div> 
                                <div class="col-lg-6">
                                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b> Teeth Whiteing </p>
                                </div>
                                  
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-success myref-btn-status"> Success</button>
                                </div> 
                            </div>
                          </div>
                        </div>
                         
                 </div>
               </div>
             </div>

             <div class="col-lg-4 col-md-6 list23">
               <div class="card" id="referaal-list2">
                 <div class="card-title refeal-title">
                  <h4 class="ml-3 text-white pt-2">101 Referral for Teeth Whiteing</h4>
                 </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><i class="fa fa-calendar text-dark"></i> 14th May, 2024</p> 
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b> Dr. John </p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b> Peter Taylor</p>
                                </div> 
                                <div class="col-lg-6">
                                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b> Teeth Whiteing </p>
                                </div>
                                  
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-warning myref-btn-status"> Pending</button>
                                </div> 
                            </div>
                          </div>
                        </div>
                         
                 </div>
               </div>
             </div>
              
            <div class="col-lg-4 col-md-6 list23">
               <div class="card" id="referaal-list2">
                 <div class="card-title refeal-title">
                  <h4 class="ml-3 text-white pt-2">101 Referral for Teeth Whiteing</h4>
                 </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><i class="fa fa-calendar text-dark"></i> 14th May, 2024</p> 
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b> Dr. John </p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b> Peter Taylor</p>
                                </div> 
                                <div class="col-lg-6">
                                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b> Teeth Whiteing </p>
                                </div>
                                  
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-success myref-btn-status"> Success</button>
                                </div> 
                            </div>
                          </div>
                        </div>
                         
                 </div>
               </div>
             </div>



             <div class="col-lg-4 col-md-6 list23">
               <div class="card" id="referaal-list2">
                 <div class="card-title refeal-title">
                  <h4 class="ml-3 text-white pt-2">101 Referral for Teeth Whiteing</h4>
                 </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><i class="fa fa-calendar text-dark"></i> 14th May, 2024</p> 
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b> Dr. John </p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b> Peter Taylor</p>
                                </div> 
                                <div class="col-lg-6">
                                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b> Teeth Whiteing </p>
                                </div>
                                 
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-success myref-btn-status"> Success</button>
                                </div> 
                            </div>
                          </div>
                        </div>
                         
                 </div>
               </div>
             </div>

             <div class="col-lg-4 col-md-6 list23">
               <div class="card" id="referaal-list2">
                 <div class="card-title refeal-title">
                  <h4 class="ml-3 text-white pt-2">101 Referral for Teeth Whiteing</h4>
                 </div>
                 <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                             
                            <div class="row">
                                <div class="col-lg-6">
                                    <p><i class="fa fa-calendar text-dark"></i> 14th May, 2024</p> 
                                </div>
                                <div class="col-lg-6">
                                    <p><i class="fa fa-user-md text-dark"></i> <b class="text-dark">From:</b> Dr. John </p>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 <div class="col-lg-6">
                                    <p><i class="fa fa-user-circle-o text-dark"></i> <b class="text-dark">To:</b> Peter Taylor</p>
                                </div> 
                                <div class="col-lg-6">
                                    <p><i class="fa fa-file-text-o text-dark"></i> <b class="text-dark">Referral For:</b> Teeth Whiteing </p>
                                </div>
                                 
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="row">
                                 
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <button class="btn btn-success myref-btn-status"> Success</button>
                                </div> 
                            </div>
                          </div>
                        </div>
                         
                 </div>
               </div>
             </div>


          </div>


           
        </div>

    </section>

     
<?= $this->endSection() ?>
