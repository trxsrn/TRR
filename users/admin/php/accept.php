<?php
session_start();
include '../connection.php';

$username = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM trr_admin_accounts WHERE username='$username'");
$row = mysqli_fetch_assoc($result);
$fullName = $row['FullName'];

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

                $action = $row['fullname'] . "'s account request approved by " . $fullName ;
                $insert_log = "INSERT INTO activity_log (`action`) VALUES (?)";
                $log_statement = mysqli_prepare($conn, $insert_log);
                mysqli_stmt_bind_param($log_statement, "s", $action);
                $log_result = mysqli_stmt_execute($log_statement);
                
                if ($log_result) {
                    $delete_query = "DELETE FROM for_approval_of_account WHERE id = ?";
                    $delete_statement = mysqli_prepare($conn, $delete_query);
                    mysqli_stmt_bind_param($delete_statement, "s", $id);
                    mysqli_stmt_execute($delete_statement);
                
                    if (mysqli_stmt_affected_rows($delete_statement) > 0) {
                        // Redirect to account-approval.php after a successful insertion and deletion
                        header("Location: ../account-approval.php");
                        exit();
                    } else {
                        // Handle deletion error here
                        echo "Error deleting account: " . mysqli_error($conn);
                    }
                } else {
                    // Handle insertion error here
                    echo "Error inserting log: " . mysqli_error($conn);
                }                
            }
        }

        elseif ($row['user_type'] == "REVIEWER") {
            // Get the maximum value of the last four numbers from existing IDs in the table
            $maxIDQuery = "SELECT MAX(RIGHT(id_number, 4)) as max_id FROM reviewer_profile";
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
                    // Redirect to account-approval.php after a successful insertion and deletion
                    header("Location: ../account-approval.php");
                    exit();
                }
            }
        }

        else
        {
            
        }
    }
}
?>
