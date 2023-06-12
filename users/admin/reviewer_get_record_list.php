<?php

include 'connection.php';

$sql = mysqli_query($conn, "SELECT * FROM reviewer_profile ");
$output = '';

while($row= $sql -> fetch_assoc()) {
  $output .= '<tr>';
  $output .= '<td>' . $row['id_number'] . '</td>';
  $output .= '<td>' . $row['fullname'] . '</td>';
  $output .= '<td>' . $row['discipline'] . '</td>';
  $output .= '<td>' . $row['status'] . '</td>';
  $output .= '<td><a href="authorprofile_view.php?id_number=' . $row['id_number'] . '" class="accept"><i class="fa-regular fa-eye"></i></a></td>';
  $output .= '</tr>';
}

echo $output;
?>
