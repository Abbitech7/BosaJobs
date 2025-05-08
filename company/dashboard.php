<?php
include '../config/db.php';
include 'fetch_jobs.php';
session_start();
if (!isset($_SESSION['company_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$company_id = $_SESSION['company_id'];

$sql = "SELECT * FROM users INNER JOIN company ON users.id=company.company_id WHERE company.company_id='$company_id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $location = $row['location'];
    $description = $row['description'];
    $website = $row['website'];
    $contact = $row['contact'];
    $logo = $row['logo'];
    $email = $row['email'];
} else {
    echo "No data found for the company.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/css/company.css">
</head>

<body>

    <div class="language-selector">
        <button class="language-btn active" data-lang="en">English</button>
        <button class="language-btn" data-lang="om">Afaan Oromoo</button>
        <button class="language-btn" data-lang="am">አማርኛ</button>
    </div>

    <div class="sidebar">
        <div class="company-info">
            <?php
            echo '
            <img src="../uploads/images/' . $logo . '" alt="Company Logo">
            <h2>' . $name . '</h2>';
            ?>
        </div>
        <a href="#" onclick="showDashboard()" data-translate="home">Home</a>
        <a href="#" onclick="showCompanyProfile()" data-translate="company_profile">Company Profile</a>
        <a href="#" onclick="showJobForm()" data-translate="post_job">Post New Job</a>
        <a href="../auth/logout.php" class="logout" onclick="logout()" data-translate="logout">Logout</a>
    </div>

    <div class="main">
        <h1 data-translate="welcome">Welcome to Your Dashboard</h1>
        <div id="dashboard-content">
            <div class="section">
                <div class="card">
                    <h2 data-translate="company_profile">Company Profile</h2>
                    <p data-translate="profile_desc">Update your company information and manage your profile.</p>
                    <button onclick="showCompanyProfile();" data-translate="view_profile">View Profile</button>
                </div>
                <div class="card">
                    <h2 data-translate="post_job">Post New Job</h2>
                    <p data-translate="post_job_desc">Create and manage job listings to attract candidates.</p>
                    <button onclick="showJobForm();" data-translate="post_job_btn">Post Job</button>
                </div>
            </div>
            <div id="jobs-posted">
                <h2 data-translate="posted_jobs">Previously Posted Jobs</h2>
                <div class="job-card">
                    <?php
                    $job_list = fetch_jobs($conn, $company_id);
                    foreach ($job_list as $job) {
                        echo '<span>' . $job['title'] . ' - ' . $job['location'] . '</span>
                        <div>
                            <button data-translate="view_applicants">View Applicants</button>
                            <button data-translate="delete">Delete</button>
                        </div>';
                    }
                    ?>
                </div>
            </div>

            <div id="form-container" style="display: none;">
                <form method="post" action="post_job.php" enctype="multipart/form-data">
                    <h2 data-translate="post_job">Post a New Job</h2>
                    <label data-translate="job_title">Job Title:</label>
                    <input type="text" placeholder="e.g., Software Developer" name="job_title">
                    <label data-translate="location">Location:</label>
                    <input type="text" placeholder="e.g., Addis Ababa" name="location">
                    <label data-translate="salary">Salary:</label>
                    <input type="text" placeholder="e.g., 15000" name="salary">
                    <label data-translate="employment_type">Employment Type:</label>
                    <select name="employment_type" required>
                        <option value="">-- Select Employment Type --</option>
                        <option data-translate="full_time" value="full-time">Full-time</option>
                        <option data-translate="part_time" value="part-time">Part-time</option>
                        <option data-translate="freelance" value="freelance">Freelance</option>
                    </select>
                    <label data-translate="required_skills">Required Skills:</label>
                    <input type="text" placeholder="e.g., Python, JavaScript" name="skill">
                    <label data-translate="job_description">Job Description:</label>
                    <textarea placeholder="e.g., Looking for a skilled developer..." name="description"></textarea>
                    <label data-translate="application_deadline">Application Deadline:</label>
                    <input type="date" name="deadline">
                    <button data-translate="post_job_btn" name="post-job">Post Job</button>
                </form>
            </div>

            <div id="company-profile-section" style="display: none;">
                <form class="profile-info" method="post" action="update_profile.php" enctype="multipart/form-data">
                    <h2 data-translate="edit_profile">Edit Company Profile</h2>
                    <label data-translate="company_name">Company Name:</label>
                    <input type="text" value="<?php echo $name; ?>" disabled>
                    <label data-translate="contact_email">Contact Email:</label>
                    <input type="email" value="<?php echo $email; ?>" disabled>
                    <label data-translate="phone_number">Phone Number:</label>
                    <input type="text" value="<?php echo $contact; ?>" name="contact">
                    <label data-translate="location">Location:</label>
                    <input type="text" value="<?php echo $location; ?>" name="location">
                    <label data-translate="company_website">Company Website:</label>
                    <input type="text" value="<?php echo $website; ?>" name="website">
                    <label data-translate="upload_logo">Upload Logo:</label>
                    <input type="file" name="logo">
                    <label data-translate="company_description">Company Description:</label>
                    <textarea name="description"><?php echo $description; ?></textarea>
                    <button data-translate="save_changes" name="update">Save Changes</button>
                </form>
            </div>
        </div>
        <script src="../public/js/company.js"></script>

</body>

</html>