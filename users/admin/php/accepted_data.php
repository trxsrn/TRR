<?php
include 'connection.php';

$sql1 = mysqli_query($conn, "SELECT * FROM reviewer_profile");
$sql2 = mysqli_query($conn, "SELECT * FROM author_profile");

$output = '';

// Fetch data from the reviewer_profile table
while ($row = $sql1->fetch_assoc()) {
    $output .= '
        <tr>
            <td>AUTHOR</td>
            <td>' . $row['id_number'] . '</td>
            <td>' . $row['fullname'] . '</td>
            // <td><a href="reviewerprofile_view.php?id=' . $row['id_number'] . '" class="accept"><i class="fa-regular fa-eye"></i> VIEW</a></td>
        </tr>';
}

// Fetch data from the author_profile table
while ($row = $sql2->fetch_assoc()) {
    $output .= '
        <tr>
            <td>REVIEWER</td>
            <td>' . $row['id_number'] . '</td>
            <td>' . $row['fullname'] . '</td>
            <td><a href="authorprofile_view.php?id=' . $row['id_number'] . '" class="accept"><i class="fa-regular fa-eye"></i> VIEW</a></td>
        </tr>';
}

echo $output;
?>
