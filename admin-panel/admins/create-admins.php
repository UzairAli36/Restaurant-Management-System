<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$app = new App;
$app->validateSessionAdminInside();

if (isset($_POST['submit'])) {

  $adminname = $_POST['adminname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query = "INSERT INTO admins (adminname, email, password) VALUES (:adminname, :email, :password)";
  $arr = [
    ":adminname" => $adminname,
    ":email" => $email,
    ":password" => $password,
  ];

  $path = "admins.php";

  $app->register($query, $arr, $path);
}

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">

            <!-- Username input -->
            <div class="form-outline mb-4">
              <input type="text" name="adminname" id="form2Example1" class="form-control" placeholder="username" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4 mt-4">
              <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-outline-primary  mb-4 text-center">Create</button>

          </form>

        </div>
      </div>
    </div>
  </div>

  <?php require "../layouts/footer.php"; ?>