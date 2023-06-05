const passwordField = document.getElementById("password");
const confirmPasswordField = document.getElementById("confirm_password");
const passwordValidation = document.getElementById("passwordValidation");
const submitBtn = document.getElementById("submitBtn");

function validatePassword() {
    const password = passwordField.value;
    const confirmPassword = confirmPasswordField.value;

    // check if password contains uppercase, lowercase, special characters, and numbers
    const regex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=[\]{}|\\:;"'<>,.?/~]).{8,}$/;
    const isValidPassword = regex.test(password);

    // check if passwords match
    const passwordsMatch = password === confirmPassword;

    if (!isValidPassword) {
        passwordValidation.innerHTML = "Password must contain at least 1 uppercase letter, 1 lowercase letter, 1 number, 1 special character, and be at least 8 characters long.";
        submitBtn.disabled = true;
    } else if (!passwordsMatch) {
        passwordValidation.innerHTML = "Passwords do not match.";
        submitBtn.disabled = true;
    } else {
        passwordValidation.innerHTML = "";
        submitBtn.disabled = false;
    }
}