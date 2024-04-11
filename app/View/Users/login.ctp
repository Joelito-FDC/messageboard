<?php
    $this->extend('/Common/view');
    $this->Html->css('bootstrap-4.0/css/bootstrap.min', array('inline' => false));
    $this->Html->css('custom.style', array('inline' => false));
    $this->assign('page', 'Login');
?>

<div class="text-center">
    <?php echo $this->Flash->render(); ?>
</div>

<?php
    echo $this->Form->create('User');
    echo $this->Form->input('email', array('style' => 'width: 60%'));
    echo $this->Form->input('password', array('style' => 'width: 60%'));
    echo $this->Form->end('Login');
?>

<div class="text-center mt-3">
    <?php echo $this->Html->link('Register', array('controller' => 'users', 'action' => 'registration')) ?>
</div>