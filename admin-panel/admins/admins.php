<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$query = "SELECT * FROM admins";
$app = new APP;
$app->validateSessionAdminInside();
$admins = $app->selectAll($query);

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Admins</h5>
          <a href="create-admins.php" class="btn btn-outline-primary mb-4 text-center float-right">Create Admins</a>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Admin Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($admins as $admin) : ?>
                <tr>
                  <th scope="row"><?php echo $admin->id; ?></th>
                  <td><?php echo $admin->adminname; ?></td>
                  <td><?php echo $admin->email; ?></td>
                  <td><?php echo $admin->email; ?></td>
                  <td><a href="delete-admins.php?id=<?php echo $admin->id; ?>" class="btn btn-outline-danger  text-center ">Delete</a></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php require "../layouts/footer.php"; ?>