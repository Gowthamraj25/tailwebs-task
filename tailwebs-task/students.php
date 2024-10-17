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

  <title>Students | tailwebs.</title>

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
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Students Table</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Subject</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mark</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      $query = "SELECT * FROM students ORDER BY id DESC";
                      $result = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_array($result)) {
                    ?>

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="assets/img/team-2.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $row['name']; ?></h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center"><?php echo $row['subject']; ?></td>
                      <td class="align-middle text-center"><?php echo $row['mark']; ?></td>
                      <td class="align-middle text-center">
                        <a href="#" class="font-weight-bold text-sm edit-btn btn btn-warning btn-sm" data-bs-toggle="modal" 
                          data-bs-target="#studentEdit" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-subject="<?php echo $row['subject']; ?>" data-mark="<?php echo $row['mark']; ?>">
                          Edit
                        </a>
                        <a type="button" id="<?php echo $row['id']; ?>" class="font-weight-bold btn btn-danger btn-sm delete_record">Delete</a>
                      </td>
                    </tr>

                    <?php } ?>

                  </tbody>
                </table>
              </div>
            </div>

            <div class="m-3">
              <button type="button" class="btn btn-dark w-25" data-bs-toggle="modal" data-bs-target="#studentCreate">
                Add 
              </button>
            </div>

          </div>
        </div>
      </div>

      <!-- Student Create Modal -->
      <div class="modal fade" id="studentCreate" tabindex="-1" aria-labelledby="studentCreateLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body p-5">
              <form role="form" id="studentCreateForm" class="text-start">
                <div class="input-group input-group-outline my-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" name="subject" class="form-control" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label for="mark" class="form-label">Mark</label>
                  <input type="text" name="mark" class="form-control" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-primary w-50 my-4 mb-2">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Student Edit Modal -->
      <div class="modal fade" id="studentEdit" tabindex="-1" aria-labelledby="studentEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-body p-5">
              <form role="form" id="studentEditForm" class="text-start">
                <input type="hidden" name="id">
                <div class="input-group input-group-outline my-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label for="subject" class="form-label">Subject</label>
                  <input type="text" name="subject" class="form-control" required>
                </div>
                <div class="input-group input-group-outline my-3">
                  <label for="mark" class="form-label">Mark</label>
                  <input type="text" name="mark" class="form-control" required>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-primary w-50 my-4 mb-2">Edit</button>
                </div>
              </form>
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
  <script src="assets/js/material-dashboard.min.js?v=3.1.0"></script>

  <script>
    $(document).ready(function(){

      // student create form submission ajax
      $('#studentCreateForm').on('submit', function(e) {
        e.preventDefault();

        var form = document.getElementById("studentCreateForm");
        var fdata = new FormData(form);

        $.ajax({
          url: "student-submit.php",
          type: "POST",
          data: fdata,
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            if(response == 1) {
                swal({
                  title: "Student Added Successfully!",
                  icon: "success",
                }).then((success) => {
                  window.location.reload();
                });
            } else {
              swal(response);
            }
          },
          error: function () {
            swal("An error occurred", "Please try again later.", "error");
          },
        });
      });
      
      // When the edit button is get student data
      $('.edit-btn').on('click', function(){
        // Get data attributes from the clicked button
        var studentId = $(this).data('id');
        var studentName = $(this).data('name');
        var studentSubject = $(this).data('subject');
        var studentMark = $(this).data('mark');

        // Populate the modal input fields
        $('#studentEditForm input[name="id"]').val(studentId);
        $('#studentEditForm input[name="name"]').val(studentName);
        $('#studentEditForm input[name="subject"]').val(studentSubject);
        $('#studentEditForm input[name="mark"]').val(studentMark);

        // Trigger the 'focus' and 'blur' events to make sure the float labels behave correctly
        $('#studentEditForm input').each(function(){
          if ($(this).val() !== '') {
            $(this).parent('.input-group-outline').addClass('is-filled');
          } else {
            $(this).parent('.input-group-outline').removeClass('is-filled');
          }
        });
      });

      // student edit form submission ajax
      $('#studentEditForm').on('submit', function(e) {
        e.preventDefault();

        var form = document.getElementById("studentEditForm");
        var fdata = new FormData(form);

        $.ajax({
          url: "student-update.php",
          type: "POST",
          data: fdata,
          contentType: false,
          cache: false,
          processData: false,
          success: function (response) {
            if(response == 1) {
                swal({
                  title: "Student Updated Successfully!",
                  icon: "success",
                }).then((success) => {
                  window.location.reload();
                });
            } else {
              swal(response);
            }
          },
          error: function () {
            swal("An error occurred", "Please try again later.", "error");
          },
        });
      });

      // Delete record ajax
      $(".delete_record").on("click", function (e) {
        e.preventDefault();

        var id = $(this).attr('id');

        swal({
          title: "Are you sure?",
          text: "If you want to delete this Record!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              url: "student-delete.php",
              type: "GET",
              data: { id: id },
              success: function (output) {
                if (output == 1) {
                  swal({
                      title: "Record Deleted Successfully!",
                      icon: "success",
                  })
                  .then((success) => {
                      window.location.reload();
                  });
                } else {
                  swal(output);
                }
              },
              error: function () {
                swal("Error deleting the record. Please try again.");
              }
            });
          }
        });
      });
      
    });
  </script>
</body>

</html>