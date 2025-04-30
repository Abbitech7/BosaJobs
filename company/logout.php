<?php
include "../config/db.php";
if (isset($_SESSION['company_id'])) {
    unset($_SESSION['company_id']);
    session_destroy();
    echo "<script>
    alert('Logout successful!'); 
    window.location.href = '../auth/login.php';
    </script>";
} else {
    header("Location: ../auth/login.php");
}
?>