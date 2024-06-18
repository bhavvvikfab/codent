const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
// const nextBtnThird = document.querySelector(".next-2");
// const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function(event){
    event.preventDefault();
    if (validateForm()) {
        slidePage.style.marginLeft = "-25%";
        bullet[current - 1].classList.add("active");
        current += 1;
    }
});

nextBtnSec.addEventListener("click", function(event){
    event.preventDefault();
    if (validateForm_two()) {
        slidePage.style.marginLeft = "-50%";
        bullet[current - 1].classList.add("active");
        current += 1;
    }
});

// nextBtnThird.addEventListener("click", function(event){
//     event.preventDefault();
//     if (validateForm_three()) {
//         // slidePage.style.marginLeft = "-100%";
//         bullet[current - 1].classList.add("active");
//         current += 1;
//     }
// });

submitBtn.addEventListener("click", function(event){
    event.preventDefault();
    if (validateForm_submit()) 
        {
        slidePage.style.marginLeft = "-100%";
        bullet[current - 1].classList.add("active");
        current += 1;
        submitBtn.disabled = true;
        
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

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validateForm() {
    var fullname = $("input[name='fullname']").val().trim();
    var email = $("input[name='email']").val().trim();
    var password = $("input[name='password']").val().trim();
    var isValid = true;

    var fullnameError = $("#fullnameError");
    if (fullname === "") {
        fullnameError.text("Please enter your full name.");
        isValid = false;
    } else {
        fullnameError.text("");
    }

    var emailError = $("#emailError");
    if (email === "") {
        emailError.text("Please enter your email.");
        isValid = false;
    } else if (!isValidEmail(email)) {
        emailError.text("Please enter a valid email address.");
        isValid = false;
    } else {
        emailError.text("");
    }

    var passwordError = $("#passwordError");
    if (password === "") {
        passwordError.text("Please enter your password.");
        isValid = false;
    } else {
        passwordError.text("");
    }

    return isValid;
}

function validateForm_two() {
    var phone = $("input[name='phone']").val().trim();
    var address = $("textarea[name='address']").val().trim();

    var isValid = true;

    var phoneError = $("#phoneError");
    if (phone === "") {
        phoneError.text("Please enter your phone number.");
        isValid = false;
    } else if (phone.length < 10 || phone.length > 15) {
        phoneError.text("Phone number must be between 10 and 15 characters.");
        isValid = false;
    } else {
        phoneError.text("");
    }

    var addressError = $("#addressError");
    if (address === "") {
        addressError.text("Please enter your address.");
        isValid = false;
    } else {
        addressError.text("");
    }

    return isValid;

}

function validateForm_three() {
    var dob = $("input[name='dob']").val().trim();
    var isValid = true;

    var dobError = $("#dobError");
    if (dob === "") {
        dobError.text("Please enter your date of birth.");
        isValid = false;
    } else {
        dobError.text("");
    }

    
}

function validateForm_submit() {
    var image = $("input[name='image']").val().trim();
    var isValid = true;

    var imageError = $("#imageError");
    if (image === "") {
        imageError.text("Please select an image.");
        isValid = false;
    } else {
        imageError.text("");
    }

    return isValid;
}


function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}










// const slidePage = document.querySelector(".slide-page");
// const nextBtnFirst = document.querySelector(".firstNext");
// const prevBtnSec = document.querySelector(".prev-1");
// const nextBtnSec = document.querySelector(".next-1");
// const prevBtnThird = document.querySelector(".prev-2");
// const nextBtnThird = document.querySelector(".next-2");
// const prevBtnFourth = document.querySelector(".prev-3");
// const submitBtn = document.querySelector(".submit");
// const progressText = document.querySelectorAll(".step p");
// const progressCheck = document.querySelectorAll(".step .check");
// const bullet = document.querySelectorAll(".step .bullet");
// let current = 1;

// nextBtnFirst.addEventListener("click", function(event){
//   event.preventDefault();
//   if (validateForm()) {
//   slidePage.style.marginLeft = "-25%";
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
//   }
// });
// nextBtnSec.addEventListener("click", function(event){
//   event.preventDefault();
//   if (validateForm_two()) {

//   slidePage.style.marginLeft = "-50%";
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
//   }
// });
// nextBtnThird.addEventListener("click", function(event){
//   event.preventDefault();
//   if (validateForm_submit()) {

//   slidePage.style.marginLeft = "-75%";
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
//   }
// });
// submitBtn.addEventListener("click", function(){
//   bullet[current - 1].classList.add("active");
//   progressCheck[current - 1].classList.add("active");
//   progressText[current - 1].classList.add("active");
//   current += 1;
//   setTimeout(function(){
//     alert("Your Form Successfully Signed up");
//     location.reload();
//   },800);
// });

// prevBtnSec.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "0%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });
// prevBtnThird.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-25%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });
// prevBtnFourth.addEventListener("click", function(event){
//   event.preventDefault();
//   slidePage.style.marginLeft = "-50%";
//   bullet[current - 2].classList.remove("active");
//   progressCheck[current - 2].classList.remove("active");
//   progressText[current - 2].classList.remove("active");
//   current -= 1;
// });

// function validateForm() 
// {
//   var fullname = $(".fullname").val().trim();
//   // var email = $("#email").val().trim();
//   var password = $(".password").val().trim();

//   console.log(fullname);
//   console.log(fullname);


//   var isValid = true;
  


//   var fullnameError = $("#fullnameError");
//   if (fullname === "") {
//     fullnameError.text("Please enter your full name.");
//     isValid = false;
//   } else {
//     fullnameError.text("");
//   }

//   var passwordError = $("#passwordError");
//   if (password === "") {
//     passwordError.text("Please enter your password.");
//     isValid = false;
//   } else {
//     passwordError.text("");
//   }
  
  // var emailError = $("#emailError");
  // if (email === "") {
  //   emailError.text("Please enter your email.");
  //   isValid = false;
  // } else if (!isValidEmail(email))
  //   {
  //     emailError.text("Please enter a valid email address.");
  //     isValid = false;
  //   } else {
  //     emailError.text("");
  // }

//   return isValid;
// }
// function isValidEmail(email) {
//   // Regular expression for email validation
//   var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//   return emailRegex.test(email);
// }

// function validateForm_two()
//  {
//   var address = $("#address").val().trim();
//   var dob = $("#dob").val().trim();
//   var image = $("#image").val().trim();
//   var phone = $("#phone").val().trim();
   
//   var isValid = true;

  // var addressError = $("#addressError");
  // if (address === "") {
  //   addressError.text("Please enter your address.");
  //   isValid = false;
  // } else {
  //   addressError.text("");
  // }

  // var dobError = $("#dobError");
  // if (dob === "") {
  //   dobError.text("Please enter your date of birth.");
  //   isValid = false;
  // } else {
  //   dobError.text("");
  // }

  // var imageError = $("#imageError");
  // if (image === "") {
  //   imageError.text("Please select an image.");
  //   isValid = false;
  // } else {
  //   imageError.text("");
  // }

//   var phoneError = $("#phoneError");
//   if (phone === "") {
//     phoneError.text("Please enter your Contact Number.");
//     isValid = false;
//   } else {
//     phoneError.text("");
//   }
//   return isValid;
// }

// function validateForm_submit() {
  
//   var hospital = $("#hospital").val().trim();
  
//   var isValid = true;

//   var hospitalError = $("#hospitalError");
//   if (hospital === "") {
//     hospitalError.text("Please select a hospital.");
//     isValid = false;
//   } else {
//     hospitalError.text("");
//   }
//   return false;
//   return isValid;
// }
