<?php

$sql="SELECT resume FROM candidates WHERE candidate_id = '$candidate_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);

if (isset($_POST['apply'])) {
    $job_id = $_POST['job_id'];
    $user_id = $_POST['user_id'];
    $resume = $_POST['resume'];
    $cover_letter = $_POST['cover_letter'];

    $query = "INSERT INTO applicants (job_id, candidate_id, resume, cover_letter) VALUES ('$job_id', '$user_id', '$resume', '$cover_letter')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Application submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting application. Please try again.');</script>";
    }
}
?>
<div class="application-form">
    <form action="" method="POST" onsubmit="return showConfirmation()">
        <h3>Apply for <?php echo $job['title']?></h3>
        <input type="hidden" name='user_id' value="<?php echo $candidate_id?>">
        <input type="hidden" name="job_id" value="<?php echo $job['id']?>">
        <input type="hidden" name="resume" value="<?php echo $row['resume']?>">
        <label for="cover_letter">Write a cover letter for your application</label>
        <textarea name="cover_letter" id="cover_letter" required></textarea>
        <button type="submit" name="apply">Submit Application</button>
    </form>
    <div class="confirmation" id="confirmation">Application submitted successfully!</div>
</div>