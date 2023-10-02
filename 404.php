<?php require "config/config.php"; ?>
<?php require "libs/App.php"; ?>
<?php require "includes/header.php"; ?>

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">404</h1>
                <p class="fs-3"> <span class="text-danger">Opps!</span> Page not found.</p>
                <p class="lead">
                    The page you're looking for doesn't exist.
                </p>
                <a href="<?php echo APPURL; ?>" class="btn btn-primary">Go Home</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Navbar & Hero End -->

<?php require "includes/footer.php"; ?>