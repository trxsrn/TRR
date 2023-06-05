$(document).ready(function() {
    $("#login-form").submit(function(event) {
      event.preventDefault();
      $.ajax({
        type: "POST",
        url: "login.php",
        data: $("#login-form").serialize(),
        success: function(response) {
          if (response === "success") {
            window.location.href = "users/admin/dashboard.php";
          } else {
            $("#login-message").html("Invalid username or password.");
          }
        }
      });
    });
  });

  swal({
    title: "Good job!",
    text: "You clicked the button!",
    icon: "success",
  });


  