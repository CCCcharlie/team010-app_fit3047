<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $customer->cust_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $customer->cust_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Customer'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customer form content">
            <?= $this->Form->create($customer) ?>
            <fieldset>
                <legend><?= __('Edit Customer') ?></legend>
                <?php
                    echo $this->Form->control('cust_fname');
                    echo $this->Form->control('cust_lname');
                    echo $this->Form->control('cust_phone');
                    echo $this->Form->control('cust_startdate');
                    echo $this->Form->control('cust_email');
                    echo $this->Form->control('cust_password');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
