<?php foreach($messages as $message): ?>
    <div id="<?php if($page == 'list') echo 'ms-id-' . $message['Message']['id'] ?>" class="mb-2 d-flex <?php if($userId == $message['Message']['user_id']) echo 'flex-row-reverse' ?> <?php if($page == 'list') echo 'msg-clickable-container' ?>" data-redirect-link="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'threads', $message['Message']['recipient_id'])) ?>">
        <div class="border" style="height: 80px; width: 80px;">
            <?php
                if($userId == $message['Message']['user_id']):
                    if(!empty($this->Session->read('User.profile'))):
                        echo $this->Html->image($this->Session->read('User.profile'), array('style' => 'width: 78px; height: 78px;'));
                    else:
            ?>
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" style="width: 80px; height: 80px;">
            <?php
                    endif;
                else:
                    if(!empty($recipientProfile['User']['profile_pic'])):
                        echo $this->Html->image($recipientProfile['User']['profile_pic'], array('style' => 'width: 78px; height: 78px;'));
                    else:
            ?>
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" style="width: 80px; height: 80px;">
            <?php
                    endif;
                endif;
            ?>
        </div>
        <div class="border d-flex flex-column" style="width: 100%; min-height: 80px;">
            <div class="main-message-container p-2 ml-1 border-bottom h-100 <?php if($page == 'list') echo 'd-flex justify-content-between' ?>">
                <div class="list-thread-message-container">
                    <?php echo h($message['Message']['message']); ?>
                </div>
                <?php if($page == 'list'): ?>
                    <div class="d-flex align-items-center">
                        <button class="message-delete-btn btn btn-danger" data-message-id="ms-id-<?php echo $message['Message']['id'] ?>" data-remove-link="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'delete')) ?>" data-delete-user="<?php echo $message['Message']['user_id'] ?>" data-delete-recipient="<?php echo $message['Message']['recipient_id'] ?>" class="btn btn-danger" style="font-size: 10px;">DELETE</button>
                    </div>
                <?php endif; ?>
            </div>
            <div class="pl-1 d-flex align-items-center" style="height: 18px;">
                <b style="font-size: 10px;">
                    <?php echo h($message['Message']['created']); ?>
                </b>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<div class="d-flex justify-content-center">
    <?php echo $this->Paginator->next('Show More'); ?>
</div>