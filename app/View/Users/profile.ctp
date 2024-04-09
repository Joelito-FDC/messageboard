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
    $this->assign('title', 'User Profile');
?>

<div class="text-center">
    <?php echo $this->Flash->render(); ?>
<div>
<div class="p-2">
    <div class="m-1 profile-form">
        <div class="mb-3 d-flex">
            <div class="border mr-2 mt-2" style="width: 100px; height: 100px;">
                <?php
                    if(!empty($accountInfo['User']['profile_pic'])):
                        echo $this->Html->image($accountInfo['User']['profile_pic'], array('style' => 'width: 100px; height: 100px;'));
                    else:
                ?>
                        <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_640.png" style="width: 100px; height: 100px;">
                <?php        
                    endif;
                 ?>
            </div>
            <div class="ml-2 mb-2">
                <div>
                    <h5 style="text-align: start;"><?php echo h($accountInfo['User']['name']) . ' ' . floor((strtotime(date('Y-m-d')) - strtotime($accountInfo['User']['birthdate'])) / (365 * 60 * 60 * 24)) ?></h5>
                </div>
                <div>
                    <table>
                        <tr>
                            <td style="text-align: start; font-size: 14px;">Gender&nbsp:&nbsp</td>
                            <td style="text-align: start; font-size: 14px;"><?php echo ucfirst(h($accountInfo['User']['gender'])); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: start; font-size: 14px;">Birthdate&nbsp:&nbsp</td>
                            <td style="text-align: start; font-size: 14px;">
                                <?php
                                    if(!empty($accountInfo['User']['birthdate'])) {
                                        echo date('F d, Y', strtotime($accountInfo['User']['birthdate']));
                                    } else {
                                        echo "N/A";
                                    }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: start; font-size: 14px;">Joined&nbsp:&nbsp</td>
                            <td style="text-align: start; font-size: 14px;"><?php echo date('F d, Y ga', strtotime($accountInfo['User']['created'])); ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: start; font-size: 14px;">Last Login&nbsp:&nbsp</td>
                            <td style="text-align: start; font-size: 14px;"><?php echo date('F d, Y ga', strtotime($accountInfo['User']['last_login_time'])); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style="text-align: start; font-size: 14px;">Hobby&nbsp:&nbsp</div>
        <div class="mt-1" style="text-align: start; font-size: 14px;">
            <?php echo h($accountInfo['User']['hobby']); ?>
        </div>
    </div>
</div>