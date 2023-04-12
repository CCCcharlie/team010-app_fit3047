<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Staffexpertise $staffexpertise
 * @var string[]|\Cake\Collection\CollectionInterface $staff
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $staffexpertise->staff_exp_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $staffexpertise->staff_exp_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Staffexpertise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staffexpertise form content">
            <?= $this->Form->create($staffexpertise) ?>
            <fieldset>
                <legend><?= __('Edit Staffexpertise') ?></legend>
                <?php
                    echo $this->Form->control('staff_id', ['options' => $staff]);
                    echo $this->Form->control('expertise_title');
                    echo $this->Form->control('staffexpert_date_completed');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
