const wrapper = document.querySelector(".wrapper"),
  signupHeader = document.querySelector(".signup header"),
  loginHeader = document.querySelector(".login header");

loginHeader.addEventListener("click", () => {
  wrapper.classList.add("active");
});
signupHeader.addEventListener("click", () => {
  wrapper.classList.remove("active");
});

// Function to validate the signup form
// function validateSignupForm() {
//   const fullName = document.getElementById("fullName").value;
//   const email = document.getElementById("email").value;
//   const password = document.getElementById("password").value;
//   const signupCheck = document.getElementById("signupCheck").checked;

//   // Add your validation logic here
//   if (fullName === "") {
//     alert("Please enter your full name.");
//     return false;
//   }

//   if (email === "" || !email.includes("@")) {
//     alert("Please enter a valid email address.");
//     return false;
//   }

//   if (password.length < 6) {
//     alert("Password must be at least 6 characters long.");
//     return false;
//   }

//   if (!signupCheck) {
//     alert("Please accept the terms & conditions.");
//     return false;
//   }

//   return true; // Form is valid
// }

// // Function to validate the login form
// function validateLoginForm() {
//   const loginEmail = document.getElementById("loginEmail").value;
//   const loginPassword = document.getElementById("loginPassword").value;

//   // Add your validation logic here
//   if (loginEmail === "" || !loginEmail.includes("@")) {
//     alert("Please enter a valid email address.");
//     return false;
//   }

//   if (loginPassword.length < 6) {
//     alert("Password must be at least 6 characters long.");
//     return false;
//   }

//   return true; // Form is valid
// }

// Attach form validation functions to form submissions
document.getElementById("signupForm").addEventListener("submit", function (e) {
  if (!validateSignupForm()) {
    e.preventDefault(); // Prevent form submission if validation fails
  }
});

document.getElementById("loginForm").addEventListener("submit", function (e) {
  if (!validateLoginForm()) {
    e.preventDefault(); // Prevent form submission if validation fails
  }
});
