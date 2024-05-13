<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - CoDent Bootstrap</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../../img/favicon.png" rel="icon">
  <link href="../../../img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../../vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../../vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../../vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../../vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../../vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../../css/main.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- =======================================================
  * Template Name: Dry Clean
  * Updated: Mar 10 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  ======================================================== -->

   <style>


::selection{
  color: #fff;
  background: #d43f8d;
}
.container-xs{
  background: #fff;
  text-align: center;
  border-radius: 5px;
  padding: 0 30px;
}
.container-xs header{
  font-size: 35px;
  font-weight: 600;
  margin: 0 0 30px 0;
}
.container-xs .form-outer{
  width: 100%;
  overflow: hidden;
}
.container-xs .form-outer form{
  display: flex;
  width: 400%;
}
.form-outer form .page{
  width: 25%;
  transition: margin-left 0.3s ease-in-out;
}
.form-outer form .page .title{
  text-align: left;
  font-size: 25px;
  font-weight: 500;
}
.form-outer form .page .field{
  height: 45px;
  margin: 45px 0 20px;
  display: flex;
  position: relative;
}
form .page .field .label{
  position: absolute;
  top: -30px;
  font-weight: 500;
}
form .page .field input{
  height: 100%;
  width: 100%;
  border: 1px solid lightgrey;
  border-radius: 5px;
  padding-left: 15px;
  font-size: 18px;
}
form .page .field select{
  width: 100%;
  padding-left: 10px;
  font-size: 17px;
  font-weight: 500;
}
form .page .field button{
  width: 100%;
  height: calc(100% + 5px);
  border: none;
  background: #185174;
  margin-top: -20px;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  font-size: 18px;
  font-weight: 500;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: 0.5s ease;
}

form .page .btns button{
  margin-top: -20px!important;
}
form .page .btns button.prev{
  margin-right: 3px;
  font-size: 17px;
}
form .page .btns button.next{
  margin-left: 3px;
}
.container .progress-bar{
  display: flex;
  margin: 40px 0;
  flex-direction: row;
  user-select: none;
}
.container .progress-bar .step{
  text-align: center;
  width: 100%;
  position: relative;
}
.container .progress-bar .step p{
  font-weight: 500;
  font-size: 18px;
  color: #000;
  margin-bottom: 8px;
}
.progress-bar .step .bullet{
  height: 35px;
  width: 35px;
  border: 2px solid #000;
  display: inline-block;
  border-radius: 50%;
  position: relative;
  transition: 0.2s;
  font-weight: 500;
  font-size: 17px;
  align-content: center;
  line-height: 5px;
}
.progress-bar .step .bullet.active{
  border-color: #185174;
  background: #185174;
}
.progress-bar .step .bullet span {
    display: flex;
    align-items: center;
    justify-content: center;
}
.progress-bar .step .bullet.active span{
  color: white;
}

.progress-bar .step .bullet:before, .progress-bar .step .bullet:after {
    position: absolute;
    content: '';
    bottom: 13px;
    right: -77px;
    height: 3px;
    width: 77px;
    background: #262626;
}
.progress-bar .step .bullet.active:after{
  background: #185174;
  transform: scaleX(0);
  transform-origin: left;
  animation: animate 0.3s linear forwards;
}
@keyframes animate {
  100%{
    transform: scaleX(1);
  }
}
.progress-bar .step:last-child .bullet:before,
.progress-bar .step:last-child .bullet:after{
  display: none;
}
.progress-bar .step p.active{
  color: #185174;
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
.progress-bar .step .check.active{
  display: block;
  color: #fff;
}

@media (max-width: 767px) {
.progress-bar .step .bullet:before, .progress-bar .step .bullet:after {
    position: absolute;
    content: '';
    bottom: 13px;
    right: -118px;
    left: 31px;
    height: 3px;
    width: 25px;
    background: #262626;
}
.container .progress-bar .step p {
    font-weight: 500;
    font-size: 14px;
    color: #000;
    margin-bottom: 8px;
}
}
  </style>

</head>

<body>
  
  <main>
    <div class="container">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="d-flex justify-content-center py-4">
              <a href="index.php" class="logo d-flex align-items-center w-auto">
                <img src="../../../img/logo.png" alt="">
                <span class="d-lg-block">CoDent</span>
              </a>
            </div><!-- End Logo -->
            <div class="card mb-3 col-lg-12 col-12">
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <div class="container-xs">
                    <div class="progress-bar">
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
                 </div>
                 <div class="form-outer">
                <form action="#">
                  <div class="page slide-page">
                    <div class="title">Basic Info:</div>
                    <div class="field">
                      <div class="label">First Name</div>
                      <input type="text">
                    </div>
                    <div class="field">
                      <div class="label">Last Name</div>
                      <input type="text">
                    </div>
                    <div class="field">
                      <button class="firstNext next">Next</button>
                    </div>
                  </div>

                  <div class="page">
                    <div class="title">Contact Info:</div>
                    <div class="field">
                      <div class="label">Email Address</div>
                      <input type="text">
                    </div>
                    <div class="field">
                      <div class="label">Phone Number</div>
                      <input type="Number">
                    </div>
                    <div class="field btns">
                      <button class="prev-1 prev">Previous</button>
                      <button class="next-1 next">Next</button>
                    </div>
                  </div>

                  <div class="page">
                    <div class="title">Contect Details:</div>
                    <div class="field">
                      <div class="label">Qualification</div>
                      <input type="text">
                    </div>
                    <div class="field">
                      <div class="label">Image</div>
                      <input type="file" style=" padding: 6px;">
                    </div>
                    <div class="field btns">
                      <button class="prev-2 prev">Previous</button>
                      <button class="next-2 next">Next</button>
                    </div>
                  </div>

                  <div class="page">
                    <div class="title">Login Details:</div>
                    <div class="field">
                      <div class="label">Username</div>
                      <input type="text">
                    </div>
                    <div class="field">
                      <div class="label">Password</div>
                      <input type="password">
                    </div>
                    <div class="field btns">
                      <button class="prev-3 prev">Previous</button>
                      <button class="submit">Create Account</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="row">
            <div class="col-12 text-center">
                              <p class="mb-0">Already have an account? <a href="<?=base_url("/loginpage")?>">Log in</a></p>
                            </div>
            </div>
        </div>
      </div>

            <div class="credits">
              Designed by <a href="https://fableadtechnolabs.com/">Fablead Developers Technolab</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 <!-- Vendor JS Files -->
  <script src="../../../vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../../vendor/chart.js/chart.umd.js"></script>
  <script src="../../../vendor/echarts/echarts.min.js"></script>
  <script src="../../../vendor/quill/quill.min.js"></script>
  <script src="../../../vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../../../vendor/tinymce/tinymce.min.js"></script>
  <script src="../../../vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="../../../js/main.js"></script>


   <script src="../../../js/script.js"></script>

</body>

</html>