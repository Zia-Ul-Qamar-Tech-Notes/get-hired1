<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Get Hired - Available Jobs</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="./css/responsive.css">


    <style>
      body {
    background-color: #f5f5f5;
    font-family: Arial, sans-serif;
    margin: 0;
  }
  
  header {
    background-color: #ffffff;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
  }
  
  h1 {
    margin: 0;
  }
  
  main {
    padding: 20px;
  }
  
  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  
  .jobs {
    display: flex;
    flex-direction: column;
  }
  
  .job {
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
  }
  
  .job h2 {
    margin-top: 0;
  }
  
  .job p {
    margin: 5px 0;
  }
  
  .job p.company {
    color: #888;
    font-weight: bold;
  }
  
  .job p.location {
    color: #888;
  }
  
  .job p.description {
    font-size: 16px;
  }
  
  .apply-button {
    background-color: #0066cc;
    border-radius: 5px;
    color: #ffffff;
    display: inline-block;
    margin-top: 10px;
    padding: 10px 20px;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }
  
  .apply-button:hover {
    background-color: #004b8c;
  }
  
  @media screen and (max-width: 600px) {
    .job {
      padding: 10px;
    }
  
    .job h2 {
      font-size: 24px;
    }
  
    .job p.description {
      font-size: 14px;
    }
  }
  
    </style>
  </head>
  <body>
  <header class="header_area">
        <div class="main-menu">

            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#"><img src="./img/logo.png" alt="logo"  style="width:70px; height: 70px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="mr-auto"></div>
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="home.html">Home <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="Jobs.php">Jobs</a>

                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="apply.html">Get Hired</a>
                      </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <header>
      <h1>Get Hired - Available Jobs</h1>
    </header>
    <main>
      <div class="container">
        <div class="jobs">
          <?php
            // Connect to MySQL database
            $mysqli = new mysqli("localhost", "root", "", "ziarah");
            if ($mysqli->connect_errno) {
              echo "Failed to connect to MySQL: " . $mysqli->connect_error;
              exit();
            }

            // Select all jobs from the database
            $result = $mysqli->query("SELECT * FROM jobs");
            while ($row = $result->fetch_assoc()) {
              // Output each job as a card
              echo "<div class='job'>";
              echo "<h2>" . $row["title"] . "</h2>";
              echo "<p class='company'>" . $row["company"] . "</p>";
              echo "<p class='location'>" . $row["location"] . "</p>";
              echo "<p class='description'>" . $row["description"] . "</p>";
              echo "<a href='apply.html' class='apply-button'>Apply now</a>";
              echo "</div>";
            }

            // Close database connection
            $mysqli->close();
          ?>
        </div>
      </div>
    </main>
  </body>
</html>
