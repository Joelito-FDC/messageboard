<?php
    $this->extend('/Common/view');
    $this->Html->css('bootstrap-4.0/css/bootstrap.min', array('inline' => false));
    $this->Html->css('custom.style', array('inline' => false));
    $this->assign('page', 'Registration');
    $this->Html->script('jquery-3.2.1.min', array('block' => 'scriptBottom'));
    $this->Html->script('custom.script', array('block' => 'scriptBottom'));
?>

<div class="text-center">
    <?php echo $this->Flash->render(); ?>
    <div id="registration-info-status">
    </div>
</div>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('name', array('style' => 'width: 60%'));
    echo $this->Form->input('email', array('style' => 'width: 60%'));
    echo $this->Form->input('password', array('style' => 'width: 60%'));
    echo $this->Form->input('confirm_password', array('style' => 'width: 60%', 'type' => 'password'));
    echo $this->Form->end('Register');
?>