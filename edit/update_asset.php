<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['updateEditAsset'])) {
    $errors = array();
// Check for id:
    $id = trim($_POST['id']);
    if (empty($id)) {
        $errors[] = 'You forgot asset ID.';
    }
// Check for category:
    $category = trim($_POST['category']);
    if (empty($category)) {
        $errors[] = 'You forgot to enter the book category.';
    }
// Check for book name:
    $bookname = trim($_POST['book_name']);
    if (empty($bookname)) {
        $errors[] = 'You forgot to enter the book name.';
    }
// Checking manufacturer:
    $manufacturer = trim($_POST['manufacturer']);
    if (empty($manufacturer)) {
        $errors[] = 'You forgot the book manufacturer.';
    }
// Check for acquired date:
    $acquired_date = trim($_POST['acquired_date']);
    if (empty($acquired_date)) {
        $errors[] = 'You forgot the book acquired date.';
    }
// Check for purchased price:
    $purchased_price = trim($_POST['purchased_price']);
    if (empty($purchased_price)) {
        $errors[] = 'You forgot the book purchased price.';
    }
// Check for a current value:
    $current_value = trim($_POST['current_value']);
    if (empty($current_value)) {
        $errors[] = 'You forgot the book value.';
    }
// Check for a condition:
    $condition = trim($_POST['book_condition']);
    if (empty($condition)) {
        $errors[] = 'You forgot to enter the book condition.';
    }
// Check for location:
    $location = trim($_POST['location']);
    if (empty($location)) {
        $errors[] = 'You forgot the book location.';
    }

    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "UPDATE Assets SET Category=?, BookName=?, Manufacturer=?, AcquiredDate=?, PurchasedPrice=?, CurrentValue=?, BookCondition=?, Location=? WHERE AssetsID=?";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare,'ssssssssi', $category, $bookname, $manufacturer, $acquired_date, $purchased_price, $current_value, $condition, $location, $id);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Contact has been updated.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_asset'] = $string;
                header("location: ../asset_list.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Contact cannot be updated. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_asset'] = $string;
                header("location: ../asset_list.php");
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
        $_SESSION['update_asset'] = $string;
        header("location: ../asset_list.php");
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
    $_SESSION['update_asset'] = $string;
    header("location: ../asset_list.php");
    mysqli_close($conn);
    exit();
}
