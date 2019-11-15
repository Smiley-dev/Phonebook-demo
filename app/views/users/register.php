<?php require APPROOT . '/views/includes/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-white mt-5">
                <h2>Create an account</h2>
                <p>Please fill out this form to register</p>
                <form action="<?php echo URLROOT?>/users/register" method="post">

                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg
                        <?php echo ((!empty($data['errors']['name'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['name']; ?>">
                        <span class="invalid-feedback"><?php echo $data['errors']['name']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg
                        <?php echo (!empty($data['errors']['email']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>">
                        <span class="invalid-feedback"><?php echo $data['errors']['email']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg
                        <?php echo (!empty($data['errors']['password']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['errors']['password']; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm password: <sup>*</sup></label>
                        <input type="password" name="confirm_password" class="form-control form-control-lg
                        <?php echo (!empty($data['errors']['confirm_password']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['confirm_password']; ?>">
                        <span class="invalid-feedback"><?php echo $data['errors']['confirm_password']; ?></span>
                    </div>

                    <div class="row">
                        <div class="col">
                            <input type="submit" class="btn btn-primary btn-block" value="Register">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT ?>/users/login" class="btn btn-secondary btn-block">Already have account? Login</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>