<?php
// insert_mcq.php
require 'connect.php'; // 🔁 Make sure this connects to your DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $question = $_POST['question'];
    $optionA = $_POST['option_a'];
    $optionB = $_POST['option_b'];
    $optionC = $_POST['option_c'];
    $optionD = $_POST['option_d'];
    $correct = $_POST['correct_option'];
    $subject = $_POST['subject'];

    $stmt = $conn->prepare("INSERT INTO mcq_questions (question, option_a, option_b, option_c, option_d, correct_option, subject) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $question, $optionA, $optionB, $optionC, $optionD, $correct, $subject);

    if ($stmt->execute()) {
        echo "<script>alert('Question inserted successfully!');</script>";
    } else {
        echo "<script>alert('Error inserting question');</script>";
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert MCQ Question</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
            padding: 40px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #1f2937;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: 600;
            color: #374151;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .correct-group {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .submit-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 12px 25px;
            margin-top: 30px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Insert MCQ Question</h2>
        <form method="POST" action="">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required>

            <label for="question">Question</label>
            <textarea name="question" id="question" required></textarea>

            <label>Options</label>
            <input type="text" name="option_a" placeholder="Option A" required>
            <input type="text" name="option_b" placeholder="Option B" required>
            <input type="text" name="option_c" placeholder="Option C" required>
            <input type="text" name="option_d" placeholder="Option D" required>

            <label for="correct_option">Correct Option</label>
            <select name="correct_option" required>
                <option value="">--Select--</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
            </select>

            <button type="submit" class="submit-btn">Insert Question</button>
        </form>
    </div>

</body>
</html>
