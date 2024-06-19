<?= $this->extend('layout/layout') ?>

<?= $this->section('title') ?>
Co-Dent - Refer 
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
::selection {
  color: #fff;
  background: #d43f8d;
}
.container-xs {
  text-align: center;
  border-radius: 5px;
  padding: 0 30px;
}
.container-xs header {
  font-size: 35px;
  font-weight: 600;
  margin: 0 0 30px 0;
}
.container-xs .form-outer {
  width: 100%;
  overflow: hidden;
}
.container-xs .form-outer form {
  display: flex;
  width: 400%;
}
.form-outer form .page {
  width: 25%;
  transition: margin-left 0.3s ease-in-out;
}
.form-outer form .page .title {
  text-align: left;
  font-size: 25px;
  font-weight: 500;
}
.form-outer form .page .field {
  height: 45px;
  margin: 45px 0;
  display: flex;
  position: relative;
}
form .page .field .label {
  position: absolute;
  top: -30px;
  font-weight: 500;
}
form .page .field input[type="Number"],
form .page .field input[type="text"] {
  height: 100%;
  width: 100%;
  border: 1px solid lightgrey;
  border-radius: 45px;
  padding-left: 15px;
  font-size: 18px;
}
.page {
  height: 547px; /* Set a fixed height for the pages */
  /* overflow-y: auto; Add scroll if content overflows */
}
form .page .field select {
  height: 100%;
  width: 100%;
  border: 1px solid lightgrey;
  border-radius: 45px;
  padding: 0px 8px;
  font-size: 18px;
}
form .page .field button {
  width: 100%;
  height: calc(100% + 5px);
  border: 2px solid white;
  background: none;
  margin-top: -20px;
  border-radius: 50px;
  color: white;
  cursor: pointer;
  font-size: 18px;
  font-weight: 800;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: 0.5s ease;
}
form .page .field button:hover {
  color: #4154f1;
  background: white;
  border: 2px solid white;
}
form .page .btns button {
  margin-top: -20px !important;
}
form .page .btns button.prev {
  margin-right: 3px;
  font-size: 17px;
  font-weight: 800;
}
form .page .btns button.next {
  margin-left: 3px;
}
.container .progress-bar {
  display: flex;
  margin: 40px 0;
  flex-direction: row;
  user-select: none;
}
.container .progress-bar .step {
  text-align: center;
  width: 100%;
  position: relative;
}
.container .progress-bar .step p {
  font-weight: 500;
  font-size: 18px;
  color: rgb(255 255 255 / 70%);
  margin-bottom: 8px;
}
.progress-bar .step .bullet {
  height: 35px;
  width: 35px;
  border: 2px solid #fff;
  display: inline-block;
  border-radius: 50%;
  position: relative;
  transition: 0.2s;
  font-weight: 500;
  font-size: 17px;
  align-content: center;
  line-height: 25px;
}
.progress-bar .step .bullet.active {
  border-color: white;
  background: white;
}
.progress-bar .step .bullet span {
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
}
.progress-bar .step .bullet.active span {
  color: #4154f1;
}
.progress-bar .step .bullet:before,
.progress-bar .step .bullet:after {
  position: absolute;
  content: '';
  bottom: 13px;
  right: -96px;
  height: 3px;
  width: 96px;
  background: #ffffff6b;
}
.progress-bar .step .bullet.active:after {
  background: white;
  transform: scaleX(0);
  transform-origin: left;
  animation: animate 0.3s linear forwards;
}
@keyframes animate {
  100% {
    transform: scaleX(1);
  }
}
.progress-bar .step:last-child .bullet:before,
.progress-bar .step:last-child .bullet:after {
  display: none;
}
.progress-bar .step p.active {
  color: white;
  font-weight: 700;
  transition: 0.2s linear;
}
.progress-bar .step .check {
  position: absolute;
  left: 50%;
  top: 22%;
  font-size: 15px;
  transform: translate(-50%, -50%);
  display: none;
}
.progress-bar .step .check.active {
  color: #fff;
}

