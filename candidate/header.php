<?php
include '../config/db.php';
include 'fetch_jobs.php';
session_start();
if (!isset($_SESSION['candidate_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$candidate_id = $_SESSION['candidate_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Dashboard</title>
    <link rel="stylesheet" href="../public/css/candidate.css">
</head>

<body>

    <div class="language-selector">
        <button class="language-btn active" data-lang="en">English</button>
        <button class="language-btn" data-lang="om">Afaan Oromoo</button>
        <button class="language-btn" data-lang="am">አማርኛ</button>
    </div>

    <div class="sidebar">
        <div class="user-info">
            <img src="../uploads/images/igor-omilaev-eGGFZ5X2LnA-unsplash.jpg" alt="User Profile" id="profile-pic">
            <h2 id="user-name">Chala Tolesa</h2>
        </div>
        <?php $currentPage = basename($_SERVER['PHP_SELF'], ".php"); ?>
        <a href="dashboard.php" class="<?= $currentPage == 'dashboard' ? 'active' : '' ?>" data-translate="dashboard">Dashboard</a>
        <a href="applied_jobs.php" class="<?= $currentPage == 'applied_jobs' ? 'active' : '' ?>" data-translate="jobs_applied">Jobs Applied</a>
        <a href="recent_jobs.php" class="<?= $currentPage == 'recent_jobs' ? 'active' : '' ?>" data-translate="recent_jobs">Recent Jobs</a>
        <a href="view_company.php" class="<?= $currentPage == 'view_company' ? 'active' : '' ?>" data-translate="view_companies">View Companies</a>
        <a href="profile.php" class="<?= $currentPage == 'profile' ? 'active' : '' ?>" data-translate="profile">Profile</a>
        <a href="../auth/logout.php" class="logout" onclick="logout()" data-translate="logout">Logout</a>
    </div>

    <div class="main">