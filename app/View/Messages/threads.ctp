<?php
    $this->extend('/Common/main');
    $this->Html->css('bootstrap-4.0/css/bootstrap.min', array('inline' => false));
    $this->Html->css('custom.style', array('inline' => false));
    $this->Html->css('jquery-ui-1.13.2.custom/jquery-ui', array('inline' => false));
    $this->Html->script('jquery-3.2.1.min', array('block' => 'scriptBottom'));
    $this->Html->script('popper.min', array('block' => 'scriptBottom'));
    $this->Html->script('bootstrap-4.0/js/bootstrap.min', array('block' => 'scriptBottom'));
    $this->Html->script('jquery-ui-1.13.2.custom/jquery-ui.js', array('block' => 'scriptBottom'));
    $this->Html->script('custom.script', array('block' => 'scriptBottom'));
    $this->assign('title', 'Message Detail');
?>

<?php $this->start('message'); ?>
    <div class="border">
        <div>
            <?php echo $this->Form->create('Message') ?>
            <?php echo $this->Form->input('message', array('placeholder' => 'Message', 'rows' => '2', 'style' => 'resize: none; width: 60%;', 'label' => '')) ?>
            <?php echo $this->Form->end('Reply Message') ?>
        </div>   
    </div>
<?php $this->end(); ?>