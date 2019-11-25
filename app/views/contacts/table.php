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
            <td class="px-3">
                <form action="<?php echo URLROOT; ?>/contacts/delete/<?php echo $contact->contact_id; ?>" method="post">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
    <?php endforeach;?>


    </tbody>
</table>