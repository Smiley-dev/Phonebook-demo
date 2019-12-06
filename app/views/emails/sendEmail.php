<?php require APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <h1 class="mt-4">Send email</h1>
    <form action="<?php echo URLROOT;?>/emails/send/<?php echo $data['contact_id']?>" method="post">

        <div class="form-group">
            <label for="to">To <sup>*</sup></label>
            <input type="email" name="to" class="form-control form-control-lg<?php echo ((!empty($data['errors']['to'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['to']; ?>">
            <span class="invalid-feedback"><?php echo $data['errors']['to']; ?></span>
        </div>

        <div class="form-group">
            <label for="subject">Subject <sup>*</sup></label>
            <input type="text" name="subject" class="form-control form-control-lg<?php echo ((!empty($data['errors']['subject'])) ? ' is-invalid' : ''); ?>" value="<?php echo $data['subject']; ?>">
            <span class="invalid-feedback"><?php echo $data['errors']['subject']; ?></span>
        </div>

        <div class="form-group">
            <label for="body">Email content <sup>*</sup></label>
            <textarea name="body" rows="10" class="form-control rounded-0<?php echo ((!empty($data['errors']['body'])) ? ' is-invalid' : ''); ?>"><?php echo $data['body']; ?></textarea>
            <span class="invalid-feedback"><?php echo $data['errors']['body']; ?></span>
        </div>

        <input type="submit" class="btn btn-primary btn-lg" value="Send">
    </form>
</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>