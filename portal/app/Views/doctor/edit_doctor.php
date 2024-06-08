<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Edit-Doctor
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Edit Doctor</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>">Doctors</a></li>
                        <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
                        <li class="breadcrumb-item active">Edit-Doctor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section class="section" id="adduserform123">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h5 class="card-title text-start">Edit Doctor</h5>
                            </div>
                            <div class="col-lg-4">
                                <h5 class="card-title text-end addsup">
                                    <a href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>"> Back </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- General Form Elements -->
                        <form id="doctor_form" enctype="multipart/form-data"
                            action="<?= base_url() . '' . session('prefix') . '/' . 'doctor_edit' ?>" method="post">

                            <input type="hidden" name="dr_id" value="<?= $doctor['doctor']['id'] ?>" >
                            <input type="hidden" name="user_id" value="<?= $doctor['user']['id'] ?>" >
                            <input type="hidden" name="schedule_id" value="<?= $doctor['schedule']['id'] ?>" >
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="name" class="form-label"><i class="bi bi-person-circle"
                                            style="font-size: 18px;"></i> Doctor Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="<?= $doctor['user']['fullname'] ?>">
                                    <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-fill"
                                            style="font-size: 18px;"></i> Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?= $doctor['user']['email'] ?>">
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= esc(session('errors.email')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="image" class="form-label"><i class="bi bi-image-fill"
                                            style="font-size: 18px;"></i>Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="address" class="form-label"><i class="bi bi-geo-alt-fill"
                                            style="font-size: 18px;"></i> Address</label>
                                    <textarea class="form-control" id="address" name="address"
                                        rows="1"><?= $doctor['user']['address'] ?></textarea>
                                    <?php if (session('errors.address')): ?>
                                        <small class="text-danger"><?= esc(session('errors.address')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="dob" class="form-label"><i class="bi bi-calendar-fill"
                                            style="font-size: 18px;"></i> Date of Birth</label>
                                    <input type="date" class="form-control" id="dob" name="dob"
                                        value="<?= $doctor['user']['date_of_birth'] ?>">
                                    <?php if (session('errors.dob')): ?>
                                        <small class="text-danger"><?= esc(session('errors.dob')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="phone" class="form-label"><i class="bi bi-telephone-fill"
                                            style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone"
                                        value="<?= $doctor['user']['phone'] ?>">
                                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="specialist" class="form-label"><i class="bi bi-file-medical-fill"
                                            style="font-size: 18px;"></i> Specialist Of</label>
                                    <!-- <input type="text" class="form-control" id="specialist" name="specialist"
                                        value=""> -->
                                        <select class="form-select" name="specialist">
                                            <option value="n/a">--Select Specialty--</option>
                                            <option value="orthodontics" <?= ($doctor['doctor']['specialist_of'] == 'orthodontics') ? 'selected' : '' ?>>Orthodontics</option>
                                            <option value="endodontics" <?= ($doctor['doctor']['specialist_of'] == 'endodontics') ? 'selected' : '' ?>>Endodontics</option>
                                            <option value="periodontics" <?= ($doctor['doctor']['specialist_of'] == 'periodontics') ? 'selected' : '' ?>>Periodontics</option>
                                            <option value="prosthodontics" <?= ($doctor['doctor']['specialist_of'] == 'prosthodontics') ? 'selected' : '' ?>>Prosthodontics</option>
                                            <option value="implantology" <?= ($doctor['doctor']['specialist_of'] == 'implantology') ? 'selected' : '' ?>>Implantology</option>
                                            <option value="radiology" <?= ($doctor['doctor']['specialist_of'] == 'radiology') ? 'selected' : '' ?>>Radiology</option>
                                            <option value="sedation" <?= ($doctor['doctor']['specialist_of'] == 'sedation') ? 'selected' : '' ?>>Sedation</option>
                                        </select>

                                        
                                    <?php if (session('errors.specialist')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialist')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="qualification" class="form-label"><i class="bi bi-award-fill"
                                            style="font-size: 18px;"></i> Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification"
                                        value="<?= $doctor['doctor']['qualification'] ?>">
                                    <?php if (session('errors.qualification')): ?>
                                        <small class="text-danger"><?= esc(session('errors.qualification')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">

                            <div class="col-lg-6 mb-3">
                                    <label for="selectSpecialistOrPractice" class="form-label"><i
                                            class="bi bi-check-square-fill" style="font-size: 18px;"></i></i> Which is
                                        Your Preference?</label>
                                    <select class="form-select" id="specialistOrPractice" name="specialistOrPractice">
                                        <!-- <option>Select Preference</option> -->
                                        <option value="3" <?php if ($doctor['user']['role'] == 3): ?> selected
                                            <?php endif; ?>>Specialist</option>
                                        <option value="4" <?php if ($doctor['user']['role'] == 4): ?> selected
                                            <?php endif; ?>>Practice</option>
                                    </select>
                                    <?php if (session('errors.specialistOrPractice')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialistOrPractice')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                             </div>


                          

                                <div class="col-lg-6 mb-3">
                                    <label for="about" class="form-label"><i class="bi bi-person-fill"
                                            style="font-size: 18px;"></i> About</label>
                                    <textarea class="form-control" id="about" name="about"
                                        rows="1"><?= $doctor['doctor']['about'] ?></textarea>
                                    <?php if (session('errors.about')): ?>
                                        <small class="text-danger"><?= esc(session('errors.about')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="row mb-3">

                            <div class="col-lg-6 mb-3">
                                    <label class="form-label"><i class="bi bi-calendar-event-fill"
                                            style="font-size: 18px;"></i> Schedule</label>
                                    <div class="btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="sunday"> Sunday
                                        </label>
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="monday"> Monday
                                        </label>
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="tuesday"> Tuesday
                                        </label>
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="wednesday"> Wednesday
                                        </label>
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="thursday"> Thursday
                                        </label>
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="friday"> Friday
                                        </label>
                                        <label class="btn btn-secondary btn-sm m-1">
                                            <input type="checkbox" name="day-select" value="saturday"> Saturday
                                        </label>

                                        <!-- Add more checkboxes for other days -->
                                    </div>
                                    <div id="time-range-container"></div>
                                </div>

                                <!-- script  for schedule start -->
                                <script type="text/javascript"
                                    src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
                                <script type="text/javascript"
                                    src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
                                <link rel="stylesheet" type="text/css"
                                    href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

                                <script>
                                    $(document).ready(function () {
                                        var timeRanges = {
                                            'monday': 'Monday',
                                            'tuesday': 'Tuesday',
                                            'wednesday': 'Wednesday',
                                            'thursday': 'Thursday',
                                            'friday': 'Friday',
                                            'saturday': 'Saturday',
                                            'sunday': 'Sunday'
                                        };

                                        function generateTimeRangeInputs(day) {
                                            var timeRangeInput = `
                                            <div class="form-group" id="${day}-time-range-container">
                                                <label for="${day}-time-range">Set schedule for ${timeRanges[day]}:</label>
                                                <input type="text" class="form-control time-range-input" id="${day}-time-range" name="${day}_time" readonly>
                                            </div>
                                        `;
                                            return timeRangeInput;
                                        }

                                        for (var day in timeRanges) {
                                            var timeRangeInputs = generateTimeRangeInputs(day);
                                            $('#time-range-container').append(timeRangeInputs);
                                            $('#' + day + '-time-range-container').hide();
                                            initializeDateTimePicker(day);
                                        }

                                        $('input[name="day-select"]').change(function () {
                                            var selectedDay = $(this).val();
                                            if ($(this).is(':checked')) {
                                                $('#' + selectedDay + '-time-range-container').show();
                                            } else {
                                                $('#' + selectedDay + '-time-range-container').hide();
                                            }
                                        });

                                        function initializeDateTimePicker(day) {

                                            $('#' + day + '-time-range').daterangepicker({
                                                timePicker: true,
                                                timePicker24Hour: true,
                                                timePickerIncrement: 1,
                                                locale: {
                                                    format: 'HH:mm',
                                                    placeholder: '00:00 - 00:00'
                                                }
                                            });

                                        }

                                        $('form').submit(function () {
                                            $('input[type="checkbox"]').each(function () {
                                                if (!$(this).is(':checked')) {
                                                    var day = $(this).val();
                                                    $('#' + day + '-time-range').remove();
                                                }
                                            });
                                        });
                                    });
                                </script>
                                <!-- script for schedule end -->

                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <button class="btn addsup-btn" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- End General Form Elements -->
                    </div>
                </div>

            </div>
            <!--  --><!-- End General Form Elements -->
        </div>
        </div>

        </div>
        </div>
    </section>

    <?php if (session()->has('error')): ?>
        <script>
            showToast('Something went wrong..!!');  
        </script>
    <?php endif; ?>
</main>
<script>
    $(document).ready(function() {
        
        function isValidEmail(email) {
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
            }
        $('#doctor_form').submit(function(event) {
            event.preventDefault(); // Prevent the default form submission

            // Clear previous error messages
            $('.error-msg').remove();

            // Perform validation
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var address = $('#address').val();
            var dob = $('#dob').val();
            var phone = $('#phone').val();
            var specialist = $('#specialist').val();
            var qualification = $('#qualification').val();
            var schedule = $('#schedule').val();
            var about = $('#about').val();
            var image = $('#image').val();
            var specialistOrPractice = $('#specialistOrPractice').val();



            if (name === '') {
                $('#name').after('<small class="error-msg text-danger">Please enter a name.</small>');
                return false;
            }

            if (email === '') {
                $('#email').after('<small class="error-msg text-danger">Please enter an email.</small>');
                return false;
            } else if (!isValidEmail(email)) {
                $('#email').after('<small class="error-msg text-danger">Please enter a valid email address.</small>');
                return false;
            }

            if (password === '') {
                $('#password').after('<small class="error-msg text-danger">Please enter valid password.</small>');
                return false; 
            }

            if (address === ''  ) {
                $('#address').after('<small class="error-msg text-danger">Please enter an address.</small>');
                return false; 
            }

            if (dob === '') {
                $('#dob').after('<small class="error-msg text-danger">Please enter a date of birth.</small>');
                return false; 
            }

            if (phone === '') {
                $('#phone').after('<small class="error-msg text-danger">Please enter a phone number.</small>');
                return false; 
            }

            if (specialist === 'n/a') {
                $('#specialist').after('<small class="error-msg text-danger">Please select a specialist.</small>');
                return false; 
            }

            if (qualification === '') {
                $('#qualification').after('<small class="error-msg text-danger">Please enter a qualification.</small>');
                return false; 
            }

            // if (schedule === '') {
            //     $('#schedule').after('<small class="error-msg text-danger">Please enter a schedule.</small>');
            //     return false; 
            // }

            // if (about === '') {
            //     $('#about').after('<small class="error-msg text-danger">Please enter about information.</small>');
            //     return false;
            // }

            // if (image === '') {
            //     $('#image').after('<small class="error-msg text-danger">Please select an image.</small>');
            //     return false; 
            // }

            if (specialistOrPractice === '') {
                $('#specialistOrPractice').after('<small class="error-msg text-danger">Please select a preference.</small>');
                return false; 
            }

            // If all validations pass, submit the form
            this.submit();
        });
    });
</script>

<?= $this->endSection() ?>