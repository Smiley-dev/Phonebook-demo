<?php require APPROOT . '/views/includes/header.php'; ?>
    <div class="jumbotron text-center mt-5">

        <!-- Title -->
        <h2 class="card-title h2">About <?php echo SITENAME; ?> </h2><small>Version: <?php echo APPVERSION; ?></small>
        <!-- Subtitle -->
        <p class="blue-text my-4 font-weight-bold">Place where you can easily manage your contacts and send emails!</p>

        <!-- Grid row -->
        <div class="row d-flex justify-content-center">

            <!-- Grid column -->
            <div class="col-xl-7 pb-2">

                <p class="card-text">This app is made as part of my learning process and is purely designed to show of my skills
                as a Junior developer. </p>
                <h3>More about app</h3>
                <p class="card-text"><?php echo SITENAME; ?> offers an easy way to menage your contacts. You can create new contacts, add them to different groups(friends, business, family) or edit and delete
                existing ones. It also offers you option to send an email to existing contact. </p>
                <p class="card-text">In order to use <?php echo SITENAME; ?> you need to create an account but since this is just a demo app
                you do not need to confirm your email address so, in order to try this app, feel free to create account with non-existing email address.</p>
                <p class="card-text">I hope you will enjoy using <?php echo SITENAME; ?> and if you have any more questions feel free to
                contact me at <strong>nemanja.gakovic@hotmail.com</strong></p>
                <p class="card-text"><small>Technologies used to make this app: PHP, JavaScript, HTML, CSS, Bootstrap, MYSQL, SendGrid API</small></p>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

        <hr class="my-4">

        <div class="pt-2">
            <a href="<?php echo URLROOT ?>" class="btn btn-secondary btn-block">Back to Homepage </a>
        </div>

    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>