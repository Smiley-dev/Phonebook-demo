<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom ">
    <div class="container">
        <a class="navbar-brand" href="<?php echo (isset($_SESSION['user_name'])) ? URLROOT . '/contacts' : URLROOT; ?>"><?php echo (isset($_SESSION['user_name'])) ? 'Welcome ' . $_SESSION['user_name'] : SITENAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarsExample07">


            <ul class="navbar-nav">

                <li class="nav-item px-5">
                    <?php if(isset($_SESSION['user_email'])): ?>
                    <a class="nav-link" href="<?php echo URLROOT; ?>/contacts">Contacts</a>
                    <?php else : ?>
                    <a class="nav-link" href="<?php echo URLROOT; ?>">Home</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item px-5">
                    <?php if(isset($_SESSION['user_email'])): ?>
                        <a class="nav-link" href="<?php echo URLROOT; ?>/contacts/emailsSent">Emails</a>
                    <?php else : ?>
                        <a class="nav-link" href="<?php echo URLROOT; ?>/pages/about">About</a>
                    <?php endif; ?>
                </li>


            </ul>

            <ul class="navbar-nav ml-auto">
                <?php if(isset($_SESSION['user_email'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Logout</a>
                    </li>
                <?php else : ?>
                <li class="nav-item mr-5">
                    <a class="nav-link " href="<?php echo URLROOT; ?>/users/login">Log In</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">Register</a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
    </div>

</nav>