<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Service $service
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $service->service_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $service->service_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Services'), ['action' => 'admindex'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="services form content">
            <!-- Refer to add.php for services for more info -->
            <?= $this->Form->create($service, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Edit Service') ?></legend>
                <?php
                    echo $this->Form->control('service_name');  echo ("[In minutes]");
                    echo $this->Form->control('service_duration');
                    echo $this->Form->control('service_desc',['type'=>'textarea', 'style' => 'height: 15rem;']);  echo ("[In dollars $]");
                    echo $this->Form->control('service_price');
                    // stores the name of the file type in variable change_image
                    echo $this->Form->control('change_image',['type'=>'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
