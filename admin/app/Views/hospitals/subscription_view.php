<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
View_Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
  <div class="pagetitle">
    <div class="row">
      <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
        <h1>All Subscription</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">All Subscription</li>
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
                <h5 class="card-title text-start">Subscription</h5>
              </div>
              <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="#" id="addSubscriptionBtn"> Add New Subscription </a></h5>
              </div>
            </div>
          </div>

          <div class="card-body all-view-subcription table-responsive">
            <!-- Table with stripped rows -->
            <table class="table table-borderless datatable subscription-detail">
              <thead>
                <tr>
                  <th> Sr.No. </th>
                  <th>Plan Name </th>
                  <th>Duration (Days)</th>
                  <th>Price </th>
                   <th>Status</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
    <?php foreach ($packages as $package): ?>
        <tr>
            <td><?= $package['id'] ?></td>
            <td><?= $package['plan_name'] ?></td>
            
            <td><?= $package['duration'] ?></td>
            <td>$<?= $package['price'] ?></td>
           <td>
              <button class="statusToggleBtn btn btn-sm <?php echo ($package['status'] == 'active') ? 'btn-success' : 'btn-danger'; ?>" data-id="<?=$package['id']?>" >
                         <?php echo ($package['status'] == 'active') ? 'Active' : 'Inactive'; ?>
              </button>
           </td>
            
          
            <td>
                <div class="d-flex justify-content-around align-items-center">
                    <div class="editscr ">
                        
                         <button type="button" class="btn btn-secondary btn-sm editSubscriptionBtn" data-id="<?= $package['id'] ?>">
        <i class="bx bx-edit"></i>
    </button>
                         
                    </div>
                    <div class="viewssubscr">
                      
                            <button type="button" class="btn btn-success btn-sm viewSubscriptionbtn"   data-id="<?= $package['id'] ?>"><i class="ri-eye-line"></i></button>
                        
                    </div>
                     
                    <div class="deletsubscr ">
                        <button type="button" class="btn btn-danger btn-sm deleteSubscriptionbtn"   data-id="<?= $package['id'] ?>"><i class="ri-delete-bin-line"></i></button>
                       
                       
                    </div>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
</main><!-- End #main -->

<!-- Modal Structure -->
<div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add New Subscription</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your subscription form can go here -->
         
    <form id="add_subcription_form">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="packageNo" class="form-label"><i class="bi bi-cash" style="font-size: 18px;"></i> Package Number</label>
                <input type="text" class="form-control" name="packageNo" id="packageNo">
                <div id="packegeError" class="text-danger"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="inputName" class="form-label"><i class="bi bi-cash" style="font-size: 18px;"></i> Plan Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName" >
                <div id="inputNameError" class="text-danger"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="inputPrice" class="form-label"><i class="bi bi-coin" style="font-size: 18px;"></i> Price</label>
                <input type="number" class="form-control" name="inputPrice" id="inputPrice">
                <div id="priceError" class="text-danger"></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                <label for="inputDuration" class="form-label"><i class="bi bi-calendar-week-fill"style="font-size: 18px;"></i> Duration (Days)</label>
                <input type="number" class="form-control" name="inputDuration" id="inputDuration">
                <div id="durationError" class="text-danger"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 mb-7"> <!-- Increased width -->
                <label for="inputDetail" class="form-label"><i class="bi bi-list-ul" style="font-size: 18px;"></i> Detail</label>
                <textarea class="form-control" name="inputDetail" id="inputDetail" style="width: 100%;"></textarea>
                <div id="detailError" class="text-danger"></div>
            </div>
        </div><br>
         <div class="row mb-3">
            <div class="col-sm-12">
                <button type="submit" class="btn editsup-btn">Create</button>
                <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
           </div>

        </div>
    </form>

      </div>
      
    </div>
  </div>
</div>


