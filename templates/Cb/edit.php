<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cb $cb
 * @var string[] $content_types
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $cb->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $cb->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Cb'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="cb form content">
            <?= $this->Form->create($cb, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Cb') ?></legend>
                <?php
                    echo $this->Form->control('hint');
                    echo $this->Form->control('content_type', [
                        'type' => 'select',
                        'options' => $content_types,
                        'empty' => '-- Select a content type --'
                    ]);

//                    debug($content_types === "text");

                    if ($cb->content_type == "text") {
                        echo $this->Form->control('content_text');
                    }else {
                        echo $this->Form->control('content_image',['type'=>'file']);
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
