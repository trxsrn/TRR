<?php
include '../connection.php';

$sql = mysqli_query($conn, "SELECT * FROM reviewer_profile ");
$data = array(); // Create an empty array to store the data

while($row = $sql->fetch_assoc()) {
    $data[] = array(
        'id_number' => $row['id_number'],
        'fullname' => $row['fullname'],
        'discipline' => $row['discipline'],
        'status' => $row['status']
    );
}

if (empty($data)) {
    $data = array('message' => 'No data available in table');
}

// Set the response header to indicate JSON content
header('Content-Type: application/json');

// Output the JSON-encoded data
echo json_encode($data);
?>
