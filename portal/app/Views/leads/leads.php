<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
All-Leads
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>All Leads</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?= base_url() . '' . session('prefix') . '/' . 'dashboard' ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Leads</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section" id="userapp01">
        <div class="row ">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">All Leads</h5>
                            </div>
                            <!-- <div class="col-lg-4">
                <h5 class="card-title text-end addsup">
                  <a href="<?= base_url() . '' . session('prefix') . '/' . 'add_enquiry' ?>"> Add New Enquiry </a>
                </h5>
              </div> -->
                        </div>
                    </div>

                    <div class="card-body allappuser-table table-responsive">
                        <!-- Table with stripped rows -->
                        <table class="table table-borderless datatable appuser-table">
                            <!-- <table class="table datatable table-bordered supplier-table"> -->
                            <thead>
                                <tr>
                                    <th> Sr. No. </th>
                                    <th>Patient Name</th>
                                    <th>Phone No.</th>
                                    <th>Required Specialist</th>
                                    <!-- <th>View</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php if (!empty($enquiries)): ?>
                                    <?php foreach ($enquiries as $index => $enquiry): ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= esc($enquiry['patient_name']) ?></td>
                                            <td><?= esc($enquiry['phone']) ?></td>
                                            <td><?= esc($enquiry['required_specialist']) ?></td>
                                            <!-- <td> -->
                                            <!-- <div class="d-flex justify-content-around align-items-center"> -->
                                            <!-- <div class="editen m-1">
                                                            <a type="button"
                                                            href="<?= base_url() . session('prefix') . '/edit_enquiry/' . esc($enquiry['id']) ?>"
                                                            class="btn btn-dark btn-sm"><i class='bx bx-edit'></i></a>
                                                        </div> -->

                                            <!-- <div class="deleten m-1">
                                                        <a type="button"
                                                        href="<?= base_url() . session('prefix') . '/delete_enquiry/' . esc($enquiry['id']) ?>"
                                                        class="btn btn-dark btn-sm delete_btn"><i class="ri-delete-bin-line"></i></a>
                                                    </div> -->
                                            <!-- </div> -->
                                            <!-- </td> -->

                                            <td>
                                                <!-- <div class="viewsenq m-1"> -->
                                                <a type="button"
                                                    href="<?= base_url() . session('prefix') . '/view_lead/' . esc($enquiry['id']) ?>"
                                                    class="btn btn-dark btn-sm"><i class="bi bi-eye"></i></a>
                                                <!-- </div> -->
                                                <!-- <div class="d-flex justify-content-around align-items-center"> -->
                                                <button type="button" class="btn btn-primary btn-sm contact-btn"
                                                    data-bs-toggle="modal" data-bs-target="#contactModal"
                                                    data-id="<?= esc($enquiry['id']) ?>">
                                                    Follow Up
                                                </button>
                                                <!-- </div> -->
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No Leads.</td>
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
    <!-- pop up model start -->
    <div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contact Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form id="contactForm">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="contactType" class="form-label">What happened when you contacted
                                    them?</label>
                                <input type="hidden" id="enquiry_id" name="enquiry_id">
                                <select class="form-select" id="contactType" name="outcome">
                                    <option value="">--Select Outcome--</option>
                                    <option id="option_1" value="I booked a new appointment">I booked a new appointment
                                    </option>
                                    <option id="option_2" value="They are thinking about it">They are thinking about it
                                    </option>
                                    <option id="option_3" value="They want to be contacted again later">They want to be
                                        contacted again later</option>
                                    <option id="option_4" value="Not proceeding with treatment">Not proceeding with
                                        treatment</option>
                                    <option id="option_5" value="I called but didn't speak to them">I called but didn't
                                        speak to them</option>
                                    <option id="option_6" value="I didn't call, I sent a message">I didn't call, I sent
                                        a message</option>
                                </select>
                            </div>
                            <div id="form_div">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- pop up model end -->
</main><!-- End #main -->