.mm{
    padding-left: 2.25rem;
}


</style>

<div id="loader" class="loader-overlay" style="display: none;">
    <div class="loader"></div>
</div>


<section class="my-refer-sec ftco-section d-portal-bg d-flex flex-column justify-content-center">
  <div class="container">
    <div class="myoverlay"></div>  
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 ftco-animate">
          <h1 class="h1hedaing text-center">Refer A Patient</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section">
  <div class="container">
    <div class="row flex-row justify-content-between" id="refer-pt">
      <div class="col-lg-5 col-12 p-md-0">
        <img src="<?= base_url() ?>public/images/img-1.jpg" class="login-side-img">
      </div>
      <div class="col-lg-7 col-12">
        <div class="row">
          <div class="col-lg-12 pl-md-0">
            <div class="card mb-3 col-lg-12">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4 text-white">Refer a patient for treatment</h5>
                </div>
                <div class="container-xs">
                  <div class="progress-bar m-0">
                    <div class="step">
                      <div class="bullet">
                        <span>1</span>
                      </div>
                      <p>Name</p>
                      <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                      <div class="bullet">
                        <span>2</span>
                      </div>
                      <p>Contact</p>
                      <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                      <div class="bullet">
                        <span>3</span>
                      </div>
                      <p>Details</p>
                      <div class="check fas fa-check"></div>
                    </div>
                    <div class="step">
                      <div class="bullet">
                        <span>4</span>
                      </div>
                      <p>Submit</p>
                      <div class="check fas fa-check"></div>
                    </div>
                  </div><br>
                  <div class="form-outer">

                  <div id="message"></div>

                  <form  method="post" enctype="multipart/form-data" action="<?= base_url('add_enquiry')?>">
                      <div class="page slide-page">
                      <br>

                      <div class="field m-0" >
                          <div class="label text-white">Patient Name</div>
                          <input type="text" name="name">
                        </div>
                        <div id="nameError" class="error-message text-justify text-danger "></div>
                        <br><br>

                        <div class="field m-0">
    <div class="label text-white">Date of Birth</div>
    <input type="date" name="dob" class="form-control " id="dobInput" style="border-radius: 45px;">
</div>
<div id="dobError" class="error-message text-justify text-danger"></div>


                        <br><br>


<div class="field m-0">
    <div class="label text-white">Patient Age</div>
    <input type="text" name="age" id="ageInput" readonly>
</div>

                        
<br>

                        

                        

                        <!-- <div class="field">
                          <div class="label text-white">Referring Dentist Name</div>
                          <input type="text">
                        </div>
                        
                        <div class="field">
                          <div class="label text-white">Referring Dentist Phone Number</div>
                          <input type="number">
                        </div>
                        <div class="field">
                          <div class="label text-white">Referring Dentist Practice</div>
                          <input type="text">
                        </div> -->
                        <br><br>
                        <div class="field m-0">
                          <button class="firstNext next">Next</button>
                        </div>
                      </div>
                      <div class="page">

                      <br>
                      <div class="field m-0">
  <div class="label text-white">Patient Email Address</div>
  <input type="text" class="form-control" name="email" id="email">
</div>
<div id="emailError" class="error-message text-justify text-danger"></div>
<br><br>

<div class="field m-0">
  <div class="label text-white">Patient Phone Number</div>
  <input type="number" class="form-control" name="number" id="number">
</div>
<div id="phoneError" class="error-message text-justify text-danger"></div>

<div class="field">
  <div class="label text-white">Patient Home Address</div>
  <textarea class="form-control" name="address" id="address"></textarea>
</div>
<br>



