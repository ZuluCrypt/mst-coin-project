function validateBankDetailsForm() {
  const accountHolder = document.getElementById("accountH").value;
  const accountNumber = document.getElementById("accountN").value;
  const bankName = document.getElementById("bankN").value;
  const branch = document.getElementById("branc").value;

  // Initialize an error message variable
  let errorMessage = "";

  // Validate account holder name
  if (accountHolder.trim() === "") {
    errorMessage += "Account Holder Name is required.\n";
  }

  // Validate account number (numeric and not empty)
  if (accountNumber.trim() === "" || isNaN(accountNumber)) {
    errorMessage += "Account Number is required and must be a number.\n";
  }

  // Validate bank name
  if (bankName.trim() === "") {
    errorMessage += "Bank Name is required.\n";
  }

  // Validate branch name
  if (branch.trim() === "") {
    errorMessage += "Branch is required.\n";
  }

  // If there are validation errors, display them and prevent form submission
  if (errorMessage !== "") {
    alert(errorMessage);
    return false; // Form submission is prevented
  }

  // Form is valid; allow form submission
  return true;
}
