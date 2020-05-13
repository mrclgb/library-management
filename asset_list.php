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
                    <h1 class="h3 mb-0 text-gray-800">Asset List</h1>
                </div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="fa fa-book m-0 font-weight-bold text-info"> Asset List</h6>
                        </div>
                        <div class="container-fluid">
                            <?php if (isset($_SESSION['assetListMsg'])){
                                echo $_SESSION['assetListMsg'];
                                session_destroy();
                            }
                            if(isset($_SESSION['delete_asset'])){
                                echo $_SESSION['delete_asset'];
                                session_destroy();
                            }
                            if(isset($_SESSION['update_asset'])){
                                echo $_SESSION['update_asset'];
                                session_destroy();
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php
                                include_once 'edit/db_connect.php';
                                $query = "SELECT * FROM";
                                $query .= " library_db.Assets";
                                $result = mysqli_query($conn,$query);
                                if (!$result) {
                                    $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                Query Failed!
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";
                                    $_SESSION['assetListMsg'] = $string;
                                    header("Location: contact_list.php");
                                } else {
                                    echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Category</th>";
                                    echo "<th>Book Name</th>";
                                    echo "<th>Manufacturer</th>";
                                    echo "<th>Acquired Date</th>";
                                    echo "<th>Purchased Price</th>";
                                    echo "<th>Current Value</th>";
                                    echo "<th>Book Condition</th>";
                                    echo "<th>Location</th>";
                                    echo "<th>Action</th>";
                                    echo "</tr>";
                                    echo"</thead>";
                                    echo "<tbody>";
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>".$row['Category']."</td>";
                                        echo "<td>".$row['BookName']."</td>";
                                        echo "<td>".$row['Manufacturer']."</td>";
                                        echo "<td>".$row['AcquiredDate']."</td>";
                                        echo "<td>".$row['PurchasedPrice']."</td>";
                                        echo "<td>".$row['CurrentValue']."</td>";
                                        echo "<td>".$row['BookCondition']."</td>";
                                        echo "<td>".$row['Location']."</td>";
                                        echo "<td><a class='btn btn-danger btn-sm' href=edit/delete_asset.php?id_number=".$row['AssetsID'].">
                                        <i class='fas fa-trash fa-sm'> Delete</i></a>";
                                        echo "<a class='btn btn-info btn-sm' href=edit_update_asset.php?id_number=".$row['AssetsID'].">
                                        <i class='fa fa-edit fa-sm'>Update</i></a></td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";
                                    echo "</table>";
                                    mysqli_close($conn);
                                }
                                ?>
                            </div>
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

</body>

</html>
