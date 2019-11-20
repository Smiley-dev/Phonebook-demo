<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="container">
    <h1 class="mt-5">Add Contact</h1>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-white mt-5">

                <form action="<?php echo URLROOT?>/contacts/addContact" method="post" id="add">

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
                            <option selected value="0">Choose...</option>
                            <option value="1">Family</option>
                            <option value="2">Friends</option>
                            <option value="3">Business</option>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Add Contact">

                </form>
            </div>
        </div>
    </div>
</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>