<div class="field">
  <div class="label text-white">Gender</div>
  <div class="form-check">
    <input class="form-check-input rd-btn" type="radio" name="gender" id="genderMale" value="Male" checked>
    <label class="form-check-label text-white" for="genderMale">
      Male
    </label>
  </div>
  
  <div class="form-check mm">
    <input class="form-check-input rd-btn" type="radio" name="gender" id="genderFemale" value="Female">
    <label class="form-check-label text-white" for="genderFemale">
      Female
    </label>
  </div>
</div>

                        <div class="field btns">
                          <button class="prev-1 prev">Previous</button>
                          <button class="next-1 next">Next</button>
                        </div>
                      </div>

                      <div class="page">

                      
                        <div class="field">
                          <div class="label text-white">Types of Referral</div>
                          <select name="referral_type" class="form-select" aria-label="Default select example">
                            <option selected>Orthodontics</option>
                            <option value="1">Oral Surgery</option>
                            <option value="2">Periodontics</option>
                            <option value="3">Restorative</option>
                          </select>
                          <div id="referralTypeError" class="error-message text-justify text-danger"></div>
                        </div>

                        <div class="field m-0">
                          <div class="label text-white">Referring Dentist Name</div>
                          <input type="text"  name="referring_dentist_name">
                        </div>
                        <div id="referringDentistNameError" class="error-message text-justify text-danger"></div>
<br><br>


                        
                        <div class="field m-0">
                          <div class="label text-white">Referring Dentist Phone Number</div>
                          <input type="number" name="referring_dentist_phone">
                        </div>
                        <div id="referringDentistPhoneError" class="error-message text-justify text-danger"></div>
<br><br>
                        <div class="field m-0">
                          <div class="label text-white">Add Note</div>
                          <input type="text" name="referring_dentist_practice">
                        </div>
                        <div id="referringDentistPracticeError" class="error-message text-justify text-danger"></div>
                    <br>
                        <div class="field btns">
                          <button class="prev-2 prev">Previous</button>
                          <button class="button_2 next">Next</button>
                        </div>
                      </div>


                      <div class="page">

                          
                    <<div class="field m-0">
  <div class="label text-white">Appointment Date and Time</div>
  <input type="datetime-local" class="form-control" name="app_date" style="border-radius: 45px;">
</div>
<div id="appDateError" class="error-message text-danger"></div>
<br><br>
                        
                        <div class="field m-0">
                          <div class="label text-white">Clinical Summary</div>
                          <input type="text">
                        </div>
                        <div id="clinicalSummaryError" class="error-message text-danger"></div>
                        <br><br>

                        <div class="field m-0">
                          <div class="label text-white">Upload Patient Image</div>
                          <input class="form-control" type="file" name="images[]"  style="border-radius: 45px;" multiple >
                        </div>
                        <div id="uploadedImagesError" class="error-message text-danger"></div>
                        <br><br>
                       
                        
                        <!-- <div class="field">
                          <div class="label text-white">Medical History</div>
                          <input type="text">
                        </div>
                        <div class="field">
                          <div class="label text-white">Provisional Diagnosis</div>
                          <input type="text">
                        </div> -->
                        <div class="field btns">
                          <button class="prev-3 prev">Previous</button>
                          <button class="submit" id="register">Submit</button>
                        </div>

                      </div>
                      <br>
                    </form>
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
                <script>
    $(document).ready(function () 
    {

      var today = new Date().toISOString().split('T')[0];
    // Set the max attribute to today's date
    document.getElementById('dobInput').setAttribute('max', today);

    // Function to calculate age
    function calculateAge(dob) {
        var today = new Date();
        var birthDate = new Date(dob);
        var age = today.getFullYear() - birthDate.getFullYear();
        var monthDifference = today.getMonth() - birthDate.getMonth();

        // Adjust age if today's date is before the birth date this year
        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
            age--;
        }

        return age;
    }

    // Event listener for DOB input change
    document.getElementById('dobInput').addEventListener('change', function() {
        var dob = this.value;
        var age = calculateAge(dob);
        document.getElementById('ageInput').value = age;
    });
    

                  $(function () {
                    $('input[name="app_date"]').daterangepicker({
                      singleDatePicker: true,
                      timePicker: true,
                      timePicker24Hour: false,
                      minDate: moment(),
                      locale: {
                        format: 'DD/MM/YYYY hh:mm A'
                      }
                    });
                  });
                });

                </script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const nextBtnFirst = document.querySelector(".firstNext");
    const prevBtnSec = document.querySelector(".prev-1");
    const nextBtnSec = document.querySelector(".next-1");
    const prevBtnThird = document.querySelector(".prev-2");
    const nextBtnThird = document.querySelector(".button_2");
    const prevBtnFourth = document.querySelector(".prev-3");
    const submitBtn = document.querySelector("#register");
    const progressText = document.querySelectorAll(".step p");
    const progressCheck = document.querySelectorAll(".step .check");
    const bullet = document.querySelectorAll(".step .bullet");
    const slidePage = document.querySelector('.slide-page');
    let current = 1;

    nextBtnFirst.addEventListener("click", function (event) {
    event.preventDefault();
    if (validateForm()) {
        slidePage.style.marginLeft = "-25%";
        bullet[current - 1].classList.add("active");
        current += 1;
    }
});

