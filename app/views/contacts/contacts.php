<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-9">
            <h1 >Contacts</h1>
        </div>
        <div class="col-3 mb-3">
            <a href="<?php echo URLROOT; ?>/contacts/addContact" class="btn btn-primary">Add Contact</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="input-group mb-3">
                <form action="">
                    <input onkeyup="search(this.value)" type="text" class="form-control" placeholder="Search by name" aria-label="Name" aria-describedby="button-addon2">
                </form>
            </div>
        </div>
    </div>

        <button class="btn btn-secondary mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Filters
        </button>

        <div class="collapse mb-3" id="collapseExample">
            <form action="<?php echo URLROOT; ?>/contacts/filter" method="post">

                <div class="row">


                        <div class="input-group mb-3 col-md-4">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="groups">Groups</label>
                            </div>
                            <select class="custom-select" id="groups" name="group">
                                <option value="0" selected>Choose...</option>
                                <option value="1">Family</option>
                                <option value="2">Friends</option>
                                <option value="3">Business</option>
                            </select>
                        </div>

                        <div class="form-check col-md-3 mb-2">
                            <input type="checkbox" class="form-check-input" id="has-email" name="email">
                            <label class="form-check-label" for="has-email">Has email</label>
                        </div>

                        <div class="form-check col-md-3 mb-2 ">
                            <input type="checkbox" class="form-check-input" id="has-phone" name="phone">
                            <label class="form-check-label" for="has-phone">Has phone number</label>
                        </div>

                        <div class="col-md-2">
                            <input type="submit" class="btn btn-primary" value="Filter">
                        </div>

                </div>

            </form>

        </div>

<div id="table">
    <?php require APPROOT . '/views/contacts/table.php';?>
</div>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>