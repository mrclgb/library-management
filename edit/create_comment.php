<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['create_comment'])) {
    $errors = array();
// Check for comment:
    $comment = trim($_POST['comment']);
    if (empty($comment)) {
        $errors[] = 'You forgot to enter comment.';
    }
// Check for id:
    $id = trim($_POST['book_name']);
    if (empty($id)) {
        $errors[] = 'You forgot to choose the book name.';
    }
    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "INSERT INTO Comments ( AssetsID, Comments)";
            $query .= "VALUES( ?, ?)";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare, 'is', $id, $comment);
//            echo $id, $comment;
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            The comment has been added to the database.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['commentAlert'] = $string;
                header("location: ../edit_asset.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             The comment cannot be added into database. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['commentAlert'] = $string;
                header("location: ../edit_asset.php");
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
        $_SESSION['commentAlert'] = $string;
        header("location: ../edit_asset.php");
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
    $_SESSION['asset'] = $string;
    header("location: ../edit_asset.php");
    mysqli_close($conn);
    exit();
}