nextBtnSec.addEventListener("click", function (event) {
    event.preventDefault();
    if (validateForm_two()) {
        slidePage.style.marginLeft = "-50%";
        bullet[current - 1].classList.add("active");
        current += 1;
    }
});

nextBtnThird.addEventListener("click", function (event) {
    event.preventDefault();
    if (validateForm_three()) {
        slidePage.style.marginLeft = "-75%";
        bullet[current - 1].classList.add("active");
        current += 1;
    } 
    else 
    {

    }
});


submitBtn.addEventListener("click", function (event) {
    event.preventDefault();
    $('#loader').show();
    if (validateForm() && validateForm_two() && validateForm_three()) {
        $.ajax({
            url: "<?= base_url('add_enquiry')?>",
            method: "POST",
            data: $("form").serialize(),
            success: function (response) {
                console.log("Data inserted successfully:", response);
                $('#loader').hide();

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Registration Successful.',
                    timer: 2000, // Set a timer for the success message
                    timerProgressBar: true,
                    showConfirmButton: false
                });

                bullet[current - 1].classList.add("active");
                current += 1;
                submitBtn.disabled = true;
                setTimeout(function () {
                    window.location.href = "<?= base_url('refer') ?>";
                }, 2000);
            },
            error: function (xhr, status, error) {
                $('#loader').hide();
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong. Please try again later.'
                });
            }
        });
    }
});

    
    prevBtnSec.addEventListener("click", function(event){
    event.preventDefault();
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    current -= 1;
});

prevBtnThird.addEventListener("click", function(event){
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
    current -= 1;
});

