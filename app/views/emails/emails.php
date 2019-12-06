<?php require APPROOT . '/views/includes/header.php'; ?>
<div class="container">
    <h1 class="mt-4">
        Emails
    </h1>


        <!--Accordion wrapper-->
        <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <?php foreach ($data['emails'] as $email): ?>
            <!-- Accordion card -->
            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne1">
                    <a  style="text-decoration: none; color: inherit" data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?php echo $email->id?>" aria-expanded="true"
                       aria-controls="collapse<?php echo $email->id?>">
                        <div class="row">
                            <div class="mb-2 col-md-4">
                                To: <strong><?php echo $email->contact; ?></strong>
                            </div>
                            <div class="mx-0 col-md-4">
                                Subject: <strong><?php echo $email->subject?></strong>
                            </div>
                            <div class="col-md-4 text-right">
                            <?php echo $email->time;?>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapse<?php echo $email->id?>" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                    <div class="card-body">
                        <pre><?php echo $email->body; ?></pre>
                    </div>
                </div>

            </div>
            <!-- Accordion card -->
            <?php endforeach; ?>
        </div>
        <!-- Accordion wrapper -->

</div>
<?php require APPROOT . '/views/includes/footer.php'; ?>