<!-- Modal Structure -->
<div class="modal fade" id="editSubscriptionModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" class="card-title text-start" id="exampleModalLabel"><b>Edit Subscription</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Your subscription form can go here -->
        

         
    <!-- General Form Elements -->
              <form id="editSubscriptionForm">
                 
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                        <input type="hidden" class="form-control" id="id" >
                      <label for="inputNanme4" class="form-label"><i class="bi bi-cash" style="font-size: 18px;"></i> Package Name</label>
                      <input type="text" class="form-control package_id" id="package_id" >
                      <div id="errorPackage" class="text-danger"></div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                    <label for="inputNumber" class="form-label"> <i class="bi bi-coin" style="font-size: 18px;"></i> Plan Name</label>
                    <input type="text" class="form-control plan_name" id="plan_name" value="">
                    <div id="errorName" class="text-danger"></div>
                  </div>
                    
                </div>
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputNanme4" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Price </label>
                      <input type="number" class="form-control price" id="price" value="">
                      <div id="errorPrice" class="text-danger"></div>
                    </div>
                    
                     <div class="col-lg-6 col-md-6 col-sm-12 mb-3">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-calendar-week-fill"style="font-size: 18px;"></i> Duration (Days)</label>
                       <input type="number" class="form-control duration" id="duration" value="">
                       <div id="errorDuration" class="text-danger"></div>
                    </div>
                    
                    
                  
                </div>
                
                
                <!--<div class="row">-->
                  
                <!--  <div class="col-lg-6 col-md-6 col-sm-12 mb-3">-->
                <!--     <label for="inputNumber" class="form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> User Image</label>-->
                <!--     <input class="form-control" type="file" id="formFile">-->
                <!--  </div>-->
                <!--</div>-->
               
               <div class="row">
                   
                 
                  <div class="col-lg-12 col-md-12 col-sm-12 mb-7">
                      <label for="inputPassword" class="form-label"> <i class="bi bi-list-ul" style="font-size: 18px;"></i> Detail </label>
                      <textarea class="form-control details" id="details"></textarea>
                      <div id="errorDetails" class="text-danger"></div>
                    </div>
                </div>
                
               <br>

                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-12">
                    <!-- <a href="allsupplier.php">
                    <button type="submit" class="btn editsup-btn">Save Changes</button>
                    </a> -->
                    <button type="submit" class="btn editsup-btn">Update</button>
                     <button type="button" class="btn btn-secondary float-end" data-bs-dismiss="modal">Close</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

      </div>
      <div class="modal-footer">
       
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="viewSubscriptionModel" tabindex="-1" aria-labelledby="viewSubscriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewSubscriptionModalLabel"><b>View Subscription</b></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Subscription details content goes here -->
        <form class="m-3">
    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-center">
                    <i class="bi bi-person-circle" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <label class="form-label mb-0" for="inputePackage" id="inputePackage">Package Name:</label>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-center">
                    <i class="bi bi-cash" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <label class="form-label mb-0" for="planName" id="planName">Plan Name:</label>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-center">
                    <i class="bi bi-calendar-week-fill" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <label class="form-label mb-0" for="inputeprice" id="inputeprice">Price:</label>
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-center">
                    <i class="bi bi-cash" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <label class="form-label mb-0" for="inputeduration" id="inputeduration">Duration:</label>
                </div>
            </div> 
            <hr>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-center">
                    <i class="bi bi-card-list" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <label class="form-label mb-0" for="created_at" id="created_at">Date:</label>
                </div>
            </div> 
            <hr>
            <div class="row mb-3">
                <div class="col-2 d-flex align-items-center">
                    <i class="bi bi-coin" aria-hidden="true" style="font-size: 30px;"></i>
                </div>
                <div class="col-10 d-flex align-items-center">
                    <label class="form-label mb-0" for="inputedetails"id="inputedetails">Details:</label>
                </div>
            </div> 
        </div>
    </div>
</form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <!-- Additional buttons can be added here if needed -->
      </div>
    </div>
  </div>
</div>





