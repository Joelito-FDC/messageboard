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
    <div>
        <div class="mb-2">
            <div class="d-flex flex-row-reverse mb-2">
                <textarea id="thread-message" placeholder="Message" name="" id="" rows="2" style="width: 75%; resize: none;"></textarea>
            </div>
            <div class="d-flex flex-row-reverse">
                <button id="send-thread-message-btn" class="btn btn-secondary" data-thread-send-link="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'send', $recipientId)); ?>">Reply Message</button>
            </div>
        </div>   
        <div class="message-list" id="thread-message-list" data-thread-link="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'convo', 'threads', $recipientId)); ?>">
            
        </div>
    </div>
<?php $this->end(); ?>