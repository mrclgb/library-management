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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
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
                    <h1 class="h3 mb-0 text-gray-800">Asset List</h1>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="fa fa-book m-0 font-weight-bold text-info"> Asset List</h6>
                        </div>
                        <div class="container-fluid"><br>
                            <?php
                            if (isset($_SESSION['updateAsset'])) {
                                echo $_SESSION['updateAsset'];
                                session_destroy();
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <form action="edit/update_asset.php" method="post">
                                <div class="table-responsive">
                                    <?php
                                    include_once 'edit/db_connect.php';
                                    if (isset($_GET)) {
                                        $id = $_GET['id_number'];
                                    }
                                    $query = "SELECT * FROM";
                                    $query .= " Assets ";
                                    $query .= "WHERE AssetsID = $id";
                                    $result = mysqli_query($conn, $query);
                                    if (!$result) {
                                        $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Query Failed!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                                        $_SESSION['updateAsset'] = $string;
                                    } else {
                                        echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Assets ID</th>";
                                        echo "<th>Category</th>";
                                        echo "<th>Book Name</th>";
                                        echo "<th>Manufacturer</th>";
                                        echo "<th>Acquired Date</th>";
                                        echo "<th>Purchased Price</th>";
                                        echo "<th>Current Value</th>";
                                        echo "<th>Book Condition</th>";
                                        echo "<th>Location</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        echo "<tbody>";
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                            echo "<td><input type='hidden' maxlength='11' requried name='id' value='".$row['AssetsID']."'>".$id."</td>";
                                            echo "<td><input maxlength='45' requried name='category' value='".$row['Category']."'></td>";
                                            echo "<td><input maxlength='100' requried name='book_name' value='".$row['BookName']."'></td>";
                                            echo "<td><input maxlength='45' requried name='manufacturer' value='".$row['Manufacturer']."'></td>";
                                            echo "<td><input type='date' maxlength='10' requried name='acquired_date' value='".$row['AcquiredDate']."'></td>";
                                            echo "<td><input maxlength='45' requried name='purchased_price' value='".$row['PurchasedPrice']."'></td>";
                                            echo "<td><input maxlength='45' requried name='current_value' value='".$row['CurrentValue']."'></td>";
                                            echo "<td><input maxlength='7' requried name='book_condition' value='".$row['BookCondition']."'></td>";
                                            echo "<td><input maxlength='45' requried name='location' value='".$row['Location']."'></td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "<input type='submit' Value='Update' class='btn btn-info' name='updateEditAsset'>";
                                        mysqli_close($conn);
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
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
</div>
<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>

<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


</body>

</html>
