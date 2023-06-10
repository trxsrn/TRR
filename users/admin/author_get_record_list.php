<?php

include 'connection.php';

$sql = mysqli_query($conn, "SELECT * FROM author_profile ");
$output = '';

while($row= $sql -> fetch_assoc()) {
  $output .= '<tr>';
  $output .= '<td>' . $row['id_number'] . '</td>';
  $output .= '<td>' . $row['fullname'] . '</td>';
  $output .= '<td>' . $row['discipline'] . '</td>';
  $output .= '<td>' . $row['status'] . '</td>';
  $output .= '<td><a href="authorprofile_view.php?id=' . $row['id_number'] . '"><i class="fa-regular fa-eye"></i></a>
                  <a href="authorprofile_view.php?id=' . $row['id_number'] . '"><i class="fa-solid fa-trash"></i></a>
  </td>';
  $output .= '</tr>';
}

echo $output;
?>
