<?php
include 'connection.php';
include 'navbar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM papers WHERE id = $id");
$row = mysqli_fetch_assoc($result);

$title = $row['research_title'];
$author = $row['author'];
$discipline = $row['discipline'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reviewerIds = $_POST['reviewer'];

    // Assign reviewers to the paper
    $count = 0; // Counter for assigned reviewers
    foreach ($reviewerIds as $reviewerId) {
        if ($count >= 5) {
            break; // Limit to 5 reviewers
        }

        // Retrieve reviewer details from the reviewer_profile table
        $result = mysqli_query($conn, "SELECT * FROM reviewer_profile WHERE id_number = '$reviewerId'");
        $reviewer = mysqli_fetch_assoc($result);

        if ($reviewer) {
            $paperId = $_POST['paper_id'];

            // Update the paper in the database with the assigned reviewer's id_number
            $updateQuery = "UPDATE papers SET reviewer = '{$reviewer['id_number']}' WHERE id = $paperId";
            mysqli_query($conn, $updateQuery);

            $count++; // Increment the counter
        }
    }
    header("Location: assign.php");
    exit();
}

// Retrieve assigned reviewers for the paper
$assignedReviewers = mysqli_query($conn, "SELECT DISTINCT reviewer FROM papers WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Reviewer</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="css/paper.css">
    <link rel="stylesheet" href="css/navigation.css">
</head>

<body>
    <div class="content-body">
        <div class="content" style="margin: 25px;">
            <h1><?php echo $title; ?></h1>
            <h3><?php echo $author; ?></h3>
            <h6><?php echo $discipline; ?></h6>
            <form method="POST">
                <input type="hidden" name="paper_id" value="<?php echo $id; ?>">
                <table class="table table-bordered table-stripped table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Discipline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-data">
                        <?php
                        function getButton($status, $id)
                        {
                            if ($status == "idle" || $status == "active") {
                                return '<button type="submit" name="reviewer[]" value="' . $id . '" class="btn btn-primary">ASSIGN</button>';
                            } else {
                                return '<button type="button" class="btn btn-secondary" disabled>ASSIGN</button>';
                            }
                        }

                        // Fetch reviewers from the database
                        $keywords = explode('/', $discipline);
                        $keywords = array_map('trim', $keywords);
                        $keywords = array_filter($keywords);

                        if (count($keywords) > 0) {
                            $likeClauses = [];
                            foreach ($keywords as $keyword) {
                                $likeClauses[] = "discipline LIKE '%$keyword%'";
                            }
                            $likeClause = implode(' OR ', $likeClauses);
                            $sql = mysqli_query($conn, "SELECT * FROM reviewer_profile WHERE $likeClause");
                        } else {
                            $sql = mysqli_query($conn, "SELECT * FROM reviewer_profile");
                        }

                        while ($row = $sql->fetch_assoc()) {
                            // Check if the reviewer is already assigned to the paper
                            $isAssigned = mysqli_query($conn, "SELECT * FROM papers WHERE id = $id AND reviewer = '{$row['id_number']}'");

                            if (mysqli_num_rows($isAssigned) > 0) {
                                $buttonText = 'ASSIGNED';
                                $buttonClass = 'btn btn-success';
                            } else {
                                $buttonText = getButton(strtolower($row['status']), $row['id_number']);
                                $buttonClass = 'btn btn-primary';
                            }
                        ?>
                            <tr>
                                <td><?= $row['id_number'] ?></td>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['discipline'] ?></td>
                                <td><button type="button" class="<?php echo $buttonClass; ?>" disabled><?php echo $buttonText; ?></button></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('table').DataTable();
        });
    </script>
</body>

</html>
