const loginText = document.querySelector(".title-text .login");
const loginForm = document.querySelector("form.login");
const loginBtn = document.querySelector("label.login");
const signupBtn = document.querySelector("label.signup");
const signupLink = document.querySelector("form.signup-link a");

signupBtn.onclick = () => {
  loginForm.style.marginLeft = "-50%";
  loginText.style.marginLeft = "-50%";
};

loginBtn.onclick = () => {
  loginForm.style.marginLeft = "0%";
  loginText.style.marginLeft = "0%";
};

signupLink.onclick = () => {
  const activeForm = document.querySelector("input[name='slide']:checked").id;
  if (activeForm === "login") {
     window.location.href = "register_author.php";
  } else if (activeForm === "signup") {
      window.location.href = "register_reviewer.php";
  }
  return false;
};
