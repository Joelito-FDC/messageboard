<!DOCTYPE html>
<html class="h-100">
    <head>
        <?php
            echo $this->fetch('css');
        ?>
    </head>
    <body class="h-100">
        <div class="container h-100">
            <div class="h-100 col d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center" style="height: 100px;">    
                    <h1><?php echo $this->fetch('page') ?></h1>
                </div>
                <div class="d-flex justify-content-center">
                    <div>
                        <?php echo $this->fetch('content') ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>