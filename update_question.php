<?php
require "connect.php";

// Fetch question by ID
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $q = mysqli_query($conn, "SELECT * FROM mcq_questions WHERE id = $id");
    $question = mysqli_fetch_assoc($q);
}

if (isset($_POST['update'])) {
    $subject = $_POST['subject'];
    $question_text = $_POST['question'];
    $a = $_POST['option_a'];
    $b = $_POST['option_b'];
    $c = $_POST['option_c'];
    $d = $_POST['option_d'];
    $correct = $_POST['correct_option'];

    $update = "UPDATE mcq_questions SET subject='$subject', question='$question_text', 
               option_a='$a', option_b='$b', option_c='$c', option_d='$d', 
               correct_option='$correct' WHERE id=$id";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Question Updated Successfully'); window.location='view_questions.php';</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Question</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            padding: 40px;
        }

        .container {
            background-color: white;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }

        button {
            margin-top: 25px;
            width: 100%;
            padding: 12px;
            background-color: #2563eb;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
        }

        button:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Update Question</h2>
    <form method="POST">
        <label>Subject</label>
        <input type="text" name="subject" value="<?= htmlspecialchars($question['subject']) ?>" required>

        <label>Question</label>
        <input type="text" name="question" value="<?= htmlspecialchars($question['question']) ?>" required>

        <label>Option A</label>
        <input type="text" name="option_a" value="<?= htmlspecialchars($question['option_a']) ?>" required>

        <label>Option B</label>
        <input type="text" name="option_b" value="<?= htmlspecialchars($question['option_b']) ?>" required>

        <label>Option C</label>
        <input type="text" name="option_c" value="<?= htmlspecialchars($question['option_c']) ?>" required>

        <label>Option D</label>
        <input type="text" name="option_d" value="<?= htmlspecialchars($question['option_d']) ?>" required>

        <label>Correct Answer (A/B/C/D)</label>
        <select name="correct_option" required>
            <option value="A" <?= $question['correct_option'] == 'A' ? 'selected' : '' ?>>A</option>
            <option value="B" <?= $question['correct_option'] == 'B' ? 'selected' : '' ?>>B</option>
            <option value="C" <?= $question['correct_option'] == 'C' ? 'selected' : '' ?>>C</option>
            <option value="D" <?= $question['correct_option'] == 'D' ? 'selected' : '' ?>>D</option>
        </select>

        <button type="submit" name="update">Update Question</button>
    </form>
</div>
</body>
</html>
