<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['updateEditTransaction'])) {
    $errors = array();
// Check out to:
    $id = trim($_POST['id_number']);
    if (empty($id)) {
        $errors[] = 'You forgot transaction ID.';
    }
// Check for check out date:
    $check_out_date = trim($_POST['checkedOut']);
    if (empty($check_out_date)) {
        $errors[] = 'You forgot check out date.';
    }
// Check for due date:
    $due_date = trim($_POST['dueDate']);
    if (empty($due_date)) {
        $errors[] = 'You forgot due date.';
    }
// Checking check out condition:
    $check_out_condition = trim($_POST['checkedOutCondition']);
    if (empty($check_out_condition)) {
        $errors[] = 'You forgot check out condition.';
    }
// Checking check in condition:
    $check_in_condition = trim($_POST['checkedInCondition']);
    if (empty($check_in_condition)) {
        $errors[] = 'You forgot check in conditoin.';
    }
// Check for check in date:
    $check_in_date = trim($_POST['checkedIn']);
    if (empty($check_in_date)) {
        $errors[] = 'You forgot check in date.';
    }
    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "UPDATE Transactions SET CheckedOutDate=?, DueDate=? ,CheckedInDate=?, CheckedOutCondition=?, CheckedInCondition=? WHERE TransactionsID=?";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare,'sssssi', $check_out_date, $due_date, $check_in_date, $check_out_condition, $check_in_condition, $id);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Transaction has been updated.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_transaction'] = $string;
                header("location: ../transaction_list.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Transaction cannot be updated. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_transaction'] = $string;
                header("location: ../transaction_list.php");
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
        $_SESSION['update_transaction'] = $string;
        header("location: ../transaction_list.php");
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
    $_SESSION['update_transaction'] = $string;
    header("location: ../transaction_list.php");
    mysqli_close($conn);
    exit();
}
