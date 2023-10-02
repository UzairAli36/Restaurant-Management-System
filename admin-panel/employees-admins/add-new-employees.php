<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$app = new App;
$app->validateSessionAdminInside();

if (isset($_POST['submit'])) {

  $employee_name = $_POST['employee_name'];
  $image = $_FILES['image']['name'];
  $employee_designation = $_POST['employee_designation'];

  $dir = "employees-images/" . basename($image);

  $query = "INSERT INTO employees (employee_name, image, employee_designation) VALUES (:employee_name, :image, :employee_designation)";
  $arr = [
    ":employee_name" => $employee_name,
    ":image" => $image,
    ":employee_designation" => $employee_designation,
  ];

  $path = "show-employees.php";

  if (move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {
    $app->register($query, $arr, $path);
  }
}

?>
<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-5 d-inline">Add New Employees</h5>

          <form method="POST" action="add-new-employees.php" enctype="multipart/form-data">

            <!-- Employee name input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Employee Name</label>
              <input type="text" name="employee_name" id="form2Example1" class="form-control" />
            </div>

            <!-- Employee image input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Image</label>
              <input type="file" name="image" id="form2Example1" class="form-control" />
            </div>

            <!-- Employees Designation input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Designation</label>
              <input type="text" name="employee_designation" id="form2Example1" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-outline-primary  mb-4 text-center">Add Employee</button>

          </form>

        </div>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php"; ?>