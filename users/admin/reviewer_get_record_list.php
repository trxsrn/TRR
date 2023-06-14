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
  $output .= '<td>
    <a href="reviewerprofile_view.php?id_number=' .  $row['id_number'] .'"><i class="fa-regular fa-eye"></i></a>
    <a href="#" onclick="confirmDelete(\'' .  $row['id_number'] . '\')"><i class="fa-solid fa-trash"></i></a>
  </td>';
  $output .= '</tr>';
}

echo '<td colspan="5" style="text-align: center;">No data available in table</td>';

echo $output;
?>
