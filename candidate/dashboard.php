<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['candidate_id'])) {
    header("Location: ../auth/login.php");
    exit();
}
$candidate_id = $_SESSION['candidate_id'];

$query = "SELECT u.name, u.email, c.phone, c.country, c.address, c.field, c.experience, c.education, c.gender, c.summary, c.profile_picture, c.resume 
          FROM candidates c 
          INNER JOIN users u ON c.candidate_id = u.id 
          WHERE c.candidate_id = $candidate_id";
$result= mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    
    $name = htmlspecialchars($user['name']);
    $email = htmlspecialchars($user['email']);
    $phone = htmlspecialchars($user['phone']);
    $country = htmlspecialchars($user['country']);
    $address = htmlspecialchars($user['address']);
    $field = htmlspecialchars($user['field']);
    $experience = htmlspecialchars($user['experience']);
    $education = htmlspecialchars($user['education']);
    $gender = htmlspecialchars($user['gender']);
    $summary = htmlspecialchars($user['summary']);
    $profile_picture = htmlspecialchars($user['profile_picture']);
    $resume = htmlspecialchars($user['resume']);
} else {
    die("Error: Candidate data not found.");
}
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
        <a href="#" onclick="showDashboard()" class="active" data-translate="dashboard">Dashboard</a>
        <a href="#" onclick="showSearchJobs()" data-translate="search_jobs">Search Jobs</a>
        <a href="#" onclick="showJobsApplied()" data-translate="jobs_applied">Jobs Applied</a>
        <a href="#" onclick="showRecentJobs()" data-translate="recent_jobs">Recent Jobs</a>
        <a href="#" onclick="showCompanies()" data-translate="view_companies">View Companies</a>
        <a href="#" onclick="showProfile()" data-translate="profile">Profile</a>
        <a href="#" class="logout" onclick="logout()" data-translate="logout">Logout</a>
    </div>

    <div class="main">
        <div id="dashboard-content">
            <div class="welcome-message">
                <h2 data-translate="welcome">Welcome to Your Dashboard</h2>
                <p data-translate="welcome_message">Find your dream job and start your journey towards a brighter future today.</p>
            </div>

            <div class="search-container">
                <input type="text" placeholder="Search by title, location..." data-translate="search_placeholder">
                <button data-translate="search">Search</button>
            </div>

            <h2 class="section-title" data-translate="recent_jobs">Recent Posted Jobs</h2>
            <div class="card">
                <div class="job-card">
                    <h3>Staff Software Engineer (Front-end) - Web</h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> Goh Engineering<br>
                        <span data-translate="location">Location:</span> Hawassa<br>
                        <span data-translate="posted_date">Posted date:</span> 2025-02-04
                    </div>
                    <p>As a Staff Software Engineer at Goh Engineering, you will collaborate with multi-disciplinary teams to develop and enhance the marketing site...</p>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="view_details">View Details</a>
                        <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="search-jobs-content" style="display: none;">
            <div class="search-container">
                <input type="text" placeholder="Search by title, location..." data-translate="search_placeholder">
                <button data-translate="search">Search</button>
            </div>

            <h2 class="section-title" data-translate="job_results">Job Results</h2>
            <div class="card">
                <div class="job-card">
                    <h3>Frontend Developer</h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> Cynoox Technology PLC<br>
                        <span data-translate="location">Location:</span> Addis Ababa
                    </div>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="see_more">See More</a>
                        <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                    </div>
                </div>
                <div class="job-card">
                    <h3>Product Manager</h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> BONSA RIDE<br>
                        <span data-translate="location">Location:</span> Addis Ababa
                    </div>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="see_more">See More</a>
                        <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="jobs-applied-content" style="display: none;">
            <h2 class="section-title" data-translate="jobs_applied">Jobs You Applied For</h2>
            <div class="card">
                <div class="job-card">
                    <h3>Staff Software Engineer (Front-end) - Web</h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> Goh Engineering<br>
                        <span data-translate="location">Location:</span> Hawassa<br>
                        <span data-translate="posted_date">Posted date:</span> 2025-02-04<br>
                        <span data-translate="applied_date">Applied date:</span> 2025-04-08<br>
                        <span data-translate="status">Status:</span> Under Review
                    </div>
                    <p>As a Staff Software Engineer at Goh Engineering, you will collaborate with multi-disciplinary teams to develop and enhance the marketing site, focusing on design systems, performance improvements, and user accessibility...</p>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="see_more">See More</a>
                        <a href="#" class="btn btn-danger" data-translate="withdraw">Withdraw</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="recent-jobs-content" style="display: none;">
            <h2 class="section-title" data-translate="recent_jobs">Recent Jobs</h2>
            <div class="card">
                <div class="job-card">
                    <h3>Backend Developer</h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> Cynoox Technology PLC<br>
                        <span data-translate="location">Location:</span> Addis Ababa<br>
                        <span data-translate="posted_date">Posted date:</span> 2025-03-15
                    </div>
                    <p>We're looking for an experienced backend developer to join our team and help build scalable APIs and services...</p>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="view_details">View Details</a>
                        <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                    </div>
                </div>
                <div class="job-card">
                    <h3>UX Designer</h3>
                    <div class="job-meta">
                        <span data-translate="company">Company:</span> BONSA RIDE<br>
                        <span data-translate="location">Location:</span> Addis Ababa<br>
                        <span data-translate="posted_date">Posted date:</span> 2025-03-20
                    </div>
                    <p>Join our design team to create beautiful and intuitive user experiences for our ride-sharing platform...</p>
                    <div class="job-actions">
                        <a href="#" class="btn" data-translate="view_details">View Details</a>
                        <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="companies-content" style="display: none;">
            <h2 class="section-title" data-translate="companies">Companies You May Find</h2>
            <div class="card">
                <div class="company-card">
                    <h3>Cynoox Technology PLC</h3>
                    <div class="job-meta">
                        <span data-translate="location">Location:</span> Addis Ababa<br>
                        <span data-translate="industry">Industry:</span> Software Development
                    </div>
                    <a href="#" class="btn" data-translate="see_more">See More</a>
                </div>
                <div class="company-card">
                    <h3>BONSA RIDE</h3>
                    <div class="job-meta">
                        <span data-translate="location">Location:</span> Addis Ababa<br>
                        <span data-translate="industry">Industry:</span> Transportation
                    </div>
                    <a href="#" class="btn" data-translate="see_more">See More</a>
                </div>
            </div>
        </div>

        <div id="profile-content" style="display: none;">
            <h2 class="section-title" data-translate="update_profile">Update Your Profile</h2>
            <form class="card profile-form" method="post" action="update_profile.php" enctype="multipart/form-data">
                <div class="profile-picture-container">
                    <img src="../uploads/images/<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-picture" id="profile-display">
                    <div class="file-upload">
                        <input type="file" id="profile-picture-upload" name="profile_picture" accept="image/*" onchange="previewProfilePicture(this)">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label data-translate="full_name">Full name:</label>
                        <input type="text" name="full_name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label data-translate="email">Email:</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label data-translate="phone">Phone:</label>
                        <input type="tel" name="phone" value="<?php echo $phone; ?>" required>
                    </div>
                    <div class="form-group">
                        <label data-translate="country">Country:</label>
                        <select name="country">
                            <option value="Ethiopia" <?php echo ($country === 'Ethiopia') ? 'selected' : ''; ?>>Ethiopia</option>
                            <option value="Kenya" <?php echo ($country === 'Kenya') ? 'selected' : ''; ?>>Kenya</option>
                            <option value="Other" <?php echo ($country === 'Other') ? 'selected' : ''; ?>>Other</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label data-translate="address">Address:</label>
                    <input type="text" name="address" value="<?php echo $address; ?>">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label data-translate="field">Field:</label>
                        <input type="text" name="field" value="<?php echo $field; ?>">
                    </div>
                    <div class="form-group">
                        <label data-translate="experience">Years of Experience:</label>
                        <select name="experience">
                            <option value="0-2 years" <?php echo ($experience === '0-2 years') ? 'selected' : ''; ?>>0-2 years</option>
                            <option value="3-5 years" <?php echo ($experience === '3-5 years') ? 'selected' : ''; ?>>3-5 years</option>
                            <option value="5+ years" <?php echo ($experience === '5+ years') ? 'selected' : ''; ?>>5+ years</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label data-translate="education">Highest Education:</label>
                    <select name="education">
                        <option value="High School" <?php echo ($education === 'High School') ? 'selected' : ''; ?>>High School</option>
                        <option value="Bachelor's Degree" <?php echo ($education === 'Bachelor\'s Degree') ? 'selected' : ''; ?>>Bachelor's Degree</option>
                        <option value="Master's Degree" <?php echo ($education === 'Master\'s Degree') ? 'selected' : ''; ?>>Master's Degree</option>
                        <option value="PhD" <?php echo ($education === 'PhD') ? 'selected' : ''; ?>>PhD</option>
                    </select>
                </div>

                <div class="form-group">
                    <div class="radio-group">
                        <label data-translate="gender">Gender:</label><br>
                        <input type="radio" id="male" name="gender" value="male" <?php echo ($gender === 'male') ? 'checked' : ''; ?>>
                        <label for="male" data-translate="male">Male</label>
                        <input type="radio" id="female" name="gender" value="female" <?php echo ($gender === 'female') ? 'checked' : ''; ?>>
                        <label for="female" data-translate="female">Female</label>
                    </div>
                </div>

                <div class="form-group">
                    <label data-translate="description">Professional Summary:</label>
                    <textarea name="summary"><?php echo $summary; ?></textarea>
                </div>

                <div class="form-group">
                    <label data-translate="resume">Current Resume:</label>
                    <?php if (!empty($resume)): ?>
                        <a href="../uploads/resumes/<?php echo $resume; ?>" target="_blank">View Current Resume</a>
                    <?php endif; ?>
                    <input type="file" name="resume" accept=".pdf,.doc,.docx">
                </div>

                <button class="btn" data-translate="save_profile" type="submit">Save Profile</button>
            </form>
        </div>
    </div>
    
    <script src="../public/js/candidate.js"></script>

</body>

</html>