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
                    <h1 class="h3 mb-0 text-gray-800">Transaction Management</h1>
                </div>
                <div class="container-fluid">
                    <?php
                    //            ini_set('display_errors', 'On');
                    //            error_reporting(E_ALL);
                    if (isset($_SESSION['check_out'])){
                        $msg = $_SESSION['check_out'];
                        echo $msg;
                        session_destroy();
                    }
                    ?>
                </div>
            </div>
            <hr>
            <br><br>
            <div class="container-fluid">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="check_out-tab" data-toggle="tab" href="#check_out" role="tab"
                           aria-controls="check_out" aria-selected="true">Check Out</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="check_in-tab" data-toggle="tab" href="#check_in" role="tab"
                           aria-controls="check_in" aria-selected="false">Check In</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="check_out" role="tabpanel" aria-labelledby="check_out-tab">
                        <section><br>
                            <form action="edit/check_out.php" method="post">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="check_out_to">Checked Out To</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="check_out_to" id="check_out_to" required>
                                            <optgroup label="Contact">
                                            <?php
                                            include_once 'edit/db_connect.php';
                                            $query1 = "SELECT ContactsID, FirstName, LastName";
                                            $query1 .= " FROM Contacts";
                                            $result = mysqli_query($conn, $query1);
                                            if ($result) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    }
                                                    <option value="<?php echo $row["ContactsID"]; ?>">
                                                    <?php echo $row["FirstName"]." ".$row["LastName"]; ?></option>
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
                                <div class="form-group row">
                                <label class="col-md-4 col-form-label" for="book_name">Available Book</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="book_name" id="book_name" required>
                                        <optgroup label="Book Name">
                                            <?php
                                            $query2 = "SELECT Assets.AssetsID, Assets.BookName ";
                                            $query2 .= "FROM Assets ";
                                            $result = mysqli_query($conn, $query2);
                                            if ($result) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    }
                                                    <option value="<?php echo $row["AssetsID"]; ?>">
                                                        <?php echo $row["BookName"]; ?></option>
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
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="check_out_condition">Checked Out Condition</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="check_out_condition" id="check_out_condition" required>
                                            <optgroup label="Checked Out Condition">
                                                <option value="good" selected>Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="useless">Useless</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    function checkOutDate() {
                                        var date = new Date();
                                        var currentDate = date.toISOString().slice(0,10);
                                        document.getElementById("check_out_date").value = currentDate;
                                    }
                                </script>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="check_out_date">Checked Out Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="check_out_date" id="check_out_date"
                                               required>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" onclick="checkOutDate()" class="btn btn-info">Today</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="due_date">Due Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" name="transaction_out" value="Update">
                                <hr>
                            </form>
                        </section>
                    </div>
                    <div class="tab-pane" id="check_in" role="tabpanel" aria-labelledby="check_in-tab">
                        <section><br>
                            <form action="edit/check_in.php" method="post">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="check_in_from">Checked In From(Checked Out Book)</label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="check_in_from" id="check_in_from" required>
                                            <optgroup label="Contact">
                                            <?php
                                            $query3 = "SELECT Transactions.TransactionsID, Contacts.FirstName, Contacts.LastName, Assets.BookName ";
                                            $query3 .= "FROM Transactions ";
                                            $query3 .= "JOIN Assets ON Transactions.AssetsID = Assets.AssetsID ";
                                            $query3 .= "JOIN Contacts ON Contacts.ContactsID = Transactions.ContactsID ";
                                            $query3 .= "WHERE Transactions.CheckedInDate IS NULL";
                                            $result = mysqli_query($conn, $query3);
                                            if ($result) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <option value="<?php echo $row["TransactionsID"]; ?>">
                                                        <?php echo $row["FirstName"]." ".$row["LastName"]."(".$row["BookName"].")"; ?></option>
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
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="check_in_condition">Checked In Condition</label><br>
                                    <div class="col-md-6">
                                        <select class="form-control" name="check_in_condition" id="check_in_condition" required>
                                            <optgroup label="Checked In Condition">
                                                <option value="good" selected>Good</option>
                                                <option value="fair">Fair</option>
                                                <option value="useless">Useless</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <script>
                                    function checkInDate() {
                                        var date = new Date();
                                        var currentDate = date.toISOString().slice(0,10);
                                        document.getElementById("check_in_date").value = currentDate;
                                    }
                                </script>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label" for="check_in_date">Checked In Date</label>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="check_in_date" id="check_in_date" required>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" onclick="checkInDate()" class="btn btn-info">Today</button>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-info" name="transaction_in" value="Update">
                                <hr>
                            </form>
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