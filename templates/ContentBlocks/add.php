<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContentBlock $contentBlock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Content Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contentBlocks form content">
            <?= $this->Form->create($contentBlock) ?>
            <fieldset>
                <legend><?= __('Add Content Block') ?></legend>
                <?php
                    echo $this->Form->control('hint');
                    echo $this->Form->control('content_type');
                    echo $this->Form->control('content_value');
                    echo $this->Form->control('previous_value');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
