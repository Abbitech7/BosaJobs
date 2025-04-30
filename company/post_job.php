<?php
include_once '../config/db.php';
session_start();
if (!isset($_SESSION['company_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$company_id = $_SESSION['company_id'];

if (isset($_POST['post-job'])) {
    $title            = mysqli_real_escape_string($conn, $_POST['job_title']);
    $location         = mysqli_real_escape_string($conn, $_POST['location']);
    $description      = mysqli_real_escape_string($conn, $_POST['description']);
    $salary           = mysqli_real_escape_string($conn, $_POST['salary']);
    $employment_type  = mysqli_real_escape_string($conn, $_POST['employment_type']);
    $skill            = mysqli_real_escape_string($conn, $_POST['skill']);
    $deadline         = mysqli_real_escape_string($conn, $_POST['deadline']);


    $query = "INSERT INTO jobs (title,location,description,salary,type,skill,deadline,company_id) VALUES ('$title','$location','$description','$salary','$employment_type','$skill','$deadline','$company_id')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>
            alert('Job posted successfully');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Failed to post job');</script>";
    }
}
