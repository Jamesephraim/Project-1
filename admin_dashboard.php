<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f6fa;
      display: flex;
      min-height: 100vh;
    }

    .sidebar {
      width: 240px;
      background-color: #1f2937;
      color: white;
      padding: 30px 20px;
      position: fixed;
      height: 100%;
    }

    .sidebar h2 {
      margin-bottom: 40px;
      font-size: 24px;
      text-align: center;
      color: #60a5fa;
    }

    .sidebar a {
      display: block;
      padding: 12px 15px;
      margin-bottom: 15px;
      color: #cbd5e1;
      text-decoration: none;
      border-radius: 4px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #374151;
      color: #fff;
    }

    .main-content {
      margin-left: 240px;
      padding: 40px;
      width: 100%;
    }

    .main-content h1 {
      font-size: 28px;
      margin-bottom: 30px;
      color: #1e293b;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
    }

    .card {
      background-color: #ffffff;
      border-radius: 10px;
      padding: 25px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      transition: 0.3s ease;
      text-align: center;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
    }

    .card h3 {
      font-size: 20px;
      margin-bottom: 15px;
      color: #1f2937;
    }

    .card p {
      font-size: 14px;
      color: #6b7280;
      margin-bottom: 20px;
    }

    .card a {
      display: inline-block;
      text-decoration: none;
      background-color: #3b82f6;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      font-size: 14px;
      transition: background-color 0.3s;
    }

    .card a:hover {
      background-color: #2563eb;
    }

    @media screen and (max-width: 768px) {
      .main-content {
        margin-left: 0;
        padding: 20px;
      }

      .sidebar {
        display: none;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#">Dashboard</a>
    <a href="#">Insert MCQs</a>
    <a href="#">View Questions</a>
    <a href="#">Update/Delete</a>
    <a href="logout.php">Logout</a>
  </div>

  <div class="main-content">
    <h1>Welcome, Admin 👋</h1>

    <div class="card-grid">
      <div class="card">
        <h3>Insert MCQs</h3>
        <p>Add new multiple-choice questions with options and correct answer.</p>
        <a href="insert_mcq.php">Insert Now</a>
      </div>

      <div class="card">
        <h3>View All Questions</h3>
        <p>See a list of all previously added questions with filters.</p>
        <a href="view_questions.php">View Questions</a>
      </div>

      <!-- <div class="card">
        <h3>Update Questions</h3>
        <p>Edit previously added questions and update their content.</p>
        <a href="update_question.php">Update</a>
      </div> -->

      <!-- <div class="card">
        <h3>Delete Questions</h3>
        <p>Remove unwanted or incorrect questions permanently from the system.</p>
        <a href="delete_question.php">Delete</a>
      </div> -->
    </div>
  </div>

</body>
</html>
