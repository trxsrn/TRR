$(document).ready(function() {
    // Handle form submission using Ajax
    $("form.login").submit(function(e) {
       e.preventDefault();
       
       // Get the form data
       const formData = $(this).serialize();
 
       // Log the username and password in the console
       const username = $(this).find("input[name='username']").val();
       const password = $(this).find("input[name='password']").val();
       console.log("Username:", username);
       console.log("Password:", password);
 
       // Send the login request to the server using Ajax
       $.ajax({
          type: "POST",
          url: "login_process.php", // Replace this with your PHP login verification script
          data: formData,
          success: function(response) {
             // Process the response from the server
             if (response === "success") {
                // Login successful, show the success toast
                showSuccessToast("Signed in successfully");
             } else {
                // Login failed, show an error message (optional)
                // You can use Swal.fire() to show error messages as well.
             }
          },
          error: function(xhr, status, error) {
             // Handle errors if necessary (optional)
          }
       });
    });
 });
 
 function showSuccessToast(message) {
    const Toast = Swal.mixin({
       toast: true,
       position: 'top-end',
       showConfirmButton: false,
       timer: 3000,
       timerProgressBar: true,
       didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer);
          toast.addEventListener('mouseleave', Swal.resumeTimer);
       }
    });
 
    Toast.fire({
       icon: 'success',
       title: message
    });
 }
 