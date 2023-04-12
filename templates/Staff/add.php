<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staff $staff
 * @var \Cake\Collection\CollectionInterface|string[] $expertise
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Staff'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staff form content">
            <?= $this->Form->create($staff) ?>
            <fieldset>
                <legend><?= __('Add Staff') ?></legend>
                <?php
                    echo $this->Form->control('staff_fname');
                    echo $this->Form->control('staff_lname');
                    echo $this->Form->control('staff_position');
                    echo $this->Form->control('staff_email');
                    echo $this->Form->control('staff_password');
                    echo $this->Form->control('expertise._ids', ['options' => $expertise]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
