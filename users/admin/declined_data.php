<?php
include 'connection.php';

$sql = mysqli_query($conn, "SELECT * FROM declined_accounts");
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
?>
