<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Add Hospitals
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<main id="main" class="main">
    <div class="pagetitle">
        <div class="row">
            <div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <h1>Add New Doctor</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
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
                                    <a href="<?= base_url('doctors') ?>"> Back </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="doctor_form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="name" class="form-label"><i class="bi bi-person-circle" style="font-size: 18px;"></i> Doctor Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <div id="nameError" class="text-danger"></div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="qualification" class="form-label"><i class="bi bi-award-fill" style="font-size: 18px;"></i> Qualification</label>
                                    <input type="text" class="form-control" id="qualification" name="qualification">
                                    <div id="qualificationError" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="specialist" class="form-label"><i class="bi bi-file-medical-fill" style="font-size: 18px;"></i> Specialist Of</label>
                                    <input type="text" class="form-control" id="specialist" name="specialist">
                                    <div id="specialistError" class="text-danger"></div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="email" class="form-label"><i class="bi bi-envelope-fill" style="font-size: 18px;"></i> Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <div id="emailError" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="phone" class="form-label"><i class="bi bi-telephone-fill" style="font-size: 18px;"></i> Phone Number</label>
                                    <input type="number" class="form-control" id="phone" name="phone">
                                    <div id="phoneError" class="text-danger"></div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="image" class="form-label"><i class="bi bi-image-fill" style="font-size: 18px;"></i> Doctor Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <div id="imageError" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-6 mb-3">
                                    <label for="hospital_id" class="form-label"><i class="bi bi-person-fill" style="font-size: 18px;"></i> Select Hospital</label>
                                    <select class="form-select" id="hospital_id" name="hospital_id">
                                        <option value="">Select Hospital</option>
                                        <?php foreach ($hospitals as $hospital): ?>
                                            <option value="<?= $hospital['id'] ?>"><?= $hospital['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div id="hospital_idError" class="text-danger"></div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <button class="btn addsup-btn" type="submit">Add Doctor</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $("#doctor_form").submit(function(e) {
            e.preventDefault();

            var isValid = true;

            var name = $("#name").val();
            var qualification = $("#qualification").val();
            var specialist = $("#specialist").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var image = $("#image").val();
            var hospital_id = $("#hospital_id").val();
            console.log(image);
            console.log(name);


            $('.text-danger').text('');

            if (name === '') {
                $('#nameError').text('Please enter a Name.');
                isValid = false;
            }

            if (qualification === '') {
                $('#qualificationError').text('Please enter a Qualification.');
                isValid = false;
            }

            if (specialist === '') {
                $('#specialistError').text('Please enter a Specialist.');
                isValid = false;
            }

            if (email === '') {
                $('#emailError').text('Please enter an Email.');
                isValid = false;
            }

            if (phone === '') {
                $('#phoneError').text('Please enter a Phone Number.');
                isValid = false;
            }

            if (image === '') {
                $('#imageError').text('Please upload a valid Image.');
                isValid = false;
            }

            if (hospital_id === '') {
                $('#hospital_idError').text('Please select a Hospital.');
                isValid = false;
            }

            if (isValid)

            if (isValid) {
                var formData = new FormData(this);
                console.log(formData);
                $.ajax({
                    url: '<?=base_url("doctor_register")?>',
                    method: "post",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                   console.log(response);
                   showToast(response); // Assuming showToast is a function to display a toast notification
                   setTimeout(function() {
                    window.location.href = '<?= base_url("doctors")?>'; 
                  }, 2000); // Specify the delay in milliseconds
                  },

                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error:', textStatus, errorThrown);
                    }
                });
            }
        });
    });
</script>


<?= $this->endSection() ?>