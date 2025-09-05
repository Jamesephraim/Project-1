// admin_subject_toggle.php

<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $status = $_POST['status'] == '1' ? 1 : 0;

    $check = mysqli_query($conn, "SELECT * FROM available_subjects WHERE subject='$subject'");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($conn, "UPDATE available_subjects SET is_active=$status WHERE subject='$subject'");
    } else {
        mysqli_query($conn, "INSERT INTO available_subjects (subject, is_active) VALUES ('$subject', $status)");
    }

    header("Location: admin_dashboard.php"); // back to dashboard
}
?>
