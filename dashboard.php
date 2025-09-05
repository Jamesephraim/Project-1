
<?php
session_start();
 if (!isset($_SESSION['Roll']))
 {
    header("Location: signup.php");
    exit;
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f5f7fa;
      display: flex;
      min-height: 100vh;
      color: #333;
    }

    .sidebar {
      width: 220px;
      background-color: #1e293b;
      color: white;
      padding: 30px 20px;
      position: fixed;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .sidebar h2 {
      font-size: 22px;
      margin-bottom: 30px;
      color: #fff;
    }

    .sidebar a {
      text-decoration: none;
      color: #cbd5e1;
      padding: 10px 0;
      display: block;
      transition: 0.2s;
    }

    .sidebar a:hover {
      color: #fff;
      background-color: #334155;
      padding-left: 10px;
      border-radius: 4px;
    }

    .main {
      margin-left: 220px;
      padding: 40px;
      width: 100%;
    }

    .main h1 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .card {
      background-color: #fff;
      border-radius: 8px;
      padding: 25px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      margin-bottom: 20px;
    }

    .card h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .info-list li {
      list-style: none;
      margin-bottom: 8px;
    }

    .logout-btn {
      text-decoration: none;
      background-color: #ef4444;
      color: white;
      padding: 10px 18px;
      display: inline-block;
      border-radius: 5px;
      transition: 0.3s;
    }

    .logout-btn:hover {
      background-color: #dc2626;
    }

    @media screen and (max-width: 768px) {
      .sidebar {
        position: static;
        width: 100%;
        height: auto;
        flex-direction: row;
        justify-content: space-around;
        padding: 15px;
      }

      .main {
        margin-left: 0;
        padding: 20px;
      }
    }
  </style>
</head>
<body>

  <div class="sidebar">
    <div>
      <h2>Dashboard</h2>
      <a href="#">Home</a>
      <a href="#">Profile</a>
      <a href="#">Results</a>
      <a href="#">Settings</a>
    </div>
    <div>
      <a href="logout.php" class="logout-btn">Logout</a>
    </div>
  </div>

  <div class="main">
    <h1>Welcome, User 👋</h1>

    <div class="card">
      <h2>Your Info</h2>
      <ul class="info-list">
        <li><strong>Role:</strong> Student</li>
        <li><strong>Roll No:</strong> <?php  echo $_SESSION['Roll']; ?></li>
        <li><strong>Branch:</strong> <?php  echo $_SESSION['branch']; ?></li>
      </ul>
    </div>

    <div class="card">
      <h2>Announcements</h2>
      <p>No announcements at the moment. Stay tuned!</p>
    </div>
  </div>

</body>
</html>
