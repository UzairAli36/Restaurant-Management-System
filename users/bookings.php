<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php

if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    echo "<script>window.location.href='" . APPURL . "' </script>";
    exit;
}

$query = "SELECT * FROM bookings WHERE user_id = '$_SESSION[user_id]' ";
$app = new App;
$bookings = $app->selectAll($query);

?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Your Bookings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Bookings</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

<!-- Service Start -->
<div class="container">
    <div class="col-md-12">
        <?php if ($bookings > 0) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Persons</th>
                        <th scope="col">Requests</th>
                        <th scope="col">Status</th>
                        <th scope="col">Reviews</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) : ?>
                        <tr>
                            <th><?php echo $booking->name; ?></th>
                            <td><?php echo $booking->email; ?></td>
                            <td><?php echo $booking->date_booking; ?></td>
                            <td><?php echo $booking->num_people; ?></td>
                            <td><?php echo $booking->special_request; ?></td>
                            <td><?php echo $booking->status; ?></td>
                            <?php if ($booking->status == "Done") : ?>
                                <td><a href="<?php echo APPURL; ?>/users/review.php" class="btn btn-success text-white">Review Us</td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <p><b>You do not have any bookings for now</b></p>
                    <hr>
                <?php endif; ?>
                </tbody>
            </table>
    </div>
</div>
<!-- Service End -->


<?php require "../includes/footer.php"; ?>