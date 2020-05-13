<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['updateEditComment'])) {
    $errors = array();
// Check out to:
    $id = trim($_POST['id_number']);
    if (empty($id)) {
        $errors[] = 'You forgot Comment ID.';
    }
// Check for comment:
    $comment = trim($_POST['comment']);
    if (empty($comment)) {
        $errors[] = 'You forgot to enter comment.';
    }
    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "UPDATE Comments SET Comments=? WHERE CommentsID=?";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare,'si', $comment, $id);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Comment has been updated.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_comment'] = $string;
                header("location: ../comment_list.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Comment cannot be updated. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_comment'] = $string;
                header("location: ../comment_list.php");
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
        $_SESSION['update_comment'] = $string;
        header("location: ../comment_list.php");
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
    $_SESSION['update_comment'] = $string;
    header("location: ../comment_list.php");
    mysqli_close($conn);
    exit();
}
