<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add-Doctor
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Add New Doctor</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="<?= base_url() . '' . session('prefix') . '/' . 'doctor' ?>">All
                                Doctor</a></li>
                        <!-- <li class="breadcrumb-item"><a href="enquiry.php"> Enquiry </a></li> -->
                        <li class="breadcrumb-item active">Add New Doctor</li>
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
                                <h5 class="card-title text-start">Add New Doctor</h5>
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
                            action="<?= base_url() . '' . session('prefix') . '/' . 'doctor_register' ?>" method="post">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="name" class="form-label"><i class="bi bi-person-circle"
                                            style="font-size: 18px;"></i> Doctor Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <?php if (session('errors.name')): ?>
                                        <small class="text-danger"><?= esc(session('errors.name')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-fill"
                                            style="font-size: 18px;"></i> Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <?php if (session('errors.email')): ?>
                                        <small class="text-danger"><?= esc(session('errors.email')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="password" class="form-label"><i class="bi bi-lock-fill"
                                            style="font-size: 18px;"></i> Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <?php if (session('errors.password')): ?>
                                        <small class="text-danger"><?= esc(session('errors.password')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="address" class="form-label"><i class="bi bi-geo-alt-fill"
                                            style="font-size: 18px;"></i> Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="1"></textarea>
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
                                    <input type="date" class="form-control" id="dob" name="dob" max="2021-12-31">
                                    <?php if (session('errors.dob')): ?>
                                        <small class="text-danger"><?= esc(session('errors.dob')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="phone" class="form-label"><i class="bi bi-telephone-fill"
                                            style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="phone" class="form-control" id="phone" name="phone">
                                    <?php if (session('errors.phone')): ?>
                                        <small class="text-danger"><?= esc(session('errors.phone')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="specialist" class="form-label"><i class="bi bi-file-medical-fill"
                                            style="font-size: 18px;"></i> Specialist In</label>
                                    <!-- <input type="text" class="form-control" id="specialist" name="specialist"> -->
                                    <select class="form-select" name="specialist">
                                        <option value="n/a">--Select--Specialty--</option>
                                        <option value="orthodontics">Orthodontics</option>
                                        <option value="endodontics">Endodontics</option>
                                        <option value="periodontics">Periodontics</option>
                                        <option value="prosthodontics">Prosthodontics</option>
                                        <option value="implantology">Implantology</option>
                                        <option value="radiology">Radiology</option>
                                        <option value="sedation">Sedation</option>
                                    </select>
                                    <?php if (session('errors.specialist')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialist')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="qualification" class="form-label"><i class="bi bi-award-fill"
                                            style="font-size: 18px;"></i> Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification">
                                    <?php if (session('errors.qualification')): ?>
                                        <small class="text-danger"><?= esc(session('errors.qualification')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="image" class="form-label"><i class="bi bi-image-fill"
                                            style="font-size: 18px;"></i> Doctor Image</label>
                                    <input type="file" class="form-control fileInput" id="image" name="image">
                                    <?php if (session('errors.image')): ?>
                                        <small class="text-danger"><?= esc(session('errors.image')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>


                                <div class="col-lg-6 mb-3">
                                    <label for="about" class="form-label"><i class="bi bi-person-fill"
                                            style="font-size: 18px;"></i> About</label>
                                    <textarea class="form-control" id="about" name="about" rows="1"></textarea>
                                    <?php if (session('errors.about')): ?>
                                        <small class="text-danger"><?= esc(session('errors.about')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">

                                <!-- <div class="row mb-3"> -->
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
                                <div class="col-lg-6 mb-3">
                                    <label for="selectSpecialistOrPractice" class="form-label"><i
                                            class="bi bi-check-square-fill" style="font-size: 18px;"></i></i> Which is
                                        Your Preference?</label>
                                    <select class="form-select" id="specialistOrPractice" name="specialistOrPractice">
                                        <option>Select Preference</option>
                                        <option value="3">Specialist</option>
                                        <option value="4">Practice</option>
                                    </select>
                                    <?php if (session('errors.specialistOrPractice')): ?>
                                        <small class="text-danger"><?= esc(session('errors.specialistOrPractice')) ?><i
                                                class="bi bi-exclamation-circle"></i></small>
                                    <?php endif; ?>
                                </div>
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
                                                timePicker24Hour: false,
                                                timePickerIncrement: 1,
                                                locale: {
                                                    format: 'hh:mm A', // Use 'hh:mm A' for 12-hour format with AM/PM
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


                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <button class="btn addsup-btn" type="submit">Add Doctor</button>
                                </div>
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
     document.querySelectorAll('.fileInput').forEach(inputElement => {
        inputElement.addEventListener('change', function() {
            const files = this.files;
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif']; 
            const maxFileSize = 10 * 1024 * 1024; // 10MB
            
            this.nextElementSibling?.remove();

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (!allowedTypes.includes(file.type)) {
                    this.insertAdjacentHTML('afterend', '<small class="text-danger">Please select a valid image.</small>');
                    this.value = ''; 
                    return;
                }

                if (file.size > maxFileSize) {
                    this.insertAdjacentHTML('afterend', '<small class="text-danger">Max file size is 10MB.</small>');
                    this.value = ''; 
                    return;
                }
            }
        });
    });


    $(document).ready(function () {
        function isValidEmail(email) {
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }
        $('#doctor_form').submit(function (event) {
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

            // Validation for each field
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
                $('#password').after('<small class="error-msg text-danger">Please enter a password.</small>');
                return false;
            }

            if (address === '') {
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

            if (specialist === '') {
                $('#specialist').after('<small class="error-msg text-danger">Please select a specialist.</small>');
                return false;
            }

            if (qualification === '') {
                $('#qualification').after('<small class="error-msg text-danger">Please enter a qualification.</small>');
                return false;
            }

            if (schedule === '') {
                $('#schedule').after('<small class="error-msg text-danger">Please enter a schedule.</small>');
                return false;
            }

            if (about === '') {
                $('#about').after('<small class="error-msg text-danger">Please enter about information.</small>');
                return false;
            }

            // if (image === '') {
            //     $('#image').after('<small class="error-msg text-danger">Please select an image.</small>');
            //     return false; // Prevent form submission
            // }

            if (specialistOrPractice === '') {
                $('#specialistOrPractice').after('<small class="error-msg text-danger">Please select a preference.</small>');
                return false;
            }

            this.submit();
        });
    });
</script>

</script>

</script>

<?= $this->endSection() ?>