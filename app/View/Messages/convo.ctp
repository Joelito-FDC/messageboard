<?php foreach($messages as $message): ?>
    <div id="<?php if($page == 'list') echo 'ms-id-' . $message['Message']['id'] ?>" class="mb-2 d-flex <?php if($userId == $message['Message']['user_id']) echo 'flex-row-reverse' ?>">
        <div class="border" style="height: 80px; width: 80px;"></div>
        <div class="border d-flex flex-column" style="width: 100%; height: 80px;">
            <div class="p-2 border-bottom h-100 <?php if($page == 'list') echo 'd-flex justify-content-between' ?>">
                <div>
                    <?php echo h($message['Message']['message']); ?>
                </div>
                <?php if($page == 'list'): ?>
                    <div class="d-flex align-items-center">
                        <button id="message-list-delete-btn" data-message-id="ms-id-<?php echo $message['Message']['id'] ?>" data-remove-link="<?php echo $this->Html->url(array('controller' => 'messages', 'action' => 'delete')) ?>" data-delete-user="<?php echo $message['Message']['user_id'] ?>" data-delete-recipient="<?php echo $message['Message']['recipient_id'] ?>" class="btn btn-danger" style="font-size: 10px;">DELETE</button>
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