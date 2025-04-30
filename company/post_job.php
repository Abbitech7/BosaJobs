<?php
include_once '../config/db.php';
session_start();
if (!isset($_SESSION['company_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$company_id = $_SESSION['company_id'];

if(isset($_POST['post-job'])){
    $title=$_POST['job_title'];
    $location=$_POST['location'];
    $description=$_POST['description'];
    $salary=$_POST['salary'];
    $employment_type=$_POST['employment_type'];
    $skill=$_POST['skill'];
    $deadline=$_POST['deadline'];

    $query="INSERT INTO jobs (title,location,description,salary,type,skill,deadline,company_id) VALUES ('$title','$location','$description','$salary','$employment_type','$skill','$deadline','$company_id')";
    $result=mysqli_query($conn,$query);
    if ($result) {
        echo "<script>
            alert('Job posted successfully');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Failed to post job');</script>";
    }
    
}

?>
