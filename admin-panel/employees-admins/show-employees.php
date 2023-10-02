<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$query = "SELECT * FROM employees";
$app = new APP;
$app->validateSessionAdminInside();
$employees = $app->selectAll($query);

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <a href="Add-New-Employees.php" class="btn btn-outline-primary mb-4 text-center float-right">Add New Employees</a>
          <?php if ($employees > 0) : ?>
            <h5 class="card-title mb-4 d-inline">Employees</h5>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Image</th>
                  <th scope="col">Employee Name</th>
                  <!-- <th scope="col">Phone Number</th> -->
                  <!-- <th scope="col">Address</th> -->
                  <th scope="col">Address</th>
                  <th scope="col">Created</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($employees as $employee) : ?>
                  <tr>
                    <th scope="row"><?php echo $employee->id; ?></th>
                    <td><img src="../../img/<?php echo $employee->image; ?>" style="width: 60px; height: 50px;"></td>
                    <td><?php echo $employee->employee_name; ?></td>
                    <td><?php echo $employee->employee_designation; ?></td>
                    <td><?php echo $employee->created_at; ?></td>
                    <td><a href="delete-employees.php?id=<?php echo $employee->id; ?>" class="btn btn-outline-danger  text-center ">Delete</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else : ?>
            <p>Please add new employees</p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <?php require "../layouts/footer.php"; ?>