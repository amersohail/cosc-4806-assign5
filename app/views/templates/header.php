<?php
    require_once 'app/models/User.php';
    // Load the User model
    $user = new User();
?>
  
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COSC 4806</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="app/styles/style.css" rel="stylesheet">
  </head>
  
    <body>
      
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
          <div class="container">
              <a class="navbar-brand" href="#">COSC 4806</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavDropdown">
                  <ul class="navbar-nav me-auto">
                      <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="/home">Home</a>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              Reminders
                          </a>
                          <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="/reminders/">View Reminders</a></li>
                              <li><a class="dropdown-item" href="/reminders/create">Create Reminder</a></li>
                              <li><a class="dropdown-item" href="/reminders/edit">Update/Delete Reminders</a></li>
                          </ul>
                        <?php
                        // Check if isadmin session variable is set and equals 1
                          // Check if the user is admin
                          if ($user->isAdmin()) {
                              echo '<li class="nav-item">
                                        <a class="nav-link" href="/reports/">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-bar-graph me-1" viewBox="0 0 16 16">
                                                <path d="M2 2a.75.75 0 0 1 .75-.75h4.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 2zM8.75 0a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-1.5 0V.75A.75.75 0 0 1 8.75 0zm5.5 11.25a.75.75 0 0 1-.75.75H10.5a.75.75 0 0 1 0-1.5h3a.75.75 0 0 1 .75.75zM5.75 5a.75.75 0 0 1 .75.75v5.5a.75.75 0 0 1-1.5 0V5.75a.75.75 0 0 1 .75-.75zm3-2.5a.75.75 0 0 1 .75.75v8a.75.75 0 0 1-1.5 0v-8a.75.75 0 0 1 .75-.75z"/>
                                            </svg>
                                            Admin Reports
                                        </a>
                                    </li>';
                          }
                        ?>
                      </li>
                  </ul>
                  <ul class="navbar-nav ms-auto">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php echo $_SESSION['username']; ?>
                          </a>
                          <ul class="dropdown-menu dropdown-menu-end">
                              <li><a class="dropdown-item" href="/logout">Logout</a></li>
                          </ul>
                      </li>
                  </ul>
              </div>
          </div>
      </nav>