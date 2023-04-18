<?php
/**
 * @var \App\View\AppView $this
<<<<<<< HEAD
 * @var \App\Model\Entity\Enquiry $enquiry
=======
 * @var \App\Model\Entity\ContentBlock $contentBlock
>>>>>>> cd33619b10c0c30597238da07c758054dc6aaae1
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
<<<<<<< HEAD
                ['action' => 'delete', $enquiry->enquiry_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->enquiry_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Enquiry'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="enquiry form content">
            <?= $this->Form->create($enquiry) ?>
            <fieldset>
                <legend><?= __('Edit Enquiry') ?></legend>
                <?php
                    echo $this->Form->control('Name');
                    echo $this->Form->control('Email');
                    echo $this->Form->control('Phone');
                    echo $this->Form->control('Message');
=======
                ['action' => 'delete', $contentBlock->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contentBlock->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Content Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="contentBlocks form content">
            <?= $this->Form->create($contentBlock) ?>
            <fieldset>
                <legend><?= __('Edit Content Block') ?></legend>
                <?php
                echo $this->Form->control('hint');
                echo $this->Form->control('content_type');
                echo $this->Form->control('content_value');
                echo $this->Form->control('previous_value');
>>>>>>> cd33619b10c0c30597238da07c758054dc6aaae1
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
