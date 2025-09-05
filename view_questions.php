<?php
require "connect.php";

// Get all distinct subjects
$subject_query = "SELECT DISTINCT subject FROM mcq_questions ORDER BY subject ASC";
$subject_result = mysqli_query($conn, $subject_query);

// Get selected subject if any
$selected_subject = $_GET['subject'] ?? '';

if ($selected_subject) {
    $query = "SELECT * FROM mcq_questions WHERE subject = '$selected_subject' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM mcq_questions ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View MCQ Questions</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
            padding: 40px;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #1f2937;
        }

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        select {
            padding: 10px;
            font-size: 14px;
            min-width: 200px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 15px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 5px;
            margin-left: 10px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e5e7eb;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: #111827;
        }

        tr:nth-child(even) {
            background-color: #f1f5f9;
        }

        .no-data {
            text-align: center;
            color: gray;
            margin-top: 50px;
        }

        .action-btn {
            padding: 6px 10px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 12px;
            text-decoration: none;
            margin-right: 5px;
        }

        .action-btn:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>All MCQ Questions</h2>

    <!-- Subject Filter -->
    <form method="GET" action="">
        <select name="subject">
            <option value="">-- All Subjects --</option>
            <?php while ($row = mysqli_fetch_assoc($subject_result)): ?>
                <option value="<?= htmlspecialchars($row['subject']) ?>" 
                    <?= ($row['subject'] == $selected_subject) ? 'selected' : '' ?>>
                    <?= strtoupper(htmlspecialchars($row['subject'])) ?>
                </option>
            <?php endwhile; ?>
        </select>
        <button type="submit">Filter</button>
    </form>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Question</th>
                    <th>A</th>
                    <th>B</th>
                    <th>C</th>
                    <th>D</th>
                    <th>Answer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['subject']); ?></td>
                        <td><?= htmlspecialchars($row['question']); ?></td>
                        <td><?= htmlspecialchars($row['option_a']); ?></td>
                        <td><?= htmlspecialchars($row['option_b']); ?></td>
                        <td><?= htmlspecialchars($row['option_c']); ?></td>
                        <td><?= htmlspecialchars($row['option_d']); ?></td>
                        <td><strong><?= $row['correct_option']; ?></strong></td>
                        <td>
                            <a href="update_question.php?id=<?= $row['id']; ?>" class="action-btn">Edit</a>
                            <a href="delete_question.php?id=<?= $row['id']; ?>" class="action-btn" style="background-color: #ef4444;"
                               onclick="return confirm('Are you sure you want to delete this question?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No questions found<?= $selected_subject ? " for subject <b>$selected_subject</b>" : "" ?>.</p>
    <?php endif; ?>
</div>

</body>
</html>
