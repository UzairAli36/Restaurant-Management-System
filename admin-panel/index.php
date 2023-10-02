<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "layouts/header.php"; ?>
<?php

$app = new App;
$app->validateSessionAdminInside();

$query = "SELECT COUNT(*) AS count_admins FROM admins";
$count_admins = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_orders FROM orders";
$count_orders = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_employees FROM employees";
$count_employees = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_foods FROM foods";
$count_foods = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_bookings FROM bookings";
$count_bookings = $app->selectOne($query);

$query = "SELECT COUNT(*) AS count_users FROM users";
$count_users = $app->selectOne($query);

?>

<div class="container-fluid">

  <div class="row">

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Admins</h5>
          <p class="card-text">Number of admins: <?php echo $count_admins->count_admins; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Orders</h5>
          <p class="card-text">Number of orders: <?php echo $count_orders->count_orders; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Employees</h5>
          <p class="card-text">Number of foods: <?php echo $count_employees->count_employees; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Foods</h5>
          <p class="card-text">Number of foods: <?php echo $count_foods->count_foods; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Bookings</h5>
          <p class="card-text">Number of bookings: <?php echo $count_bookings->count_bookings; ?></p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Users</h5>
          <p class="card-text">Number of users: <?php echo $count_users->count_users; ?></p>
        </div>
      </div>
    </div>

  </div>
  <?php require "layouts/footer.php"; ?>