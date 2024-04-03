<!DOCTYPE html>
<html class="h-100">
    <head>
        <title>Thank you for registering</title>
        <?php echo $this->Html->css('bootstrap-4.0/css/bootstrap.min'); ?>
    </head>
    <body class="h-100">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div>
                <div>
                    <h3>Thank you for registering.</h3>
                </div>
                <div class="text-center">
                    <?php echo $this->Html->link('Back to homepage', array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-secondary')) ?>
                    <!-- <button type="button" class="btn btn-secondary">Back to homepage</button> -->
                </div>
            </div>
        </div>
    </body>
</html>