<?php
//ini_set('display_errors', 'On');
//error_reporting(E_ALL);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Library Management</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-university" aria-hidden="true"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Library Management</div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Modules
      </div>

      <!-- Nav Item - List Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa fa-list" aria-hidden="true"></i>
          <span>List</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Total List:</h6>
            <a class="fa fa-address-card collapse-item" href="contact_list.php">&emsp;Contact List</a>
            <a class="fa fa-book collapse-item" href="asset_list.php">&nbsp;&emsp;Asset List</a>
            <a class="fa fa-barcode collapse-item" href="transaction_list.php">&nbsp;&nbsp;&nbsp;Transaction List</a>
            <a class="fa fa-comment collapse-item" href="comment_list.php">&nbsp;&nbsp;&nbsp;Comment List</a>
          </div>
        </div>
      </li>

        <!-- Nav Item - Features Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Features</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Total Features:</h6>
                    <a class="fa fa-address-card collapse-item" href="edit_contact.php">&emsp;Create Contact</a>
                    <a class="fa fa-book collapse-item" href="edit_asset.php">&nbsp;&emsp;Create Asset</a>
                    <a class="fa fa-barcode collapse-item" href="edit_transaction.php">&nbsp;&nbsp;&nbsp;Create Transaction</a>
                </div>
            </div>
        </li>

      <!-- Divider -->

      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Asset Management</h1>
          </div>
        </div>
          <div class="container-fluid">
              <?php
              //            ini_set('display_errors', 'On');
              //            error_reporting(E_ALL);
              if(isset($_SESSION['asset'])) {
                $msg = $_SESSION['asset'];
                echo $msg;
                session_destroy();
              }
              if(isset($_SESSION['commentAlert'])) {
                  $msg = $_SESSION['commentAlert'];
                  echo $msg;
                  session_destroy();
              }
              ?>
          </div>
        <hr><br><br>
        <div class="container-fluid">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Create Asset</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="comments-tab" data-toggle="tab" href="#comments" role="tab" aria-controls="comments" aria-selected="false">Create Comments</a>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane active" id="details" role="tabpanel" aria-labelledby="details-tab">
                  <section>
                      <div class="container"><br>
                          <form action="edit/create_asset.php" method="post">
                              <div class="form-group row">
                                  <label class="col-md-2" for="category">Category</label><br>
                                  <div class="col-md-6">
                                      <select class="form-control" name="category" id="category" required>
                                          <optgroup label="Materials">
                                              <option value="General works" selected>General works</option>
                                              <option value="Philosophy & Psychology">Philosophy & Psychology</option>
                                              <option value="Religion">Religion</option>
                                              <option value="Social Science">Social Science</option>
                                              <option value="Language">Language</option>
                                              <option value="Natural Sciences & Mathematics">Natural Sciences & Mathematics</option>
                                              <option value="Technology [Applied Science]">Technology [Applied Science]</option>
                                              <option value="The Arts, Fine & Decorative Arts">The Arts, Fine & Decorative Arts</option>
                                              <option value="Literature and Rhetoric">Literature and Rhetoric</option>
                                              <option value="Geography & History">Geography & History</option>
                                          </optgroup>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2 col-form-label" for="book_name">Book Name</label>
                                  <div maxlength="100" class="col-md-6">
                                      <input type="text" class="form-control"
                                             value="<?php if (isset($_POST["book_name"])) {
                                                 echo $_POST["book_name"];}?>"
                                             id="book_name" name="book_name" placeholder="Book Name" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2 col-form-label" for="manufacturer">Manufacturer</label>
                                  <div maxlength="45" class="col-md-6">
                                      <input type="text" class="form-control"
                                             value="<?php if (isset($_POST["manufacturer"])) {
                                                 echo $_POST["manufacturer"];}?>"
                                             id="manufacturer" name="manufacturer" placeholder="Manufacturer" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2 col-form-label" for="acquired_date">Acquired Date</label>
                                  <div class="col-md-6">
                                      <input type="date" class="form-control" id="acquired_date" name="acquired_date"  required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2 col-form-label" for="purchased_price">Purchased Price</label>
                                  <div class="col-md-6">
                                      <input maxlength="45" type="text" class="form-control"
                                             value="<?php if (isset($_POST["purchased_price"])) {
                                                 echo $_POST["purchased_price"];}?>"
                                             id="purchased_price" name="purchased_price" placeholder="Purchased Price" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2 col-form-label" for="current_value">Current Value</label>
                                  <div class="col-md-6">
                                      <input maxlength="45" type="text" class="form-control"
                                             value="<?php if (isset($_POST["current_value"])) {
                                                 echo $_POST["current_value"];}?>"
                                             id="current_value" name="current_value" placeholder="Current Value" required>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2" for="condition">Condition</label><br>
                                  <div class="col-md-6">
                                      <select class="form-control" id="condition" name="condition" required>
                                          <optgroup label="Condition">
                                              <option value="good" selected>Good</option>
                                              <option value="fair">Fair</option>
                                              <option value="useless">Useless</option>
                                          </optgroup>
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group row">
                                  <label class="col-md-2" for="location">Location</label><br>
                                  <div class="col-md-6">
                                      <select class="form-control" id="location" name="location" required>
                                          <optgroup label="Location">
                                              <option value="first" selected>First Floor</option>
                                              <option value="second">Second Floor</option>
                                              <option value="third">Third Floor</option>
                                          </optgroup>
                                      </select>
                                  </div>
                              </div>
                              <input type="submit" value="Create" name="asset_submit" class="btn btn-info">
                              <hr>
                          </form>
                      </div>
                  </section>
              </div>
              <div class="tab-pane" id="comments" role="tabpanel" aria-labelledby="comments-tab">
                  <section><br>
                      <form action="edit/create_comment.php" method="post">
                      <div class="form-group row">
                          <label class="col-md-3 col-form-label" for="book_name">Book Name</label>
                          <div class="col-md-6">
                              <select class="form-control" name="book_name" id="book_name" required>
                                  <optgroup label="Book Name">
                                      <?php
                                      include_once 'edit/db_connect.php';
                                      $query = "SELECT AssetsID, BookName ";
                                      $query .= "FROM Assets";
                                      $result = mysqli_query($conn, $query);
                                      if ($result) {
                                          while ($row = mysqli_fetch_array($result)) {
                                      ?>
                                      <option value="<?php echo $row["AssetsID"]; ?>"><?php echo $row["BookName"]; ?></option>
                                      <?php
                                          }
                                      } else {
                                          echo 'something wrong' . mysqli_error($conn);
                                          mysqli_close($conn);
                                      }
                                      ?>
                                  </optgroup>
                              </select>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="row">
                              <div class="col">
                                  <label for="comment">New Comment</label>
                                  <textarea maxlength="200" rows="4" cols="20" class="form-control" name="comment" id="comment" style="resize: vertical"
                                            value="<?php if (isset($_POST["comment"])) {echo $_POST["comment"];} ?>"></textarea><br>
                                  <input type="submit" class="btn btn-info" name="create_comment" value="Add Comment">
                              </div>
                          </div>
                      </div>
                      </form>
                  </section>
                          <br>
                  <hr>
                  <section>
                      <h3>View Comment</h3><br>
                  <div class="form-group">
                      <form action="comment_display.php" method="post">
                          <div class="form-group row">
                              <label class="col-md-3 col-form-label" for="book_id">Book Name</label>
                              <div class="col-md-6">
                                  <select class="form-control" name="book_id" id="book_id" required>
                                      <optgroup label="Book Name">
                                          <?php
                                          $query = "SELECT AssetsID, BookName ";
                                          $query .= "FROM Assets";
                                          $result = mysqli_query($conn, $query);
                                          if ($result) {
                                              while ($row = mysqli_fetch_array($result)) {
                                                  ?>
                                                  <option value="<?php echo $row["AssetsID"]; ?>"><?php echo $row["BookName"]; ?></option>
                                          <?php
                                          mysqli_close($conn);
                                              }
                                          } else {
                                              echo 'something wrong' . mysqli_error($conn);
                                              mysqli_close($conn);
                                          }
                                          ?>
                                      </optgroup>
                                  </select>
                              </div>
                              <div class="col-md-2">
                                  <button type="submit" name="comment_button" class="btn btn-info" ">Open Comment</button>
                              </div>
                          </div>
                      </form>
                      </div>
                      <hr>
                  </section>
              </div>
            </div>
        </div>

      </div>
       <!-- Footer -->
            <footer class="sticky-footer bg-white">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; Library Management Copy & Paste Website 2019</span>
                </div>
              </div>
            </footer>
            <!-- End of Footer -->

          </div>
          <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
