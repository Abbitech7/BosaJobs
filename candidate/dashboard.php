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
        <img src="https://via.placeholder.com/80" alt="User Profile" id="profile-pic">
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
        <div class="card profile-form">
            <div class="profile-picture-container">
                <img src="https://via.placeholder.com/150" alt="Profile Picture" class="profile-picture" id="profile-display">
                <div class="file-upload">
                    <input type="file" id="profile-picture-upload" accept="image/*" onchange="previewProfilePicture(this)">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label data-translate="full_name">Full name:</label>
                    <input type="text" value="Chala Tolesa">
                </div>
                <div class="form-group">
                    <label data-translate="email">Email:</label>
                    <input type="email" value="chala@example.com">
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label data-translate="phone">Phone:</label>
                    <input type="tel" value="+251912345678">
                </div>
                <div class="form-group">
                    <label data-translate="country">Country:</label>
                    <select>
                        <option>Ethiopia</option>
                        <option>Kenya</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label data-translate="address">Address:</label>
                <input type="text" value="Simma">
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label data-translate="field">Field:</label>
                    <input type="text" value="Software Engineering">
                </div>
                <div class="form-group">
                    <label data-translate="experience">Years of Experience:</label>
                    <select>
                        <option>0-2 years</option>
                        <option selected>3-5 years</option>
                        <option>5+ years</option>
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label data-translate="education">Highest Education:</label>
                <select>
                    <option>High School</option>
                    <option selected>Bachelor's Degree</option>
                    <option>Master's Degree</option>
                    <option>PhD</option>
                </select>
            </div>
            
            <div class="form-group">
                <div class="radio-group">
                    <label data-translate="gender">Gender:</label><br>
                    <input type="radio" id="male" name="gender" value="male" checked>
                    <label for="male" data-translate="male">Male</label>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female" data-translate="female">Female</label>
                    
                </div>
            </div>
            
            <div class="form-group">
                <label data-translate="description">Professional Summary:</label>
                <textarea>Experienced software engineer with 5+ years in frontend development. Specialized in React, TypeScript, and modern web technologies. Passionate about creating accessible and performant user interfaces.</textarea>
            </div>
            
            <div class="form-group">
                <label data-translate="resume">Upload Resume:</label>
                <input type="file" accept=".pdf,.doc,.docx">
            </div>
            
            <button class="btn" data-translate="save_profile">Save Profile</button>
        </div>
    </div>
</div>

<script src="../public/js/candidate.js"></script>

</body>
</html>