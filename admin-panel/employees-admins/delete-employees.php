<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    echo "<script>window.location.href='" . ADMINURL . "' </script>";
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM employees WHERE id = '$id' ";

    $one = $app->selectOne($query);

    unlink("employees-images/" . $one->image);

    $query = "DELETE FROM employees WHERE id = '$id' ";
    $app = new App;
    $path = "show-employees.php";
    $app->delete($query, $path);
}
?>