<?= $this->extend('layout/layout') ?>
<?= $this->section('title') ?>
Co-Dent - Referral 
<?= $this->endSection() ?>
<?= $this->section('content') ?>

    
<style>

::selection{
    color: #fff;
    background: #d43f8d;
}
.container-xs{
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
    margin: 45px 0;
    display: flex;
    position: relative;
}
form .page .field .label{
    position: absolute;
    top: -30px;
    font-weight: 500;
}
form .page .field input[type="Number"]{
    height: 100%;
    width: 100%;
    border: 1px solid lightgrey;
    border-radius: 45px;
    padding-left: 15px;
    font-size: 18px;
}
form .page .field input[type="text"], input[type="file"], input[type="password"] {
    border-radius: 0px 35px 35px 0px;
}
form .page .field select{
    height: 100%;
    width: 100%;
    border: 1px solid lightgrey;
    border-radius: 45px;
    padding: 0px 8px;
    font-size: 18px;
}
form .page .field button{
    width: 100%;
    height: calc(100% + 5px);
    border: 2px solid #4154f1;
    background: #4154f1;
    margin-top: -20px;
    border-radius: 50px;
    color: white;
    cursor: pointer;
    font-size: 18px;
    font-weight: 400;
    letter-spacing: 1px;
    text-transform: uppercase;
    transition: 0.5s ease;
}
form .page .field button:hover {
    font-weight: 700;
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
    color: rgb(255 255 255 / 70%);
    margin-bottom: 8px;
}
.progress-bar .step .bullet{
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
.progress-bar .step .bullet.active{
    border-color: white;
    background: white;
}
.progress-bar .step .bullet span {
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
}
.progress-bar .step .bullet.active span{
    color: #4154f1;
}
.progress-bar .step .bullet:before, .progress-bar .step .bullet:after {
    position: absolute;
    content: '';
    bottom: 13px;
    right: -140px;
    height: 3px;
    width: 140px;
    background: #ffffff6b;
}
.title {
    color: black;
}
.progress-bar .step .bullet.active:after{
    background: white;
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
.progress-bar .step .check.active{
    color: #fff;
}
div#register-pt .field.btns {
    align-items: end;
}
.pp {
    border-radius: 0px 35px 35px 0px;
}
.p{
    border-radius: 35px 0px 0px 35px;
}
</style>

<div class="loader-overlay" id="loader" style="display: none;">
    <div class="loader"></div>
</div>

<section class="my-refer-sec ftco-section d-portal-bg d-flex flex-column justify-content-center">
    <div class="container">
        <div class="myoverlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 ftco-animate">
                    <h1 class="h1hedaing text-center">SignUp</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row flex-row justify-content-center">
            <div class="col-lg-7 col-12">
                <div class="row">
                    <div class="col-lg-12 pl-md-0">
                        <div class="card mb-3 col-lg-12" id="register-pt">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h4 class="card-title text-center pb-0" style="color: #fff;">Create An Account</h4>
                                    <p class="text-center text-white">Have an account already? <a href="<?=base_url('dentist_login')?>" class="text-right text-white forgo">Login Now</a></p>
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
                                            <p>Submit</p>
                                            <div class="check fas fa-check"></div>
                                        </div>
                                    </div>

                                    <div id="message" class="pb-3" style="display: none;"></div>

                                    <div class="form-outer">
                                        <form id="register" action="<?= base_url('/registerdata') ?>" method="post" enctype="multipart/form-data">
                                            <div class="page slide-page">
                                                <div class="title" style="color: #fff;">Basic Details :</div>

                                                <div class="input-group mb-3 field">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-circle-o"></i></span>
                                                    <input type="text" class="form-control" name="fullname" placeholder="Full Name" aria-label="name" aria-describedby="basic-addon1">
                                                </div>     
                                                <div id="fullnameError" class="text-danger text-justify text-start"></div>

                                                <div class="input-group mb-3 field">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                                                    <input type="email" class="form-control pp" name="email" placeholder="Email Address" aria-label="email" aria-describedby="basic-addon1">
                                                </div>
                                                <div id="emailError" class="text-danger text-justify text-start"></div>

                                                <div class="input-group mb-3 field">
                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-lock" style="font-size: 20px;"></i></span>
                                                    <input type="password" class="form-control" name="password" placeholder="Password" aria-label="password" aria-describedby="basic-addon2">
                                                </div>
                                                <div id="passwordError" class="text-danger text-justify text-start"></div>

                                                <div class="field" style="align-items: end;">
                                                    <button class="firstNext next">Next</button>
                                                </div>
                                            </div>

                                            <div class="page">
                                                <div class="title" style="color: #fff;">Contact Details:</div>

                                                <div class="input-group mb-3 field">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                                                    <input type="phone" class="form-control pp" name="phone" placeholder="Phone Number" aria-label="phone" aria-describedby="basic-addon1">
                                                </div>
                                                <div id="phoneError" class="text-danger text-justify text-start"></div>

                                                <div class="input-group mb-3 field">
                                                    <textarea id="address" name="address" rows="0" class="form-control pp" placeholder="Address" aria-label="address" aria-describedby="basic-addon1"></textarea>
                                                    <div id="addressError" class="text-danger text-justify text-start"></div>
                                                </div><br><br> 

                                                <div class="field btns">
                                                    <button class="prev-1 prev">Previous</button>
                                                    <button class="next-1 next">Next</button>
                                                </div>
                                            </div>

                                            <div class="page">
                                                <div class="title" style="color: #fff;">Personal Details:</div>

                                                <div class="input-group mb-3 field">
                                                    <span class="input-group-text dobError p" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                                    <input type="date" class="form-control pp" name="dob" placeholder="Date Of Birth" aria-label="Date-Of-Birth" aria-describedby="basic-addon1">
                                                </div>

                                                <div class="input-group mb-3 field">
                                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-image"></i></span>
                                                    <input type="file" name="image" class="form-control" aria-label="image" aria-describedby="basic-addon1">
                                                </div>

                                                <div class="field btns">
                                                    <button class="prev-2 prev">Previous</button>
                                                    <button class="submit" id="register_hospital">Create Account</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>                  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    $(document).ready(function () {
        function registerData() {
            var formData = new FormData($("#register")[0]);

            var loader = $('#loader');
            loader.show(); // Show the loader

            $.ajax({
                url: $("#register").attr("action"),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (data) {
                    loader.hide();
                    if (data.status == 1) {
                        $("#message").html('<h4 class="text-success">Registration Successful.<i class="bi bi-check-circle"></i></h4>');
                        $("#message").show();
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    } else if (data.status == 2) {
                        $("#message").html('<div class="text-danger">Email already registered.</div>');
                        $("#message").show();
                    } else {
                        console.log('Registration failed.');
                    }
                },
                error: function (error) {
                    loader.hide();
                    console.log(error);
                }
            });
        }

        $('#register_hospital').on('click', function (e) {
            e.preventDefault();
            registerData();
        })
    });
    </script>
<?= $this->endSection() ?>
