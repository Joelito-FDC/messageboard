<?php
    $this->extend('/Common/main');
    $this->Html->css('bootstrap-4.0/css/bootstrap.min', array('inline' => false));
    $this->Html->css('custom.style', array('inline' => false));
    $this->Html->css('jquery-ui-1.13.2.custom/jquery-ui', array('inline' => false));
    $this->Html->css('select2.min.css', array('inline' => false));
    $this->Html->script('jquery-3.2.1.min', array('block' => 'scriptBottom'));
    $this->Html->script('popper.min', array('block' => 'scriptBottom'));
    $this->Html->script('bootstrap-4.0/js/bootstrap.min', array('block' => 'scriptBottom'));
    $this->Html->script('jquery-ui-1.13.2.custom/jquery-ui.js', array('block' => 'scriptBottom'));
    $this->Html->script('custom.script', array('block' => 'scriptBottom'));
    $this->Html->script('select2.min.js', array('block' => 'scriptBottom'));
    $this->assign('title', 'New Message');
?>

<?php $this->start('message'); ?>
    <div class="border d-flex flex-column align-items-center">
        <div>
            <label for="recipient">Recipient</label>
            <input id="recipient" type="text">
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" cols="30" rows="5"></textarea>
        </div>
    </div>
<?php $this->end(); ?>