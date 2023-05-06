<?php
/**
 * @var \App\View\AppView $this
 */

$this->assign('title', 'Reset Password');
?>
<div class="container login">
    <div class="row">
        <div class="column column-50 column-offset-25">
            <div class="staff form content">
                <?= $this->Form->create($staff) ?>
                <fieldset>
                    <legend><?= __('Reset Your Password') ?></legend>
                    <?= $this->Flash->render() ?>
                    <?php
                    echo $this->Form->control('staff_password', [
                        'type' => 'password',
                        'label' => 'New Password',
                        'required' => true,
                        'autofocus' => true,
                        'value' => ''
                    ]);
                    echo $this->Form->control('password_confirm', [
                        'type' => 'password',
                        'label' => 'Repeat New Password',
                        'required' => true,
                        'value' => ''
                    ]);
                    ?>
                </fieldset>
                <?= $this->Form->button(__('Reset Password')) ?>
                <?= $this->Form->end() ?>
                <hr class="hr-between-buttons">
                <?= $this->Html->link(__('Back to login'), ['controller' => 'Staff', 'action' => 'login'], ['class' => 'button']) ?>
            </div>
        </div>
    </div>
</div>
