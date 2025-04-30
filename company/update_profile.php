<?php
include "../config/db.php";
session_start();
if (!isset($_SESSION['company_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$company_id = $_SESSION['company_id'];
if (isset($_POST['update'])) {
    if (isset($_FILES['logo'])) {
        $target_dir = "../uploads/images/";
        $file = basename($_FILES['logo']['name']);
        $target_file = $target_dir . $file;
        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
            echo "Can't upload file";
        }
    }
    $location = $_POST['location'];
    $description = $_POST['description'];
    $website = $_POST['website'];
    $phone = $_POST['contact'];


    $query = "UPDATE company SET logo='$file', location='$location', description='$description', website='$website', contact='$phone' WHERE company_id='$company_id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "<script>
            alert('Profile updated successfully');
            window.location.href = 'dashboard.php';
        </script>";
    } else {
        echo "<script>alert('Failed to update profile');</script>";
    }
}
