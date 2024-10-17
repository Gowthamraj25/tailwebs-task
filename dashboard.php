<?php
include('db_connect.php'); 

session_start();

if(!isset($_SESSION['session_name'])){
  echo '<script>
      alert("Access denied. Please login!");
      window.location.href="index.php";
      </script>';die;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">

  <title>Dashboard | tailwebs.</title>

  <!-- Fonts and icons -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <!-- Sweet Alert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  
  <?php include('sidebar.php'); ?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <?php include('navbar.php'); ?>

    <div class="container-fluid py-4">
      <div class="row gy-3">
        <div class="col-md-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">group</i>
              </div>

              <?php
                $student_query = "SELECT COUNT(*) FROM students";
                $student_result = mysqli_query($conn,$student_query);
                $student_row = mysqli_fetch_array($student_result);
              ?>

              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">No. of Students</p>
                <h4 class="mb-0"><?php echo $student_row[0]; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $student_row[0]; ?> </span> - No of Students Registered</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>

              <?php
                $user_query = "SELECT COUNT(*) FROM admin";
                $user_result = mysqli_query($conn,$user_query);
                $user_row = mysqli_fetch_array($user_result);
              ?>

              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0"><?php echo $user_row[0]; ?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><?php echo $user_row[0]; ?> </span> - No of Users Registered</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div>
                <canvas id="myChart" class="w-75 h-75"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card h-100">
              <div class="card-header pb-0 p-3">
                <div class="row">
                  <div class="col-6 d-flex align-items-center">
                    <h6 class="mb-0">Recently Added Students</h6>
                  </div>
                  <div class="col-6 text-end">
                    <a href="students.php" class="btn btn-outline-primary btn-sm mb-0">View All</a>
                  </div>
                </div>
              </div>
              <div class="card-body p-3 pb-0">
                <ul class="list-group">
                  
                  <?php
                    $latest_students = "SELECT * FROM students ORDER BY id DESC LIMIT 5";
                    $latest_result = mysqli_query($conn, $latest_students);

                    while($latest_row = mysqli_fetch_array($latest_result)) {
                  ?>

                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark font-weight-bold text-sm"><?php echo $latest_row['name']; ?></h6>
                    </div>
                    <div class="d-flex align-items-center text-sm">
                      <?php echo $latest_row['subject']; ?>
                      <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><?php echo $latest_row['mark']; ?></button>
                    </div>
                  </li>

                  <?php } ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php include('footer.php'); ?>
      
    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>

  <?php
    $chart_query = "SELECT
        SUM(CASE WHEN mark BETWEEN 91 AND 100 THEN 1 ELSE 0 END) AS '91-100',
        SUM(CASE WHEN mark BETWEEN 81 AND 90 THEN 1 ELSE 0 END) AS '81-90',
        SUM(CASE WHEN mark BETWEEN 61 AND 80 THEN 1 ELSE 0 END) AS '61-80',
        SUM(CASE WHEN mark BETWEEN 36 AND 60 THEN 1 ELSE 0 END) AS '36-60',
        SUM(CASE WHEN mark BETWEEN 1 AND 35 THEN 1 ELSE 0 END) AS '1-35'
      FROM students";
    $chart_result = mysqli_query($conn, $chart_query);
    $chart_row = mysqli_fetch_array($chart_result);
  ?>

  <script> 
    const coursesData = { 
      labels: ['91-100', '81-90', 
          '61-80', '36-60', '1-35'], 
      datasets: [{ 
        data: [<?php echo $chart_row['91-100']; ?>, <?php echo $chart_row['81-90']; ?>, <?php echo $chart_row['61-80']; ?>, <?php echo $chart_row['36-60']; ?>, <?php echo $chart_row['1-35']; ?>], 
        backgroundColor: ['#FF6384', '#36A2EB', 
            '#FFCE56', '#4CAF50', '#9C27B0'], 
      }], 
    }; 

    const config = { 
      type: 'doughnut', 
      data: coursesData, 
      options: { 
        plugins: { 
            title: { 
                display: true, 
                text: 'Students Marks Wise Data', 
            }, 
        }, 
      }, 
    }; 
    const ctx = document.getElementById('myChart').getContext('2d'); 
        
    new Chart(ctx, config); 
  </script>
</body>

</html>