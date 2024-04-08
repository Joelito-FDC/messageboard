<?php foreach($messages as $message): ?>
    <div class="mb-2 d-flex <?php if($userId == $message['Message']['user_id']) echo 'flex-row-reverse' ?>">
        <div class="border" style="height: 80px; width: 80px;"></div>
        <div class="border d-flex flex-column" style="width: 100%; height: 80px;">
            <div class="p-2 border-bottom h-100">
                <?php echo h($message['Message']['message']); ?>
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