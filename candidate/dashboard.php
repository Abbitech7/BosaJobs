<?php include 'header.php' ?>
        <div id="dashboard-content">
            <div class="welcome-message">
                <h2 data-translate="welcome">Welcome to Your Dashboard</h2>
                <p data-translate="welcome_message">Find your dream job and start your journey towards a brighter future today.</p>
            </div>

            <?php include 'search.php' ?>

            <h2 class="section-title" data-translate="recent_jobs">Recent Posted Jobs</h2>
            <div class="card">
                <?php
                $jobs = fetch_jobs($conn);
                foreach ($jobs as $job) {
                    echo '<div class="job-card">
                        <h3>' . htmlspecialchars($job['title']) . '</h3>
                        <div class="job-meta">
                            <span data-translate="company">Company:</span> ' . htmlspecialchars($job['name']) . '<br>
                            <span data-translate="location">Location:</span> ' . htmlspecialchars($job['location']) . '<br>
                            <span data-translate="deadline">Deadline:</span> ' . htmlspecialchars($job['deadline']) . '
                        </div>
                        <p>' . htmlspecialchars($job['description']) . '</p>
                        <div class="job-actions">
                            <a href="#" class="btn" data-translate="view_details">View Details</a>
                            <a href="#" class="btn btn-secondary" data-translate="apply">Apply</a>
                        </div>
                    </div>';
                }
                ?>
            </div>

        </div>
        <?php include 'footer.php' ?>

        