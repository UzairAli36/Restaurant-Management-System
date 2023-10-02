<?php require "../config/config.php"; ?>
<?php require "../libs/App.php"; ?>
<?php require "../includes/header.php"; ?>
<?php


if (!isset($_SERVER['HTTP_REFERER'])) {
    // redirect them to your desired location
    echo "<script>window.location.href='" . APPURL . "'</script>";
    exit;
}

$query = "SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]' ";
$app = new App;
$cart_items = $app->selectAll($query);

$cart_price = $app->selectOne("SELECT SUM(quantity*price) AS all_price FROM cart WHERE user_id = '$_SESSION[user_id]'");
if (isset($_POST['submit'])) {
    $_SESSION['total_price'] = $cart_price->all_price;
    echo "<script>window.location.href='checkout.php' </script>";
}

?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Cart</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center text-uppercase">
                <li class="breadcrumb-item"><a href="<?php echo APPURL; ?>">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Cart</li>
            </ol>
        </nav>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

<!-- Service Start -->
<div class="container">
    <div class="col-md-12">
        <?php if ($cart_price->all_price > 0) : ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart_items as $cart_item) : ?>
                        <tr>
                            <th><img src="<?php echo APPIMAGES; ?>/<?php echo $cart_item->image; ?>" style="width: 50px; height: 50px;"></th>
                            <td><?php echo $cart_item->name; ?></td>
                            <td><?php echo $cart_item->quantity; ?></td>
                            <td>$<?php echo $cart_item->price; ?></td>
                            <td><a href="<?php echo APPURL; ?>/cart/delete-item.php?id=<?php echo $cart_item->id; ?>" class="btn btn-danger text-white">delete</td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
            <div class="position-relative mx-auto" style="max-width: 400px; padding-left: 679px;">
                <p style="margin-left: -7px;" class="w-19 py-3 ps-4 pe-5" type="text"> Total: $<?php echo $cart_price->all_price; ?></p>
                <form action="cart.php" method="POST">
                    <button type="submit" name="submit" class="btn btn-primary py-2 top-0 end-0 mt-2 me-2">Checkout</button>
                </form>
            </div>
        <?php else : ?>
            <p><b>Your Cart is Empty</b></p>
            <hr>
        <?php endif; ?>
    </div>
</div>
<!-- Service End -->

<?php require "../includes/footer.php"; ?>