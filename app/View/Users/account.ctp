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
    $this->assign('title', 'Account');
?>

<div class="text-center">
    <?php echo $this->Flash->render(); ?>
<div>
<div class="p-2">
    <div class="m-1 profile-form">
        <?php echo $this->Form->create('User', array('enctype' => 'multipart/form-data')); ?>
        <div class="mb-3 d-flex align-items-center">
            <div class="border m-1" style="width: 100px; height: 100px;">
            </div>
            <div class="m-1">
                <?php echo $this->Form->input('profile_pic', array('type' => 'file', 'label' => 'Upload Pic', 'accept' => 'image/png, image/jpeg, image/gif', 'class' => 'd-none')) ?>
            </div>
        </div>
        <?php
            echo $this->Form->input('name', array('style' => 'width: 70%'));
            echo $this->Form->input('birthdate', array('type' => 'text', 'id' => 'profile-date', 'style' => 'width: 70%'));
        ?>
            <div class="input">
                <label>Gender</label>
                <div class="custom-radio-layout">
                    <?php echo $this->Form->radio('gender', array('male' => 'Male', 'female' => 'Female'), array('legend' => false)); ?>
                </div>
            </div>
        <?php
            echo $this->Form->input('hobby', array('rows' => '3', 'style' => 'width: 70%; resize: none;'));
            echo $this->Form->end('Update', array('style' => 'background-color: green'));
        ?>
    </div>
</div>