<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 * @var \App\Model\Entity\ContentBlock $contentBlock
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enquiry->enquiry_id],
                ['confirm' => __('Are you sure you want to delete # {0}? This change cannot be undone!', $enquiry->enquiry_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('Return to Enquiry Page'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
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
                $this->Html->link(__('List Content Blocks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    </div>
</div>
