<?php
require "connect.php"; // Make sure this connects to your DB

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Always sanitize input

    // Check if the question exists (optional but safer)
    $check = mysqli_query($conn, "SELECT * FROM mcq_questions WHERE id = $id");
    if (mysqli_num_rows($check) > 0) {
        $query = "DELETE FROM mcq_questions WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "<script>alert('Question deleted successfully.'); window.location='view_questions.php';</script>";
        } else {
            echo "<script>alert('Error deleting question.'); window.location='view_questions.php';</script>";
        }
    } else {
        echo "<script>alert('Question not found.'); window.location='view_questions.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location='view_questions.php';</script>";
}
?>
