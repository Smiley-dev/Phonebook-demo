<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-white mt-5">
            <h2>LogIn</h2>
            <p>Please fill your credentials to Login</p>
            <form action="<?php echo URLROOT?>/users/login" method="post">

                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg
                    <?php echo ((!empty($data['errors']['email'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['errors']['email']; ?></span>
                </div>

                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg
                    <?php echo ((!empty($data['errors']['password'])) ? ' is-invalid' : ''); ?>">
                    <span class="invalid-feedback"><?php echo $data['errors']['password']; ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/users/register" class="btn btn-secondary btn-block">No account? Register</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>