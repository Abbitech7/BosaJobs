<?php
include "../config/db.php";
if (isset($_SESSION['company_id'])) {
    unset($_SESSION['company_id']);
    session_destroy();
    echo "<script>
    alert('Logout successful!'); 
    window.location.href = '../auth/login.php';
    </script>";
} elseif (isset($_SESSION['candidate_id'])) {
    unset($_SESSION['candidate_id']);
    session_destroy();
    echo "<script>
    alert('Logout successful!');
    window.location.href = '../auth/login.php';
    </script>";
} else {
    echo "<script>
    window.location.href = '../auth/login.php';
    </script>";
}
?>