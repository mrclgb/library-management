<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
session_start();
if (isset($_POST['updateEditContact'])) {
    $errors = array();
// Check for a first name:
    $firstname = trim($_POST['first_name']);
    if (empty($firstname)) {
        $errors[] = 'You forgot to enter your first name.';
    }
// Check for a last name:
    $lastname = trim($_POST['last_name']);
    if (empty($lastname)) {
        $errors[] = 'You forgot to enter your last name.';
    }
// Checking date of birth:
    $dob = trim($_POST['dob']);
    if (empty($dob)) {
        $errors[] = 'You forgot date of birth.';
    }
// Check for gender:
    $gender = trim($_POST['gender']);
    if (empty($gender)) {
        $errors[] = 'You forgot to enter your gender.';
    }
// Check for marital status:
    $status = trim($_POST['status']);
    if (empty($status)) {
        $errors[] = 'You forgot your marital status.';
    }
//Optional Spouse Name
    if (empty($_POST['sp'])) {
        $sp = null;
    } else {
        $sp = trim($_POST['sp']);
    }
// Check for a citizenship:
    $citizen = trim($_POST['citizen']);
    if (empty($citizen)) {
        $errors[] = 'You forgot your citizenship.';
    }
// Check for an email address:
    $email = trim($_POST['email']);
    if (empty($email)) {
        $errors[] = 'You forgot to enter your email address.';
    }
// Check for mobilephone:
    $mobilephone = trim($_POST['mobilephone']);
    if (empty($mobilephone)) {
        $errors[] = 'You forgot to enter your mobilephone.';
    }
//Optional homephone:
    if (empty($_POST['telephone'])) {
        $telephone = null;
    } else {
        $telephone = trim($_POST['telephone']);
    }

// Check for ID number:
    $id = trim($_POST['id_number']);
    if (empty($id)) {
        $errors[] = 'You forgot to enter your ID number.';
    }
// Check for address:
    $address = trim($_POST['address']);
    if (empty($address)) {
        $errors[] = 'You forgot to enter your address.';
    }


    if (empty($errors)) {
        try {
            require('db_connect.php');
            $query = "UPDATE Contacts SET FirstName=? ,LastName=?, DateofBirth=?, Gender=?, MaritalStatus=?, 
                        SpouseName=?, Citizen=?, Email=?, MobilePhone=?, HomePhone=?, Address=? WHERE IDNumber=?";
            $prepare = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($prepare, $query);
            mysqli_stmt_bind_param($prepare,'ssssssssssss', $firstname, $lastname, $dob, $gender, $status, $sp, $citizen, $email, $mobilephone, $telephone, $address, $id);
            mysqli_stmt_execute($prepare);
            if (mysqli_stmt_affected_rows($prepare) == 1) {
                $string = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                             Contact has been updated.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_contact'] = $string;
                header("location: ../contact_list.php");
                mysqli_close($conn);
                exit();
            } else {
                $string = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                             Contact cannot be updated. Please contact Web Admin (Wicked) Hahaha.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                            </button>
                            </div>";
                $_SESSION['update_contact'] = $string;
                header("location: ../contact_list.php");
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
        $_SESSION['update_contact'] = $string;
        header("location: ../contact_list.php");
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
    $_SESSION['update_contact'] = $string;
    header("location: ../contact_list.php");
    mysqli_close($conn);
    exit();
}
