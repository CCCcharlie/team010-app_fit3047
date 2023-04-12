<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Expertise $expertise
 * @var \Cake\Collection\CollectionInterface|string[] $staff
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Expertise'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="expertise form content">
            <?= $this->Form->create($expertise) ?>
            <fieldset>
                <legend><?= __('Add Expertise') ?></legend>
                <?php
                    echo $this->Form->control('expertise_desc');
                    echo $this->Form->control('staff._ids', ['options' => $staff]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
