<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['transaction_in'])) {
    $errors = array();
// Check in from:
    $check_in_from = trim($_POST['check_in_from']);
    if (empty($check_in_from)) {
        $errors[] = 'You forgot who check in. Ghost?';
    }
// Checking check in condition:
    $check_in_condition = trim($_POST['check_in_condition']);
    if (empty($check_in_condition)) {
        $errors[] = 'You forgot check in condition.';
    }
// Check for check in date:
    $check_in_date = trim($_POST['check_in_date']);
    if (empty($check_in_date)) {
        $errors[] = 'You forgot check in date.';
    }
    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "UPDATE Transactions ";
            $query .= "SET CheckedInDate=? , CheckedInCondition=? ";
            $query .= "WHERE TransactionsID=? ";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare, 'ssi', $check_in_date, $check_in_condition, $check_in_from);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Transaction has been updated to the database.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['check_out'] = $string;
                header("location: ../edit_transaction.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Transaction error. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['check_out'] = $string;
                header("location: ../edit_transaction.php");
                mysqli_close($conn);
                exit();
            }
        } catch (Exception $e) {
            echo 'exception ' . $e->getMessage();
        } catch (Error $e) {
            echo 'error ' . $e->getMessage();
        }
    } else {
        $string = "";
        foreach ($errors as $e) {
            $string .= "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                $e
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                    </div>";
        }
        $_SESSION['check_out'] = $string;
        header("location: ../edit_transaction.php");
        mysqli_close($conn);
        exit();
    }
} else {
    $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
               Your form is empty! Please fill up your form!
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
               </button>
               </div>";
    $_SESSION['check_out'] = $string;
    header("location: ../edit_transaction.php");
    mysqli_close($conn);
    exit();
}
