<?php 
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $page = end($link_array);
?>

<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
  <div class="container-fluid py-1 px-3">
    <!-- Left part: Breadcrumb -->
    <div class="d-flex align-items-center">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="dashboard.php">Home</a></li>
          <?php
            if($page == 'students.php') {
              echo '<li class="breadcrumb-item text-sm text-dark active" aria-current="page">Students</li>';
            }
          ?>
        </ol>
        <h6 class="font-weight-bolder mb-0">
          <?php
            if($page == 'dashboard.php') {
              echo 'Dashboard';
            } else {
              echo 'Students';
            }
          ?>
        </h6>
      </nav>
    </div>

    <!-- Right part: Logout -->
    <div class="collapse navbar-collapse justify-content-end mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item d-flex align-items-center">
          <a type="button" class="nav-link text-body font-weight-bold px-0">
            <i class="fa fa-user me-sm-1"></i>
            <span class="d-inline logout">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->

<script>
  $(".logout").on("click", function (e) {
    e.preventDefault();

    swal({
      title: "Are you sure?",
      text: "If you want to Logout!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = 'logout.php';
      }
    });
  });
</script>