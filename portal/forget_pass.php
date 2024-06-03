<?php

session_start();
if(!empty($_GET['updated']) && !empty($_GET['key'])){
    $_SESSION['your_key'] = $_GET['key'];
    echo '<h4>Password Updated Successfully.</h4>';
    die;
}
if(empty($_GET['url']) || empty($_GET['userID']) || empty($_GET['key'])){
    echo json_encode(array("status"=>"fail","message"=>"Invalid Url!"));
    die;
}
// if(!empty($_GET['key']) && $_GET['key']===$_SESSION['your_key']){
//     echo json_encode(array("status"=>"fail","message"=>"Url Expired!"));
//     die;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codent - Reset Password</title>
    <style>
        @import 'https://static.stayjapan.com/assets/dashboard/application-33c1a06b7784b53cd746d479718b6295c0fcefebb696e78dcee7c68efc92fada.css';

            //
            // Horizontal container
            //
            .horizontal-container {
            margin: 0 auto;
            width: 100%;
            
            @media(min-width: 768px) {
                width: 500px;
            }
            
            //
            // Progress bar
            //
            /* Create circle */
            @mixin drawCircle {
                background-color: white;
                border-radius: 50%; 
                border: 2px solid #ccc;
                color: #ccc;
                display: block;
                height: 20px;
                line-height: 18px;
                margin: 0 auto;
                text-align: center;
                width: 20px;
            }

            /* Create line */
            @mixin drawLine {
                background-color: #e5e5e5;
                content: '';
                height: 3px;
                left: -50%;
                transform: translateX(50%);
                position: absolute;
                top: 9px;
                width: 100%;
                z-index: -1;
            }

                /* Custom progress bar */
            .progress-bar-container {
                position: relative;

                .custom-progress-bar {
                counter-reset: step; /* Initial step: 0 */
                padding-left: 0;
                }

                .custom-progress-bar li {
                    float: left;
                    font-size: 12px;
                    list-style: none;
                    position: relative;
                    text-align: center;
                    text-transform: uppercase;
                    width: 50%;
    
                    &:before {
                        @include drawCircle;
                        content: counter(step);
                        counter-increment: step;
                    }

                &:after {
                    @include drawLine;
                }

                &:last-child {
                    &:before {
                    display: none;
                    }
                    &:after {
                    display: none;
                    }
                }

                &.active {
                    &:before {
                    border-color: red;
                    color: red;
                    }    
                }

                &.finished {
                    &:before {
                    background-color: red;
                    border-color: red;
                    color: #fff;
                    content: "\2713"
                    }
                }
                }

                .custom-progress-line {
                    height: 3px;
                    position: absolute;
                    content: '';
                    top: 9px;
                    left: 0;
                    width: auto;
                    background-color: red;
                }
            }
            
            //
            // Horizontal form
            //
            
            
            .horizontal-form-box {
                background-color: #fff;
                border: 1px solid #e5e5e5;
                height: 466px;
                padding: 30px;
                
                .horizontal-info-container {   
                img {
                    height: 75px;
                    margin-bottom: 20px; 
                }

                .horizontal-heading {
                    color: #000;
                    font-size: 22px; 
                    font-weight: bold; 
                    text-transform: capitalize;
                }

                .horizontal-subtitle {
                    letter-spacing: 1px;
                    margin-bottom: 20px;
                    text-align: left;
                }
                }
            
                .horizontal-form {
                label,
                button {
                    text-transform: capitalize;
                }

                label {
                    color: #000;
                    font-weight: normal;
                }
                }
            }
            }
    </style>
    <style>
        .o3-form-control {
            border-radius: 25px;
        }
        .o3-btn-primary {
            background-color: #3950e2 !important;
            border-color: #396fe2 !important;
            color: white;
            border-radius: 25px;
        }
        .o3-btn-primary:hover {
            background-color: #3950e2 !important;
            border-color: #396fe2 !important;
            color: white;
            border-radius: 25px;
        }
        label {
            margin-left: 5px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top: 40px;">
        <div class="row">
            <div class="col-sm-12">
            <div class="horizontal-container">
                <div class="progress-bar-container">
                <div class="custom-progress-line" style="width: 25%;"></div>
                </div>
                <div class="horizontal-form-box">
                <div class="horizontal-info-container text-center">
                    <p class="horizontal-heading">Reset your password</p>
                </div>
                <form class="horizontal-form" id="reset_password_form" style="margin: auto;max-width: 75%;">
                    <input type="hidden" name="url" id="url" value="<?= $_GET['url'] ?>">
                    <input type="hidden" name="user_id" id="user_id" value="<?= $_GET['userID'] ?>">
                    <input type="hidden" name="key" id="key" value="<?= $_GET['key'] ?>">
                    <div class="o3-form-group">
                        <label for="new_password">New password</label>
                        <input type="password" class="o3-form-control o3-input-lg" name="new_password" id="new_password">
                        <p id="new_password_err" style="color: red;"></p>
                    </div>
                    <div class="o3-form-group">
                        <label for="confirm_password">Confirm new password</label>
                        <input type="password" class="o3-form-control o3-input-lg" name="confirm_password" id="confirm_password">
                        <p id="confirm_password_err" style="color: red;"></p>
                    </div>
                    <p id="msg"></p>
                    <button type="button" class="o3-btn o3-btn-primary o3-btn-block">Set new password</button>
                    
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function(){
        $(".o3-btn-primary").on("click",function(e){
             
            var new_password= $("#new_password").val();
            var confirm_password= $("#confirm_password").val();
            var base_url = $("#base_url").val();
            flag = 0;
        
            if (new_password=="") {
                $('#new_password_err').text('New Password is required!').addClass("text-danger");
                flag=1;
            }else if (new_password.length < 5) {
                $('#new_password_err').text('Password Must Be 5 Character long!').addClass("text-danger");
                flag=1;
            }else if (new_password!="" && new_password.length>=6) {
                $('#new_password_err').text('');
            } 
            
            if (confirm_password=="") {
                $('#confirm_password_err').text('Confirm Password is required!').addClass("text-danger");
                flag=1;
            } 
        
            if (confirm_password!="") {
                $('#confirm_password_err').text('');
            } 
            
            if(confirm_password!="" && confirm_password!=new_password) {
                $("#confirm_password_err").html('Confirm password does not matched with new password.');
                flag=1;
            }
            
            if(confirm_password!="" && confirm_password==new_password) {
                $('#confirm_password_err').text('');
            }
            
            if(flag==1){
                return false;
            } else{
                console.log('adasd')
                let reset_password_form = document.getElementById("reset_password_form");
                let fd = new FormData(reset_password_form);
                let url = $("#url").val();
                let key = $("#key").val();
                
                $.ajax({
                   url : url + 'resetPassword',
                   type : "post",
                   data : fd,
                   processData: false,
                   contentType: false,
                   success : function(data){
                       console.log('success');
                      if(data == 1){
                            $("#msg").text("Password Changed Successfully").css("color", "lightgreen");
                            setTimeout(function () {
                              location.href='forgotpassword.php?updated=1&key='+key;
                            }, 2000);
                        
                      }
                      else if(data==2){
                        $("#msg").text("Password Not Changed Successfully").css("color", "red");
                      }
                   }
                });
            }
    
        });
    });
    </script>
</body>

</html>