<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['transaction_out'])) {
    $errors = array();
// Check out to:
    $contact_id = trim($_POST['check_out_to']);
    if (empty($contact_id)) {
        $errors[] = 'You forgot contact name.';
    }
// Check for book name:
    $book_id = trim($_POST['book_name']);
    if (empty($book_id)) {
        $errors[] = 'You forgot book name.';
    }
// Checking check out condition:
    $check_out_condition = trim($_POST['check_out_condition']);
    if (empty($check_out_condition)) {
        $errors[] = 'You forgot check out condition.';
    }
// Check for check out date:
    $check_out_date = trim($_POST['check_out_date']);
    if (empty($check_out_date)) {
        $errors[] = 'You forgot check out date.';
    }
// Check for due date:
    $due_date = trim($_POST['due_date']);
    if (empty($due_date)) {
        $errors[] = 'You forgot due date.';
    }
    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "INSERT INTO Transactions ( ContactsID, AssetsID, CheckedOutDate, DueDate, CheckedOutCondition)";
            $query .= "VALUES( ?, ?, ?, ?, ?)";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare, 'sssss', $contact_id, $book_id, $check_out_date, $due_date, $check_out_condition);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Transaction has been added to the database.
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