<script>

    $(document).ready(function () {
        $('#contactType').change(function () {
    var selectedValue = $(this).val();
    $('#form_selected').remove(); 

    if (selectedValue === 'I booked a new appointment') {
        $('#form_div').append(`
            <div id="form_selected" class="form-container">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dateTime" class="form-label">Date & Time</label>
                        <input type="datetime-local" class="form-control" id="dateTime" name="dateTime" Required>
                    </div>
                    <div class="col-md-6">
                        <label for="method" class="form-label">Method</label>
                        <input type="text" class="form-control" id="method" name="method">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="appointmentWith" class="form-label">Appointment With</label>
                        <input type="text" class="form-control" id="appointmentWith" name="appointmentWith">
                    </div>
                    <div class="col-md-6">
                        <label for="contactedVia" class="form-label">I Contacted them Via</label>
                        <input type="text" class="form-control" id="contactedVia" name="contactedVia">
                    </div>
                </div>
            </div>
        `);
    } else if (selectedValue === 'They are thinking about it') {
        $('#form_div').append(`
            <div id="form_selected" class="form-container">
                <div class="mb-3">
                    <label for="remindMeTo" class="form-label">Remind Me To</label>
                    <input type="text" class="form-control" id="remindMeTo_f2" name="remindMeTo">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="dateTime" class="form-label">Date & Time</label>
                        <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
                    </div>
                    <div class="col-md-6">
                        <label for="contactedVia" class="form-label">Contacted Via</label>
                        <input type="text" class="form-control" id="contactedVia" name="contactedVia">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="assignNextTaskTo" class="form-label">Assign Next Task To</label>
                    <input type="text" class="form-control" id="assignNextTaskTo" name="assignNextTaskTo">
                </div>
                <div class="mb-3">
                    <label for="noteForTeam" class="form-label">Note for Team</label>
                    <textarea class="form-control" id="noteForTeam" name="noteForTeam"></textarea>
                </div>
            </div>
        `);
    } else if (selectedValue === 'They want to be contacted again later') {
        $('#form_div').append(`
            <div id="form_selected" class="form-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="remindMeTo">Remind Me To</label>
                            <input type="text" class="form-control" id="remindMeTo" name="remindMeTo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateTime">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="contactedVia">Contacted Via</label>
                            <input type="text" class="form-control" id="contactedVia" name="contactedVia">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="assignNextTaskTo">Assign Next Task To</label>
                            <input type="text" class="form-control" id="assignNextTaskTo" name="assignNextTaskTo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="noteForTeam">Note for Team</label>
                            <textarea class="form-control" id="noteForTeam" name="noteForTeam"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        `);
    } else if (selectedValue === 'Not proceeding with treatment') {
        $('#form_div').append(`
            <div id="form_selected" class="form-container">
                 <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="additionalOption">Why not ?</label>
                            <select class="form-control" id="additionalOption" name="message">

                                <option value="">--Select--Message--</option>
                                <option value="Unsuitable for treatment">Unsuitable for treatment</option>
                                <option value="Credit check failed">Credit check failed</option>
                                <option value="To expensive">To expensive</option>
                                <option value="Follow up at later date">Follow up at later date</option>
                                <option value="Opted for different treatment">Opted for different treatment</option>
                                <option value="Changed mind">Changed mind</option>
                                <option value="No valid contact details available">No valid contact details available</option>
                                <option value="Unable to contact">Unable to contact</option>
                                <option value="Practice too far away">Practice too far away</option>
                                <option value="Went somewhere else">Went somewhere else</option>
                                <option value="Looking for treatment on the NHS">Looking for treatment on the NHS</option>
                                <option value="Referred to another practice">Referred to another practice</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-6">
                        <div class="form-group">
                            <label for="dateTime">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="dateTime" name="dateTime">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="contactedVia">Contacted Via</label>
                            <input type="text" class="form-control" id="contactedVia" name="contactedVia">
                        </div>
                    </div>
                   
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noteForTeam">Note for Team</label>
                            <textarea class="form-control" id="noteForTeam" name="noteForTeam"></textarea>
                        </div>
                    </div>
                </div>
               
            </div>
        `);
    } else if (selectedValue === 'I called but didn\'t speak to them') {
        $('#form_div').append(`
            <div id="form_selected" class="form-container">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="message">Select Option</label>
                            <select class="form-control" id="selectOption" name="message">
                                <option value="Left a message">Left a message</option>
                                <option value="No Answer">No Answer</option>
                                <option value="Caller Busy">Caller Busy</option>
                                <option value="Number Didn't Connect">Number Didn't Connect</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="noteForTeam">Note for Team</label>
                            <textarea class="form-control" id="noteForTeam" name="noteForTeam"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        `);
    } else if (selectedValue === 'I didn\'t call, I sent a message') {
        $('#form_div').append(`
            <div id="form_selected" class="form-container">
                <div class="form-group">
                    <label for="message">Message Details</label>
                    <textarea class="form-control" id="messageDetails" name="message"></textarea>
                </div>
            </div>
        `);
    }
});

    });

    $(document).ready(function () {

        $('.contact-btn').on('click', function () {
            $id = $(this).data('id');
            $('#enquiry_id').val($id)
        })

        $('#contactForm').submit(function (e) {
            e.preventDefault();
            let form = $(this);
            $.ajax({
                url: "<?= base_url(session('prefix') . '/add_lead_details') ?>",
                type: 'POST',
                data: $(form).serialize(),
                success: function (response) {
                    console.log(response);
                    if (response == 'success') {
                        $('#contactModal').modal('hide');
                        showToast('Submited')
                    } else {
                        console.log(response);
                    }
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        });


    });
</script>

<?= $this->endSection() ?>