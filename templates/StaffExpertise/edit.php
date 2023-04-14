<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StaffExpertise $staffExpertise
 * @var string[]|\Cake\Collection\CollectionInterface $staff
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $staffExpertise->staff_exp_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $staffExpertise->staff_exp_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Staff Expertise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="staffExpertise form content">
            <?= $this->Form->create($staffExpertise) ?>
            <fieldset>
                <legend><?= __('Edit Staff Expertise') ?></legend>
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
