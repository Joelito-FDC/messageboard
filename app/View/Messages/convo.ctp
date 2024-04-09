<?php // print_r($messages) ?>
<?php foreach($messages as $message): ?>
    <?php if($page == 'list'): ?>
        <div class="font-weight-light text-secondary" style="font-size: 12px;">
            <?php 
                if($message[0]['sender'] == $this->Session->read('User.name')): 
                    echo $message[0]['recipient'];
                else:
                    echo $message[0]['sender'];
                endif;
            ?>    
        </div>
    <?php else: ?>
        <div class="font-weight-light text-secondary <?php if($message['Users']['name'] == $this->Session->read('User.name')) echo 'd-flex flex-row-reverse' ?>" style="font-size: 12px;">
            <?php
                if($message['Users']['name'] == $this->Session->read('User.name')):
                    echo 'You'; 
                else:
                    echo $message['Users']['name'];
                endif;
            ?>
        </div>
    <?php endif; ?>
    <div id="<?php if($page == 'list') echo 'ms-id-' . $message['Message']['id'] ?>" class="mb-2 d-flex <?php if($userId == $message['Message']['user_id']  && $page == 'thread') echo 'flex-row-reverse' ?>">
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
            <div class="main-message-container ml-1 border-bottom h-100 <?php if($page == 'list') echo 'd-flex justify-content-between' ?>">
                <div style="font-size: 14px;" class="list-thread-message-container p-2 w-100 <?php if($page == 'list') echo 'msg-clickable-container' ?>" data-redirect-link="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'threads', $message['Message']['recipient_id'])) ?>">
                    <?php
                        if($page == 'list'):
                            $ellipse = '...';
                            $len = 180;
                        else:
                            $ellipse = "<a href='#' class='show-more-msg-content'>...show more</a>";
                            $len = 200;
                        endif;

                        echo $this->Text->truncate(
                            h($message['Message']['message']),
                            $len,
                            array(
                                'ellipsis' => $ellipse,
                                'exact' => true
                            )
                        );
                    ?>
                </div>
                <?php if($page == 'list'): ?>
                    <div class="d-flex align-items-center m-1">
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