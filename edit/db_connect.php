<?php
//declaring constants
define("username", "library_admin");
define("password", "Asd,car16");
define("host", "localhost");
define("db_name", "library_db");

//trying connection
try {
    $conn = new mysqli(host, username, password, db_name);
    mysqli_set_charset($conn, 'utf8');
} catch (Exception $exception) {
    $exception->getMessage();
} catch (Error $error) {
    $error->getMessage();
}