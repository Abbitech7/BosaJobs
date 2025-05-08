<?php include "config/db.php"; 
include "candidate/fetch_company.php";
include "candidate/fetch_jobs.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bossa Jobs - Find Your Dream Job in Jimma</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    

    <header id="header">
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-briefcase"></i>
                Bossa Jobs
            </a>
            
            <ul class="horizontal-bar">
                <li><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#jobs">Jobs</a></li>
                <li><a href="#how-it-works">How It Works</a></li>
                <li><a href="auth/login.php" onclick="showPopUp();"><i class="fas fa-user-plus"></i> Login</a></li>
                <li><a href="auth/register.php" onclick="showPopUp();"><i class="fas fa-user-plus"></i> Sign Up</a></li>
            </ul>
            
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    
   
    <section class="section-1">
        <img src="https://images.unsplash.com/photo-1521791055366-0d553872125f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80" alt="Professional workspace" class="section-1-bg">
        <div class="container">
            <div class="section-1-content">
                <h1>Find Your Dream Job in Jimma</h1>
                <p>Connecting talented professionals with top employers in Jimma City. Start your career journey today with Bossa Jobs.</p>
                <div class="hero-buttons">
                    <a href="#" class="btn btn-primary">Find Jobs</a>
                    <a href="#" class="btn btn-outline">Post a Job</a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="section-2" id="about">
        <div class="container">
            <div class="description-part">
                <h1>Jimma's Job Platform</h1>
                <p>Bossa Jobs is dedicated to connecting job seekers with employers in Jimma City and surrounding areas. Our platform makes it easy to find the perfect match for your skills and experience.</p>
                <p>With our deep understanding of the local job market and partnerships with Jimma's top employers, we're your trusted partner for career growth in the region.</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
            <div class="img-part">
                <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" alt="Jimma city landscape">
            </div>
        </div>
    </section>
    
   
    <section class="section-3" id="jobs">
        <div class="container">
            <div class="left-panel-container">
                <div class="left-panel">
                    <h1>Featured Companies</h1>
                    <?php
                    $company_list = fetch_company($conn);
                    if ($company_list) {
                        foreach ($company_list as $company) {
                            $name = $company['name'];
                            $logo = $company['logo'];
                            echo '
                            <div class="company">
                                <img src="images/' . $logo . '" alt="' . $name . '">
                                <h4>' . $name . '</h4>
                            </div>
                            ';
                        }
                    } else {
                        echo "<p>No featured companies available.</p>";
                    }
                    ?>
                </div>
                <div class="left-panel" id="Industry">
                    <h1>Industry Categories</h1>
                    <div class="Industry">
                        <p>Technology</p>
                    </div>
                    <div class="Industry">
                        <p>Finance</p>
                    </div>
                    <div class="Industry">
                        <p>Healthcare</p>
                    </div>
                    <div class="Industry">
                        <p>Education</p>
                    </div>
                    <div class="Industry">
                        <p>Manufacturing</p>
                    </div>
                    <div class="Industry">
                        <p>Retail</p>
                    </div>
                    <div class="Industry">
                        <p>Hospitality</p>
                    </div>
                    <div class="Industry">
                        <p>Engineering</p>
                    </div>
                </div>
            </div>
            <div class="right-panel">
                <h1>Latest Job Openings in Jimma</h1>
                <?php
                
                $job_list = fetch_jobs($conn);
                if ($job_list) {
                    foreach ($job_list as $job) {
                        $title = $job['title'];
                        $company_name = $job['company_name'];
                        $location = $job['place'];
                        $description = $job['description'];
                        $posted_at = $job['posted_date'];
                        $deadline = $job['deadline'];
                        $logo = $job['company_logo'];
                        echo '
                        <div class="jobs">
                            <div class="company-name">
                                <img src="images/' . $logo . '" alt="' . $company_name . '">
                                <h1>' . $company_name . '</h1>
                            </div>
                            <div class="jobs-description">
                                <h2>' . $title . '</h2>
                                <p><i class="fas fa-map-marker-alt"></i> ' . $location . '</p>
                                <p>' . substr($description, 0, 200) . '...</p>
                                <div>
                                    <p><i class="far fa-calendar-alt"></i> Posted: ' . $posted_at . '</p>
                                    <p><i class="far fa-clock"></i> Deadline: ' . $deadline . '</p>
                                </div>
                            </div>
                            <div class="apply-link
">
                                <a href="candidate/candidate_sign_up.php" class="details-btn">Apply Now</a>
                            </div>
                        </div>
                        ';
                    }


                } else {
                    echo "<p>No job listings available.</p>";
                }
                ?>
                <div class="counters">
                    <ul>
                        <li><a href="#"><i class="fas fa-angle-left"></i></a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><i class="fas fa-angle-right"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How It Works Section -->
    <section class="section-4" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>How It Works</h2>
                <p>Simple steps to find your dream job or the perfect candidate in Jimma</p>
            </div>
            
            <div class="steps-container">
                <div class="steps-box">
                    <h3>For Job Seekers</h3>
                    
                    <div class="steps-list">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Create Your Profile</h4>
                                <p>Sign up and build your professional profile in minutes, highlighting your skills and experience.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Upload Your Resume</h4>
                                <p>Add your resume and let our system match you with relevant opportunities in Jimma.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Get Matched</h4>
                                <p>Receive personalized job recommendations based on your profile and preferences.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Apply & Interview</h4>
                                <p>Apply with one click and prepare for interviews with our career resources.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="steps-box">
                    <h3>For Employers</h3>
                    
                    <div class="steps-list">
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div class="step-content">
                                <h4>Create Company Profile</h4>
                                <p>Set up your company profile and showcase your culture, values, and benefits.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div class="step-content">
                                <h4>Post Job Openings</h4>
                                <p>List your job requirements and desired qualifications with our easy job posting tool.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div class="step-content">
                                <h4>Review Candidates</h4>
                                <p>Get matched with qualified candidates and review their profiles and portfolios.</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">4</div>
                            <div class="step-content">
                                <h4>Hire Top Talent</h4>
                                <p>Connect with candidates through our platform and make hiring decisions faster.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div>
                <h1>Bossa Jobs</h1>
                <p style="color: rgba(255,255,255,0.7); margin: 20px 0; line-height: 1.7;">Connecting talent with opportunity in Jimma City. Our mission is to make career growth accessible to everyone in the region.</p>
                <div class="icon-linked">
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/facebook.svg" alt="Facebook"></a>
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/twitter.svg" alt="Twitter"></a>
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/linkedin.svg" alt="LinkedIn"></a>
                    <a href="#"><img src="https://cdn.jsdelivr.net/npm/simple-icons@v5/icons/instagram.svg" alt="Instagram"></a>
                </div>
            </div>
            
            <div>
                <h1>For Candidates</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Browse Jobs</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Career Resources</a></li>
                    
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Job Alerts</a></li>
                   
                </ul>
            </div>
            
            <div>
                <h1>For Employers</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Post a Job</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Browse Candidates</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Recruitment Solutions</a></li>
                    <li><a href="#"><i class="fas fa-chevron-right"></i> Employer Resources</a></li>
                   
                </ul>
            </div>
            
            <div>
                <h1>Contact Us</h1>
                <ul>
                    <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jimma, Ethiopia</a></li>
                    <li><a href="tel:+251912345678"><i class="fas fa-phone-alt"></i> +251 912 345 678</a></li>
                    <li><a href="mailto:info@bossajobs.com"><i class="fas fa-envelope"></i> info@bossajobs.com</a></li>
                   
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 Bossa Jobs. All Rights Reserved.</p>
        </div>
    </footer>
    
    <script src="public/js/scirpt.js"></script>
</body>
</html>