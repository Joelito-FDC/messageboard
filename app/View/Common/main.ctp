<!DOCTYPE html>
<html class="h-100">
    <head>
        <?php
            echo $this->fetch('css');
        ?>
    </head>
    <body class="h-100">
        <div class="container h-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">Message Board</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">User Profile <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Messages</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        Navbar text with an inline element
                    </span>
                </div>
            </nav>
            <div class="p-4 d-flex align-items-center flex-column">
                <div>
                    <h1><?php echo $this->fetch('title') ?></h1>
                </div>
                <div>
                    <?php echo $this->fetch('content') ?>
                </div>
                <div class="w-100 pt-3">
                    <?php echo $this->fetch('message') ?>
                </div>
            </div>
        </div>
        <?php echo $this->fetch('scriptBottom') ?>
    </body>
</html>