prevBtnFourth.addEventListener("click", function(event){
    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    current -= 1;
});


    function validateForm() {
        var name = $("input[name='name']").val();
        var dob = $("input[name='dob']").val();
        var age = $("input[name='age']").val();

        var isValid = true;

        var nameError = $("#nameError");
        var dobError = $("#dobError");
        var ageError = $("#ageError");

        // Reset error messages
        nameError.text("");
        dobError.text("");
        ageError.text("");

        // Validate name
        if (name === "") {
            nameError.text("Please enter the patient's name.");
            isValid = false;
        }

        // Validate dob
        if (dob === "") {
            dobError.text("Please enter the patient's date of birth.");
            isValid = false;
        }

        // Validate age
        if (age === "") {
            ageError.text("Please enter the patient's age.");
            isValid = false;
        }

        return isValid;
    }

    function validateForm_two() {
        var email = $("#email").val();
        var phone = $("#number").val();
        // var address = $("#address").val();

        var isValid = true;

        var emailError = $("#emailError");
        var phoneError = $("#phoneError");
        // var addressError = $("#addressError");

        // Reset error messages
        emailError.text("");
        phoneError.text("");
        // addressError.text("");

        // Validate email
        if (email === "") {
            emailError.text("Please enter the patient's email address.");
            isValid = false;
        } else if (!isValidEmail(email)) {
            emailError.text("Please enter a valid email address.");
            isValid = false;
        }

        // Validate phone number
        if (phone === "") {
            phoneError.text("Please enter the patient's phone number.");
            isValid = false;
        } else if (!isValidPhoneNumber(phone)) {
            phoneError.text("Please enter a valid phone number.");
            isValid = false;
        }

        // Validate address
    //     if (address === "") {
    //     $("#addressError").after("<div class='error-message text-danger'>Please enter the patient's home address.</div>");
    //     isValid = false;
    // }

        return isValid;
    }

    function validateForm_three() 
    {
    var referralType = $("select[name='referral_type']").val();
    var referringDentistName = $("input[name='referring_dentist_name']").val();
    var phone = $("input[name='referring_dentist_phone']").val();
    var referringDentistPractice = $("input[name='referring_dentist_practice']").val();

    var isValid = true;

    var referralTypeError = $("#referralTypeError");
    var referringDentistNameError = $("#referringDentistNameError");
    var referringDentistPhoneError = $("#referringDentistPhoneError");
    var referringDentistPracticeError = $("#referringDentistPracticeError");

    referralTypeError.text("");
    referringDentistNameError.text("");
    referringDentistPhoneError.text("");
    referringDentistPracticeError.text("");

    if (referralType === "") {
        referralTypeError.text("Please select a referral type.");
        isValid = false;
    }

    if (referringDentistName === "") {
        referringDentistNameError.text("Please enter the referring dentist's name.");
        isValid = false;
    }

    if (phone === "") {
      referringDentistPhoneError.text("Please enter the patient's phone number.");
            isValid = false;
        } else if (!isValidPhoneNumber(phone)) {
          referringDentistPhoneError.text("Please enter a valid phone number.");
            isValid = false;
        }

    if (referringDentistPractice === "") {
        referringDentistPracticeError.text("Please enter the referring dentist's practice.");
        isValid = false;
    }

    return isValid; // Return true if all validations pass, false otherwise
}


    // function validateForm_submit() {
    //     // Add your final form validation logic here if needed
    //     return true; // For demonstration, always return true for now
    // }

    // Helper function to validate email format
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Helper function to validate phone number format (10 digits)
    function isValidPhoneNumber(phone) {
        var phoneRegex = /^\d{10}$/;
        return phoneRegex.test(phone);
    }
});


// function validateForm_submit() {
//     let isValid = true;

//     // Validate Appointment Date and Time
//     const appDate = $('input[name="app_date"]').val();
//     const appDateError = $('#appDateError');
//     if (!appDate) {
//         appDateError.text("Please enter the appointment date and time.");
//         isValid = false;
//     } else {
//         appDateError.text(""); // Clear error message if valid
//     }

//     // Validate Clinical Summary
//     const clinicalSummary = $('input[name="clinical_summary"]').val();
//     const clinicalSummaryError = $('#clinicalSummaryError');
//     if (!clinicalSummary) {
//         clinicalSummaryError.text("Please enter the clinical summary.");
//         isValid = false;
//     } else {
//         clinicalSummaryError.text(""); // Clear error message if valid
//     }

//     // Validate Uploaded Patient Images
//     const uploadedImages = $('input[name="images[]"]').prop('files');
//     const uploadedImagesError = $('#uploadedImagesError');
//     if (uploadedImages.length === 0) {
//         uploadedImagesError.text("Please upload at least one patient image.");
//         isValid = false;
//     } else {
//         uploadedImagesError.text(""); // Clear error message if valid
//     }

//     return isValid; // Return true if all validations pass
// }










  
</script>
<?= $this->endSection() ?>
