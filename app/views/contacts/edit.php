<?php require APPROOT . '/views/includes/header.php'; ?>
    <div class="container">
        <h1 class="mt-5">Edit Contact</h1>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card card-body bg-white mt-5">

                    <form action="<?php echo URLROOT?>/contacts/edit/<?php echo $data['id']; ?>" method="post" id="add">

                        <div class="form-group">
                            <label for="name">Name: <sup>*</sup></label>
                            <input type="text" name="name" class="form-control form-control-lg
                        <?php echo ((!empty($data['errors']['name'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['name']; ?>">
                            <span class="invalid-feedback"><?php echo $data['errors']['name']; ?></span>

                        </div>

                        <div class="form-group">
                            <label for="email">Email: </label>
                            <input type="email" name="email" class="form-control form-control-lg
                        <?php echo ((!empty($data['errors']['email'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>">
                            <span class="invalid-feedback"><?php echo $data['errors']['email']; ?></span>

                        </div>

                        <div class="form-group">
                            <label for="phone">Phone number: </label>
                            <input type="text" name="phone" class="form-control form-control-lg
                        <?php echo ((!empty($data['errors']['phone_number'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['phone_number']; ?>">
                            <span class="invalid-feedback"><?php echo $data['errors']['phone_number']; ?></span>

                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="groups">Select group:</label>
                            </div>
                            <select class="custom-select" id="groups" name="groups" form="add">
                                <option <?php echo ($data['group'] == '0') ? 'selected' : '' ?> value="0">Choose...</option>
                                <option <?php echo ($data['group'] == '1') ? 'selected' : '' ?> value="1">Family</option>
                                <option <?php echo ($data['group'] == '2') ? 'selected' : '' ?> value="2">Friends</option>
                                <option <?php echo ($data['group'] == '3') ? 'selected' : '' ?> value="3">Business</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Edit Contact">

                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>