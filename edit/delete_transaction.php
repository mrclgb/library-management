<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_GET)) {
    $errors = array();
// Check for ID Number:
    $id_number = trim($_GET['id_number']);
    if (empty($id_number)) {
        $errors[] = 'You forgot to transaction ID';
    }

    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "DELETE FROM Transactions ";
            $query .= "WHERE TransactionsID=?";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare, 'i', $id_number);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Transaction has been deleted.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['delete_transaction'] = $string;
                header("location: ../transaction_list.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Transaction cannot be deleted. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['delete_transaction'] = $string;
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
        $_SESSION['delete_transaction'] = $string;
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
    $_SESSION['delete_transaction'] = $string;
    header("location: ../transaction_list.php");
    mysqli_close($conn);
    exit();
}
