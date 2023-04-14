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
            <?= $this->Html->link(__('List Services'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="services form content">

            <!-- Form->create($service) just means that create a form with data type $service
             Since we want an image file as well, we must specify during the form create
             that there is also a file type as well-->

            <!-- Note: add this and the Form->control(image_file... as well to edit.php -->
            <?= $this->Form->create($service, ['type'=>'file']) ?>
            <fieldset>
                <legend><?= __('Add Service') ?></legend>
                <?php
                    echo $this->Form->control('service_name');
                    echo $this->Form->control('service_duration');
                    echo $this->Form->control('service_desc');
                    echo $this->Form->control('service_price');
                    //We must specify the type of data for image which is a "file"
                    echo $this->Form->control('image_file',['type'=>'file']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
