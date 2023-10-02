<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$query = "SELECT * FROM users";
$app = new APP;
$app->validateSessionAdminInside();
$users = $app->selectAll($query);

?>

<div class="container-fluid">
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-4 d-inline">Users</h5>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($users as $user) : ?>
              <tr>
                <th scope="row"><?php echo $user->id; ?></th>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->email; ?></td>
                <td><?php echo $user->created_at; ?></td>
                <td><a href="delete-users.php?id=<?php echo $user->id; ?>" class="btn btn-outline-danger  text-center ">Delete</a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php require "../layouts/footer.php"; ?>