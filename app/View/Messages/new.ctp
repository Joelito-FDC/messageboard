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

<?php //print_r($recipient); ?>
<?php $this->start('message'); ?>
    <div>
        <div class="d-flex justify-content-center mb-1">
            <label for="recipient">Recipient</label>
            <div class="w-50 ml-2">
                <select id="recip-list" class="w-100" id="recipient" type="text">
                    <?php foreach($recipient as $contact): ?>
                        <?php if($contact['User']['id'] == $userId) continue; ?>
                        <option value="<?php echo $contact['User']['id'] ?>"><?php echo $contact['User']['name'] ?></option>    
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="d-flex justify-content-center mb-1"> 
            <label for="message" style="float: inline-start;">Message</label>
            <textarea id="message" class="w-50 ml-2" style="resize: none;" cols="30" rows="5"></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <div class="invisible">DUMMY</div>
            <div class="w-50 ml-2">
                <button type="button" id="send-message-btn" data-link-redirect="<?php echo $this->Form->url(array('controller' => 'messages', 'action' => 'threads')) ?>"  data-link-url="<?php echo $this->Form->url(array('controller' => 'messages', 'action' => 'send')) ?>" data-user-id="<?php echo $userId ?>" class="btn btn-secondary">Send Message</button>   
            </div>
        </div>
    </div>
<?php $this->end(); ?>