<?php require APPROOT . '/views/includes/header.php'; ?>

    <!-- Jumbotron -->
    <div class="jumbotron text-center mt-5">

        <!-- Title -->
        <h2 class="card-title h2">PhoneMailBook</h2>
        <!-- Subtitle -->
        <p class="blue-text my-4 font-weight-bold">Place where you can easily manage your contacts and send emails!</p>

        <!-- Grid row -->
        <div class="row d-flex justify-content-center">

            <!-- Grid column -->
            <div class="col-xl-7 pb-2">

                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga aliquid dolorem ea distinctio exercitationem delectus qui, quas eum architecto, amet quasi accusantium, fugit consequatur ducimus obcaecati numquam molestias hic itaque accusantium doloremque laudantium, totam rem aperiam.</p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <hr class="my-4">

        <div class="pt-2">
            <a href="<?php echo URLROOT ?>/users/login" class="btn btn-light ">Login </a>
            <span class="px-md-5 px-sm-3">or</span>
            <a href="<?php echo URLROOT ?>/users/register" class="btn btn-primary ">Register </a>
        </div>

    </div>
    <!-- Jumbotron -->

<?php require APPROOT . '/views/includes/footer.php'; ?>