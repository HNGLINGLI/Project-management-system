<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo.png" rel="icon">
  <title>Project Management</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
  <link href="css/project-management.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="img/logo.png">
        </div>
        <div class="sidebar-brand-text mx-3">Project Management</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Management</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">管理畫面</h6>
            <a class="collapse-item" href="simple-tables.html">Project Management</a>
            <a class="collapse-item" href="datatables.php">Engineer Directory</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="calendar.php">
          <i class="fas fa-fw fa-calendar"></i>
          <span>Meetings</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="submit.html">
          <i class="fas fa-fw fa-upload"></i>
          <span>Submission</span>
        </a>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="submit.html">
        <i class="fas fa-fw fa-bell"></i>
        <span>Notifications</span>
      </a>
    </li>
      <hr class="sidebar-divider">
    </ul>
      
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                      aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
          
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
       <!-- Container Fluid -->
<div class="container-fluid" id="container-wrapper">
  <!-- Row for Button and Table Content -->
  <div class="row">
    <div class="col-lg-12 mb-4 d-flex align-items-center justify-content-between">
      <!-- Status Tables Header Row -->
      <div class="d-sm-flex align-items-start">
        <h1 class="h3 mb-0 text-gray-800">Status Tables</h1>
      </div>
      <!-- Big Button aligned on the right with spacing -->
      <div>
        <button type="button" class="btn btn-primary btn-lg ms-3" data-toggle="modal" data-target="#createProjectModal">
          + Create New Project
        </button>
      </div>
    </div>

    <div class="col-lg-12 mb-4">

              <!-- Simple Tables -->
<div class="card">
  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Engineer project status table</h6>
  </div>
  <div class="table-responsive">
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th>Project Name</th>
          <th>Engineer</th>
          <th>Project Description</th>
          <th>Deadline</th>
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Example query to get project data (assuming your connection and query are set up)
          $query = "SELECT project_name, engineer, project_description, deadline, status FROM projects";
          $result = mysqli_query($connection, $query);

          // Loop through each row of results and display it
          while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td><a href='#'>{$row['project_name']}</a></td>";
            echo "<td>{$row['engineer']}</td>";
            echo "<td>{$row['project_description']}</td>";
            echo "<td>{$row['deadline']}</td>"; 
            echo "<td><span class='badge badge-" . getStatusBadge($row['status']) . "'>{$row['status']}</span></td>";
            echo "<td><a href='#' class='btn btn-sm btn-primary' data-toggle='modal' data-target='#detailModal'>Detail</a></td>";
            echo "</tr>";
          }

          // Function to determine the badge color based on status
          function getStatusBadge($status) {
            switch($status) {
              case 'Delivered': return 'success';
              case 'Shipping': return 'warning';
              case 'Pending': return 'danger';
              case 'Processing': return 'info';
              default: return 'secondary';
            }
          }
        ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer"></div>
</div>

          <!-- Detail Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Project Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <h6>Latest Report</h6>
          <p id="latest-report">No recent report available.</p>
        </div>
        <hr>
        <div>
          <h6>Engineer Notes</h6>
          <p id="engineer-notes">No notes provided.</p>
        </div>
        <div id="see-more-section" class="d-none">
          <hr>
          <h6>Additional Details</h6>
          <p>Last Report: <a href="#" id="last-report-link">Click here to see the last report</a></p>
        </div>
        <button id="see-more-btn" class="btn" style="background-color: #ffffff; color: rgb(169, 81, 81); font-size: 1rem; border: none; padding: 5px 10px; cursor: pointer; transition: background-color 0.3s ease;">
          See more >>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- create project modal Structure -->
<div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createProjectModalLabel">Create New Project</h5>
        <!-- Close button with the 'X' icon -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> <!-- "X" symbol -->
        </button>
      </div>
      <div class="modal-body">
          <form>
          <form action="add_project.php" method="POST">
          <!-- Project Name -->
          <div class="mb-3">
            <label for="projectName" class="form-label">Project Name</label>
            <input type="text" id="project_name" name="project_name" required><br>
          </div>

          <!-- Project Description -->
          <div class="mb-3">
            <label for="projectDescription" class="form-label">Project Description</label>
            <textarea id="project_description" name="project_description"></textarea><br>
          </div>

          <!-- Assigned Engineers (multi-select) -->
         <div class="mb-3">
           <label for="assignedEngineers" class="form-label">Assigned Engineers</label>
           <select id="engineer_id" name="engineer_id">
        <!-- Options will be populated dynamically from the Engineers table -->
    </select><br>
       </div>

       <!-- Project deadline -->
       <div class="mb-3">
        <label for="projectDeadline" class="form-label">Deadline</label>
        <input type="date" id="deadline" name="deadline" required><br>
       </div>

          <!-- Project Status -->
          <div class="mb-3">
          <select id="status" name="status">
        <option value="Not Started">Not Started</option>
        <option value="In Progress">In Progress</option>
        <option value="Pending">Pending</option>
        </select><br>
          <!-- Urgent Checkboodalx -->
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="urgent">
            <label class="form-check-label" for="urgent">
              Mark as Urgent
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" input type="submit" value="Create Project" class="btn btn-primary" onclick="submitForm()">Create Project</button>
      </div>
    </div>
  </div>
</div>

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>© 2024 黃伶俐/Cindy</p>
            </div>

        <!---Container Fluid-->
      </div>
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/project-management.js"></script>

</body>

</html>