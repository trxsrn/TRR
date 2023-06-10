<?php
session_start();
include 'connection.php';

$id = $_GET['id'];
$user_type_query = "SELECT user_type, fullname FROM for_approval_of_account WHERE id = '$id'";
$result = mysqli_query($conn, $user_type_query);

$status = "IDLE";

if (!$result) {
    // handle query execution errors here
    echo "Error executing query: " . mysqli_error($conn);
} else {
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        if ($row['user_type'] == "AUTHOR") {

            // Get the maximum value of the last four numbers from existing IDs in the table
            $maxIDQuery = "SELECT MAX(RIGHT(id_number, 4)) as max_id FROM author_profile";
            $maxIDResult = mysqli_query($conn, $maxIDQuery);
            $maxIDRow = mysqli_fetch_assoc($maxIDResult);
            $maxID = $maxIDRow['max_id'];

            // Increment the last four numbers for the new ID
            $newIDNumber = sprintf("%04d", intval($maxID) + 1); // Pad with leading zeros if necessary

            // Generate the complete ID number
            $idNumber = 'RDC-' . strtoupper(substr($row['fullname'], 0, 1)) . '-' . date('y') . '-' . $newIDNumber;

            $insert_query = "INSERT INTO author_profile(fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, status, id_number, joined_date)
                  SELECT  fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, 'IDLE' as status,
                  ?, NOW() as joined_date
                  FROM for_approval_of_account
                  WHERE id = ?";
            $insert_statement = mysqli_prepare($conn, $insert_query);
            mysqli_stmt_bind_param($insert_statement, "ss", $idNumber, $id);
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
                    // Display SweetAlert using JavaScript
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>';
                    echo '<script>';
                    echo 'Swal.fire({';
                    echo '  title: "ADDED SUCCESSFULLY!",';
                    echo '  text: "You clicked the button!",';
                    echo '  icon: "success"';
                    echo '}).then(function(result) {';
                    echo '  if (result.isConfirmed) {';
                    echo '    setTimeout(function() {';
                    echo '      window.location.href = "account-approval.php";'; // Replace with your custom page URL
                    echo '    }, 5000);'; // Delay the redirection by 1 second (1000 milliseconds)
                    echo '  }';
                    echo '});';
                    echo '</script>';
                    exit; // Add this line to stop further execution
                }
            }
        }

        if ($row['user_type'] == "REVIEWER") {
            // Get the maximum value of the last four numbers from existing IDs in the table
            $maxIDQuery = "SELECT MAX(RIGHT(id_number, 4)) as max_id FROM author_profile";
            $maxIDResult = mysqli_query($conn, $maxIDQuery);
            $maxIDRow = mysqli_fetch_assoc($maxIDResult);
            $maxID = $maxIDRow['max_id'];

            // Increment the last four numbers for the new ID
            $newIDNumber = sprintf("%04d", intval($maxID) + 1); // Pad with leading zeros if necessary

            // Generate the complete ID number
            $idNumber = 'RDC-' . strtoupper(substr($row['fullname'], 0, 1)) . '-' . date('y') . '-' . $newIDNumber;

            $insert_query = "INSERT INTO reviewer_profile(fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, status, id_number, joined_date)
                  SELECT  fullname, birthdate, contact_number, unit, street, barangay, city, province, country, discipline, qualification, designation, affiliation, email_address, username, password, cv, intent, 'IDLE' as status,
                  ?, NOW() as joined_date
                  FROM for_approval_of_account
                  WHERE id = ?";
            $insert_statement = mysqli_prepare($conn, $insert_query);
            mysqli_stmt_bind_param($insert_statement, "ss", $idNumber, $id);
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
                    // Display SweetAlert using JavaScript
                    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>';
                    echo '<script>';
                    echo 'Swal.fire({';
                    echo '  title: "ADDED SUCCESSFULLY!",';
                    echo '  text: "You clicked the button!",';
                    echo '  icon: "success"';
                    echo '}).then(function(result) {';
                    echo '  if (result.isConfirmed) {';
                    echo '    setTimeout(function() {';
                    echo '      window.location.href = "account-approval.php";'; // Replace with your custom page URL
                    echo '    }, 5000);'; // Delay the redirection by 1 second (1000 milliseconds)
                    echo '  }';
                    echo '});';
                    echo '</script>';
                    exit; // Add this line to stop further execution
                }
            }
        }
    }
}
?>
