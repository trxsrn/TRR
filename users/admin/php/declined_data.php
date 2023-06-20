<?php
include '../connection.php';

$sql = mysqli_query($conn, "SELECT * FROM declined_accounts");

// Check if there are any declined accounts
if ($sql->num_rows > 0) {
    $output = '';

    while ($row = $sql->fetch_assoc()) {
        $output .= '
            <tr>
                <td>' . $row['user_type'] . '</td>
                <td>' . $row['id'] . '</td>
                <td>' . $row['fullname'] . '</td>
                <td><a href="reviewerprofile_view.php?id=' . $row['id'] . '" class="accept">VIEW DETAILS</a></td>
            </tr>';
    }

    echo $output;
} else {
    echo '<tr><td colspan="4">No declined accounts found.</td></tr>';
}
?>
