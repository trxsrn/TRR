<?php
session_start();
include 'connection.php';

$id = $_GET['id'];
$user_type_query = "SELECT user_type FROM for_approval_of_account WHERE id = '$id'";
$result = mysqli_query($conn, $user_type_query);

$status = "IDLE";

if (!$result) {
    // handle query execution errors here
    echo "Error executing query: " . mysqli_error($conn);
} else {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['user_type'] == "AUTHOR") {
            $insert_query = "INSERT INTO author_profile(fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, status)
                  SELECT  fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, 'IDLE' as status
                  FROM for_approval_of_account
                  WHERE id = ?";
            $insert_statement = mysqli_prepare($conn, $insert_query);
            mysqli_stmt_bind_param($insert_statement, "s", $id);
            $insert_result = mysqli_stmt_execute($insert_statement);
            if (!$insert_result) {
                // handle query execution errors here
                echo "Error executing query: " . mysqli_error($conn);
            } else {
                $delete_query = "DELETE FROM for_approval_of_account WHERE id = ?";
                $delete_statement = mysqli_prepare($conn, $delete_query);
                mysqli_stmt_bind_param($delete_statement, "s", $id);
                $delete_result = mysqli_stmt_execute($delete_statement);
                if (!$delete_result) {
                    // handle query execution errors here
                    echo "Error executing query: " . mysqli_error($conn);
                } else {
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>';
                    echo '<script>';
                    echo 'Swal.fire({';
                    echo '  title: "ADDED SUCCESSFULLY!",';
                    echo '  text: "You clicked the button!",';
                    echo '  icon: "success"';
                    echo '}).then(function(result) {';
                    echo '  if (result.isConfirmed) {';
                    echo '    window.location.href = "your_custom_page.php";'; // Replace with your custom page URL
                    echo '  }';
                    echo '});';
                    echo '</script>';
                }
            }
        }

    


        if ($row['user_type'] == "REVIEWER") {
            $insert_query = "INSERT INTO reviewer_profile(fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, status)
                  SELECT  fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, 'IDLE' as status
                  FROM for_approval_of_account
                  WHERE id = ?";
            $insert_statement = mysqli_prepare($conn, $insert_query);
            mysqli_stmt_bind_param($insert_statement, "s", $id);
            $insert_result = mysqli_stmt_execute($insert_statement);
            if (!$insert_result) {
                // handle query execution errors here
                echo "Error executing query: " . mysqli_error($conn);
            } else {
                $delete_query = "DELETE FROM for_approval_of_account WHERE id = ?";
                $delete_statement = mysqli_prepare($conn, $delete_query);
                mysqli_stmt_bind_param($delete_statement, "s", $id);
                $delete_result = mysqli_stmt_execute($delete_statement);
                if (!$delete_result) {
                    // handle query execution errors here
                    echo "Error executing query: " . mysqli_error($conn);
                } else {
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>';
                    echo '<script>';
                    echo 'Swal.fire({';
                    echo '  title: "ADDED SUCCESSFULLY!",';
                    echo '  text: "You clicked the button!",';
                    echo '  icon: "success"';
                    echo '}).then(function(result) {';
                    echo '  if (result.isConfirmed) {';
                    echo '    window.location.href = "your_custom_page.php";'; // Replace with your custom page URL
                    echo '  }';
                    echo '});';
                    echo '</script>';
                }
            }
        }
    }
}    
    
?>
