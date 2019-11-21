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
                <input type="text" class="form-control" placeholder="Search by name" aria-label="Name" aria-describedby="button-addon2">
            </div>
        </div>
    </div>

        <button class="btn btn-secondary mb-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Filters
        </button>

        <div class="collapse mb-3" id="collapseExample">
            <form action="">

            <div class="row">


                    <div class="input-group mb-3 col-md-4">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="groups">Groups</label>
                        </div>
                        <select class="custom-select" id="groups">
                            <option selected>Choose...</option>
                            <option value="1">Family</option>
                            <option value="2">Friends</option>
                            <option value="3">Business</option>
                        </select>
                    </div>

                    <div class="form-check col-md-3 mb-2">
                        <input type="checkbox" class="form-check-input" id="has-email">
                        <label class="form-check-label" for="has-email">Has email</label>
                    </div>

                    <div class="form-check col-md-3 mb-2 ">
                        <input type="checkbox" class="form-check-input" id="has-phone">
                        <label class="form-check-label" for="has-phone">Has phone number</label>
                    </div>

                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" value="Filter">
                    </div>

            </div>

            </form>

        </div>




    <table class="table table-hover table-striped">
        <thead class=" table-primary">
        <tr>

            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th></th>
            <th scope="col">Phone number</th>

            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($data['contacts'] as $contact): ?>
        <tr>
            <td><?php echo $contact->name ?></td>
            <td><?php echo $contact->email ?></td>
            <td><?php echo (!empty($contact->email)) ? '<button class="btn btn-sm btn-primary">Send Email</button>' : '';?> </td>
            <td><?php echo $contact->phone_number ?></td>
            <td class="px-3"><a href="<?php echo URLROOT;?>/contacts/edit/<?php echo $contact->contact_id; ?>" class="btn btn-sm btn-success">Edit</a></td>
            <td class="px-3"><a class="btn btn-sm btn-danger">Delete</a></td>
        </tr>
        <?php endforeach;?>


        </tbody>
    </table>
</div>

<?php require APPROOT . '/views/includes/footer.php'; ?>