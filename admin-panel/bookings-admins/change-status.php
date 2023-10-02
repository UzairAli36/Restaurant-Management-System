<?php require "../../config/config.php"; ?>
<?php require "../../libs/App.php"; ?>
<?php require "../layouts/header.php"; ?>
<?php

$app = new App;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {

        $status = $_POST['status'];

        $query = "UPDATE bookings SET status =:status WHERE id='$id'";

        $arr = [
            ":status" => $status
        ];

        $path = "show-bookings.php";

        $app->update($query, $arr, $path);
    }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Choose Status</h5>
                    <form method="POST" action="change-status.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                        <!-- Status input -->
                        <div class="form-outline mb-4 mt-4">
                            <select name="status" class="form-select  form-control" aria-label="Default select example">
                                <option value="Pending">Pending</option>
                                <option value="Booked">Booked</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-outline-primary  mb-4 text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require "../layouts/footer.php"; ?>