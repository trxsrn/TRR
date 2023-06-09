<?php

include '../connection.php';

function getButton($status, $id) {
  if($status == "to assign") {
    return '<a href="assign.php?id='.$id.'" class="assign-btn" >ASSIGN</a>';
  } else if ($status == "to review") {
    return '<a href="view.php?id='.$id.'" class="assign-btn">VIEW</a>';
  } else if ($status == "under review") {
    return '<a href="#" class="assign-btn">VIEW</a>';
  } else if  ($status == "to publish") {
    return '<a href="#" class="assign-btn">PUBLISH</a>';
  } else {
    return '<a href="#" class="assign-btn">PUBLISH</a>';
  }
}

$sql = mysqli_query($conn, "SELECT * FROM papers ");
$output = '';


while($row= $sql -> fetch_assoc()) {
  
  $reviewers = explode(";", $row['reviewer']);
  $reviewer_count = count($reviewers) -1  ;
  $authorId = $row['author'];
  $authorQuery = mysqli_query($conn, "SELECT fullname FROM author_profile WHERE id_number = '$authorId'");
  $authorData = mysqli_fetch_assoc($authorQuery);
  $authorName = $authorData['fullname'];
  $timestamp = $row['last_modified'];
  $formattedTimestamp = date('F j, Y', strtotime($timestamp));



  $output .= '<tr>';
  $output .= '<td>' . $row['id'] . '</td>';
  $output .= '<td>' . $row['research_title'] . '</td>';
  $output .= '<td><a href="">' . $authorName . '</a></td>';
  $output .= '<td>' . $row['Co-Author'] . '</td>';
  $output .= '<td>' . $reviewer_count . '/5</td>';
  $output .= '<td>' . $formattedTimestamp . '</td>';
  $output .= '<td>' . $row['status'] . '</td>';
  $output .= '<td><center>' . getButton(strtolower($row['status']), $row['id']) . '</center></td>';
  $output .= '</tr>';
}

echo '<td colspan="8" style="text-align: center;">No data available in table</td>';

echo $output;
?>
