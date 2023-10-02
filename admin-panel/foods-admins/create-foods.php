<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$app = new App;
$app->validateSessionAdminInside();

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $price = $_POST['price'];
  $image = $_FILES['image']['name'];
  $description = $_POST['description'];
  $meal_id = $_POST['meal_id'];

  $dir = "foods-images/" . basename($image);

  $query = "INSERT INTO foods (name, price, image, description, meal_id) VALUES (:name, :price, :image, :description, :meal_id)";
  $arr = [
    ":name" => $name,
    ":price" => $price,
    ":image" => $image,
    ":description" => $description,
    ":meal_id" => $meal_id,
  ];

  $path = "show-foods.php";

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
          <h5 class="card-title mb-5 d-inline">Create Food Items</h5>

          <form method="POST" action="create-foods.php" enctype="multipart/form-data">

            <!-- Food name input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Name</label>
              <input type="text" name="name" id="form2Example1" class="form-control" />
            </div>

            <!-- Food price input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Price</label>
              <input type="text" name="price" id="form2Example1" class="form-control" />
            </div>

            <!-- Food image input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Image</label>
              <input type="file" name="image" id="form2Example1" class="form-control" />
            </div>

            <!-- Food description input -->
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Description</label>
              <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <!-- Food type input -->
            <div class="form-outline mb-4 mt-4">
              <label for="exampleFormControlTextarea1">Type</label>
              <select name="meal_id" class="form-select  form-control" aria-label="Default select example">
                <option value="1">Breakfast</option>
                <option value="2">Lunch</option>
                <option value="3">Dinner</option>
              </select>
            </div>

            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-outline-primary  mb-4 text-center">Create</button>

          </form>

        </div>
      </div>
    </div>
  </div>
  <?php require "../layouts/footer.php"; ?>