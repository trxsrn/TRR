<?php

session_start();

include 'connection.php';


$usertype_author = "AUTHOR";
$usertype_reviewer = "REVIEWER";

$lastname = ucfirst($_POST['lastname']);
$givenname = ucfirst($_POST['givenname']);
$middleinitial = ucfirst($_POST['middleinitial']);
$suffix = $_POST['suffix'];
$fullname = $givenname . " " . $middleinitial . " " . $lastname . " " . $suffix;

$birthdate = $_POST['birthdate'];
$number = $_POST['number'];
$unit = $_POST['unit'];
$street= $_POST['street'];
$barangay = $_POST['barangay'];
$city = $_POST['city'];
$province = $_POST['province'];
$country = $_POST['country'];
$discipline = $_POST['dscp'];
$disciplines = implode("/", $discipline);
$quali = $_POST['qualification'];
$qualification = $_POST['qualification'];
$designation = $_POST['designation'];
$affili = $_POST['affiliation'];
$affili_speci = $_POST['specific_affiliation'];
$affiliation = $affili . " - ". $affili_speci;
$email= $_POST['email'];
$uname = $_POST['username'];
$pass= md5($_POST['password']);

// Renaming the file name accoriding to the name of the user
//For Curriculum Vitae
$cv_newfileName = $_FILES['file_cv']['name'];
$cv_extension = pathinfo($cv_newfileName, PATHINFO_EXTENSION);
$cv_newFileName =  "CV_" . $lastname ."_" . $givenname  . '.' . $cv_extension;

$cv_directory = 'users/admin/Data/cv_files/';
$upload_cv = $cv_directory . $cv_newFileName ;

// Renaming the file name accoriding to the name of the user
//For Letter of Intent
$intent_newfileName = $_FILES['file_intent']['name'];
$intent_extension = pathinfo($intent_newfileName, PATHINFO_EXTENSION);
$intent_newFileName =  "Intent_" . $lastname ."_" . $givenname  . '.' . $intent_extension;

$cv_directory = 'users/admin/Data/intent_files/';
$upload_intent = $cv_directory . $intent_newFileName ;

if(isset($_POST["submit_authorQW"]))  
{  
    if (move_uploaded_file($_FILES['file_cv']['tmp_name'], $upload_cv)) 
    {

            if ($quali_speci == " ")
            {
                $quali_speci = $qualification;;
            } 
            else
            {
                $quali_speci = $_POST['specific_qualification'];
                $qualification = $quali . " - " .$quali_speci;
    
            }        

            move_uploaded_file($_FILES['file_intent']['tmp_name'], $upload_intent);
            // Store the file path in the database
            $sql = "INSERT INTO for_approval_of_account (`user_type`,`fullname`, `birthdate`, `contact_number`, `unit`,`street`,`barangay`, `city`, `province`, `country`, `discipline`, `qualification`, `designation`, `affiliation`,`email_address`, `username`, `password`, `cv`, `intent`) VALUES (?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssssssssss", $usertype_author, $fullname, $birthdate, $number, $unit, $street , $barangay, $city, $province, $country, $disciplines, $qualification, $designation, $affiliation, $email, $uname, $pass,     $cv_newFileName, $intent_newFileName);
            $stmt->execute();

            echo ('<script type="text/javascript"> alert("Application Sent Successfully! Kindly wait for confirmation email that will take 3 to 7 days working days!"); location="index.php"; </script>');

            $usertype = "GUEST";
            $user_log = $fullname. " applied as Author" ;
            $sql_log = "INSERT INTO `activity_log` (`fullname`, `user_type`, `action`) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql_log);
            $stmt->bind_param("sss", $fullname, $usertype, $user_log);
            $stmt->execute();
    }
}


if(isset($_POST["submit_reviewer"]))  
{  
    if (move_uploaded_file($_FILES['file_cv']['tmp_name'], $upload_cv)) 
    {

            if ($quali_speci == " ")
            {
                $quali_speci = $qualification;;
            } 
            else
            {
                $quali_speci = $_POST['specific_qualification'];
                $qualification = $quali . " - " .$quali_speci;
    
            }        

            move_uploaded_file($_FILES['file_intent']['tmp_name'], $upload_intent);
            // Store the file path in the database
            $sql = "INSERT INTO for_approval_of_account (`user_type`,`fullname`, `birthdate`, `contact_number`, `unit`,`street`,`barangay`, `city`, `province`, `country`, `discipline`, `qualification`, `designation`, `affiliation`,`email_address`, `username`, `password`, `cv`, `intent`) VALUES (?,?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssssssssssss", $usertype_reviewer, $fullname, $birthdate, $number, $unit, $street , $barangay, $city, $province, $country, $disciplines, $qualification, $designation, $affiliation, $email, $uname, $pass,     $cv_newFileName, $intent_newFileName);
            $stmt->execute();

            echo ('<script type="text/javascript"> alert("Application Sent Successfully! Kindly wait for confirmation email that will take 3 to 7 days working days!"); location="index.php"; </script>');

            $usertype = "GUEST";
            $user_log = $fullname. " applied as Reviewer" ;
            $sql_log = "INSERT INTO `activity_log` (`fullname`, `user_type`, `action`) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql_log);
            $stmt->bind_param("sss", $fullname, $usertype, $user_log);
            $stmt->execute();
    }
}

?>