<!-- Bootstrap and jQuery Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function() {
    // When the button is clicked, open the modal
    $('#addSubscriptionBtn').click(function() {
      $('#subscriptionModal').modal('show');
    });
   $("#add_subcription_form").submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        
        var packageNo = $('#packageNo').val();
        var inputName = $('#inputName').val();
        var inputPrice = $('#inputPrice').val();
        var inputDuration = $('#inputDuration').val();
        var inputDetail = $('#inputDetail').val();
        
        var isValid = true; // Flag to track form validation status
        
        // Validate package number
        if (packageNo === '') {
            $('#packegeError').text('Package number is required.');
            isValid = false;
        } else {
            $('#packegeError').text('');
        }
        
        // Validate input name
        if (inputName === '') {
            $('#inputNameError').html('Name is required.');
            isValid = false;
        } else {
            $('#inputNameError').html('');
        }
        
        // Validate input price
        if (inputPrice === '') {
            $('#priceError').text('Price is required.');
            isValid = false;
        } else {
            $('#priceError').text('');
        }
        
        // Validate input duration
        if (inputDuration === '') {
            $('#durationError').text('Duration is required.');
            isValid = false;
        } else {
            $('#durationError').text('');
        }
        
        // Validate input detail
        if (inputDetail === '') {
            $('#detailError').text('Detail is required.');
            isValid = false;
        } else {
            $('#detailError').text('');
        }
        
        if (isValid) {
            var formData = $(this).serialize(); 
            console.log(formData);
            
            $.ajax({
                url: '<?=base_url("add_subcription_form")?>',
                method: "post",
                data: formData,
                success: function(response) {
                    showToast(response);
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            });
        }
    });
    
    


    $(document).on('click', '.editSubscriptionBtn', function() 
    {
        // Get the subscription ID from the button's data attribute
        var subscriptionId = $(this).data('id');
        
    
        // AJAX request to fetch subscription data
      $.ajax({
    url: '<?= base_url("fetch_subscription") ?>', // URL of the script to fetch data
    type: 'GET',
    data: { id: subscriptionId },
    success: function(response) {
        
        // Parse the JSON response
        var subscriptionData = JSON.parse(response);

        // Populate the edit modal fields with subscription data
        $('#id').val(subscriptionData.id);
        $('#package_id').val(subscriptionData.package_id);
        $('#plan_name').val(subscriptionData.plan_name);
        $('#price').val(subscriptionData.price);
        $('#details').val(subscriptionData.details);
        $('#duration').val(subscriptionData.duration);

        // Show the edit modal
        $('#editSubscriptionModal').modal('show');
    },
   
});

    });

    // Event listener for form submission
    $('#editSubscriptionForm').on('submit', function(e) 
    {
        e.preventDefault(); // Prevent default form submission
        
        // Get form data
        var id = $('#id').val();
        var package_id = $('#package_id').val();
        var plan_name = $('#plan_name').val();
        var price = $('#price').val();
        var details = $('#details').val();
        var duration = $('#duration').val();
        
        console.log(id);
        console.log(package_id);console.log(plan_name);console.log(price);console.log(details);console.log(duration);
         var package_id = $('.package_id').val();
         var plan_name = $('.plan_name').val();
         var price = $('.price').val();
         var details = $('.details').val();
         var duration = $('.duration').val();
         var isValid = true;
        if (package_id === '') {
            $('#errorPackage').text('Package number is required.');
            isValid = false;
        } else {
            $('#errorPackage').text('');
        }
        
        if (plan_name === '') {
            $('#errorName').text('Package number is required.');
            isValid = false;
        } else {
            $('#errorName').text('');
        }
        
        if (price === '') {
            $('#errorPrice').text('Package number is required.');
            isValid = false;
        } else {
            $('#errorPrice').text('');
        }
        
        if (details === '') {
            $('#errorDetails').text('Package number is required.');
            isValid = false;
        } else {
            $('#errorDetails').text('');
        }
        
        if (duration === '') {
            $('#errorDuration').text('Package number is required.');
            isValid = false;
        } else {
            $('#errorDuration').text('');
        }
         
        
         if (isValid) {
        // AJAX request to update data
        $.ajax({
            url: '<?= base_url("update_subscription") ?>', // URL of the script to handle update
            type: 'POST',
            data: {
                id: id,
                package_id: package_id,
                plan_name: plan_name,
                price: price,
                details: details,
                duration: duration,
                
            },
            success: function(response) 
            {
                console.log(response);
                
                showToast(response);
                
               
                
                
                setTimeout(function() 
                {
                    $('#editSubscriptionModal').modal('hide');
                        location.reload();
                    }, 2000);
                
            },
        });
      }
    });
    
    $('.statusToggleBtn').on('click', function () {
            var $this = $(this);
            var id = $this.data('id');
            console.log(id);
            
            if ($this.hasClass('btn-success')) {
                $this.removeClass('btn-success').addClass('btn-danger');
                $this.text('Inactive');
                $.ajax({
                    url: '<?= base_url('package_status')?>',
                    method: 'get',
                    data: {id: id},
                    success: function (data) {
                        showToast('Package Status Changed.');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            } else {
                $this.removeClass('btn-danger').addClass('btn-success');
                $this.text('Active');
                $.ajax({
                    url: '<?= base_url('package_status')?>',
                    method: 'get',
                    data: {id: id},
                    success: function (data) {
                        showToast('Package Status Changed.');
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
            }
        });
        
        
        
$('#viewSubscriptionbtn').click(function() {
    // Get the ID from the button's data-id attribute
    var id = $(this).data('id');
    
    console.log(id);

    // Show the modal
    $('#viewSubscriptionModel').modal('show');

    // AJAX request to fetch data based on the ID
    $.ajax({
        url: '<?= base_url("") ?>', // Replace 'your_controller' with your actual controller name
        type: 'GET',
        dataType: 'json',
        data: { id: id }, // Pass the ID in the AJAX request
        success: function(response) {
            // Update modal content with fetched data
            $('#customerName').html('<b>Customer Name:</b> ' + response.customer_name);
            $('#planName').html('<b>Plan Name:</b> ' + response.plan_name);
            $('#duration').html('<b>Duration:</b> ' + response.duration);
            $('#price').html('<b>Price:</b> $' + response.price);
            $('#paidBy').html('<b>Paid By:</b> ' + response.paid_by);
            $('#detail').html('<b>Detail:</b> ' + response.detail);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText); // Log the error response
            // Handle error if needed
        }
    });
});


$(document).on('click', '.viewSubscriptionbtn', function() {
    // Get the subscription ID from the button's data attribute
    var id = $(this).data('id');
    console.log(id);

    $.ajax({
        url: '<?= base_url("fetch_subscription") ?>', // URL of the script to fetch data
        type: 'GET',
        data: { id: id },
        dataType: 'json', // Specify that the expected response is JSON
        success: function(response) 
        {
            $('#inputePackage').html('<b>Package Number&nbsp:</b> '+ '&nbsp;&nbsp;' +  response.package_id);
            $('#planName').html('<b>Plan Name&nbsp:</b> '+ '&nbsp;&nbsp;' +  response.plan_name);
            $('#inputeprice').html('<b>Price &nbsp:</b> ' + '&nbsp;&nbsp;$' +  response.price);
            $('#inputeduration').html('<b>Duration:</b>&nbsp;&nbsp;' + response.duration + '(Days)');
            $('#inputedetails').html('<b>Detail&nbsp:</b> ' + '&nbsp;&nbsp;' +  response.details);
            $('#created_at').html('<b>Date&nbsp:</b> ' + '&nbsp;&nbsp;' +  response.created_at);

            // Show the edit modal
            $('#viewSubscriptionModel').modal('show');
        }
    });
});

$(document).on('click', '.deleteSubscriptionbtn', function() 
{
    // Get the subscription ID from the button's data attribute
     console.log("hello");
    var id = $(this).data('id');
    console.log(id);
   

    $.ajax({
        url: '<?= base_url("delete_Subscription") ?>', // URL of the script to fetch data
        type: 'GET',
        data: { id: id },
        dataType: 'json', // Specify that the expected response is JSON
        success: function(response) 
        {
          console.log(response);
          if(response) 
          {
           location.reload(); // This should reload the page
         } 
        }
    });
});




  });

</script>

<?= $this->endSection() ?>
